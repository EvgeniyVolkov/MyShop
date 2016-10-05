<?php
require_once 'db/Db.php';
$connection = Db::getConnection();
$sql = "SELECT title FROM products";
$rows = $connection->query($sql)->fetchAll();
?>

<article class="article">
    <h1>London</h1>
    <p>
    <?php foreach ($rows as $product): ?>
        <li><a href="#"><?= $product['title'] ?></a></li>
    <?php endforeach; ?>
    </p>
</article>