<?php require_once 'includes/header.php'; ?>

<?php 

    require_once 'classes/Film.php';
    $filmovi = Film::uzmiSve();

?>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-12" id="left-div">

                <?php foreach($filmovi as $key=>$film): ?>

                    <?php if(!$film['uskoro']): ?>
                        <div class="card">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo $film['slika']; ?>" alt="Banner1">
                                    </div>
                                    <div class="col-md-8 movie-info">
                                        <div class="text-left">
                                            <h2><?php echo $film['naziv']; ?> (<?php echo $film['godina']; ?>)</h2>
                                            <p>Trajanje <?php echo $film['trajanje']; ?> Minuta</p>
                                            <p>Žanr: <?php echo $film['zanr']; ?></p>
                                            <p>Režiser: <?php echo $film['direktor']; ?></p>
                                        </div>
                                        <div class="text-right">
                                            <p><?php echo $film['dan']; ?></p>
                                            <p><?php echo $film['vreme']; ?></p>
                                            <a href="film.php?id=<?php echo $film['id']; ?>"><button class="btn btn-primary movie-info-btn">Detaljnije</button></a><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>     

            </div>

            <div class="col-md-4" id="right-div">
                <div class="card card-right">
                    <img src="https://images.hdqwalls.com/wallpapers/joker-movie-2019-poster-0n.jpg" alt="Banner1">
                    <p>Šest razloga zašto je Joker najznačajniji film u 2019. godini.</p>
                </div>

                <div class="card card-right">
                    <img src="https://images.alphacoders.com/995/995566.jpg" alt="Banner1">
                    <p>25. godina od izlaska starog dobrog klasika Lion King.</p>
                </div>

                <div class="card card-right">
                    <img src="https://images8.alphacoders.com/100/thumb-1920-1003220.png" alt="Banner1">
                    <p>Avengers Endgame obara rekorde.</p>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
