<?php


namespace Miniblog;


class Renderer
{
    protected static $viewsPath = '../app/view/';
    public static $vars;

    static function render(string $view, array $vars = [])
    {
        self::$vars = $vars;
        include_once(self::$viewsPath . 'index.php');
    }

    public static function include($view)
    {
        include_once(self::$viewsPath . $view . '.php');
    }
}