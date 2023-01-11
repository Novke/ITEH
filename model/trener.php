<?php

class Trener{

    public $ime;
    public $iskustvo;
    public $username;
    public $password;

    public function __construct($ime, $iskustvo, $username, $password){
        $this->ime = $ime;
        $this->iskustvo = $iskustvo;
        $this->username = $username;
        $this->password = $password;
    }

    public static function login($username, $password, mysqli $conn){
        $upit = "select * from korisnik where username= '$username' and password = '$pass' limit 1;";
        return $conn->query($upit);
    }

    public static function add($ime, $iskustvo, $username, $password, mysqli $conn){
        $upit = "insert into korisnik (ime, iskustvo, username, password) values ('$ime', '$iskustvo', '$username', '$password')";
        return $conn->query($upit);
    }

    public static function check($username, $conn){
        $upit = "select * from trener where username= '$username'";
        return $conn->query($upit);

    }



}


?>