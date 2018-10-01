<?php


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    public function __construct(Request $req)
    {
        $this->req = $req;
        $this->collection = new RouteCollection();
        $this->registerRoutes();
        $requestContext = new RequestContext;
        $requestContext->fromRequest($req);
        $this->matcher = new UrlMatcher($this->collection, $requestContext);
        $this->generator = new UrlGenerator($this->collection, $requestContext);
    }

    private function registerRoutes() {
        foreach (Config::$conf['router'] as $routeInfo) {
            $this->collection->add(
                $routeInfo['name'],
                new Route(
                    $routeInfo['path'],
                    ['_controller' => $routeInfo['controller'], '_action' => $routeInfo['action']]
                )
            );
        }
    }

    public function match($url): array
    {
        $details = $this->matcher->match($url);
        return $details;
    }

    public function generate($name, $params=[]): string
    {
        return $this->generator->generate($name, $params);
    }

}
