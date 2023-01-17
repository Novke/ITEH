<?php

class Trening{

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

public function dodaj(mysqli $conn) {  //NIJE STATICKA FUNKCIJA, MOZDA BI BILO BOLJE DA JESTE, PROVERI
    if (self::jelSlobodno($this->datum, $this->vreme, $this->trener, $conn)) {
        $upit = "insert into trening (datum, vreme, trener, korisnik) values ('$this->datum', $this->vreme, '$this->trener', '$this->korisnik');";
        return $conn->query($upit);
    } else return false;
}


public static function jelSlobodno($datum, $vreme, $trener, mysqli $conn){
    $upit = "SELECT COUNT(*)
    FROM trening 
    WHERE datum = '$datum' 
    AND vreme = $vreme 
    AND trener = '$trener';";
    $rezultat = $conn->query($upit);
    if ($rezultat === false) {
        return false;
    }
    $count = $rezultat->fetch_row()[0];
    if ($count > 0) return false;
    return true;
}


public static function sveOdTrenera($trener, mysqli $conn){
    $upit = "SELECT trening.datum, trening.vreme, korisnik.ime
    FROM trening
    JOIN korisnik ON trening.korisnik = korisnik.username
    WHERE trening.trener = '$trener'
    ORDER BY trening.datum ASC;";
    return $conn->query($upit);
}

public static function sveOdTreneraFilter($trener, mysqli $conn, $ime){
    $query = "SELECT trening.datum, trening.vreme, korisnik.ime FROM trening
JOIN korisnik ON trening.korisnik = korisnik.username WHERE korisnik.ime LIKE '%$ime%'; ";

return $conn->query($query);
}

public static function sledeciTrening($korisnik, mysqli $conn){
    $upit = "SELECT trening.datum, trening.vreme, trener.ime
            FROM trening
            JOIN trener ON trening.trener = trener.username
            WHERE trening.korisnik = '$korisnik'
            ORDER BY trening.datum ASC
            LIMIT 1;";
    return $conn->query($upit);

}

public static function otkaziTrening($trener, $datum, $vreme, mysqli $conn){
    $upit = "DELETE FROM trening WHERE trener = '$trener' AND datum = '$datum' AND vreme = $vreme";
    return $conn->query($upit);
}

// public function otkaziTrening(mysqli $conn) {
//     $upit = "DELETE FROM trening WHERE trener = '$this->trener' AND datum = '$this->datum' AND vreme = $this->vreme";
//     return $conn->query($upit);
// }





}




?>