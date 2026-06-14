<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4">

                <h2 class="text-center mb-4">Регистрация</h2>
                <p class="text-muted text-center mb-4">Создайте новый аккаунт</p>

                <form action="/registration.php" method="post">
                    <div class="mb-3">
                        <label for="login" class="form-label">Логин</label>
                        <input name="login" type="text" class="form-control" id="login" placeholder="Придумайте логин">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Почта</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="example@mail.ru">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Придумайте пароль">
                    </div>
                    <button name="submit" type="submit" class="btn btn-success w-100 py-2">Зарегистрироваться</button>
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
        $email = $_POST["email"];
        $pass = $_POST["password"];
        echo "registration: " . $username . " - " . $email . " - " . $pass;
        if (!$username || !$email || !$pass) {
            die("input all parametrs");
        }
        $sql = "INSERT INTO users (username, email, pass)
            VALUES ('$username', '$email', '$pass')";
        
        if (!mysqli_query($link, $sql)) {
            echo "Error insert". mysqli_error($link);
        } else {
            header("Location: /login.php");
            exit();
        }
    }
    mysqli_close($link);
?>