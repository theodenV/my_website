<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Написать пост</title>
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

                <div class="text-center mb-4">
                    <h2>Создать новый пост</h2>
                    <p class="text-muted">Поделитесь своими мыслями и идеями</p>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <form action="/publish.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Название поста</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Введите заголовок">
                            </div>
                            <div class="mb-4">
                                <label for="content" class="form-label fw-bold">Текст поста</label>
                                <textarea name="main_text" class="form-control" id="content" rows="6" placeholder="Напишите что-нибудь..."></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="post_photo" class="sr-only">Прикрепите картинку</label>
                                <input name="file" type="file" class="form-control mt-2" placeholder="фото профиля">
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary w-100 py-2">Опубликовать</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>



<?php 
    require_once("db.php");
    if (!isset($_COOKIE["User"])) {
        header("Location: /index.php");
        exit();
    }
    $link = mysqli_connect($servername, $username, $password, $db_name);
    if (isset($_POST["submit"])) {
        $title = $_POST["title"];
        $main_text = $_POST["main_text"];
        echo "post: " . $title . " - " . $main_text;
        if (!$title || !$main_text) {
            die("input all parametrs");
        }

        $filename = "";
        echo var_dump($_FILES["file"]);
        if(!empty($_FILES["file"])) {
            echo "file is here";
            if (
                ((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
                || (@$_FILES["file"]["type"] =="image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
                || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
                && (@$_FILES["file"]["size"] < 1002400)
            ) {
                $downloadPath = "/var/www/html/my_website/upload/";
                $filename = str_replace("/", "", $_FILES["file"]["tmp_name"]);
                echo "<br> !!! upload is ok - " . $filename . " - " . $downloadPath . $filename;
                move_uploaded_file($_FILES["file"]["tmp_name"], $downloadPath . $filename);
                
            } else {
                echo "upload failed!";
            }
        }
        $sql = "INSERT INTO posts (title, main_text, filename)
            VALUES ('$title', '$main_text', '$filename')";
        
        if (!mysqli_query($link, $sql)) {
            echo "Error insert". mysqli_error($link);
        } else {
            header("Location: /posts.php");
            exit();
        }
    }
    mysqli_close($link);
?>