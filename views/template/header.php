<header>
    <h1>My shop</h1>
</header>
<?php if (!\shop\services\UserService::isGuest()): ?>
    <a href="index.php?r=user/logout">Logout</a>
<?php else: ?>
    <a href="index.php?r=user/login">Войти</a>
    <br />
    <a href="index.php?r=user/registration">Регистрация</a>
<?php endif; ?>
