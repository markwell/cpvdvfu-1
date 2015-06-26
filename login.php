<!DOCTYPE html>
<html lang="ru">
	<head>
		<?php include ('templates/cpv_2015.06/head.php'); ?>
		<title>Центр подготовки волонтёров - Вход</title>
	</head>

	<body class="registration">
		<?php include ('templates/cpv_2015.06/header.php'); ?>
		<main role="main">
			<div id="main">
				<form id="login" class="login" method="post" action="">
				<section class="row section call-to-action">
					<div class="row-content buffer even">
						<p>Войти в личный кабинет</p><br><br>
						<div id="success">
							<?php if (isset($_COOKIE['username'])){
							echo "Привет, <strong>".$_COOKIE['username']."</strong> | <a href='users/volunteers/logoutVolunteer.php'>Выход</a><br>"
							;}
							else{

							echo '
							<table>

 						    <form action="users/volunteers/loginVolunteer.php" method="POST">
						    <tr>
						    <td>Email:</td>
						    <td><input type="text" name="email" ></td>
							</tr>
	  
 						    <tr>
						    <td>Пароль:</td>
						    <td><input type="password" name="password" ></td>
						    </tr>
						    	
						    </table>
							<td colspan="2"><input class="plain button red" type="submit" value="Войти" name="submitlogin" ></td>
						    </form>
							<a href="registration">Регистрация</a>'
							;}
							?>
						</div>
					</div>
				</section>
				</form>	
			</div>					
		</main><!-- main -->

		<?php include ('templates/cpv_2015.06/footer.php'); ?>

		<script src="https://code.jquery.com/jquery.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/beetle.js"></script>

	</body>
</html>