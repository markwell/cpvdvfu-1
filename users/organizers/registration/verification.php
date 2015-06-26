<?php
    
    include_once $_SERVER['DOCUMENT_ROOT']."/cpvdvfu/system/bd.php";
    function AddUser($OrganizerName,$LastName,$FirstName,$MiddleName,$DoB,$Gender,$Email,$MobilePhone,$Social,$Password,$Password2,$DateTimeReg)
    {
        $err = array();
        if (strlen($Password) < 3 or strlen($Password) > 30) {
            $err[] = "Пароль должен быть не меньше трех и не больше тридцати символов!";
        }
        # проверяем, не сущестует ли пользователя с таким именем
        $query = ("SELECT OrganizerID FROM Organizers WHERE Email='$Email'");
        			$sql = mysql_query($query);
        			if (mysql_num_rows($sql) > 0) {
        				$err[] = "Пользователь с таким email уже существует!";
               			}
        
        $mdPassword = md5($Password);
        $repeat   = md5($Password2);
        if ($mdPassword != $repeat) {
            $err[] = "Пароли не совпадают! Попробуйте еще раз!";
        }
        # Если нет ошибок, то добавляем в БД нового пользователя
        if (count($err) == 0) {
           $query = "INSERT INTO Organizers (OrganizerName, LastName, FirstName, MiddleName, DoB, Gender, Email, MobilePhone, Social, Password, DateTimeReg)
           		  VALUES ('$OrganizerName', '$LastName', '$FirstName', '$MiddleName', '$DoB', '$Gender', '$Email', '$MobilePhone', '$Social', '$mdPassword', '$DateTimeReg')";
           $result = mysql_query($query);
           return null;
        }
        return $err;
    }
    function action_newUser()
    { 
        if (isset($_POST['submitorganizer'])) {
            $error = AddUser($_POST['OrganizerName'], $_POST['LastName'], $_POST['FirstName'], $_POST['MiddleName'], $_POST['DoB'], $_POST['Gender'], $_POST['Email'], $_POST['MobilePhone'], $_POST['Social'], $_POST['Password'], $_POST['Password2'], date("d-m-Y в H:i"));
            if (count($error) == 0) {
                echo '<font color="green">Вы успешно зарегистрировались!</font><br><a href="index.php">На главную</a>';
            } else {
                foreach ($error as $value) 
						{
							echo('<br><div>'.$value.'</div>');
						}	
            }
        }
    }
   
    action_newUser();

?>