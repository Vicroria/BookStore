<?php
require_once('repository/config.php');
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$id = (isset($_GET['categoryid'])) ? (int)$_GET['categoryid'] : 0;
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>
		<div class="container">
			<div class="products">

                <h2 class=" products-in"></h2>
                <div class=" top-products">
                    <?php
                    $products = mysqli_query($connect, "SELECT * FROM books WHERE categoryid = '$id'" );
                    $products = mysqli_fetch_all($products);
                    foreach ($products as $product) {
                        ?>
                            <div class="col-md-3 md-col">
                                <div class="col-md">
                                    <a href="book.php?id=<?= $product[0]; ?>" class="compare-in"><img  src="images/<?= $product[6]; ?>" alt="" />
                                    </a>
                                    <div class="top-content">
                                        <h5><a href="book.php<?= $product[0]; ?>"><?= $product[1]; ?></a></h5>
                                        <div class="white">
                                            <button type="button" name="submit" id="increment">Додати в корзину</button>
                                            <p class="dollar"><span class="in-dollar"><?= $product[5]; ?> грн</span></p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                    }
                    ?>
                    <div class="clearfix"></div>
			    </div>
		</div>
        </div>
  <?php include_once('includes/footer.php'); ?>
</body>
</html>