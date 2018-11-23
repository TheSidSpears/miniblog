<?php

namespace Miniblog\Controller;

use Miniblog\Router;

class FrontController implements ControllerInterface
{
    private $router;

    public function __construct()
    {
        $this->router = new Router($_SERVER['REQUEST_URI']);
    }

    public function start()
    {
        if ($controller = $this->createController($this->router->page)) {
            $this->executeAction($controller, $this->router->action);
        } else {
            $this->showError();
        }
    }

    private function createController(string $action): ?ControllerInterface
    {
        $controllerClassName = 'Miniblog\Controller\\' . ucfirst($action) . 'Controller';
        return class_exists($controllerClassName) ? new $controllerClassName : null;
    }

    private function executeAction(ControllerInterface $controller, string $action)
    {
        method_exists($controller, $action) ?
            $controller->$action() :
            $this->showError();
    }

    private function showError()
    {
        // todo norm page
        echo '404';
        exit;
    }
}