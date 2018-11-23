<?php


namespace Miniblog\Controller;


use Miniblog\Model\Post;
use Miniblog\Renderer;
use Miniblog\Repository\Posts;
use Miniblog\Services\CSRFToken;

class PostController implements ControllerInterface
{
    public function last()
    {
        echo json_encode(
            (new Posts())->lastPosts()
        );
    }

    public function add()
    {
        Renderer::render('post/add', [
            'token' => CSRFToken::initCSRFToken()
        ]);
    }

    public function addForm()
    {
        if (!empty($_POST)) {
            if (!CSRFToken::checkCsrfToken()) {
                header('Location: ?message=try_to_hack');
                exit;
            }

            $post = new Post();

            foreach ($_POST as $field => $value) {
                $postData[$field] = trim(strval($value));
            }

            $post
                ->setTitle($postData['title'])
                ->setText($postData['text'])
                ->setImage($postData['image']);

            if ((new Posts())->addPost($post)) {
                header('Location: ?message=post_added');
                exit();
            }
        }
    }
}