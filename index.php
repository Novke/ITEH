<?php

require "dbBroker.php";
require "model/trening.php";
require "model/korisnik.php";
require "model/trener.php";

if(empty($_SESSION['user']) || $_SESSION['user'] == ''){
	header("Location: login.php");
	die();
}

$result = Trening::sledeciTrening($_SESSION['user'], $conn);

if(!$result){
	echo "Greska kod upita";
}

if($result->num_rows == 0){
	echo "Niste zakazali trening";
	die();
}

$treneri = Trener::getAll($conn);

if(!$treneri){
	echo "Greska kod upita";
}

if ($treneri == 0){
    echo "Nema trenera";
}


?>