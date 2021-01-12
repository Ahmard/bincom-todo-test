<?php

define('ROOT_DIR', __DIR__);

$config = require ROOT_DIR . '/config.php';
require 'app/Database.php';
require 'app/TodoFactory.php';
$db = \app\Database::create($config);

$dumpData = [
    [
        'name' => 'First todo',
    ],
    [
        'name' => 'Second todo',
    ],
    [
        'name' => 'Third todo',
    ],
];

try {
    $db->exec("
        CREATE TABLE IF NOT EXISTS todos(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name VARCHAR(1000) NOT NULL,
            status INTEGER(1) DEFAULT 0 NOT NULL,
            created_at INTEGER(15) NOT NULL,
            completed_at INTEGER(15) NOT NULL
        )
    ");

    var_dump("Database table installed successfully.");

    $todoFactory = \app\TodoFactory::init();
    foreach ($dumpData as $datum){
        $todoFactory->create($datum);
    }

    var_dump("Default todos inserted successfully.");

}catch (PDOException $PDOException){
    echo $PDOException;
}