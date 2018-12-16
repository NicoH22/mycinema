<?php
class Membre extends Bdd {

    public function select() {
        $query = 'SELECT * FROM membre';
        $request = $this->getPDO()->prepare($query);
        $request->execute();
        return $request->fetchAll();
    }

    public function deleteById($id) {
        $query = 'DELETE FROM membre WHERE id_fiche_perso = :id';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id' => $id ]);
    }

}