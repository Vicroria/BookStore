<?php
require_once('repository/config.php');
require_once 'order.php';
?>
<?php include_once('includes/header.php'); ?>
	<div class="container">
		<div class="account">
			<h2 class="account-in">Дякуємо Вам за покупку</h2>
		</div>
	</div>
			<script type="text/javascript">
						$(document).ready(function() {
							/*
							var defaults = {
					  			containerID: 'toTop', // fading element id
								containerHoverID: 'toTopHover', // fading element hover id
								scrollSpeed: 1200,
								easingType: 'linear' 
					 		};
							*/
							
							$().UItoTop({ easingType: 'easeOutQuart' });
						});
					</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		</div>
</body>
</html>