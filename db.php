<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$db_name = "first";

$common_link = mysqli_connect($servername, $username, $password);

if (!$common_link) {
    die("ошибка подключения" . mysqli_connect_error());
}
$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
if (!mysqli_query($common_link, $sql)) {
    echo "не удалось создать БД $db_name". mysqli_error($link);
}

mysqli_close($common_link);

$link = mysqli_connect($servername, $username, $password, $db_name);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(30) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
    echo "". mysqli_error($link);
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(30) NOT NULL,
    main_text VARCHAR(500) NOT NULL,
    filename VARCHAR(500) NULL
)";
if (!mysqli_query($link, $sql)) {
    echo "". mysqli_error($link);
}

mysqli_close($link);
?>
