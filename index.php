<?php

define('ROOT_DIR', __DIR__);

require 'includes/header.php';

$todos = \App\TodoFactory::init()->getAll();
?>

    <div class="container" style="margin-top: 15px">
        <div style="margin: 15px">
            <a href="completed.php" style="border: darkgray 1px solid; padding: 6px">List completed todos</a>
        </div>
        <table width="100%">
            <tr>
                <td class="list">
                    <div class="block" style="padding: 30px 200px">
                        <?php foreach ($todos as $todo): ?>
                            <div class="item">
                                <div><?= $todo['name'] ?></div>
                                <div style="margin-top: 3px">
                                    <a href="markascompleted.php?id=<?= $todo['id'] ?>">mark as completed</a> &middot;
                                    <a style="color: red" href="delete.php?id=<?= $todo['id'] ?>">delete</a> &middot;
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </td>
                <td class="list" align="right">
                    <div class="block" style="padding: 110px 0">

                        <form action="create.php" method="post">
                            <?php
                            if (\App\Session::getFlash('error'))
                                echo '<div class="error">' . \App\Session::getFlash('error') . '</div>';
                            ?>
                            <div class="center">
                                <div class="input-realm">
                                    <input type="text" name="name" placeholder="Todo title">
                                </div>
                                <div class="center">
                                    <button type="submit" class="button">Create todo</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>

<?php require 'includes/footer.php'; ?>