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
			<h2 class="account-in">Для того щоб зареєструватись, будь ласка, введіть свої дані</h2>
            <?php if (!empty($orderid)) : ?>
                <h3>Ви успішно зареєструвались!</h3>
            <?php endif; ?>
<form action="singup.php" method="POST">
   <div>
        <label>Логін</label><br>
        <input type="text" name="login"  placeholder="Введіть логін" >
    </div>
    <div>
        <label>Пошта</label><br>
        <input type="text" name="email" placeholder="Введіть електронну адресу" >
    </div>
	<div>
        <label>Пароль</label><br>
        <input type="password" name="password"  placeholder="Введіть пароль">
    </div>
    <div>
        <label>Підтвердження паролю</label><br>
        <input type="password" name="password_confirm" placeholder="Підтвердіть пароль">
    </div>

    <input type="submit" name="submit" value="Реєстрація" href="#"/>
    <hr>
    <p>
        У вас вже є аккаунт? <input type="submit" name="submit2" value="Увійти" href="auth.php"/>
    </p>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
	</div>
	</div>
</form>
<?php include_once('includes/footer.php'); ?>
</body>
</html>