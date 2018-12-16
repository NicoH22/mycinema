<?php
class Abonnement extends Bdd {

    public function selectById($id) {
        $query = 'SELECT * FROM abonnement where id_abo = :id';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ 'id' => $id ]);

        return $request->fetch()['nom'];
    }

}