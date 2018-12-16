<?php 
include "../core/Bdd.php";
include "../core/Fiche_personne.php";
include "../core/Membre.php";
include "../core/Abonnement.php";

$fp = new Fiche_personne();
$membre = new Membre();
$abo = new Abonnement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Cinema</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/style.css"/>
</head>
<body>

<!--HEADER-->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">MYCINEMA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
            </li class="nav-item">
                <a class="nav-link" href="recherche.php">Recherche</a>
            <li>
            <li>
                <a class="nav-link" href="membre.php">Membres</a>
            </li>
        </ul>
    </div>
</nav>

    <!--CONTAINER-->

    <div class="container">
        <form class="form-inline my-2 my-lg-0" action="membre.php" method="POST">
            <input name="nom" class="form-control mr-sm-2" type="search" placeholder="Recherche">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
        </form>

        <div class="box">
            <?php
                if ($_POST["method"] === 'add') {
                    $membre->addById($_POST["id"], $_POST["add_abo"]);
                    echo 'Abonnement ajouté : ' . $abo->selectById($_POST["add_abo"]);
                }
                if ($_POST["method"] === 'delete') {
                    $membre->deleteById($_POST["id_fiche_perso"], $_POST["id_abo"]);
                    echo 'Abonnement supprimé : ' . $abo->selectById($_POST["id_abo"]);
                }

                foreach ($fp->search($_POST["nom"]) as $fp):
                    echo $fp["nom"] . " " . $fp["prenom"] . " " . $abo->selectById($fp["id_abo"]);

                    echo "<form method='post' action='membre.php'>
                            <input name='id' value='" . $fp["id_fiche_perso"] . "' style='display: none'/>
                            <input name='method' value='add' style='display: none'/>
                            <select name='add_abo'>
                                <option selected value='-1'>Selectionnez un abonnement</option>";
                                foreach ($abo->select() as $abonnement):
                                    echo "<option value=\"" . $abonnement["id_abo"] . "\">" . $abonnement["nom"] . "</option>";
                                endforeach;
                    echo "</select>
                            <input type='submit' value='Ajouter un abonnement'/>                           
                        </form>
                        <form method='post' action='membre.php'>
                            <input name='id' value='" . $fp["id_abo"] . "' style='display: none'/>
                            <input name='method' value='update' style='display: none'/>
                            <input type='submit' value='Modifier un abonnement'/>                           
                        </form>
                        <form method='post' action='membre.php'>
                            <input name='id_fiche_perso' value='" . $fp["id_fiche_perso"] . "' style='display: none'/>
                            <input name='id_abo' value='" . $fp["id_abo"] . "' style='display: none'/>
                            <input name='method' value='delete' style='display: none'/>
                            <input type='submit' value='Supprimer un abonnement'/>                           
                        </form>";
                endforeach;
            ?>
        </div>
</div>

</body>
</html>