<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логин</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4">

                <h2 class="text-center mb-4">Вход в аккаунт</h2>
                <p class="text-muted text-center mb-4">Пожалуйста, авторизуйтесь</p>

                <form action="/login.php" method="post">
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input name="login" type="text" class="form-control" id="login" placeholder="Введите ваш логин">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Введите пароль">
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary w-100 py-2">Войти</button>
                </form>

            </div>
        </div>
    </div>

</body>
</html>



<?php 
    require_once("db.php");
    if (isset($_COOKIE["User"])) {
        header("Location: /profile.php");
        exit();
    }
    $link = mysqli_connect($servername, $username, $password, $db_name);
    if (isset($_POST["submit"])) {
        $username = $_POST["login"];
        $pass = $_POST["password"];
        echo "registration: " . $username . " - " . " - " . $pass . "\n";
        if (!$username || !$pass) {
            die("input all parametrs");
        }
        $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";
        $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $username, time() + 7200);
            header("Location: /profile.php");
        } else {
            echo "Неправильные данные";
        }

    }
    mysqli_close($link);
?>

