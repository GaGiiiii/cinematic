<?php 

    require_once 'classes/Korisnik.php';

    if(!Korisnik::ulogovan() || (Korisnik::ulogovan() && !$_SESSION['korisnik']['isAdmin'])){
      header("Location: index.php");
    }

    require_once 'classes/Film.php';



  $poruka = array(); // Niz sa greskama
  $email = '';
  $password = '';

  // Ciscenje input od sql injectiona i scripti itd.
  function ocisti($input){
      $input = mysqli_real_escape_string(Database::getInstance()->getConnection(), $input);
      $input = trim($input);
      $input = stripslashes($input); // removes / from sting
      $input = htmlspecialchars($input);
      $input = str_replace('"', "", $input);
      $input = str_replace("'", "", $input);

      return $input;
  }


  if(isset($_POST['dodaj_film'])){
      $nazivFilma2 = $_POST['nazivFilma2'];
      $slika2 = $_POST['slika2'];
      $zanr2 = $_POST['zanr2'];
      $trailer2 = $_POST['trailer2'];
      $trajanje2 = $_POST['trajanje2'];
      $glumci2 = $_POST['glumci2'];
      $reziser2 = $_POST['reziser2'];
      $uskoro2 = $_POST['uskoro2'];
      $dan2 = $_POST['dan2'];
      $vreme2 = $_POST['vreme2'];
      $godina2 = $_POST['godina2'];
      $sadrzaj2 = $_POST['sadrzaj2'];

      if(empty($nazivFilma2)){
        $poruka['nazivFilma2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite naziv.</label></p>';
      }else{
        $nazivFilma2 = ocisti($nazivFilma2);
      }

      if(empty($slika2)){
        $poruka['slika2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite link slike.</label></p>';
      }else{
        $slika2 = ocisti($slika2);
      }

      if(empty($zanr2)){
        $poruka['zanr2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite žanr.</label></p>';
      }else{
        $zanr2 = ocisti($zanr2);
      }

      if(empty($trailer2)){
        $poruka['trailer2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite link trailera.</label></p>';
      }else{
        $trailer2 = ocisti($trailer2);
      }

      if(empty($trajanje2)){
        $poruka['trajanje'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite trajanje.</label></p>';
      }else{
        $trajanje2 = ocisti($trajanje2);
      }

      if(empty($glumci2)){
        $poruka['glumci2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite glumce.</label></p>';
      }else{
        $glumci2 = ocisti($glumci2);
      }

      if(empty($reziser2)){
        $poruka['reziser2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite režisera.</label></p>';
      }else{
        $reziser2 = ocisti($reziser2);
      }

      if(empty($dan2)){
        $poruka['dan2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite dan.</label></p>';
      }else{
        $dan2 = ocisti($dan2);
      }

      if(empty($vreme2)){
        $poruka['vreme2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite vreme.</label></p>';
      }else{
        $vreme2 = ocisti($vreme2);
      }

      if(empty($godina2)){
        $poruka['godina2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite godinu.</label></p>';
      }else{
        $godina2 = ocisti($godina2);
      }

      if(empty($sadrzaj2)){
        $poruka['sadrzaj2'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite sadržaj.</label></p>';
      }else{
        $sadrzaj2 = ocisti($sadrzaj2);
      }

      if(count($poruka) == 0){ 
          $props = [
              'nazivFilma2' => $nazivFilma2,
              'zanr2' => $zanr2,
              'trailer2' => $trailer2,
              'glumci2' => $glumci2,
              'trajanje2' => $trajanje2,
              'reziser2' => $reziser2,
              'uskoro2' => $uskoro2,
              'dan2' => $dan2,
              'vreme2' => $vreme2,
              'godina2' => $godina2,
              'sadrzaj2' => $sadrzaj2,
              'slika2' => $slika2
          ];
          if(Film::dodaj($props)){
            header("Location: admin.php");
          }else{
            $poruka['dodaj'] = '<p class="error-p text-center"><label class="text-danger error">Greška prilikom dodavanja filma.</label></p>';
          }
      }
    }


    if(isset($_POST['izmeni_film'])){
        $nazivFilma = $_POST['nazivFilma'];
        $slika = $_POST['slika'];
        $zanr = $_POST['zanr'];
        $trailer = $_POST['trailer'];
        $trajanje = $_POST['trajanje'];
        $glumci = $_POST['glumci'];
        $reziser = $_POST['reziser'];
        $uskoro = $_POST['uskoro'];
        $dan = $_POST['dan'];
        $vreme = $_POST['vreme'];
        $godina = $_POST['godina'];
        $sadrzaj = $_POST['sadrzaj'];
  
        if(empty($nazivFilma)){
          $poruka['nazivFilma'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite naziv.</label></p>';
        }else{
          $nazivFilma = ocisti($nazivFilma);
        }
  
        if(empty($slika)){
          $poruka['slika'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite link slike.</label></p>';
        }else{
          $slika = ocisti($slika);
        }
  
        if(empty($zanr)){
          $poruka['zanr'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite žanr.</label></p>';
        }else{
          $zanr = ocisti($zanr);
        }
  
        if(empty($trailer)){
          $poruka['trailer'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite link trailera.</label></p>';
        }else{
          $trailer = ocisti($trailer);
        }
  
        if(empty($trajanje)){
          $poruka['trajanje'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite trajanje.</label></p>';
        }else{
          $trajanje = ocisti($trajanje);
        }
  
        if(empty($glumci)){
          $poruka['glumci'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite glumce.</label></p>';
        }else{
          $glumci = ocisti($glumci);
        }
  
        if(empty($reziser)){
          $poruka['reziser'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite režisera.</label></p>';
        }else{
          $reziser = ocisti($reziser);
        }
  
        if(empty($dan)){
          if(!$uskoro){
            $poruka['dan'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite dan.</label></p>';
          }
        }else{
          $dan = ocisti($dan);
        }
  
        if(empty($vreme)){
          if(!$uskoro){
            $poruka['vreme'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite vreme.</label></p>';
          }
        }else{
          $vreme = ocisti($vreme);
        }
  
        if(empty($godina)){
          $poruka['godina'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite godinu.</label></p>';
        }else{
          $godina = ocisti($godina);
        }
  
        if(empty($sadrzaj)){
          $poruka['sadrzaj'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite sadržaj.</label></p>';
        }else{
          $sadrzaj = ocisti($sadrzaj);
        }

        if(count($poruka) == 0){ 
            $filmID = $_POST['filmID'];
            $props = [
                'nazivFilma' => $nazivFilma,
                'zanr' => $zanr,
                'trailer' => $trailer,
                'glumci' => $glumci,
                'trajanje' => $trajanje,
                'reziser' => $reziser,
                'uskoro' => $uskoro,
                'dan' => $dan,
                'vreme' => $vreme,
                'godina' => $godina,
                'sadrzaj' => $sadrzaj,
                'slika' => $slika
            ];
            if(Film::izmeni($props, $filmID)){
              header("Location: admin.php");
            }else{
              $poruka['izmeni'] = '<p class="error-p text-center"><label class="text-danger error">Greška prilikom izmene filma.</label></p>';
            }
         }else{
          // print_r($_POST);
          // print_r($poruka);

         }
    }
    

    if(isset($_POST['izbrisi_film'])){
        $filmID = $_POST['filmID'];
        if(Film::izbrisi($filmID)){
            header("Location: admin.php");
        }
    }

    $filmovi = Film::uzmiSve();

?>

<?php require_once 'includes/header.php'; ?>

    <div class="container-fluid mt-5">
        <div class="row">


        <?php foreach($filmovi as $key=>$film): ?>
            
            <div class="col-md-4 col-sm-6">
              <div class="card-admin" data-index="<?php echo $key; ?>">
                <a href="#" class="hhover-link" data-target="#updMo<?php echo $film['id']; ?>" data-toggle="modal">
                    <div class="invisible-custom invis ">
                        <h1>IZMENI</h1>
                    </div>
                    <img src="<?php echo $film['slika']; ?>" alt="Banner1">
                    <h1><?php echo $film['naziv']; ?></h1>
                </a>
              </div> 
            </div>
            

            <div class="modal modal-update-color" id="updMo<?php echo $film['id']; ?>">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ažuriraj "<?php echo $film['naziv']; ?>"</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="poruci-form">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="nazivFilma" class="form-control" value="<?php echo $film['naziv']; ?>" placeholder="Unesite naziv filma">
                                        <?php if(array_key_exists('nazivFilma', $poruka)) echo $poruka['nazivFilma']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="slika" class="form-control" value="<?php echo $film['slika']; ?>" placeholder="Unesite link slike">
                                        <?php if(array_key_exists('slika', $poruka)) echo $poruka['slika']; ?>
                                    </div>

                                    <div class="form-group">
<<<<<<< HEAD
                                        <input type="text" name="zanr" class="form-control" value="<?php echo $film['zanr']; ?>" placeholder="Unesite žanr">
=======
                                        <input type="text" name="zanr" class="form-control" value="<?php echo $film['žanr']; ?>" placeholder="Unesite žanr">
>>>>>>> 66f6998787385f92a9ab47089b47003e8f338cf9
                                        <?php if(array_key_exists('zanr', $poruka)) echo $poruka['zanr']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="trailer" class="form-control" value="<?php echo $film['trailer']; ?>" placeholder="Unesite link trailera">
                                        <?php if(array_key_exists('trailer', $poruka)) echo $poruka['trailer']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="trajanje" class="form-control" value="<?php echo $film['trajanje']; ?>" placeholder="Unesite trajanje (min)">
                                        <?php if(array_key_exists('trajanje', $poruka)) echo $poruka['trajanje']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="glumci" class="form-control" value="<?php echo $film['glumci']; ?>" placeholder="Unesite glumce">
                                        <?php if(array_key_exists('glumci', $poruka)) echo $poruka['glumci']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="reziser" class="form-control" value="<?php echo $film['direktor']; ?>" placeholder="Unesite režisera">
                                        <?php if(array_key_exists('reziser', $poruka)) echo $poruka['reziser']; ?>
                                    </div>

                                    <div class="form-group">
                                        <p>Uskoro:</p>
                                        <div class="custom-control custom-radio">
                                            <input value="0" type="radio" id="customRadio1<?php echo $film['id']; ?>" name="uskoro" class="custom-control-input" <?php if(!$film['uskoro']) echo "checked"; ?>>
                                            <label class="custom-control-label" for="customRadio1<?php echo $film['id']; ?>">NE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input value="1" type="radio" id="customRadio2<?php echo $film['id']; ?>" name="uskoro" class="custom-control-input" <?php if($film['uskoro']) echo "checked"; ?>>
                                            <label class="custom-control-label" for="customRadio2<?php echo $film['id']; ?>">DA</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="dan" class="form-control" value="<?php echo $film['dan']; ?>" placeholder="Unesite dan">
                                        <?php if(array_key_exists('dan', $poruka)) echo $poruka['dan']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="vreme" class="form-control" value="<?php echo $film['vreme']; ?>" placeholder="Unesite vreme">
                                        <?php if(array_key_exists('vreme', $poruka)) echo $poruka['vreme']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="godina" class="form-control" value="<?php echo $film['godina']; ?>" placeholder="Unesite godinu">
                                        <?php if(array_key_exists('godina', $poruka)) echo $poruka['godina']; ?>
                                    </div>

                                    

                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleTextarea" rows="3" name="sadrzaj" placeholder="Sadržaj"><?php echo $film['kontent']; ?></textarea>
                                        <?php if(array_key_exists('sadrzaj', $poruka)) echo $poruka['sadrzaj']; ?>
                                    </div>

                                    <div class="text-center">
                                        <input type="hidden" name="filmID" value="<?php echo $film['id']; ?>">
                                        <button type="submit" name="izmeni_film" class="azuriraj-btn-modal btn btn-primary">Ažuriraj</button>
                                        <button type="submit" name="izbrisi_film" class="azuriraj-btn-modal btn btn-primary">Izbriši</button>
                                        <button type="button" class="azuriraj-btn-modal btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
   

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="text-align:center;">
                <button style="text-align: center;" type="submit" class="poruci-btn btn btn-xs btn-danger" data-target="#addMo" data-toggle="modal">Dodaj film !</button>
            </div>
        </div>
    </div>

    <div class="modal" id="addMo">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Dodaj film</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="poruci-form">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" name="nazivFilma2" class="form-control" value="<?php if(isset($nazivFilma2)) echo $nazivFilma2; ?>" placeholder="Unesite naziv filma">
                                        <?php if(array_key_exists('nazivFilma2', $poruka)) echo $poruka['nazivFilma2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="slika2" class="form-control" value="<?php if(isset($slika2)) echo $slika2; ?>" placeholder="Unesite link slike">
                                        <?php if(array_key_exists('slika2', $poruka)) echo $poruka['slika2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="zanr2" class="form-control" value="<?php if(isset($zanr2)) echo $zanr2; ?>" placeholder="Unesite žanr">
                                        <?php if(array_key_exists('zanr2', $poruka)) echo $poruka['zanr2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="trailer2" class="form-control" value="<?php if(isset($trailer2)) echo $trailer2; ?>" placeholder="Unesite link trailera">
                                        <?php if(array_key_exists('trailer2', $poruka)) echo $poruka['trailer2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="trajanje2" class="form-control" value="<?php if(isset($trajanje2)) echo $trajanje2; ?>" placeholder="Unesite trajanje (min)">
                                        <?php if(array_key_exists('trajanje2', $poruka)) echo $poruka['trajanje2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="glumci2" class="form-control" value="<?php if(isset($glumci2)) echo $glumci2; ?>" placeholder="Unesite glumce">
                                        <?php if(array_key_exists('glumci2', $poruka)) echo $poruka['glumci2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="reziser2" class="form-control" value="<?php if(isset($reziser2)) echo $reziser2; ?>" placeholder="Unesite režisera">
                                        <?php if(array_key_exists('reziser2', $poruka)) echo $poruka['reziser2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <p>Uskoro:</p>
                                        <div class="custom-control custom-radio">
                                            <input value="0" type="radio" id="customRadio1" name="uskoro2" class="custom-control-input" checked="">
                                            <label class="custom-control-label" for="customRadio1">NE</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input value="1" type="radio" id="customRadio2" name="uskoro2" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">DA</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="dan2" class="form-control" value="<?php if(isset($dan2)) echo $dan2; ?>" placeholder="Unesite dan">
                                        <?php if(array_key_exists('dan2', $poruka)) echo $poruka['dan2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="vreme2" class="form-control" value="<?php if(isset($vreme2)) echo $vreme2; ?>" placeholder="Unesite vreme">
                                        <?php if(array_key_exists('vreme2', $poruka)) echo $poruka['vreme2']; ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="number" name="godina2" class="form-control" value="<?php if(isset($godina2)) echo $godina2; ?>" placeholder="Unesite godinu">
                                        <?php if(array_key_exists('godina2', $poruka)) echo $poruka['godina2']; ?>
                                    </div>

                               

                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleTextarea" rows="3" name="sadrzaj2" placeholder="Sadržaj"><?php if(isset($sadrzaj2)) echo $sadrzaj2; ?></textarea>
                                        <?php if(array_key_exists('sadrzaj2', $poruka)) echo $poruka['sadrzaj2']; ?>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="dodaj_film" class="azuriraj-btn-modal btn btn-primary">Dodaj</button>
                                        <button type="button" class="azuriraj-btn-modal btn btn-secondary" data-dismiss="modal">Zatvori</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php require_once 'includes/footer.php'; ?>
