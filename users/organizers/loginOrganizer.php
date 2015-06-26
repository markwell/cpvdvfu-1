<?php

	include_once $_SERVER['DOCUMENT_ROOT']."/cpvdvfu/system/bd.php";
	function checkAndAuthUser($login, $password)
	{

		function generateCode($length = 6)
		{
		    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIFJKLMNOPRQSTUVWXYZ0123456789";
		    $code  = "";
		    $clen  = strlen($chars) - 1;
		    while (strlen($code) < $length) {
		        $code .= $chars[mt_rand(0, $clen)];
		    }
		    return $code;
		}
	    $error = "";
	    # Вытаскиваем из БД запись, у которой логин равняеться введенному
	    $password = md5($password);//шифруем пароль

	    $volunteer = mysql_query("SELECT OrganizerID, Password FROM Organizers WHERE Email='$login'");
	    $data = mysql_fetch_array($volunteer);

	    $ID = $data['OrganizerID'];
	    
	    # Сравниваем пароли
	    if ($data['Password'] === $password) {

	        # Генерируем случайное число и шифруем его
	        $hash  = md5(generateCode(10));
	        # Записываем в БД новый хеш авторизации 
	        $query = "UPDATE Organizers SET Hash='$hash' WHERE OrganizerID='$ID'";
           	$result = mysql_query($query);

	        # Ставим куки
	        setcookie("id", $ID, time() + 60 * 60 * 24 * 30);
	        setcookie("hash", $hash, time() + 60 * 60 * 24 * 30);
	        setcookie("username", $login, time() + 60 * 60 * 24 * 30);
	        return null;
	    } else {
	        
	        $error = "Неправильные имя пользователя или пароль. Пожалуйста, попробуйте еще раз.";
	        return $error;
	    }
	}
	
	function authUser()
	{
	    if (isset($_POST['submitlogin'])) {
	    	
	        $error = checkAndAuthUser(mb_strtolower(trim($_POST['email'])), $_POST['password']);
	        if (is_null($error)) {
	            header('Location:/cpvdvfu/users/checkUserOrganizer.php'); //ссылка на страницу проверки пользователя
	        } else {
				echo $error;
	        }
	    }
	}
	
    authUser();
?>
