<?php
require('init.php');
$app = new Application;
$resp = $app->generateResponse();
$resp->send();





