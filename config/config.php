<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

# Start a sessions in All Pages of Project 

session_start(); 

ob_start();

# Start a new Connection With PDO Class .. 
# Data Source Name
$dsn    = 'mysql:host=localhost;dbname=almossaidblog'; 

# The User To login Database
$user   = 'root'; 

# Password Of This User To login Database 
$pass   = '';     

# Encoding Arabic / English .. 'UTF8'
$option = array (

	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',

);


try {

    # Start to Connection a Database ..
	$connect = new PDO($dsn,$user,$pass,$option); 

	# Use Exception System 
	$connect ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 

}

# if there's any probelem in connection Print Message Error ..

catch (PDOException $e) {  

	echo "There is A Problem in Connection To Database" . ' ' . $e->getMessage();

};


function fetch_data ($tablename,$where = "" , $wherevalue = array() , $fields = "*") {

  Global $connect;

  $sql = "SELECT $fields FROM $tablename $where ";

  $v   = $connect->prepare($sql);

  $v->execute($wherevalue);

  $output = $v->fetchAll(\PDO::FETCH_ASSOC);

  return $output;

}

