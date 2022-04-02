<?php
session_start();
require_once('repository/config.php');

$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    $password = md5($password);
    mysqli_query($connect, "INSERT INTO `users` (`id`, `email`, `login`, `password`) VALUES (NULL,  '$email', '$login', '$password')");
    $_SESSION['message'] = 'Реєстрація пройшла успішно!';
    header('Location: auth.php');
} else {
    $_SESSION['message'] = 'Паролі не співпадають';
    header('Location: register.php');
}
?>