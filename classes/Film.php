<?php

require_once 'Database.php';

class Film {

  public static function dodaj($props) {
    $props = (object) $props;
    // print_r($props);
    $query = "INSERT INTO film (naziv, zanr, trailer, trajanje, glumci, direktor, kontent, godina, slika, dan, vreme, uskoro) VALUES ('$props->nazivFilma2', '$props->zanr2', '$props->trailer2', '$props->trajanje2', '$props->glumci2', '$props->reziser2', '$props->sadrzaj2', '$props->godina2', '$props->slika2', '$props->dan2', '$props->vreme2', '$props->uskoro2')";
    $result = mysqli_query(Database::getInstance()->getConnection(), $query) or die(mysqli_error(Database::getInstance()->getConnection()));

    // print_r($query);

    if ($result) {
      return true;
    }

    return false;
  }

  public static function uzmiSve() {
    $query = "SELECT * FROM film";
    $result = mysqli_query(Database::getInstance()->getConnection(), $query);
    $filmovi = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $filmovi;
  }

  public static function vratiPoID($filmID) {
    $query = "SELECT * FROM film WHERE id = $filmID";
    $result = mysqli_query(Database::getInstance()->getConnection(), $query);
    $film = $result->fetch_assoc();

    return $film;
  }

  public static function izbrisi($filmID) {
    $query = "DELETE FROM film WHERE id = $filmID LIMIT 1";
    $result = mysqli_query(Database::getInstance()->getConnection(), $query);

    return $result;
  }

  public static function izmeni($props, $filmID) {
    $props = (object) $props;
    $query = "UPDATE film SET naziv = '$props->nazivFilma', zanr = '$props->zanr', trailer = '$props->trailer', trajanje = '$props->trajanje', glumci = '$props->glumci', direktor = '$props->reziser', kontent = '$props->sadrzaj', godina = '$props->godina', slika = '$props->slika', vreme = '$props->vreme', dan = '$props->dan', uskoro = '$props->uskoro' WHERE id = $filmID LIMIT 1";
    $result = mysqli_query(Database::getInstance()->getConnection(), $query) or die(mysqli_error(Database::getInstance()->getConnection()));

    return $result;
  }
}
