<?php
class Historique extends Bdd {

    public function getHistorique() {
        $query = 'SELECT * FROM historique_membre INNER JOIN  ';
        $request = $this->getPDO()->prepare($query);
        $request->execute();

        return $request->fetchAll();
    }

}