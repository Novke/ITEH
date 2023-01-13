<?php

require 'dbBroker.php';
require 'model/korisnik.php';

if(isset($_POST['submit'])){

	$user = mysqli_real_escape_string($conn, $_POST['user']);
	$ime = mysqli_real_escape_string($conn, $_POST['ime']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['lozinka']);
	$password1 = mysqli_real_escape_string($conn, $_POST['ponovi_lozinku']);
	
	$result = Korisnik::check($user, $conn);

	if(mysqli_num_rows($result) != 0){
		echo "Korisnicko ime je zauzeto!";
	}else {
		Korisnik::add($ime, $email, $user, $password, $conn);
		header("location: login.php");
	}

}

?>