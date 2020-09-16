<?php 
    require_once 'classes/Film.php';
    $filmovi = Film::uzmiSve();
?>

<?php require_once 'includes/header.php'; ?>

    <!-- OWL CAROSEL -->
    <section id="banner-area">
        <div class="owl-carousel owl-theme">
            <?php foreach($filmovi as $film): ?>
                <div class="item">
                    <img src="<?php echo $film['slika']; ?>" alt="Banner1">
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- OWL CAROSEL -->

    <h1 class="title-heading">Cinematic Kragujevac</h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 address-info-div">
                <p class="address-info-p">
                Adresa: Mihajla Petrovića 56 <br>
                34000 Kragujevac <br><br>

                Telefon: +3816772373 <br><br>

                Radno vreme: Radno vreme zavisi od početka prve projekcije. <br><br>

                Cimenatic bioskop je opremljen sa: Real-D 3D i Digital 2D. <br>
                </p>
            </div>
            <div class="col-md-6 button-container">
                <a href="repertoar.php"><button class="btn btn-primary home-btn">BIOSKOPSKI PROGRAM</button></a><br>
                <a href="uskoro.php"><button class="btn btn-primary home-btn">FILMOVI KOJI USKORO STIŽU</button></a>
            </div>
        </div>
    </div>


<?php require_once 'includes/footer.php'; ?>
