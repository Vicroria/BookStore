<?php
require_once('repository/config.php');
$connect = mysqli_connect('localhost', 'root', 'root', 'store');

$fisrtname = $lastname = $email = $phone = '';
$orderid = 0;

$id = $_GET['id'];

$book_id = (isset($_GET['book_id'])) ? (int)$_GET['book_id'] : 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['fisrtname']))  {
        $fisrtname = $_POST['fisrtname'];
    }
    if (isset($_POST['lastname']))  {
        $lastname=$_POST['lastname'];
    }
    if (isset($_POST['email']))  {
        $email=$_POST['email'];
    }
    if (isset($_POST['phone']))  {
        $phone=$_POST['phone'];
    }
    if (isset($_POST['option']))  {
        $option=$_POST['option'];
    }
    if (isset($_POST['city']))  {
        $city=$_POST['city'];
    }
    if (isset($_POST['address']))  {
        $address=$_POST['address'];
    }
    if (isset($_POST['post']))  {
        $post=$_POST['post'];
    }
    if (isset($_POST['submit'])) {
        $order = [
                'fisrtname' => $fisrtname,
                'lastname' => $lastname,
                'email' => $email,
                'phone' => $phone,
                'option' => $option,
                'city' => $city,
                'address' => $address,
                'post' => $post,
                'book_id' => $book_id,
        ];
        $orderid = mysqli_query($connect, "INSERT INTO bookstore (fisrtname, lastname, email, phone, delivery, city, address , post, book_id) VALUES ('$fisrtname', '$lastname', '$email' , '$phone', '$option', '$city','$address', '$post', '$book_id')" );
        echo '<script>alert("Ваше замовлення прийняте");</script>';
    }
}
?>
<!DOCTYPE html>
<html>
    <?php include_once('includes/header.php'); ?>
	<div class="container">
		<div class="account">
			<h2 class="account-in">Для замовлення введіть, будь ласка, свої дані</h2>
<form action="ordercheck.php" method="POST">
   <div>
        <label>Ім'я</label><br>
        <input type="text" name="fisrtname" >
    </div>
    <div>
        <label>Прізвище</label><br>
        <input type="text" name="lastname" >
    </div>
    <div>
        <label>Пошта</label><br>
        <input type="text" name="email" >
    </div>
	<div>
        <label>Номер телефону</label><br>
        <input type="text" name="phone" >
    </div>
    <div>
        <label>Населений пункт</label><br>
        <input type="text" name="city" >
    </div>
    <div>
        <label>Адреса проживання</label><br>
        <input type="text" name="address" >
    </div>
    <p><b>Вкажіть спосіб доставки</b></p>
    <p><input type="radio" name="option" value="Наложений платіж" >Наложений платіж<Br>
        <input type="radio" name="option" value="Передплата">Передплата<Br>
        <input type="radio" name="option" value="Доставка кур'єром">Доставка кур'єром<Br>
    </p><br>
    <p><b>Вкажіть пошту</b></p>
    <p><input type="radio" name="post" value="Укрпошта" >Укрпошта<Br>
        <input type="radio" name="post" value="Нова пошта">Нова пошта<Br>
    </p><br>
    <script src="https://pay.fondy.eu/static_common/v1/checkout/ipsp.js"></script>

    <script>
        function checkoutInit(url) {
            $ipsp('checkout').scope(function() {
                this.setCheckoutWrapper('#checkout_wrapper');
                this.addCallback(__DEFAULTCALLBACK__);
                this.action('show', function(data) {
                    $('#checkout_loader').remove();
                    $('#checkout').show();
                });
                this.action('hide', function(data) {
                    $('#checkout').hide();
                });
                this.action('resize', function(data) {
                    $('#checkout_wrapper').width(480).height(data.height);
                });
                this.loadUrl(url);
            });
        };
        <?php
        $products = mysqli_query($connect, "SELECT * FROM books where id = '$id' ");
        $products = mysqli_fetch_all($products);
        foreach ($products as $product) {
        ?>
        var button = $ipsp.get("button");
        button.setMerchantId(1396424);
        button.setAmount(<?=$product[5]?>, 'UAH', true);
        button.setHost('pay.fondy.eu');
        checkoutInit(button.getUrl());
        <?php
        }
        ?>
    </script>

    <div id="checkout">
        <div id="checkout_wrapper"></div>
    </div>
    <input type="submit" name="submit" value="Замовити" />
	</div>
	</div>
</form>
<?php include_once('includes/footer.php'); ?>
</body>
</html>