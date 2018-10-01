<?php

abstract class BaseController
{
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }
}
