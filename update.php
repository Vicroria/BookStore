<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
$id = $_GET['id'];
$book = mysqli_query($connect, "SELECT * FROM `books` WHERE `id` = '$id'");
$book = mysqli_fetch_assoc($book);
?>
<!doctype html>
<?php include_once('includes/header.php'); ?>
<div class="container">
    <div class="content">
        <div class="content-top">
            <div class="content-top-in">
<h3>Оновити книгу</h3>
<form action="vendor/update.php" method="post">
    <input type="hidden" name="id" value="<?= $book['id'] ?>">
    <p>Назва</p>
    <input type="text" name="name" value="<?= $book['name'] ?>">
    <p>Автор</p>
    <input type="text" name="author" value="<?= $book['author'] ?>">
    <p>Опис</p>
    <textarea name="description"><?= $book['description'] ?></textarea>
    <p>Зображення</p>
    <input type="text" name="image" value="<?= $book['image'] ?>">
    <p>Ціна</p>
    <input type="number" name="price" value="<?= $book['price'] ?>"> <br>
    <p>Номер категорії(1-12)</p>
    <input type="number" name="categoryid" value="<?= $book['categoryid'] ?>"> <br> <br>
    <button type="submit">Update</button>
</form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php'); ?>
</body>
</html>
