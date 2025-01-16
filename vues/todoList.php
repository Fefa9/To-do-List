<?php
$title='Liste des tâches';
ob_start(); //mise en tampon du contenu
?>


<div class="table-container" >
        <table class="table table-striped table-bordered table-info  " style="width:700px">
            <thead >
                <tr>
                <th scope="col" style="text-align: center; color: #1c48bf; background-color: rgb(199, 188, 188);">Intitulé</th>
                <th scope="col" style="text-align: center; color: #1c48bf;  background-color: rgb(199, 188, 188);">Date</th>
                <!-- <th scope="col">Echéance</th>
                <th scope="col">Avancement</th>
                 -->
                </tr>
            </thead>
        <tbody >
        <?php
                foreach($taches as $tache){
           echo "<tr>";
           echo  "<th scope='row' style='text-align: center;'>$tache[intitule]</th>";
           echo  "<th scope='row' style='text-align: center;'>$tache[jour]</th>";
           //echo  "<th scope='row'>$tache[echeance]</th>";
           //echo  "<th scope='row'>$tache[avancement]</th>";

            
            echo "</tr>";

        }

        ?> 
            <tr>
                <td  colspan="2" style="text-align: center;">
                    <a href="index.php?action=addT" class="btn btn-success" >Ajouter une tâche</a>
                </td>
            </tr>
        </tbody>
        </table>
</div>



<?php
$content = ob_get_clean();
include "vues/vuePrincipale.php";
?>