					<!-- Nav tabs -->
					<ul class="nav nav-tabs" id="CabinetTab">
						<li class="active"><a href="#events" data-toggle="tab">Мероприятия</a></li>
						<li><a href="#users" data-toggle="tab">Все пользователи</a></li>
						<li><a href="#profile" data-toggle="tab">Анкета</a></li>
						<li><a href="#messages" data-toggle="tab">Сообщения</a></li>
						<li><a href="#settings" data-toggle="tab">Настройки</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="events">Здесь будут выводиться мероприятия, в которых вы участвовали. А также те, на которые вы подавали заявки.</div>
						<div class="tab-pane" id="profile">Форма просмотра и изменения анкеты <?php include ('users/administrator/cabinet/profile/profile.php'); ?></div>
						<div class="tab-pane" id="users">Все пользователи <?php include("users.php"); ?></div>
						<div class="tab-pane" id="messages">Сообщения</div>
						<div class="tab-pane" id="settings">Настройки</div>
					</div>	