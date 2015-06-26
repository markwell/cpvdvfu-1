<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/cpvdvfu/system/bd.php";
	
	$result = mysql_query("SELECT * FROM Organizers");
	$array = mysql_fetch_array($result);
	
	do{
	if($array['Photo'] == '')
	{
		$photo = "noAvatar.jpg";
	}else{
		$photo = $array['Photo'];
	}
	printf("$array[LastName]<br><a href='profile.php?id=$array[OrganizerID]'><img src='photo/".$photo."'></a><br><br>");
	}
	while($array = mysql_fetch_array($result));
?>