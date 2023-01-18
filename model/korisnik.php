<?php

class Korisnik{

    public $ime;
    public $email;
    public $username;
    public $password;

    public function __construct($ime, $email, $username, $password){
        $this->ime = $ime;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public static function login($username, $password, mysqli $conn){
        $upit = "select * from korisnik where username= '$username' and password = '$password' limit 1;";
        return $conn->query($upit);
    }

    public static function add($ime, $email, $username, $password, mysqli $conn){
        $upit = "insert into korisnik (ime, email, username, password) values ('$ime', '$email', '$username', '$password')";
        return $conn->query($upit);
    }

    public static function check($username, mysqli $conn){
        $upit = "select * from korisnik where username= '$username'";
        return $conn->query($upit);
    }

    public static function vratiIme($username, mysqli $conn){
        $upit = "select ime from korisnik where username = '$username';";
        return $conn->query($upit);
    }


}


?>