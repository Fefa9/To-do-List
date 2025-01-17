<?php
 require_once 'modele/modele.php';
 //require_once 'controleur/controleur.inc.php';



   // try {

// $connection=getConnexion();
// echo "connexion réussie.<br>";

// $taches=getList();

// //var_dump($taches);

// $ajout = addTache('Revision','21/01/2025');
// if ($ajout) {
//     echo "Ajout de tache réussi !.<br>";
// } else {
//     echo "Échec de l'ajout de tache.<br>";
// }

// $tache=getTacheById(2);
// if ($tache)echo "la tache exite.<br>";
//         else throw new PDOException("La tache ".$id ." n'existe pas.<br>");


// $ro=deleteTache(22);
// if ($ro)echo "la tache est supprimée.<br>";
//         else throw new PDOException("La tache ".$id ." n'existe pas.<br>");  



// }catch (PDOException $erreur){
//         echo $erreur->getMessage();
//     }



  try {
        if(!isset($_GET["action"])){
          $taches=getList();
          require "vues/todoList.php";
        } else {
          $action = $_GET["action"];
          switch ($action){

            case "addT":
              
              if($_GET['action']==='addT'){
                  if ($_SERVER["REQUEST_METHOD"] === "POST") {
                      if(isset($_POST["intitule"],$_POST["jour"])){
                          $erreurs= control_form($_POST["intitule"],$_POST["jour"]);
                          if(empty($erreurs)){
                            $ajout=addTache($_POST["intitule"],$_POST["jour"]);
                            $taches=getList();
                            require "vues/todoList.php";
                            exit();
                          }
                      }
                    require "vues/ajoutTache.php";
                    exit();
                  } else {
                    require "vues/ajoutTache.php";
                  }
                
              }
             
          }
        }

  } catch (Exception $e) {
    $msgErreur = $e->getMessage();
  }
?>