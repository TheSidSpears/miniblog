<?php
spl_autoload_register(function($className) {

    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    // remove project name
    $className = explode(DIRECTORY_SEPARATOR, $className);
    array_shift($className);
    $className = implode(DIRECTORY_SEPARATOR, $className);

	include_once __DIR__ . '/../app/src/' . $className . '.php';
});

$frontController=new Miniblog\Controller\FrontController();
$frontController->start();