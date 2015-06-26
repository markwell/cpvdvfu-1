<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/cpvdvfu/system/bd.php";
    
	function getHashAndID($userID)
	{
		$query = mysql_query("SELECT * FROM Organizers WHERE OrganizerID='$userID' LIMIT 1");
        $userdata = mysql_fetch_array($query);
	    return $userdata;
	}
    function checkUser()
    {
        $userdata = getHashAndID(intval($_COOKIE['id']));
        
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) {
            if (($userdata['Hash'] !== $_COOKIE['hash']) or ($userdata['OrganizerID'] !== $_COOKIE['id'])) {
                setcookie("id", "", time() - 3600*24*30*12, "/");
                setcookie("username", "", time() - 3600*24*30*12, "/");
                setcookie("hash", "", time() - 3600*24*30*12, "/");
                $message = "Авторизуйтесь пожалуйста.";
            } else {
                $message = "Привет, ".$userdata['FirstName'].". Все отлично!";
            }
        } else {
                $message = "Пожалуйста, включите куки.";
        }
        echo $message;
    } 
    checkUser();
?>