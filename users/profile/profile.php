<?php
include_once("bd.php");

$resultat = mysql_query("SELECT * FROM users WHERE id='$_GET[id]'");
$array = mysql_fetch_array($resultat);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>������� <?php echo $login; ?></title>
</head>
<body>
<h4>������� <?php echo $array['login']; ?></h4>


<?php
if(isset($login) AND isset($password)){
	if($array['avatar'] == ''){
		$avatar = "noAvatar.jpg";
	}else{
		$avatar = $array['avatar'];
	}

	echo "<img src='avatars/".$avatar."'> <br><br>";
	echo "<strong>".$array['name_user']." ".$array['lastname']."</strong><br>";

	switch ($array['birthdate_month']){//���������� ����� ������ � ��������
		case "1" : $month = "������"; break;
		case "2" : $month = "�������"; break;
		case "3" : $month = "�����"; break;
		case "4" : $month = "������"; break;
		case "5" : $month = "���"; break;
		case "6" : $month = "����"; break;
		case "7" : $month = "����"; break;
		case "8" : $month = "�������"; break;
		case "9" : $month = "��������"; break;
		case "10" : $month = "�������"; break;
		case "11" : $month = "������"; break;
		case "12" : $month = "�������"; break;
	}

	echo "���� �����������: ".$array['reg_date']." <br>";
	echo "���: ".$array['sex']." <br>";
	echo "���� ��������: ".$array['birthdate_day']." ".$month." ".$array['birthdate_year']." <br>";
	echo "������: ".$array['country']." <br>";
	echo "�����: ".$array['city']." <br>";

	if($_GET['id'] == $id_user){//������������� ������� ����� ������ ������
		echo "<a href='edit.php'>������������� �������</a>";
	}
}else{
print <<<HERE
<table>
����:
<br>
<br>
 
      <form action="login.php" method="POST">
      <tr>
      <td>�����:</td>
      <td><input type="text" name="login" ></td>
      </tr>
	  
      <tr>
      <td>������:</td>
      <td><input type="password" name="password" ></td>
      </tr>
	  
	  <tr>
      <td colspan="2"><input type="submit" value="OK" name="submit" ></td>
      </tr>
      </form>
      </table>
<a href="registration.php">�����������</a><a href="password.php">�������������� ������</a>
HERE;
}

?>

</body>
</html>