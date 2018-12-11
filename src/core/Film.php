<?php
include("Bdd.php");

class Film extends Bdd
{
    public function getFilmsByTitre($titre)
    {
        $query = 'SELECT * FROM film WHERE titre LIKE concat("%", :titre, "%")';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'titre' => $titre ]);

        return $request->fetchAll();
    }
}
?>