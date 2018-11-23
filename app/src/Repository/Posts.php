<?php


namespace Miniblog\Repository;


use Miniblog\Model\Post;

class Posts extends Repository
{
    public function lastPosts(): array
    {
        $statement = $this->db->prepare('SELECT * FROM posts ORDER BY updated_at DESC LIMIT 10');
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function addPost(Post $post): bool
    {
        $statement = $this->db->prepare('INSERT INTO posts
                    (title,text,image)
                    VALUES
                    (:title,:text,:image)');

        $statement->bindValue(':title', $post->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue(':text', $post->getText(), \PDO::PARAM_STR);
        $statement->bindValue(':image', $post->getImage(), \PDO::PARAM_STR);

        return $statement->execute();
    }
}