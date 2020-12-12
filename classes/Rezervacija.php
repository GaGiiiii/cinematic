<?php

    require_once 'Database.php';

    class Rezervacija{

        public function dodaj($props){
            $props = (object) $props;
            $query = "INSERT INTO rezervacija (korisnik_id, film_id, telefon, adresa, banka, datum, ime) VALUES ('$props->korisnik_id', '$props->film_id', '$props->brojTelefona', '$props->adresa', '$props->racun', '$props->datum', '$props->ime')";
            $result = mysqli_query(Database::getInstance()->getConnection(), $query) or die(mysqli_error(Database::getInstance()->getConnection()));

            // print_r($query);
            
            if($result){
                return true;
            }

            return false;
        }

        public static function uzmiSve(){
            $query = "SELECT r.*, f.naziv, f.dan, f.vreme FROM rezervacija r JOIN film f ON r.film_id = f.id";
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);
            $karte = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            return $karte;
        }

        public static function izbrisi($rezervacijaID){
            $query = "DELETE FROM rezervacija WHERE id = $rezervacijaID LIMIT 1";
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);

            return $result;
        }

    }