<?php
    if (!isset($_COOKIE["User"])) {
        header("Location: /index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Мой сайт</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/profile.php">Профиль</a></li>
                    <li class="nav-item"><a class="nav-link" href="/posts.php">Посты</a></li>
                    <li class="nav-item"><a class="nav-link" href="/publish.php">Написать пост</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="/logout.php">Выйти</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-sm">
                    <div class="card-body p-4">

                        <div class="row">
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                <img src="https://pastebin.com/themes/pastebin/img/guest.png" alt="Фото профиля" class="img-fluid rounded-circle" style="width: 180px; height: 180px; object-fit: cover;">
                                <p class="text-muted mt-2 small">Фото профиля</p>
                            </div>

                            <div class="col-md-8">
                                <h3 class="mb-4">Профиль</h3>
                                
                                <div class="mb-3">
                                    <label class="fw-bold">Логин:</label>
                                    <p class="text-muted mb-0">vasya</p>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Почта:</label>
                                    <p class="text-muted mb-0">vasya@dvfu.ru</p>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Пароль:</label>
                                    <p class="text-muted mb-0">12345678</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>