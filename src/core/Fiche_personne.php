<?php
class Fiche_personne extends Bdd {

    public function search($fiche_personne)
    {
        $query = 'SELECT id_fiche_perso, nom, prenom, id_abo FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso WHERE nom LIKE concat("%", :nom, "%") OR prenom LIKE concat("%", :nom, "%");';
        $request = $this->getPDO()->prepare($query);
        $request->execute([ "nom" => $fiche_personne ]);

        return $request->fetchAll();
    }

}
?>