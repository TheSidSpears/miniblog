<?php


namespace Miniblog;

class Router
{
    /** @var string */
    public $page;
    /** @var string */
    public $action;

    public function __construct(string $url)
    {
        $query = parse_url($url, PHP_URL_QUERY);
        parse_str($query, $queryArgs);
        $this->page = $queryArgs['page'] ?? 'main';
        $this->action = $queryArgs['action'] ?? 'index';
    }
}