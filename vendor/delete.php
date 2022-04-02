<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
$id = $_GET['id'];
mysqli_query($connect, "DELETE FROM `books` WHERE `books`.`id` = '$id'");
header('Location: ../admin.php');
