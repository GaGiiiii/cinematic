<?php

    require_once 'Database.php'; // Pozivanje fajla gde je Database

    class Korisnik{

        public static function registruj($ime, $email, $password, $isAdmin){
            $password = md5(md5($password)); // Hashovanje sifre sa md5
<<<<<<< HEAD
            $query = "INSERT INTO korisnik (ime, email, password, is_admin) VALUES ('$ime', '$email', '$password', '$isAdmin')";
=======
            $query = "INSERT INTO Korisnik (ime, email, password, is_admin) VALUES ('$ime', '$email', '$password', '$isAdmin')";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);
            
            if($result){ // Ukoliko je query uspesan pravimo sesiju i vracamo true
                self::napraviSession(mysqli_insert_id(Database::getInstance()->getConnection()), $ime, $email, $isAdmin);

                return true;
            }

            return false;
        }

        public static function zauzetEmail($email){
<<<<<<< HEAD
            $query = "SELECT email FROM korisnik WHERE email = '$email'";
=======
            $query = "SELECT email FROM Korisnik WHERE email = '$email'";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);
            $korisnik = mysqli_fetch_array($result);

            if($korisnik){
                return true;
            }

            return false;
        }

        public static function zauzetoIme($ime){
<<<<<<< HEAD
            $query = "SELECT ime FROM korisnik WHERE ime = '$ime'";
=======
            $query = "SELECT ime FROM Korisnik WHERE ime = '$ime'";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);
            $korisnik = mysqli_fetch_array($result);

            if($korisnik){
                return true;
            }

            return false;
        }

        public static function prijavi($email, $password){
            $password = md5(md5($password));
<<<<<<< HEAD
            $query = "SELECT id, ime, email, is_admin FROM korisnik WHERE email = '$email' AND password = '$password'";
=======
            $query = "SELECT id, ime, email, is_admin FROM Korisnik WHERE email = '$email' AND password = '$password'";
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
            $result = mysqli_query(Database::getInstance()->getConnection(), $query);

            $korisnik = mysqli_fetch_array($result);

            if($korisnik){
                self::napraviSession($korisnik['id'], $korisnik['ime'], $korisnik['email'], $korisnik['is_admin']);

                return true;
            }

            return false;
        }

        public static function napraviSession($id, $ime, $email, $isAdmin){
            $_SESSION['korisnik'] = [
                'id' => $id,
                'ime' => $ime,
                'email' => $email,
                'isAdmin' => $isAdmin,
            ];
        }

        public static function odjavi(){
            // Gasimo i unistavamo sesiju nakon logout
            session_unset();
            session_destroy();
        }

        public static function ulogovan(){
            // Ako je sesija aktivna znaci da je korisnik ulogovan i dalje.
            if(isset($_SESSION['korisnik'])){
                return true;
            }

            return false;
        }

    }