<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pizza</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
</head>
<body>
<header>
    <?= \Framework\Menu::generateMenu($_SESSION['loggedInUser'] instanceof \Model\User ? 'loggedInUserMenu':'mainMenu')?>
</header>
<main>
    <?= $content ?>
</main>
</body>
</html>
