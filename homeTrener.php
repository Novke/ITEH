<?php

require "dbBroker.php";
require "model/trening.php";

session_start();

if(empty($_SESSION['trener']) || $_SESSION['trener'] == ''){
	header("Location: login.php");
	die();
}

$result = Trening::sveOdTrenera($_SESSION['trener'], $conn);

if(!$result){
	echo "Greska kod upita";
}

if($result->num_rows == 0){
	echo "Nema zakazanih treninga";
	die();
}


?>