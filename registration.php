<?php
include_once("system/bd.php");
?>
<!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include ('templates/cpv_2015.06/head.php'); ?>
		<title>Центр подготовки волонтёров - Регистрация</title>
	</head>

	<body class="registration">
		<?php include ('templates/cpv_2015.06/header.php'); ?>
		<main role="main">
			<div id="main">
				<form id="group" class="group-select" method="post" action="">
				<section class="row section call-to-action">
					<div class="row-content buffer even">
						<p>Кем будете?</p><br><br>
						<input id="volunteer" class="plain button red" type="button" value="Волонтёром">
						<input id="organizer" class="plain button red" type="button" value="Организатором">
						<br><br>
					<div id="success"></div>
					</div>
				</section>
				</form>	
			</div>					
		</main><!-- main -->

		<?php include ('templates/cpv_2015.06/footer.php'); ?>

		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/beetle.js"></script>
		<script>
			$(document).ready(function(){
				$('#volunteer').click(function(){
					$(this).hide('slow');
					$('#organizer').show('slow');
					$.post('users/volunteers/registration/registration.php', function(vol) {
					$('#success').html(vol); 
					});
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$('#organizer').click(function(){
					$(this).hide('slow');
					$('#volunteer').show('slow');
					$.post('users/organizers/registration/registration.php', function(org) {
					$('#success').html(org); 
					});
				});
			});
		</script>
	</body>
</html>
