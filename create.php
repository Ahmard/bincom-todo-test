<?php

require 'autoloader.php';

if (empty($_POST['name'])){
    \App\Session::flash('error', 'Todo name must be provided');
    \App\Helper::redirect('/');
}

\App\TodoFactory::init()->create([
    'name' => $_POST['name']
]);

\App\Helper::redirect('/');