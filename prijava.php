<?php 

  require_once 'classes/Korisnik.php';

  // Ukoliko je korisnik vec ulogovan redirektuj ga na home page
  if(Korisnik::ulogovan()){
    header("Location: index.php");
  }   
      
  $poruka = array(); // Niz sa greskama
  $email = '';
  $password = '';

  // Ciscenje input od sql injectiona i scripti itd.
  function ocisti($input){
      $input = mysqli_real_escape_string(Database::getInstance()->getConnection(), $input);
      $input = trim($input);
      $input = stripslashes($input); // removes / from sting
      $input = htmlspecialchars($input);

      return $input;
  }


  if(isset($_POST['prijava'])){
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(empty($email)){
          $poruka['email'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite email.</label></p>';
      }else{
          $email = ocisti($email);
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $poruka['email'] = '<p class="error-p"><label class="text-danger error">Pogrešan Email Format</label></p>';
          }
      }

      if(empty($password)){
        $poruka['password'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite šifru.</label></p>';
      }else{
        $password = ocisti($password);
      }

      if(count($poruka) == 0){          
          if(Korisnik::prijavi($email, $password)){
            header("Location: index.php");
          }else{
            $poruka['prijava'] = '<p class="error-p text-center"><label class="text-danger error">Pogrešna kombinacija.</label></p>';
          }
      }

  }

?>

<?php require_once 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">


        <form method="POST" class="login-form">
            <fieldset>
                <legend>Prijava</legend>
                <?php if(array_key_exists('prijava', $poruka)) echo $poruka['prijava']; ?>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Unesite email" value="<?php if(isset($email)) echo $email; ?>">
                    <?php if(array_key_exists('email', $poruka)) echo $poruka['email']; ?>
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Unesite šifru">
                    <?php if(array_key_exists('password', $poruka)) echo $poruka['password']; ?>
                </div>
                <button type="submit" name="prijava" class="btn btn-primary">Prijava</button>
            </fieldset>
            </form>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
