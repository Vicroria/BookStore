<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');

$name = $_POST['name'];
$author = $_POST['author'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_POST['image'];
$categoryid = $_POST['categoryid'];
mysqli_query($connect, "UPDATE `books` SET `name` = '{$_POST['name']}',`author` = '{$_POST['author']}' ,`description` = '{$_POST['description']}',`price` = '{$_POST['price']}',`image` = '{$_POST['image']}',`categoryid` = '{$_POST['categoryid']}' WHERE `id`={$_GET['id']}");
header('Location: ../admin.php');
