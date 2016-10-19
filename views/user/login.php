<div>
    <form action="" method="POST">
        Email: <br />
        <input type="email" name="email" />
        <br />
        Password:
        <br />
        <input type="password" name="password" />
        <br />
        <input type="submit" />
    </form>
    <?php if (isset($errors)): ?>
        <?php foreach ($errors as $error): ?>
            <p style="color: red"><?= $error ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</div>