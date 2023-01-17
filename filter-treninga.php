<?php
require "dbBroker.php";
require "model/trening.php";

// Retrieve the values entered in the textfields
session_start();
$ime = $_POST['ime'];

$trener = $_SESSION['trener'];

$result = Trening::sveOdTreneraFilter($trener, $conn, $ime);




if(!$result){
    echo "Greska kod upita";
}

if($result->num_rows == 0){
    echo "Nema zakazanih treninga";
    die();
}

?>
