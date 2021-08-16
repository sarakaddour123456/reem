<?php

$dsn = 'mysql:host=localhost;dbname=add';
$user = 'root';
$pass = '';
$option = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);

 try{
 	$con = new PDO($dsn,$user,$pass,$option);
 	//$con->setAttribute(PDO::ATR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "you are connected";
 }

 catch(PDOException $e){
 	echo "error in connection".$e->getMessage();
 }
?>