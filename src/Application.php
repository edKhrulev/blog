<?php

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class Application
{

    public function __construct()
    {
        $this->req = Request::createFromGlobals();

        $session = new Session();
        $session->start();
        $this->req->setSession($session);

        $this->router = new Router($this->req);
    }

    public function generateResponse(): Response
    {
        $routeDetails = $this->router->match(
            $this->req->getPathInfo()
        );

        $func_name = [$this->router, 'generate'];
        $twig = new Twig;
        $twig->addFunction('url', $func_name);
        $twig->addGlobal('request', $this->req);

        $controller = new $routeDetails['_controller']($twig);
        $method = $routeDetails['_action'];
        $response = $controller->$method($this->req);
        return $response;
    }
}
