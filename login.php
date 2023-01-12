<?php

require "dbBroker.php";
require "model/trener.php";
require "model/korisnik.php";

session_start();

if(isset($_POST['submit'])){

	$u = $_POST['korisnicko_ime'];
	$p = $_POST['lozinka'];

  $result = Trener::login($u, $p, $conn);

  if ($result->num_rows != 0){
    echo "Uspesno ste se prijavili kao trener!";
    $_SESSION['trener'] = $u;
    header("Location: homeTrener.php");
    exit();

  } else {
    $result = Korisnik::login($u, $p, $conn);

    if ($result->num_rows != 0) {
      echo "Uspesno ste se prijavili kao korisnik";
      $_SESSION['korisnik'] = $u;
      header("Location: index.php");
      exit();
    } else {
      echo "Netacno ime ili lozinka";
    }

  }


}

?>