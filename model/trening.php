<?php

public class Trening{

    public $datum;
    public $vreme;
    public $trener;
    public $korisnik;

public function __construct($datum, $vreme, $trener, $korisnik){

    $this->datum = $datum;
    $this->vreme = $vreme;
    $this->trener = $trener;
    $this->korisnik = $korisnik;
}

public function add($datum, $vreme, $trener, $korisnik, mysqli $conn){
    $upit = "insert into trening (datum, vreme, trener, korisnik) values ($datum, $vreme, $trener, $korisnik);";
    return $conn->query($upit);
}

public function check($datum, $vreme, $trener, mysqli $conn){
    $upit = "SELECT COUNT(*)
    FROM trening 
    WHERE datum = $datum 
    AND vreme = $vreme 
    AND trener = $trener;"
    $rezultat = $conn->query($upit);
    if ($rezultat==0) return false;
    return true;

}

public function sveOdTrenera($trener, mysqli $conn){
    $upit = "SELECT trening.datum, trening.vreme, korisnik.ime
    FROM trening
    JOIN korisnik ON trening.korisnik = korisnik.username
    WHERE trening.trener = $trener
    ORDER BY trening.datum ASC;"
}

public function sledeciTrening($korisnik, mysqli $conn){
    $upit = "SELECT trening.datum, trening.vreme, trener.ime
            FROM trening
            JOIN trener ON trening.trener = trener.username
            WHERE trening.korisnik = $korisnik
            ORDER BY trening.datum ASC
            LIMIT 1;"
    return $conn->query($upit);

}




}




?>