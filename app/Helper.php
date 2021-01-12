<?php


namespace App;


class Helper
{
    public static function redirect(string $url)
    {
        if (!headers_sent()){
            header("location: {$url}");
            exit();
        }

        echo "<script>window.location = \"{$url}\";</script><br/>Redirecting...";
    }
}