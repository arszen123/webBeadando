<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pizza</title>
    <!-- TODO -->
    <link rel="stylesheet" type="text/css" href="/ql0sz4/assets/css/main.css">
</head>
<body>
<header>
    <?= \Framework\Menu::generateMenu(\Model\User::isLoggedInUser() ? (\Model\User::getAuthUser()->isAdmin() ? 'loggedInAdminMenu' : 'loggedInUserMenu') : 'mainMenu') ?>
</header>
<main>
    <?= $content ?>
</main>
</body>
</html>
