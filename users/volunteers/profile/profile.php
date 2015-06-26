<!-- Использование -->
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
$('#myTab a[href="#profile"]').tab('show') // Select tab by name
$('#myTab a:first').tab('show') // Select first tab
$('#myTab a:last').tab('show') // Select last tab
$('#myTab li:eq(2) a').tab('show') // Select third tab (0-indexed)



<!-- Разметка -->
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Главная</a></li>
  <li><a href="#profile" data-toggle="tab">Профиль</a></li>
  <li><a href="#messages" data-toggle="tab">Сообщения</a></li>
  <li><a href="#settings" data-toggle="tab">Настройки</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home">...</div>
  <div class="tab-pane" id="profile">...</div>
  <div class="tab-pane" id="messages">...</div>
  <div class="tab-pane" id="settings">...</div>
</div>

<!-- Эффект угасания -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="home">...</div>
  <div class="tab-pane fade" id="profile">...</div>
  <div class="tab-pane fade" id="messages">...</div>
  <div class="tab-pane fade" id="settings">...</div>
</div>


<!-- Методы $().tab -->
<ul class="nav nav-tabs" id="myTab">
  <li class="active"><a href="#home" data-toggle="tab">Главная</a></li>
  <li><a href="#profile" data-toggle="tab">Профиль</a></li>
  <li><a href="#messages" data-toggle="tab">Сообщения</a></li>
  <li><a href="#settings" data-toggle="tab">Настройки</a></li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="home">...</div>
  <div class="tab-pane" id="profile">...</div>
  <div class="tab-pane" id="messages">...</div>
  <div class="tab-pane" id="settings">...</div>
</div>

<script>
  $(function () {
    $('#myTab a:last').tab('show')
  })
</script>