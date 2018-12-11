<?php
class film extends Bdd
{
    private $films;

    function films($bdd)
    {
        $req = $bdd->getPDO()->query("SELECT * FROM film WHERE titre LIKE \"%" . $_POST["TEST"] . "%\"");
        return $req->fetchAll();
    }

    function getfilms() {
        $this->films;
    }
}
?>