<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
$name = $_POST['name'];
$author = $_POST['author'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_POST['image'];
$categoryid = $_POST['categoryid'];
mysqli_query($connect,"INSERT INTO `books` (`name`, `price`, `description`, `author`, `categoryid`, `image`) VALUES ('$name', '$price', '$description', '$author', '$categoryid', '$image')");
header('Location: ../admin.php');
