<?php
include("Bdd.php");

class Genre extends Bdd {

    public function getGenres() {
        $query = 'SELECT * FROM genre';
        $request = $this->getPDO()->prepare($query);
        $request->execute();

        return $request->fetchAll();
    }

}