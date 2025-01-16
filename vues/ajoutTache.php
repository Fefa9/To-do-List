<?php
$title='Ajouter une tâche';
ob_start(); //mise en tampon du contenu
?>

<!-- Formulaire Bootstrap -->
<div class="container mt-4">


<!-- Formulaire avec une largeur de 50% -->
<form action="index.php?action=addT" method="POST" id="monform" class="needs-validation">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Définit la largeur à 50% (col-md-6) de ma page -->

         <!-- Champ intitulé -->
            <div class="mb-3">
                <label for="intitule" class="form-label">Intitulé</label>
                <input type="text" class="form-control <?php if (!empty($erreurs["intitule"])) echo 'is-invalid'; ?>" 
                name="intitule" id="intitule" 
                    value="<?php echo !empty($_POST["intitule"]) ? ($_POST["intitule"]) : ''; ?>" 
                    autocomplete="off">
                <?php if (!empty($erreurs["intitule"])): ?>
                    <div class="invalid-feedback">
                        <?php echo $erreurs["intitule"]; ?>
                    </div>
                <?php endif; ?>
            </div>

        <!-- Champ date -->
            <div class="mb-3">
                        <label for="jour" class="form-label">Date</label>
                        <input type="date" class="form-control <?php if (!empty($erreurs["jour"])) echo 'is-invalid'; ?>" 
                                name="jour" id="jour" 
                                value="<?php echo !empty($_POST["jour"]) ? ($_POST["jour"]) : ''; ?>" 
                                autocomplete="off">
                        <?php if (!empty($erreurs["jour"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $erreurs["jour"]; ?>
                            </div>
                        <?php endif; ?>
            </div>
          
        
            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary">Ajouter</button>

                <a href="index.php?"  class="btn btn-secondary">Annuler</a>

            </div>
            </div>
        </div>
    </form>
    </div>

             
            


<?php
$content = ob_get_clean();
include "vues/vuePrincipale.php";
?>