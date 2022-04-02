<?php
session_start ();
require_once('repository/config.php');
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>
	<div class="banner-mat">
		<div class="container">
			<div class="banner">

				<!-- Slideshow 4 -->
			   <div class="slider">
			<ul class="rslides" id="slider1">
			  <li><img src="images/img1.png" alt="">
			  </li>
			  <li><img src="images/img2.png" alt="">
			  </li>
			  <li><img src="images/img3.png" alt="">
			  </li>
			  <li><img src="images/img4.png" alt="">
			  </li>
			</ul>
		</div>
			</div>
		</div>
	</div>
		<div class="container">
			<div class="content">
				<div class="content-top">
					<div class="content-top-in">
                        <?php
                        $products = mysqli_query($connect, "SELECT * FROM books WHERE featured = 1" );
                        $products = mysqli_fetch_all($products);
                        foreach ($products as $product) {
                        ?>
                            <div class="col-md-3 md-col">
                                <div class="col-md">
                                    <a href="book.php?id=<?= $product[0]; ?> ?>"><img src="images/<?= $product[6]; ?>" /></a>
                                    <div class="top-content">
                                        <h5><a href="book.php?id=<?php echo $product->id; ?>"><?= $product[1]?></a></h5>
                                        <div class="white">
                                            <button type="button" name="submit" id="increment"> Додати в корзину</button>
                                            <p class="dollar"><span class="in-dollar"> <?= $product[5] ?>грн</span></p>
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
        </div>
  <?php include_once('includes/footer.php'); ?>
</body>
</html>