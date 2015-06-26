<!DOCTYPE html>
<html lang="ru">

	<head>
		<?php include ('templates/cpv_2015.06/head.php'); ?>
		<title>Центр подготовки волонтёров - О нас</title>
	</head>

	<body class="page">

		<?php include ('templates/cpv_2015.06/header.php'); ?>

		<main role="main">
			<div id="intro-wrap" class="">
				<div id="intro" class="preload darken more-button">					
					<div class="map" data-maplat="43.024478" data-maplon="131.894241" data-mapzoom="14" data-color="aqua" data-height="300" data-img="img/marker.png" data-info="Мы находимся в кампусе ДВФУ, корпус А, аудитория А816"></div>							
				</div><!-- intro -->
			</div><!-- intro-wrap -->

			<div id="main">
				<section class="row section">
					<div class="row-content buffer even clear-after">
						<div class="section-title"><h3>Написать нам</h3></div>	
						<p>Если у вас возникли вопросы, напишите нам!.<br>Мы ответим на ваши вопросы.</p>
						<div class="column nine">
							<form id="contact-form" class="contact-section" method="post" action="">
								<span class="pre-input"><i class="icon icon-user"></i></span>
								<input class="name plain buffer" type="text" name="name" placeholder="ФИО">
								<span class="pre-input"><i class="icon icon-email"></i></span>
								<input class="email plain buffer" type="email" name="email" placeholder="Email">
								<textarea class="plain buffer" name="message" placeholder="Текст сообщения"></textarea>
								<input id="send" class="plain button red" type="button" value="Отправить">
							</form>	
							<div id="success"></div>
						</div>
						<div class="column three last">
							<div class="widget">
								<h4>Наш адрес</h4>
								<p>
									Владивосток, о. Русский<br>
									нп Аякс, кампус ДВФУ,<br>
									корпус А, этаж 8,<br>
									аудитория А816 (правое крыло)
								</p>
							</div>
							<div class="widget">
								<h4>Мы в сети</h4>
								<ul class="inline meta-social">
									<li><a href="#" class="twitter-share border-box"><i class="fa fa-twitter fa-lg"></i></a></li>
									<li><a href="#" class="facebook-share border-box"><i class="fa fa-facebook fa-lg"></i></a></li>
									<li><a href="#" class="pinterest-share border-box"><i class="fa fa-pinterest fa-lg"></i></a></li>
								</ul>
							</div>								
						</div>
					</div>
				</section>

			</div><!-- id-main -->
		</main><!-- main -->

		<?php include ('templates/cpv_2015.06/footer.php'); ?>
		
		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>		
		<script src="js/plugins.js"></script>
		<script src="js/beetle.js"></script>
		<script>
		$(document).ready(function(){
			$('#send').click(function(){
				$(this).val('Отправка ...');
				$('#success p').remove();
				$.post('contact/contact.php', $('#contact-form').serialize(), function(response) {
					$('#success').html(response);
					//$('#success').hide('slow');
					$('#send').val('Сообщение отправлено');
				});
				return false;
			});
		});
		</script>		

	</body>

</html>
