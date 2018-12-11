<?php 
include("../core/Bdd.php");
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
    <a class="navbar-brand" href="../../index.php">MYCINEMA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../../index.php">Home<span class="sr-only">(current)</span></a>
            </li class="nav-item">
            <a class="nav-link" href="recherche.php">Recherche</a>
            <li>

            </li>
        </ul>
    </div>
</nav>

<!--CONTAINER-->

<div class="container">
    <form class="form-inline my-2 my-lg-0" action="recherche.php" method="POST">
        <input name="titre" class="form-control mr-sm-2" type="search" placeholder="Recherche">
        <select name="genre">
            <option selected value="-1">Selectionnez un genre...</option>
            <?php
                include "../core/Genre.php";
                $genre = new Genre();

                foreach ($genre->getGenres() as $genre):
                    echo "<option value=\"".$genre["id_genre"]."\">". $genre["nom"] ."</option>";
                endforeach;
            ?>
        </select>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
    </form>
    <div class="box">
        <?php 
            if ($_POST["titre"]):
                include "../core/Film.php";
                $film = new Film();

                foreach ($film->search($_POST["titre"], (int)$_POST["genre"]) as $film):
                    echo $film["titre"] . "<br>";
                endforeach;
            endif;
        ?>
    </div>
</div>

</body>
</html>