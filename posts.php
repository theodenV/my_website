<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты</title>
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

                <?php
                require_once("db.php");
                $link = mysqli_connect($servername, $username, $password, $db_name);
                if (isset($_GET["id"])) {
                    $id = $_GET["id"];
                    echo "<h2 class='mb-4'>Выбранный пост</h2>";
                    $sql = "SELECT * FROM posts WHERE id=$id";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_array($result);
                    echo '<div class="card shadow-sm mb-4"><div class="card-body">';
                    echo '<h4 class="card-title text-primary">' . $row["title"] . '</h4>';
                    echo '<p class="card-text text-muted">' . $row["main_text"] . '</p>';
                    echo '<img src="/upload/' . $row["filename"] . '" class="img-fluid rounded-circle" style="width: 180px; height: 180px; object-fit: cover;">';
                    echo '</div></div>';
                } else {
                    echo "<h2 class='mb-4'>Все посты</h2>";
                    $sql = "SELECT * FROM posts";
                    $result = mysqli_query($link, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="card shadow-sm mb-4"><div class="card-body">';
                            echo '<h4 class="card-title text-primary">' . $row["title"] . '</h4>';
                            echo '<p class="card-text text-muted">' . $row["main_text"] . '</p>';
                            echo '<img src="/upload/' . $row["filename"] . '" class="img-fluid rounded-circle" style="width: 180px; height: 180px; object-fit: cover;">';
                            echo '</div></div>';
                        }
                    } else {
                        echo "no posts";
                    }
                }
                ?>

            </div>
        </div>
    </div>

</body>
</html>