<?php
include_once $_SERVER['DOCUMENT_ROOT']."/cpvdvfu/system/bd.php";
?>
<?php
if (isset($_POST['email'])) {
	$email = $_POST['email']; 
	if ($email == '') {
		unset($email);
		exit ("Введите пожалуйста Email!");
	} 
}
if (isset($_POST['password'])) {
	$password=$_POST['password']; 
	if ($password =='') {
		unset($password);
		exit ("Введите пароль");
	}
}

$email = stripslashes($email);
$email = htmlspecialchars($email);

$password = stripslashes($password);
$password = htmlspecialchars($password);


$email = trim($email);
$password = trim($password);

$password = md5($password);//шифруем пароль

$volunteer = mysql_query("SELECT VolunteerID FROM Volunteers WHERE Email='$email' AND Password='$password'");
$id_volunteer = mysql_fetch_array($volunteer);
$organizer = mysql_query("SELECT OrganizerID FROM Organizers WHERE Email='$email' AND Password='$password'");
$id_organizer = mysql_fetch_array($organizer);
if (empty($id_volunteer['VolunteerID'])){
	if (empty($id_organizer['OrganizerID'])){
	exit ("Извините, введённый вами Email или пароль неверный.");
	}
}
else {

   
    $_SESSION['password']=$password; 
	$_SESSION['email']=$email; 
    $_SESSION['id']=$id_user['id'];
		  
}
echo "<meta http-equiv='Refresh' content='0; URL=index'>";
?>
