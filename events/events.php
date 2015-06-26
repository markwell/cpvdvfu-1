<?php 
	include_once ('./system/bd.php');
	$result = mysql_query("SELECT a.ActivityID, a.Name, a.Description, dt_a.DateTimeStart, dt_a.DateTimeEnd FROM Activities as a JOIN datetime_activites as dt_a on dt_a.DateTimeAID=a.ActivityID");
	$array = mysql_fetch_array($result);
	$sum=0;
	
	do{
		printf("
			<article class='clear-after'>
			<div class='column three'>
			<!-- $array[Name]<br><a href='events.php?id=$array[ActivityID]'></a><br><br -->
				<figure><img src='./events/img/$array[ActivityID].jpg' alt=''></figure>
			</div><!-- column three -->
			<div class='column nine last'>
				<h2><a href='index.php?events?id=$array[ActivityID]'>$array[Name]</a></h2>
				<h5 class='meta-post'><time DateTimeStart='$array[DateTimeStart]'>$array[DateTimeStart]</time> - <time DateTimeEnd='$array[DateTimeEnd]'>$array[DateTimeEnd]</time></h5>
				<p>$array[Description]</p>	
			</div><!-- column nine -->
			</article>
		");
	}
	while ($array = mysql_fetch_array($result));
	
?>