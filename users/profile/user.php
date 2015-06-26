<?php
include_once("bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Все пользователи</title>
</head>
<body>
<h4>Все пользователи</h4>


<?php
if(isset($login) AND isset($password)){
	$resultat = mysql_query("SELECT * FROM users");
	$array = mysql_fetch_array($resultat);
	
	do{
	if($array['avatar'] == ''){
		$avatar = "noAvatar.jpg";
	}else{
		$avatar = $array['avatar'];
	}
	printf("$array[login]<br><a href='profile.php?id=$array[id]'><img src='avatars/".$avatar."'></a><br><br>");

	}
	while($array = mysql_fetch_array($resultat));
	
}else{
print <<<HERE
<table>
Вход:
<br>
<br>
 
      <form action="login.php" method="POST">
      <tr>
      <td>Логин:</td>
      <td><input type="text" name="login" ></td>
      </tr>
	  
      <tr>
      <td>Пароль:</td>
      <td><input type="password" name="password" ></td>
      </tr>
	  
	  <tr>
      <td colspan="2"><input type="submit" value="OK" name="submit" ></td>
      </tr>
      </form>
      </table>
<a href="registration.php">Регистрация</a><a href="password.php">Восстановление пароля</a>
HERE;
}

?>

</body>
</html>