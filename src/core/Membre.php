<?php
class Membre extends Bdd {

    public function select() {
        $query = 'SELECT * FROM membre';
        $request = $this->getPDO()->prepare($query);
        $request->execute();
        return $request->fetchAll();
    }

    public function deleteById($id) {
        $query = 'UPDATE membre SET id_abo = NULL WHERE id_fiche_perso = :id';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id' => $id ]);
    }

    public function addById($id, $abo) {
        $query_count = 'select count(*) from membre';
        $request = $this->getPDO()->prepare($query_count);
        $request->execute();
        $count = $request->fetch();

        $query = 'INSERT INTO membre (id_membre, id_fiche_perso, id_abo, date_abo, id_dernier_film, date_dernier_film, date_inscription) VALUES (:id_membre, :id, :abo, now(), 1, now(), now())';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id_membre' => $count["count(*)"]+1, 'id' => $id, 'abo' => $abo ]);
    }

}