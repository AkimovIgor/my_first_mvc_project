<?php

use Igoframework\Core\Base\View;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php View::getMeta() ?>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="/css/main.css" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light sticky-top bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">
                    MVC
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if (isset($_SESSION['user']) || isset($_COOKIE['user'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : $_COOKIE['user']['name'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/user/profile">Профиль</a>
                                <?php if (isset($_SESSION['user']) && $_SESSION['user']['name'] == 'admin' || isset($_COOKIE['user']) && $_COOKIE['user']['name'] == 'admin'): ?>
                                <a class="dropdown-item" href="/admin">Админка</a>
                                <?php endif; ?>
                                <a class="dropdown-item" href="/user/logout">Выход</a>
                            </div>
                        </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/login">Вход</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/register">Регистрация</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
          <div class="container">
            <div class="row justify-content-center">
              <?= $content ?>
            </div>
          </div>
        </main>

        <footer class="footer mt-auto py-4 bg-light">
          <div class="container text-center">
            <small>Copyright ©2019 Developer: <a href="https://vk.com/id363242275" target="_blank">Akimov I.S.</a></small>
          </div>
        </footer>

        <script src="/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="/js/main.js"></script>

        <?php if (!empty($scripts)): ?>
          <?php foreach ($scripts as $script): ?>
            <?= $script ?>
          <?php endforeach; ?>
        <?php endif; ?>
    </div>
</body>
</html>

    