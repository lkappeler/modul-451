<?php

//TODO: Implement propper autoloader may composer
//include 'autoloader.php';
require_once __DIR__.'/Classes/App.php';
session_start();
$app = new \LNK\Classes\App();
