<?php

require 'autoloader.php';

try {
    \App\TodoFactory::init()->delete($_GET['id']);
}catch (Throwable $exception){
    \App\Session::flash('error', 'An error occurred');
    \App\Helper::redirect('/');
}finally {
    \App\Helper::redirect('/');
}
