<?php

require 'vendor/autoload.php';

$config = require 'config.php';

\App\Database::create($config);

\App\Session::init();