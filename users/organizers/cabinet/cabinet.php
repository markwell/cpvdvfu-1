<!-- Вкладки -->
<ul class="nav nav-tabs" id="CabinetTab">
	<li class="active"><a href="#events" data-toggle="tab">Мероприятия</a></li>
	<li><a href="#profile" data-toggle="tab">Анкета</a></li>
	<li><a href="#apply" data-toggle="tab">Подать заявку</a></li>
	<li><a href="#messages" data-toggle="tab">Сообщения</a></li>
</ul>

<!-- Содержимое вкладок -->
<div class="tab-content">
	<div class="tab-pane active" id="events">Здесь будут выводиться ваши мероприятия. <-- ?php include ('events.php'); ? --></div>
	<div class="tab-pane" id="profile">Форма просмотра и изменения анкеты.  <?php include ('profile/profile.php'); ?></div>
	<div class="tab-pane" id="apply"><?php include ('apply.php'); ?></div>
	<div class="tab-pane" id="messages">Сообщения</div>
</div>