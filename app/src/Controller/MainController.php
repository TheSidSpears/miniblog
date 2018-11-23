<?php


namespace Miniblog\Controller;

use Miniblog\Renderer;
use Miniblog\Repository\Posts;

class MainController implements ControllerInterface
{
    public function index()
    {
        Renderer::render('main', [
            'posts' => (new Posts())->lastPosts()
        ]);
    }
}