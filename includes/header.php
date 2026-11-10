<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sushi Website</title>
    <link rel="stylesheet" href="<?= $base ?>assets/style.css">
</head>
<body>
    <header class="navbar">
        <div class="navbar-inner">
            <a href="index.php" class="logo">Sushi🍣</a>

            <nav class="nav-links">
                <!-- dashboard, menu, login, logout, register -->
                 <a href="<?= isset($base) ? $base :'' ?> index.php">Home</a>
                 <a href="<?= isset($base) ? $base :'' ?> menu.php">Menu</a>
            </nav>

        </div>
    </header>

    <footer class="site-footer">
        <p>Sushi Indonesia Info contact : @sushiindo</p>
    </footer>
</body>
</html>
