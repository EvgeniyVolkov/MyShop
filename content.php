<?php
require_once 'db/Db.php';
//$connection = Db::getConnection();

$sql = "SELECT `title` FROM `product`";
$rows = $connection->query($sql)->fetchAll();
?>

<article class="article">
    <h1>Хиты продаж:</h1>
    <p>
    <?php foreach ($rows as $product): ?>
        <a href="#"><?= $product['title'] ?></a><br />
    <?php endforeach; ?>
    </p>
</article>