<?php
session_start();

if($_SESSION['user']['email'] == "lazarovska065@gmail.com"){
    header('Location: admin.php');
}
if (!$_SESSION['user']) {
    header('Location: auth.php');
}
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>
</head>
<body>
<form>

    <h2 style="margin: 10px 0;">Привіт!<br><?= $_SESSION['user']['login'] ?></h2>
    <a href="#"><?= $_SESSION['user']['email'] ?></a><br>
    <a href="exit.php" class="logout">Вихід</a>
</form>
<?php include_once('includes/footer.php'); ?>
</body>
</html>