<?php
use Symfony\Component\HttpFoundation\Response;

class AboutController extends BaseController
{

    protected function askTwigForTemplate(): string
    {
        return $this->twig->render('about.twig');
    }

}
