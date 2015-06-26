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






	
	/*if (isset($_POST['submitorganizer'])){
		if($_POST['Password'] != $_POST['Password2']) {
			echo '<br><font color="red"><img border="0" src="error.gif" align="middle" alt="Введенные пароли не совпадают!"> Введенные пароли не совпадают!</font>';
			} else{
			$OrganizerName = $_POST['OrganizerName'];
			$LastName = $_POST['LastName'];
			$FirstName = $_POST['FirstName'];
			$MiddleName = $_POST['MiddleName'];
			$DoB = $_POST['DoB'];
			$Gender = $_POST['Gender'];
			$Email = $_POST['Email'];
			$MobilePhone = $_POST['MobilePhone'];
			$Social = $_POST['Social'];
			$Password = $_POST['Password'];
			$mdPassword = md5($Password);
			$Password2 = $_POST['Password2'];
			$DateTimeReg = date("d-m-Y в H:i"); 
			  
			$query = ("SELECT OrganizerID FROM organizers WHERE Email='$Email'");
			$sql = mysql_query($query) or die(mysql_error());
			
			if (mysql_num_rows($sql) > 0) {
				echo '<font color="red"><img border="0" src="error.gif" align="middle" alt="Email уже зарегистрирован!"> Email уже зарегистрирован!</font>';
			}
			else {
				$query2 = ("SELECT OrganizerID FROM organizers WHERE MobilePhone='$MobilePhone'");
				$sql = mysql_query($query2) or die(mysql_error());
				if (mysql_num_rows($sql) > 0){
					echo '<font color="red"><img border="0" src="error.gif"  alt="Данный номер уже зарегистрирован!"> Данный номер уже зарегистрирован!</font>';
				}
				else{
					$query = "INSERT INTO organizers (OrganizerName, LastName, FirstName, MiddleName, DoB, Gender, Email, MobilePhone, Social, Password, DateTimeReg)
							  VALUES ('$OrganizerName', '$LastName', '$FirstName', '$MiddleName', '$DoB', '$Gender', '$Email', '$MobilePhone', '$Social', '$mdPassword', '$DateTimeReg')";
					$result = mysql_query($query) or die(mysql_error());;
					echo '<font color="green"><img border="0" src="ok.gif" align="middle" alt="Вы успешно зарегистрировались!"> Вы успешно зарегистрировались!</font><br><a href="index.php">На главную</a>';
					
								
				}
			}
		}
    }*/
?>