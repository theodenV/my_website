<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="text-center">

            <h1 class="display-4 fw-bold mb-4">Добро пожаловать!</h1>
            <p class="lead text-muted mb-5">Сайт Марченко Дениса!</p>
            <?php
                if (!isset($_COOKIE["User"])) {
            ?>
            <div class="d-flex gap-3 justify-content-center">
                <a href="/registration.php" class="btn btn-success btn-lg px-4">Регистрация</a>
                <a href="/login.php" class="btn btn-primary btn-lg px-4">Логин</a>
                <a href="#" id="eye-button" class="btn btn-dark btn-lg px-4">Око</a>
            </div>
            <img src="https://static.wikia.nocookie.net/mifology-folklore/images/6/67/%D0%92%D1%81%D0%B5%D0%B2%D0%B8%D0%B4%D1%8F%D1%89%D0%B5%D0%B5.jpg/revision/latest?cb=20190126163214&path-prefix=ru" id="eye" class="img-fluid" style="width: 180px; height: 180px; object-fit: cover;">
            <?php
                } else {
                    require_once("db.php");
                    $link = mysqli_connect($servername, $username, $password, $db_name);
                    $sql = "SELECT * FROM posts";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($post = mysqli_fetch_assoc($result)) {
                            echo "<a href='/posts.php?id=". $post["id"] ."'>" . $post["title"] . "</a><br>";
                        }
                    } else {
                        echo "no posts";
                    }
                    echo "<a href='/profile.php' class='btn btn-dark'> к профилю</a>";
                    mysqli_close($link);
                }
            ?>
        
        
        </div>
    </div>

    <script>
        const eye_button = document.getElementById('eye-button');
        const eye_image = document.getElementById('eye');

        eye_button.addEventListener('click', () => {
            if (eye_image.hidden) {
                eye_image.hidden = false;
            } else {
                eye_image.hidden = true;
            }
        });
    </script>

</body>
</html>