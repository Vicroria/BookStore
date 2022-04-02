<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>
<div class="container">
    <div class="content">
        <div class="content-top">
            <div class="content-top-in">
                <h3>Додати нову книгу</h3>
                <form action="vendor/create.php" method="post">
                    <p>Назва</p>
                    <input type="text" name="name">
                    <p>Автор</p>
                    <input type="text" name="author">
                    <p>Опис</p>
                    <textarea name="description"></textarea>
                    <p>Зображення</p>
                    <input type="text" name="image">
                    <p>Ціна</p>
                    <input type="number" name="price"> <br>
                    <p>Номер категорії(1-12)</p>
                    <input type="number" name="categoryid"> <br> <br>
                    <button type="submit">Додати нову книгу</button>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('includes/footer.php'); ?>
</body>
</html>

