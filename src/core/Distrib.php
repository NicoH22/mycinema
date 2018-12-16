<?php
class Distrib extends Bdd {

    public function getDistribs() {
        $query = 'SELECT * FROM distrib';
        $request = $this->getPDO()->prepare($query);
        $request->execute();

        return $request->fetchAll();
    }

}