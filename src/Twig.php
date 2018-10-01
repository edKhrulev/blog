<?php

use Twig\Environment;
use Twig\TwigFunction;
use Twig\Loader\FilesystemLoader;

class Twig
{
    public function __construct()
    {
        $pathList = Config::$conf['twig']['template_paths'];
        $debugMode = Config::$conf['twig']['debug'];

        $loader = new FilesystemLoader($pathList);
        $options = ['debug' => $debugMode];

        $this->env = new Environment($loader, $options);
    }

    public function addFunction($twigName, $originalName)
    {
        $f = new TwigFunction($twigName, $originalName);
        $this->env->addFunction($f);
    }

    public function addGlobal($name, $value)
    {
        $this->env->addGlobal($name, $value);
    }

    public function render(string $name, array $data = []): string
    {
        return $this->env->render($name, $data);
    }

}
