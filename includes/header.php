<head>
<title>Дім книги</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Магазин книг" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Exo:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
		<script src="js/responsiveslides.min.js"></script>
			<script>
				$(function () {
				  $("#slider1").responsiveSlides({
					auto: true,
					speed: 500,
					namespace: "callbacks",
					pager: true,
				  });
				});
			</script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});
});
</script>
    <!--<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.message1').fadeOut('slow', function(c){
	  		$('.message1').remove();
		});
	});
});
    </script>
    -->
    <script>$(function() {
            $('#increment').on('click',function(){
                var current = $('#total').text();
                var new_val = parseInt(current) + 1;
                $('#total').text(new_val);
            });
        });
    </script>

</head>
<body>
  <!--header-->
	<div class="header">
		<div class="header-top">
			<div class="container">
			<div class="header-top-in">
				<div class="logo">
					<a href="index.php"><img src="images/logo1.jfif" alt="" ></a>
				</div>
				<div class="header-in">
					<ul class="icon1 sub-icon1">
                        <li ><a href="profile.php">МІЙ ПРОФІЛЬ</a></li>
                        <li><a href="exit.php" class="logout">ВИХІД</a></li>

                        <li>
                            <div class="cart">
                                <a href="#" class="cart-in"> </a>
                                <span  id="total">0</span>
                            </div>
                            <ul class="sub-icon1 list">
                                <h3>Нещодавні додані елементи</h3>
                                <div class="shopping_cart">
                                    <div class="cart_box">
                                        <div class="message">
                                            <div class="alert-close"> </div>
                                            <div class="list_img"><img src="images/" class="img-responsive" alt=""></div>
                                            <div class="list_desc"><h4><a href="#"></a></h4><span class="actual">
		                             </span></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="total">
                                    <div class="total_left">Сума: </div>
                                    <div class="total_right"></div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="login_buttons">
                                    <div class="check_button"><a href="order.php">Check out</a></div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="clearfix"></div>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="h_menu4">
				<a class="toggleMenu" href="#">Меню</a>
				<ul class="nav">
					<li ><a href="index.php"><i> </i>Головна</a></li>
					<li class="non-active"><a href="#">Художні книги</a>
						<ul class="drop">
							<li><a href="category.php?categoryid=1">Зарубіжня література</a></li>
							<li><a href="category.php?categoryid=2">Фентезі. Фантастика</a></li>
							<li><a href="category.php?categoryid=3">Любовні романи</a></li>
							<li><a href="category.php?categoryid=4">Детективи. Бойовики</a></li>
							<li><a href="category.php?categoryid=5">Мемуари. Біографії</a></li>
							<li><a href="category.php?categoryid=6">Українська література</a></li>
						</ul>
						</li>
						<li><a href="category.php?categoryid=7" >Дитяча література</a></li>
						<li><a href="category.php?categoryid=8" >Медицина</a></li>
						<li><a href="category.php?categoryid=9" >Дозвілля</a></li>
						<li><a href="category.php?categoryid=10" >Наука. Техніка</a></li>
						<li><a href="category.php?categoryid=11" >Культура. Філософія</a></li>

				</ul>
				<script type="text/javascript" src="js/nav.js"></script>
			</div>
		</div>
		</div>
		<div class="header-bottom-in">
		<div class="container">
		<div class="header-bottom-on">
			<p class="wel"><a href="register.php">Ласкаво просимо, ви можете увійти або створити акаунт</a></p>
			<div class="header-can">
					<div class="search">
						<form action="search.php" method="post">
							<input type="text" name="search" class="search" placeholder="Пошук..">
							<input type="submit" name="submit" value="">
						</form>
					</div>
					<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
		</div>
		</div>
	</div>