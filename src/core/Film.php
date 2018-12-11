<?php
include("Bdd.php");

class Film extends Bdd
{
    public function getFilmsByTitre($titre, $id_genre)
    {
        $query = 'SELECT * FROM film WHERE titre LIKE concat("%", :titre, "%")';
        echo 1;
        if ($id_genre >= 0) {
            echo 2;
            $query .= " AND id_genre = \"" . $id_genre . "\"";
        }
        echo 3;
        $request = $this->getPDO()->prepare($query);
        echo 4;
        $request->execute([ "titre" => $titre ]);
        echo 5;
        return $request->fetchAll();
    }

}
?>