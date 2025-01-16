<?
include 'modeles/modele.php';

echo "Fichier controleur.inc.php inclus avec succès";

function control_form($intitule,$jour) {
    $tErreurs = [];

    if (empty(trim($intitule))) {
        $tErreurs["intitule"] = "Reinseigner une tâche";
    }
    if (empty($jour)) {
        $tErreurs["jour"] = "Date requise ";    
   

    }
     
    return $tErreurs;

}

?>