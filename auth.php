<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>
<div class="container">

    <div class="account">
        <h2 class="account-in">Для того щоб увійти в свій аккаунт, будь ласка, введіть свої дані</h2>

        <form action="signin.php" method="POST">
            <div>
                <label>Логін</label><br>
                <input type="text" name="login"  placeholder="Введіть логін" >
            </div>

            <div>
                <label>Пароль</label><br>
                <input type="password" name="password"  placeholder="Введіть пароль">
            </div>
            <input type="submit" name="submit" value="Увійти" href="#"/>
    </div>
</div>
</form>
<?php include_once('includes/footer.php'); ?>
</body>
</html>