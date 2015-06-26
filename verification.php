<?php
    include_once("bd.php");
	
    if (isset($_POST['submitvolunteer'])){
		if(empty($_POST['lastname']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите фамилию!"> Введите фамилию! </font>';
		} 
/* 		elseif (!preg_match("/^\w{3,}$/", $_POST['login'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="В поле "Логин" введены недопустимые символы!"> В поле "Логин" введены недопустимые символы! Только буквы, цифры и подчеркивание!</font>';
		} */
		if(empty($_POST['firstname']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите имя!"> Введите имя! </font>';
		} 
		if(empty($_POST['middlename']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите отчество!"> Введите отчество! </font>';
		} 
		elseif(empty($_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите E-mail!">Введите E-mail! </font>';
		}
		elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="E-mail имеет недопустимий формат!"> E-mail имеет недопустимий формат! Например, name@gmail.com! </font>';
		}
		if(empty($_POST['phone']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите номер телефона!"> Введите номер телефона! </font>';
		} 
		if(empty($_POST['place']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите адрес проживания!"> Введите адрес проживания! </font>';
		} 
		if(empty($_POST['study']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите учебное заведение!"> Введите учебное заведение! </font>';
		} 
		if(empty($_POST['size']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите размер одежды!"> Введите размер одежды! </font>';
		} 
		if(empty($_POST['growth']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите свой рост!"> Введите свой рост! </font>';
		} 
		elseif(empty($_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите пароль !"> Введите пароль!</font>';
		}
		elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Пароль слишком короткий!"> Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
		}
		elseif(empty($_POST['password2'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите подтверждение пароля!"> Введите подтверждение пароля!</font>';
		}
		elseif($_POST['password'] != $_POST['password2']) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font>';
		} 
		else{
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$place = $_POST['place'];
			$study = $_POST['study'];
			$social = $_POST['social'];
			$size = $_POST['size'];
			$growth = $_POST['growth'];
			$langs = $_POST['langs'];
			$password = $_POST['password'];
			$mdPassword = md5($password);
			$password2 = $_POST['password2'];
			$datetimereg = date("d-m-Y в H:i");
			  
			$query = ("SELECT volunteerid FROM volunteers WHERE email='$email'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
				echo '<font color="red"><img border="0" src="error.gif" align="middle" alt="Email уже зарегистрирован!"> Email уже зарегистрирован!</font>';
			}
			else {
				$query2 = ("SELECT volunteerid FROM volunteers WHERE phone='$phone''");
				$sql = mysql_query($query2) or die(mysql_error());
				if (mysql_num_rows($sql) > 0){
					echo '<font color="red"><img border="0" src="error.gif"  alt="Данный номер уже зарегистрирован!"> Данный номер уже зарегистрирован!</font>';
				}
				else{
					$query = "INSERT INTO volunteers (lastname, firstname, middlename, dob, gender, email, phone, place, study, social, size, growth, langs, password, datetimereg)
							  VALUES ('$lastname', '$firstname', '$middlename', '$dob', '$gender', '$email', '$phone', '$place, '$study', '$social', '$size', '$growth', '$langs', '$mdPassword', '$datetimereg'  )";
					$result = mysql_query($query) or die(mysql_error());;
					echo '<font color="green"><img border="0" src="ok.gif" align="middle" alt="Вы успешно зарегистрировались!"> Вы успешно зарегистрировались!</font><br><a href="index.php">На главную</a>';
					
								
				}
			}
		}
    }
	
	if (isset($_POST['submitorganizer'])){
		if(empty($_POST['lastname']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите фамилию!"> Введите фамилию! </font>';
		} 
		if(empty($_POST['firstname']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите имя!"> Введите имя! </font>';
		} 
		if(empty($_POST['middlename']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите отчество!"> Введите отчество! </font>';
		} 
		elseif(empty($_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите E-mail!">Введите E-mail! </font>';
		}
		elseif (!preg_match("/^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9\-]+\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="E-mail имеет недопустимий формат!"> E-mail имеет недопустимий формат! Например, name@gmail.com! </font>';
		}
		if(empty($_POST['phone']))  {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите номер телефона!"> Введите номер телефона! </font>';
		} 
		elseif(empty($_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите пароль !"> Введите пароль!</font>';
		}
		elseif (!preg_match("/\A(\w){6,20}\Z/", $_POST['password'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Пароль слишком короткий!"> Пароль слишком короткий! Пароль должен быть не менее 6 символов! </font>';
		}
		elseif(empty($_POST['password2'])) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введите подтверждение пароля!"> Введите подтверждение пароля!</font>';
		}
		elseif($_POST['password'] != $_POST['password2']) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font>';
		} 
		else{
			$companyname = $_POST['companyname'];
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$middlename = $_POST['middlename'];
			$dob = $_POST['dob'];
			$gender = $_POST['gender'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$social = $_POST['social'];
			$password = $_POST['password'];
			$mdPassword = md5($password);
			$password2 = $_POST['password2'];
			$datetimereg = date("d-m-Y в H:i"); 
			  
			$query = ("SELECT organizerid FROM organizers WHERE email='$email'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
				echo '<font color="red"><img border="0" src="error.gif" align="middle" alt="Email уже зарегистрирован!"> Email уже зарегистрирован!</font>';
			}
			else {
				$query2 = ("SELECT organizerid FROM organizers WHERE phone='$phone'");
				$sql = mysql_query($query2) or die(mysql_error());
				if (mysql_num_rows($sql) > 0){
					echo '<font color="red"><img border="0" src="error.gif"  alt="Данный номер уже зарегистрирован!"> Данный номер уже зарегистрирован!</font>';
				}
				else{
					$query = "INSERT INTO organizers (companyname, lastname, firstname, middlename, dob, gender, email, phone, social, password, datetimereg)
							  VALUES ('$companyname', '$lastname', '$firstname', '$middlename', '$dob', '$gender', '$email', '$phone', '$social', '$mdPassword', '$datetimereg'  )";
					$result = mysql_query($query) or die(mysql_error());;
					echo '<font color="green"><img border="0" src="ok.gif" align="middle" alt="Вы успешно зарегистрировались!"> Вы успешно зарегистрировались!</font><br><a href="index.php">На главную</a>';
					
								
				}
			}
		}
    }
?>