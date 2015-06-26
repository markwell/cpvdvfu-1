<!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include ('templates/cpv_2015.06/head.php'); ?>
		<title>Центр подготовки волонтёров - Личный кабинет</title>
	</head>

	<body class="cabinet">
		<?php include ('templates/cpv_2015.06/header.php'); ?>
		<main role="main">
			<div id="main">
				<section class="row section">
					<div class="row-content buffer even clear-after">
					<p>Личный кабинет</p>
					<!-- ?php include ('users/administrator/cabinet/cabinet.php'); ?> -->
					<!-- ?php include ('users/coordinators/cabinet/cabinet.php'); ?> -->
					<?php include ('users/organizers/cabinet/cabinet.php'); ?>
					<!-- ?php include ('users/volunteers/cabinet/cabinet.php'); ?> -->
					</div>
				</section>
			</div><!-- id-main -->
		</main><!-- main -->

		<?php include ('templates/cpv_2015.06/footer.php'); ?>

		<script src="https://code.jquery.com/jquery.js"></script>	
		<script src="js/plugins.js"></script>
		<script src="js/beetle.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/npm.js"></script>
		<script>
			$('#CabinetTab a').click(function (e) {
			e.preventDefault()
			$(this).tab('show')
			})
		</script>
 		<script>
			$(document).ready(function(){
				$('#upload').click(function(){
					$(this).val('Отправка ...');
					$('#success p').remove();
					$.post('events/upload.php', function(response) {
						$('#success').html(response);
						//$('#success').hide('slow');
						$('#upload').val('Заявка отправлена');
					});
					return false;
				});
			});
		</script>
	</body>
</html>