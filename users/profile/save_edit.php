<?php 
include_once("bd.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>��������� ������ <?php echo $login; ?></title>
</head>
<body>
<?php

////////��������� �������

if (isset($_FILES['fupload']['name'])){ //������������ �� ����������

	if (empty($_FILES['fupload']['name']) AND $_FILES['fupload']['name'] == ''){
		
		$noAvatar = "noAvatar.jpg";//����������� ���� ������������ �� �������� ����
		$result = mysql_query("SELECT avatar FROM users WHERE id='$id_user'");//��������� ������� ������
		$avatarka = mysql_fetch_array($result);
		
		if ($avatarka['avatar'] != $noAvatar) {//���� ������ ��� �����������, �� �� ������� ���, ���� � �� ���� �������� �� ����.
			unlink ('avatars/'.$avatarka['avatar']);
		}	
		
	}

	else{
		//����� - ��������� ����������� ������������ ��� ����������
		$path_to_90_directory = 'avatars/';//�����, ���� ����� ����������� ��������� �������� � �� ������ �����
			
		if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name']))//�������� ������� ��������� �����������
			 {	
					
				$filename = $_FILES['fupload']['name'];
				$source = $_FILES['fupload']['tmp_name'];	
				$target = $path_to_90_directory . $filename;
				move_uploaded_file($source, $target);//�������� ��������� � ����� $path_to_90_directory

			if(preg_match('/[.](GIF)|(gif)$/', $filename)) {
			$im = imagecreatefromgif($path_to_90_directory.$filename) ; //���� �������� ��� � ������� gif
			}
			if(preg_match('/[.](PNG)|(png)$/', $filename)) {
			$im = imagecreatefrompng($path_to_90_directory.$filename) ;//���� �������� ��� � ������� png
			}
			
			if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
				$im = imagecreatefromjpeg($path_to_90_directory.$filename); //���� �������� ��� � ������� jpg
			}
			
		//�������� ����������� ����������� � ��� ����������� ������ ����� � ����� www.codenet.ru
		
		
		
		
		
		$w = 120;  // ������ �����������
		
		$quality = 100; //�������� ������������ ����������� max 100
				
		$w_src = imagesx($im); //��������� ������
		$h_src = imagesy($im); //��������� ������ �����������
		
		//��������� ���������� ����������� $rezim = 1
		//������� ����������� ��������������� ��������� $rezim = 2
		
		$rezim = 1;		
		
		switch ($rezim){
				//**************************** 1
			case "1" : 
				
				 // ������ ������ ���������� �������� 
				 // ����� ������ truecolor!, ����� ����� ����� 8-������ ��������� 
				 $dest = imagecreatetruecolor($w,$w); 

				 // �������� ���������� ��������� �� x, ���� ���� �������������� 
				 
				if ($w_src > $h_src){ 
					imagecopyresampled($dest, $im, 0, 0, round((max($w_src,$h_src)-min($w_src,$h_src))/2), 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src));
				}
				 // �������� ���������� �������� �� y, 
				if ($w_src < $h_src){
					imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, min($w_src,$h_src), min($w_src,$h_src)); 
				}
				 // ���������� �������� �������������� ��� ������� 
				
				if ($w_src == $h_src){
					imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $h_src); 
				}

			break;
					//***************************** 2
			case "2" : 
				$prop = $w_src/$h_src;
				$h = $w/$prop;
				$dest = imagecreatetruecolor($w,$h); 
				imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $h, $w_src, $h_src); 
			break;
			
		}
		
		
		

				
		$random = rand(1000000, 9999999);
		imagejpeg($dest, $path_to_90_directory.$random.".jpg", $quality);//��������� ����������� ������� jpg � ������ �����
		
		$avatar = $random.".jpg";//������� � ���������� ���� �� �������.

		$delfull = $path_to_90_directory.$filename; 
		unlink ($delfull);//������� �������� ������������ �����������, �� ��� ������ �� �����.

		$result = mysql_query("SELECT avatar FROM users WHERE id='$id_user'");//��������� ������� ������ ������������
		$avatarka = mysql_fetch_array($result);
		
		if ($avatarka['avatar'] != $noAvatar) {//���� ������ ��� �����������, �� �� ������� ���, ���� � �� ���� �������� �� ����.
			unlink ('avatars/'.$avatarka['avatar']);
		}
		}
		else{
			//� ������ �������������� �������, ������ ��������������� ���������
			exit ("������ ������ ���� � ������� <strong>JPG,GIF ��� PNG</strong>");
		}
		
	}
	

	$up = mysql_query("UPDATE users SET avatar='$avatar' WHERE id='$id_user'");//��������� ������ � ����
	if ($up == true) {//���� �����, �� ���������� �� ������ ���������
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}

}

////////��������� �����

else if (isset($_POST['name'])){//���� ���������� ���
	$name = $_POST['name'];
	$name = stripslashes($name);
	$name = htmlspecialchars($name);
	$name = trim($name);//������� ��� ������
	
	if ($name == '') {
		exit("�� �� ����� ���<br><a href='edit.php'>��������� �����</a>");
	}

	$up = mysql_query("UPDATE users SET name_user='$name' WHERE id='$id_user'");//��������� ���
	if ($up == true) {
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}
}

////////��������� �������

else if (isset($_POST['lastname'])){//���� ���������� �������
	$lastname = $_POST['lastname'];
	$lastname = stripslashes($lastname);
	$lastname = htmlspecialchars($lastname);
	$lastname = trim($lastname);//������� ��� ������
	
	if ($lastname == '') {
		exit("�� �� ����� �������<br><a href='edit.php'>��������� �����</a>");
	}

	$up = mysql_query("UPDATE users SET lastname='$lastname' WHERE id='$id_user'");//��������� �������
	if ($up=='TRUE') {//���� �����, �� ��������� ��� � ������
		$_SESSION['lastname'] = $lastname;
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}
}

////////��������� ������

else if (isset($_POST['country'])){//���� ���������� �������
	$country = $_POST['country'];
	$country = stripslashes($country);
	$country = htmlspecialchars($country);
	$country = trim($country);//������� ��� ������
	
	if ($country == '') {
		exit("�� �� ����� ������<br><a href='edit.php'>��������� �����</a>");
	}

	$up = mysql_query("UPDATE users SET country='$country' WHERE id='$id_user'");//��������� ������
	if ($up == true) {
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}
}

////////��������� ������

else if (isset($_POST['city'])){//���� ���������� �������
	$city = $_POST['city'];
	$city = stripslashes($city);
	$city = htmlspecialchars($city);
	$city = trim($city);//������� ��� ������
	
	if ($city == '') {
		exit("�� �� ����� �����<br><a href='edit.php'>��������� �����</a>");
	}

	$up = mysql_query("UPDATE users SET city='$city' WHERE id='$id_user'");//��������� �����
	if ($up == true) {//���� �����, �� ��������� ��� � ������
		$_SESSION['city'] = $city;
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}
}

////////��������� �����, ������ � ����

else if (isset($_POST['birthdate_day']) AND isset($_POST['birthdate_month']) AND isset($_POST['birthdate_year'])){//���� ���������� ���� ��������
	$birthdate_day = $_POST['birthdate_day'];
	$birthdate_day = stripslashes($birthdate_day);
	$birthdate_day = htmlspecialchars($birthdate_day);
	$birthdate_day = trim($birthdate_day);//������� ��� ������
	
	if ($birthdate_day == '' OR $birthdate_day > 31) {
		exit("�� �� ����� ���� ��������<br><a href='edit.php'>��������� �����</a>");
	}
	
	$birthdate_month = $_POST['birthdate_month'];
	$birthdate_month = stripslashes($birthdate_month);
	$birthdate_month = htmlspecialchars($birthdate_month);
	$birthdate_month = trim($birthdate_month);//������� ��� ������
	
	if ($birthdate_month == '' OR $birthdate_month > 12) {
		exit("�� �� ����� ����� ��������<br><a href='edit.php'>��������� �����</a>");
	}
	
	$birthdate_year = $_POST['birthdate_year'];
	$birthdate_year = stripslashes($birthdate_year);
	$birthdate_year = htmlspecialchars($birthdate_year);
	$birthdate_year = trim($birthdate_year);//������� ��� ������
	
	if ($birthdate_year == '' OR $birthdate_year < 1940 OR $birthdate_year > 2005) {
		exit("�� �� ����� ��� ��������<br><a href='edit.php'>��������� �����</a>");
	}

	$up = mysql_query("UPDATE users SET birthdate_day='$birthdate_day',birthdate_month='$birthdate_month',birthdate_year='$birthdate_year' WHERE id='$id_user'");//��������� ����
	if ($up == true) {
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}
}



////////��������� ����

else if (isset($_POST['sex'])){//���� ���������� �������
	$sex = $_POST['sex'];
	$sex = stripslashes($sex);
	$sex = htmlspecialchars($sex);
	$sex = trim($sex);//������� ��� ������
	
	if ($sex == '') {
		exit("�� �� ����� ���<br><a href='edit.php'>��������� �����</a>");
	}

	$up = mysql_query("UPDATE users SET sex='$sex' WHERE id='$id_user'");//��������� ���
	if ($up == true) {
		echo "<meta http-equiv='Refresh' content='0; URL=profile.php?id=".$id_user."'>";
	}
}
?>
</body>
</html>