<?php 

    require_once 'classes/Korisnik.php';
    require_once 'classes/Rezervacija.php';

    if(!Korisnik::ulogovan() || (Korisnik::ulogovan() && !$_SESSION['korisnik']['isAdmin'])){
        header("Location: index.php");
    }

    $karte = Rezervacija::uzmiSve();

    if(isset($_POST['izbrisi_rezervaciju'])){
        $rezervacijaID = $_POST['rezervacijaID'];
        if(Rezervacija::izbrisi($rezervacijaID)){
            header('Location: karte.php');
        }
    }

?>

<?php require_once 'includes/header.php'; ?>

    <div class="container-fluid">
        <div class="col-md-10 offset-md-1">
            <table class="table table-hover" id="table">
                <thead>
                    <tr>
                    <th class="table-heading" scope="col">Poručilac</th>
                    <th class="table-heading" scope="col">Adresa</th>
                    <th class="table-heading" scope="col">Telefon</th>
                    <th class="table-heading" scope="col">Ime filma</th>
                    <th class="table-heading" scope="col">Dan projekcije</th>
                    <th class="table-heading" scope="col">Vreme projekcije</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($karte as $key=>$karta): ?>

                        <?php if($key % 2 == 0){ ?>
                            <tr class="table-primary">
                                <th scope="row"><?php echo $karta['ime']; ?></th>
                                <td><?php echo $karta['adresa']; ?></td>
                                <td><?php echo $karta['telefon']; ?></td>
                                <td><?php echo $karta['naziv']; ?></td>
                                <td><?php echo $karta['dan']; ?></td>
                                <td><?php echo $karta['vreme']; ?>h</td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="rezervacijaID" value="<?php echo $karta['id']; ?>">
                                        <button type="submit" name="izbrisi_rezervaciju" class="izbrisi-rezervaciju-btn"><i class="far fa-times-circle"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php }else { ?>
                            <tr class="table-secondary">
                                <th scope="row"><?php echo $karta['ime']; ?></th>
                                <td><?php echo $karta['adresa']; ?></td>
                                <td><?php echo $karta['telefon']; ?></td>
                                <td><?php echo $karta['naziv']; ?></td>
                                <td><?php echo $karta['dan']; ?></td>
                                <td><?php echo $karta['vreme']; ?>h</td>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="rezervacijaID" value="<?php echo $karta['id']; ?>">
                                        <button type="submit" name="izbrisi_rezervaciju" class="izbrisi-rezervaciju-btn"><i class="far fa-times-circle"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>

                    <?php endforeach; ?>
                </tbody>
                <thead>
                    <tr>
                    <th class="table-heading" scope="col">Poručilac</th>
                    <th class="table-heading" scope="col">Adresa</th>
                    <th class="table-heading" scope="col">Telefon</th>
                    <th class="table-heading" scope="col">Ime filma</th>
                    <th class="table-heading" scope="col">Dan projekcije</th>
                    <th class="table-heading" scope="col">Vreme projekcije</th>
                    </tr>
                </thead>
            </table> 
        </div>
    </div>

<?php require_once 'includes/footer.php'; ?>
