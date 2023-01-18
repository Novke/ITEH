<?php
require "dbBroker.php";
require "model/trening.php";
require "model/trener.php";
session_start();


if (isset($_POST['submit'])) {
    $datum = $_POST['datum'];
    $vreme = $_POST['vreme'];
    $trener = $_POST['trener'];
    $korisnik = $_SESSION['korisnik'];

    if ($vreme > 22 || $vreme < 10){
      echo "<script>alert('MOGUCE JE ZAKAZATI SAMO IZMEDJU 10 i 22');</script>";
    }else {
    
    if (Trening::jelSlobodno($datum, $vreme, $trener, $conn)){

    $trening = new Trening($datum, $vreme, $trener, $korisnik);
    $trening->dodaj($conn);
    header("location: index.php");
    } else {
        echo "<script>alert('ZAUZET TERMIN, IZABERI NEKI DRUGI');</script>";
    }
  }
}

$treneri = Trener::getAll($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Zakazi trening</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
      /* Centriranje forme */
      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      /* textfieldovi da budu na istoj osi */
      input[type="text"], input[type="date"], select {
        margin: 8px 0;
        width: 20%;
        height: 5%;
        font-size: 1.8em;
      }
      /* Uvecanje fonta */
      label {
        font-size: 1.6em;
        font-weight: bold;
      }

      input[type="submit"] {
        font-size: 1.4em;
      }

    </style>
  </head>
  <body>
    <form method="POST">
      <h1>Zakazi trening</h1>
      <label for="datum">Datum:</label>
      <input type="date" id="datum" name="datum">
      <br>
      <label for="vreme">Vreme:</label>
      <input type="text" id="vreme" name="vreme">
      <br>
      <label for="trener">Trener:</label>
      <select id="trener" name="trener">
        <?php foreach ($treneri as $t) { ?>
          <option value="<?php echo $t['username']; ?>"><?php echo $t['ime']; ?></option>
        <?php } ?>
      </select>
      <br>
      <input type="submit" name="submit" value="Zakazi">
    </form>
  </body>
</html>
