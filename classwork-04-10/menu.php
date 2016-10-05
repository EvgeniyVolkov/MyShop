<?php
require_once 'db/Db.php';
$connection = Db::getConnection();

$sql = "SELECT * FROM category";
$rows = $connection->query($sql)->fetchAll();
?>

<nav class="nav">
    <ul>
        <?php foreach ($rows as $category): ?>
            <li><a href="#"><?= $category['name'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>