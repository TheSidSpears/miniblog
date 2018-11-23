<?php


namespace Miniblog\Services;


class CSRFToken
{
    static function randHash($count = 20): string
    {
        $result = '';
        $array = array_merge(range('a', 'z'), range('0', '9'));
        for ($i = 0; $i < $count; $i++) {
            $result .= $array[mt_rand(0, count($array)-1)];
        }

        return $result;
    }

    static function initCSRFToken(): string
    {
        $token = (isset($_COOKIE['token'])) ? $_COOKIE['token'] : static::randHash(20);
        setcookie('token', $token, time()+3600, '/', null, false, true);
        return $token;
    }

    static function checkCSRFToken(): bool
    {
        return !(
            (empty($_COOKIE['token'])) ||
            (empty($_POST['token'])) ||
            ($_COOKIE['token'] !== $_POST['token'])
        );
    }
}