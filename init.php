<?php
use Symfony\Component\Yaml\Yaml;
//use Symfony\Component\HttpFoundation\Session\Session;
require('vendor/autoload.php');

class Config {
    public static $conf = [];
    public static function init($filePath) {

        static::$conf = Yaml::parseFile($filePath);
    }
}
Config::init('config.yml');
