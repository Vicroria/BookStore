<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
$id = $_GET['id'];
$book = mysqli_query($connect, "SELECT * FROM `books` WHERE `id` = '$id'");
$book = mysqli_fetch_assoc($book);

?>
<!doctype html>
    <!doctype html>
    <?php include_once('includes/header.php'); ?>
    <div class="container">
        <div class="content">
            <div class="content-top">
                <div class="content-top-in">
                    <a href="#">
                        <img class="etalage_thumb_image img-responsive" src="images/<?= $book['image']; ?>" alt="2" >
                    </a>
                    <div class="col-md-7 single-top-in">
                        <div class="single-para">
                            <h4><?= $book['name']; ?></h4>
                            <h6><?= $book['author']; ?></h6>
                            <div class="para-grid">
                                <span  class="add-to"><?= $book['price']; ?> грн</span>
                                <a href="update.php?id=<?= $book['id'] ?>" class="hvr-shutter-in-vertical cart-to">Редагувати</a>
                                <div class="clearfix"></div>
                            </div>
                            <p><?= $book['description']; ?></p>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('includes/footer.php'); ?>
</body>
</html>
