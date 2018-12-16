<?php
class Film extends Bdd
{
    public function search($titre, $id_genre, $id_distrib)
    {

        $query = 'SELECT * FROM film WHERE titre LIKE concat("%", :titre, "%")';

        if ($id_genre >= 0) {
            $query .= " AND id_genre = \"" . $id_genre . "\"";
        }

        if ($id_distrib >= 0) {
            $query .= " AND id_distrib = \"" . $id_distrib . "\"";
        }

        $request = $this->getPDO()->prepare($query);
        $request->execute([ "titre" => $titre ]);

        return $request->fetchAll();
    }

}
?>