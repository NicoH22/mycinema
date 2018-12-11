<?php
    $req = $bdd->getPDO()->query("SELECT * FROM fiche_personne WHERE titre LIKE \"%". $_POST["TEST"] ."%\"");
    while ($res = $req->fetch())
    {
        echo $res["titre"]. "<br>";
    }
?>