<?php
class Membre extends Bdd {

    public function select() {
        $query = 'SELECT * FROM membre';
        $request = $this->getPDO()->prepare($query);
        $request->execute();
        return $request->fetchAll();
    }
    
    public function addById($id, $abo) {
        if ($abo < 0) {
            return false;
        }

        $query_count = 'select count(*) from membre';
        $request = $this->getPDO()->prepare($query_count);
        $request->execute();
        $count = $request->fetch();
        
        $query = 'INSERT INTO membre (id_membre, id_fiche_perso, id_abo, date_abo, id_dernier_film, date_dernier_film, date_inscription) VALUES (:id_membre, :id, :abo, now(), 1, now(), now())';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id_membre' => $count["count(*)"]+1, 'id' => $id, 'abo' => $abo ]);
    }

    public function updateById($id, $id_abo, $current_id_abo) {
        $query = 'UPDATE membre SET id_abo = :id_abo WHERE id_fiche_perso = :id AND id_abo = :current_id_abo;';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id' => $id, 'id_abo' => $id_abo, 'current_id_abo' => $current_id_abo ]);
    }
    
    public function deleteById($id, $id_abo) {
        $query = 'UPDATE membre SET id_abo = NULL WHERE id_fiche_perso = :id AND id_abo = :id_abo';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id' => $id, 'id_abo' => $id_abo ]);
    }
}