		<header role="banner">
			<div class="row">
				<div class="nav-inner row-content buffer-left buffer-right even clear-after">
					<div id="brand">
						<h1 class="reset"><a href="index"><img src="images/logo.png" alt="Домой"><!-- <a href="home.html">ЦПВ ДВФУ</a> --></h1>
					</div><!-- brand -->
					<a id="menu-toggle" href="#"><i class="fa fa-bars fa-lg"></i></a>
					<nav>
						<ul class="reset" role="navigation">
							<li class="menu-item"><a href="about">О нас</a></li>
							<li class="menu-item"><a href="faq">FAQ</a></li>
							<?php if (isset($_COOKIE['username'])){echo '<li class="menu-item"><a href="#">Личный кабинет</a></li>
							<li class="menu-item"><a href="logout">Выход</a></li>';} 
							else { 
							  echo "
							  <li class='menu-item'><a href='registration'>Регистрация</a></li>						
							  <li class='menu-item'><a href='login'>Войти</a></li>	
							  ";} ?>
							</li>
						</ul>
					</nav>
				</div><!-- row-content -->	
			</div><!-- row -->	
		</header>