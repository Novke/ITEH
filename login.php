<?php

require "dbBroker.php";
require "model/trener.php";
require "model/korisnik.php";
require "model/trening.php";

session_start();

if(isset($_POST['submit'])){

  $u = $_POST['username'];
  $p = $_POST['password'];
  
  Trening::ocisti($conn);

  $result = Trener::login($u, $p, $conn);

  if ($result->num_rows != 0){
    echo "<script>alert('Uspesno ste se prijavili kao trener!');</script>";
    $_SESSION['trener'] = $u;
    header("Location: homeTrener.php");
    exit();

  } else {
    $result = Korisnik::login($u, $p, $conn);

    if ($result->num_rows != 0) {
      echo "<script>alert('Uspesno ste se prijavili kao korisnik!');</script>";
      $_SESSION['korisnik'] = $u;
      $_SESSION['ime']=Korisnik::vratiIme($u, $conn);
      header("Location: index.php");
      exit();
    } else {
      echo "<script>alert('Netacno ime ili lozinka');</script>";

    }

  }


}

?>

<!DOCTYPE html>

<html>
  <head>
    <title>Konjarnik GYM</title>
    <style>
     
      body {
        background-color: #444654;
      }
      
      
      .login-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        position: relative;
        top:20%;
      }
      
      
      form {
        display: flex;
        align-items: center;
      }
      
      
      h1 {
        font-size: 72px;
        margin-right: 20px;
        animation: colorchange 2.4s infinite;
        color:white;
      }

      
      h1::after {
        content: "→";
        font-size: 72px;
        margin-left: 5px;
        animation: colorchange 2.4s infinite;
        color:white;
      }
      
     
  @keyframes colorchange {
    0% {color: red;}
    33.3% {color: rgb(165, 165, 165);}
    66.6% {color: rgb(27, 27, 27);}
    92% {color: yellow;}
    100% {color: red;}
  }
     
      input[type="text"], input[type="password"], button {
        padding: 12px 20px;
        margin: 8px 0;
        width: 200px;
        display: inline-block;
        border: none; 
        box-sizing: border-box;
        background-color: #343541; /
        color:white; 
      }
     
      img {
        width: 40%; 
        display: block;
        margin: 0 auto; /* centar*/
        align-self: flex-start; 
      }
      
      label {
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="login-container">
      <img src="logoKonjarnik.png" alt="logo">
      <form method="POST">
        <h1>LOG IN HERE</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br>
            <button name = "submit" type="submit">Login</button>
        </div>
      </form>
    <!-- </div>
    <div style="text-align: center; margin-top: -8%; color:white;">
  <span>Nemas nalog? <a href="domaci/register.php" style="text-decoration: underline; color: white">Registruj se</a></span>
</div> -->

<div class="card-footer" style="text-align: center; color:white;">
				<div class="d-flex justify-content-center links">
					Niste registrovani? <a href="register.php" style="color: white">Registrujte se</a>
				</div>
				
			</div>
  </body>
</html>
