<?
	$db = mysql_connect ("localhost","nygma","qwerty");
	mysql_select_db("phpBooks",$db);
	header("Content-Type: text/html; charset=utf-8");
	session_start();
?>