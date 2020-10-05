<?php
	$info_text = $_POST['info_text'];
	$info_date = date("Y-m-d");
	
	$dsn = 'mysql:dbname=minischool;host=localhost';
	$user = '';
	$password = '';

    $db = new PDO($dsn, $user, $password);
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	$sql = "INSERT INTO info(info_text, info_date) "
		 . "VALUES(?, ?)";
	
	$data = array($info_text, $info_date);
	
	
	$rs = $db->prepare($sql);
	
	$rs->execute($data);
	
	$db = null;
	
	header("location:tpage.php");
	