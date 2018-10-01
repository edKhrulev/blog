<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends BaseController
{

    public function home(Request $r): Response
    {
        return new Response($this->twig->render('home.twig'));
    }
}
