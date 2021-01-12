<?php

define('ROOT_DIR', __DIR__);

require 'includes/header.php';

$todos = \App\TodoFactory::init()->getAll(1);
?>
    <div class="container list" style="margin-top: 15px">
        <div style="margin: 15px">
            <a href="index.php" style="border: darkgray 1px solid; padding: 6px">List active todos</a>
        </div>

        <div class="block" style="padding: 30px 200px">
            <div style="margin-bottom: 10px; font-weight: bold;">Completed Todos</div>
            <?php foreach ($todos as $todo): ?>
                <div class="item" style="padding: 20px">
                    <div><?= $todo['name'] ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        </td>
    </div>

<?php require 'includes/footer.php'; ?>