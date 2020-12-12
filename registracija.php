<?php 

    require_once 'classes/Korisnik.php';

    if(Korisnik::ulogovan()){
        header("Location: index.php");
    }
    
    $poruka = array();
    $ime = '';
    $email = '';
    $password = '';
    $password2 = '';

    function ocisti($input){
        $input = mysqli_real_escape_string(Database::getInstance()->getConnection(), $input);
        $input = trim($input);
        $input = stripslashes($input); // removes / from sting
        $input = htmlspecialchars($input);

        return $input;
    }


    if(isset($_POST['registracija'])){
        $ime = $_POST['ime'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if(empty($ime)){
          $poruka['ime'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite ime.</label></p>';
        }else{
            $ime = ocisti($ime);
        }

        if(empty($email)){
            $poruka['email'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite email.</label></p>';
        }else{
            $email = ocisti($email);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $poruka['email'] = '<p class="error-p"><label class="text-dange errorr">Pogrešan Email Format</label></p>';
            }
        }

        if(empty($password)){
          $poruka['password'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite šifru.</label></p>';
        }else{
            $password = ocisti($password);
            $password2 = ocisti($password2);
          if($password !== $password2){
            $poruka['password2'] = '<p class="error-p"><label class="text-danger error">Šifre se ne poklapaju.</label></p>';
          }
        }

        if(count($poruka) == 0){
            if(Korisnik::zauzetEmail($email)){
                $poruka['email'] = '<p class="error-p"><label class="text-dange errorr">Email zauzet.</label></p>';
            }else if(Korisnik::zauzetoIme($ime)){
                $poruka['ime'] = '<p class="error-p"><label class="text-danger error">Ime zauzeto.</label></p>';
            }else if(Korisnik::registruj($ime, $email, $password, 0)){
              //print_r($_SESSION['korisnik']['ime']);
              header("Location: index.php");
            }else{
              $poruka['registracija'] = '<p class="error-p"><label class="text-danger error">Greška prilikom registracije.</label></p>';
            }
        }

    }

?>


<?php require_once 'includes/header.php'; ?>


<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

        <div>
           <?php if(array_key_exists('registracija', $poruka)) echo $poruka['registracija']; ?>
        </div>

        <form method="POST" class="register-form">
            <fieldset>
                <legend>Registracija</legend>
                <div class="form-group">
                    <input type="text" name="ime" class="form-control" id="exampleInputPassword1" value="<?php if(isset($ime)) echo $ime; ?>" placeholder="Unesite ime">
                    <?php if(array_key_exists('ime', $poruka)) echo $poruka['ime']; ?>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if(isset($email)) echo $email; ?>" placeholder="Unesite email">
                    <?php if(array_key_exists('email', $poruka)) echo $poruka['email']; ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Unesite šifru">
                    <?php if(array_key_exists('password', $poruka)) echo $poruka['password']; ?>
                </div>
                <div class="form-group">
                    <input type="password" name="password2" class="form-control" id="exampleInputPassword2" placeholder="Potvrdite šifru">
                    <?php if(array_key_exists('password2', $poruka)) echo $poruka['password2']; ?>
                </div>
                <button type="submit" name="registracija" class="btn btn-primary">Registracija</button>
            </fieldset>
            </form>
        </div>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?>
