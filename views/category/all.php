<h2><?= $variable; ?></h2>
<ul>
    <?php foreach ($categories as $category): ?>
        <li><?= $category ?></li>
    <?php endforeach; ?>
</ul>
<h3><?= $name .' ' . $lastname; ?></h3>