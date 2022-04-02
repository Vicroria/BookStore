<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>
<div class="container">
    <div class="content">
        <a href="add.php"><img class="add" src="images/add.png" /></a>
        <div class="content-top">
            <div class="content-top-in">

    <?php
    $books = mysqli_query($connect, "SELECT * FROM `books`");
    $books = mysqli_fetch_all($books);
    foreach ($books as $book) {
        ?>
        <div class="col-md-3 md-col">
            <div class="col-md">
                <a href="product.php?id=<?= $book[0]; ?> ?>"><img src="images/<?= $book[6]; ?>" /></a>
                <div class="top-content">
                    <h5><a href="book.php?id=<?php echo $book->id; ?>"><?= $book[1]?></a></h5>
                    <div class="white">
                        <p class="dollar"><span class="in-dollar"> <?= $book[5] ?>грн</span></p>
                        <a href="product.php?id=<?= $book[0] ?> " >Переглянути</a>
                        <a href="update.php?id=<?= $book[0] ?>" >Оновити</a>
                        <a style="color: red;" href="vendor/delete.php?id=<?= $book[0] ?>">Видалити</a>
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


