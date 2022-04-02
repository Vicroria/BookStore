<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
if(isset($_POST['submit'])){
    $search = $_POST['search'];
    $query = mysqli_query($connect, "SELECT * FROM books WHERE name LIKE '%$search%'");
}
?>
    <?php include_once('includes/header.php'); ?>
<?php
$books = mysqli_query($connect, "SELECT * FROM books");
while ($book = mysqli_fetch_assoc($query)){?>
<div class="container">
    <div class="content">
        <div class="content-top">
            <div class="content-top-in">
                <div class="col-md-3 md-col">
                    <div class="col-md">
                        <a href="book.php?id=<?= $book['id']; ?> ?>"><img src="images/<?= $book['image']; ?>" /></a>
                        <div class="top-content">
                            <h5><a href="book.php?id=<?php echo $book->id; ?>"><?= $book['name']?></a></h5>
                            <div class="white">
                                <button type="button" id="increment">Додати в корзину</button>
                                <p class="dollar"><span class="in-dollar"> <?= $book['price'] ?>грн</span></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
<?php
}
?>
<?php include_once('includes/footer.php'); ?>
</body>
</html>