<?php

require_once 'classes/Film.php';
require_once 'classes/Rezervacija.php';

$filmID = $_GET['id'];
$film = Film::vratiPoID($filmID);
$trailer = str_replace("watch?v=", "embed/", $film['trailer']);

function ocisti($input) {
  $input = mysqli_real_escape_string(Database::getInstance()->getConnection(), $input);
  $input = trim($input);
  $input = stripslashes($input); // removes / from sting
  $input = htmlspecialchars($input);
  $input = str_replace('"', "", $input);
  $input = str_replace("'", "", $input);

  return $input;
}

$poruka = array(); // Niz sa greskama
$ime = '';
$adresa = '';
$brojTelefona = '';
$racun = '';

if (isset($_POST['porudzbina'])) {
  $ime = $_POST['ime'];
  $adresa = $_POST['adresa'];
  $brojTelefona = $_POST['brojTelefona'];
  $racun = $_POST['racun'];
  $fail = false;
  $failMsg = "<div class='container-fluid'>
                                        <div class='row'>
                                            <div class='col-md-10 col-sm-10 offset-sm-1 offset-md-1 p-0 mt-5'>
                                                <div class='alert alert-dismissible alert-danger'>
                                                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                    <strong>Rezervacija nije uspela.</strong>.
                                                </div>
                                            </div>
                                        </div>
                                    </div>";


  if (empty($ime)) {
    $poruka['ime'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite ime.</label></p>';
    $fail = true;
  } else {
    $ime = ocisti($ime);
  }

  if (empty($adresa)) {
    $poruka['adresa'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite adresu.</label></p>';
    $fail = true;
  } else {
    $adresa = ocisti($adresa);
  }

  if (empty($brojTelefona)) {
    $poruka['brojTelefona'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite broj telefona.</label></p>';
    $fail = true;
  } else {
    $brojTelefona = ocisti($brojTelefona);
  }

  if (empty($racun)) {
    $poruka['racun'] = '<p class="error-p"><label class="text-danger error">Molimo Vas unesite račun.</label></p>';
    $fail = true;
  } else {
    $racun = ocisti($racun);
  }

  if (count($poruka) == 0) {
    $props = [
      'ime' => $ime,
      'adresa' => $adresa,
      'brojTelefona' => $brojTelefona,
      'racun' => $racun,
      'datum' => date('Y-m-d H:i:s'),
      'korisnik_id' => $_SESSION['korisnik']['id'],
      'film_id' => $filmID
    ];
    if (Rezervacija::dodaj($props)) {
      $_SESSION['rezervacija'] = "<div class='container-fluid'>
                                            <div class='row'>
                                                <div class='col-md-10 col-sm-10 offset-sm-1 offset-md-1 p-0 mt-5'>
                                                    <div class='alert alert-dismissible alert-success'>
                                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                                        <strong>Rezervacija uspešno sačuvana.</strong>.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
      $ime = '';
      $adresa = '';
      $brojTelefona = '';
      $racun = '';
    } else {
      $fail = true;
    }
  }
}

?>

<?php require_once 'includes/header.php'; ?>

<?php

if (isset($fail) && $fail) echo $failMsg;


if (isset($_SESSION['rezervacija'])) {
  echo $_SESSION['rezervacija'];
  unset($_SESSION['rezervacija']);
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-sm-10 offset-sm-1 offset-md-1" id="first-column">
      <h1 id="movie-title"><?php echo $film['naziv']; ?> (<?php echo $film['godina']; ?>)</h1>
      <iframe width="100%" height="80%" src="<?php echo $trailer; ?>"></iframe>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-sm-10 offset-sm-1 offset-md-1" id="movie-desc">
      <div class="card">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
              <img src="<?php echo $film['slika']; ?>" alt="Banner1">
            </div>
            <div class="col-md-9 movie-info">
              <div class="text-left">
                <p>Naziv: <?php echo $film['naziv']; ?></p>
                <p>Duzina trajanja: <?php echo $film['trajanje']; ?> minuta.</p>
                <p>Žanr: <?php echo $film['zanr']; ?></p>
                <p>Cena: 300 RSD</p>
                <p>Režiser: <?php echo $film['direktor']; ?></p>
                <p>Uloge: <?php echo $film['glumci']; ?></p>
              </div>
            </div>
            <p id="sadrzaj-p">Sadrzaj: <br><?php echo $film['kontent']; ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12" style="text-align:center;">
      <?php if (Korisnik::ulogovan()) { ?>
        <button style="text-align: center;" type="submit" class="poruci-btn btn btn-xs btn-danger" data-target="#poruciModal" data-toggle="modal">Poruči kartu !</button>
      <?php } else { ?>
        <a href="prijava.php" style="text-align: center;" class="poruci-btn btn btn-xs btn-danger">Poruči kartu !</a>
      <?php } ?>
    </div>
  </div>
</div>


<div class="modal" id="poruciModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Poruči kartu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" class="poruci-form">
          <fieldset>
            <div class="form-group">
              <input type="text" name="ime" class="form-control" id="exampleInputPassword1" value="<?php if (isset($ime)) echo $ime; ?>" placeholder="Unesite ime">
              <?php if (array_key_exists('ime', $poruka)) echo $poruka['ime']; ?>
            </div>

            <div class="form-group">
              <input type="text" name="adresa" class="form-control" id="exampleInputPassword1" value="<?php if (isset($adresa)) echo $adresa; ?>" placeholder="Unesite adresu">
              <?php if (array_key_exists('adresa', $poruka)) echo $poruka['adresa']; ?>
            </div>

            <div class="form-group">
              <input type="text" name="brojTelefona" class="form-control" id="exampleInputPassword1" value="<?php if (isset($brojTelefona)) echo $brojTelefona; ?>" placeholder="Unesite broj telefona">
              <?php if (array_key_exists('brojTelefona', $poruka)) echo $poruka['brojTelefona']; ?>
            </div>

            <div class="form-group">
              <input type="text" name="racun" class="form-control" id="exampleInputPassword1" value="<?php if (isset($racun)) echo $racun; ?>" placeholder="Unesite račun">
              <?php if (array_key_exists('racun', $poruka)) echo $poruka['racun']; ?>
            </div>


            <button type="submit" name="porudzbina" class="poruci-btn-modal btn btn-primary">Poruči</button><br>
            <button type="button" class="poruci-btn-modal btn btn-secondary" data-dismiss="modal">Zatvori</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>


<?php require_once 'includes/footer.php'; ?>