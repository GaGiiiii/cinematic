<?php

    require_once 'Database.php';

    class Rezervacija{

        public function dodaj($props){
            $props = (object) $props;
<<<<<<< HEAD
            $query = "INSERT INTO rezervacija (korisnik_id, film_id, telefon, adresa, banka, datum, ime) VALUES ('$props->korisnik_id', '$props->film_id', '$props->brojTelefona', '$props->adresa', '$props->racun', '$props->datum', '$props->ime')";
=======
            $query = "INSERT INTO Rezervacija (korisnik_id, film_id, telefon, adresa, banka, datum, ime) VALUES ('$props->korisnik_id', '$props->film_id', '$props->brojTelefona', '$props->adresa', '$props->racun', '$props->datum', '$props->ime')";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query) or die(mysqli_error(Database::getInstance()->getConnection()));

            // print_r($query);
            
            if($result){
                return true;
            }

            return false;
        }

        public static function uzmiSve(){
<<<<<<< HEAD
            $query = "SELECT r.*, f.naziv, f.dan, f.vreme FROM rezervacija r JOIN film f ON r.film_id = f.id";
=======
            $query = "SELECT r.*, f.naziv, f.dan, f.vreme FROM Rezervacija r JOIN Film f ON r.film_id = f.id";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);
            $karte = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            return $karte;
        }

        public static function izbrisi($rezervacijaID){
<<<<<<< HEAD
            $query = "DELETE FROM rezervacija WHERE id = $rezervacijaID LIMIT 1";
=======
            $query = "DELETE FROM Rezervacija WHERE id = $rezervacijaID LIMIT 1";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);

            return $result;
        }

    }