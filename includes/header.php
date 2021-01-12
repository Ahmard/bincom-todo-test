<?php
$config = require ROOT_DIR . '/config.php';
require ROOT_DIR . '/autoloader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?? $config['app']['name'] ?></title>
    <link rel="stylesheet" href="/assets/main.css">
</head>
<body>
<div class="header">
    <div>
        <a href="/">
            <?=$config['app']['name']?>
        </a>
    </div>
</div>