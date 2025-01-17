<?php



    function getConnexion(){
        // extraction des parametres de connexion
        $file='param.ini';
        if(file_exists($file)){
            $tParam=parse_ini_file($file);
            //crée les variables $host,$port.....
            extract($tParam);
        }
        //
        $dsn="mysql:host=$host;port=$port;dbname=$bdd;charset-utf8";
        //creation objet PDO
        $pdo= new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $pdo;
    }

    function getList(){
        $connexion=getConnexion();

        $sql= "SELECT * FROM tache";
        $curseur=$connexion->query($sql);
        $records=$curseur->fetchAll(PDO::FETCH_ASSOC);

        // Formater la date pour chaque enregistrement 
        foreach ($records as &$record) { 
            $record['jour'] = date("d/m/Y", strtotime($record['jour']));
         }

        return($records);

    }

    function addTache($intitule,$jour){
        $connexion=getConnexion();

        $sql="INSERT INTO tache (intitule,jour) VALUES (:intitule,:jour)";
        $record=$connexion->prepare($sql);
        $record->bindParam(':intitule',$intitule);
        $record->bindParam(':jour',$jour);
        $record->execute();
        return($record);

    }

    function getTacheById($id){
        $connexion=getConnexion();

        $sql="SELECT * FROM tache WHERE id=:id";
        $curseur=$connexion->prepare($sql);
        $curseur->execute([':id'=>$id]);
        $record=$curseur->fetch(PDO::FETCH_ASSOC);

        return($record);

    }

    function deleteTache($id){
        $connexion=getConnexion();

        $sql= "DELETE FROM tache WHERE id=:id";
        $curseur= $connexion->prepare($sql);
        $curseur->execute([':id'=>$id]);
        $row= $curseur->rowCount();

        return($row);
    }

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