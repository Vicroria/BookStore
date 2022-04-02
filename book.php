<?php
require_once('repository/config.php');
$connect = mysqli_connect('localhost', 'root', 'root', 'store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;

$query = "SELECT * FROM books where id = '$id'";
if ($result = mysqli_query($connect, $query)) {
while ($row = mysqli_fetch_array($result)) {
?>
<!DOCTYPE html>
<html>
<?php include_once('includes/header.php'); ?>

<div class="container">
    <div class="content">
        <div class="content-top">
            <div class="content-top-in">
                <a href="#">
                    <img class="etalage_thumb_image img-responsive" src="images/<?= $row[6]; ?>" alt="2" >
                </a>
                <div class="col-md-7 single-top-in">
                    <div class="single-para">
                        <h4><?= $row[1]; ?></h4>
                        <h6><?= $row[2]; ?></h6>
                            <div class="para-grid">
                                <span  class="add-to"><?= $row[5]; ?> грн</span>
                                <a href="order.php?id=<?=$row[0];?>" class="hvr-shutter-in-vertical cart-to">Купити</a>
                            <div class="clearfix"></div>
                            </div>
                        <p><?= $row[3]; ?></p>
                     </div>
                </div>
                <?php
                }
                mysqli_free_result($result);
                }
                mysqli_close($connect);
                ?>
            <div class="clearfix"> </div>
                <div class="clearfix"></div>
                    </div>
            </div>
    </div>
</div>
    <?php include_once('includes/footer.php'); ?>
</body>
</html>