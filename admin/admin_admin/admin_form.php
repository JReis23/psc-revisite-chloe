<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

$nom="";
$prenom="";
$email="";
$statut="";
$action="Ajouter";
$id="";

if($_GET['action']=='modifier')
{
    $adminAmodifier=$DB->prepare("SELECT * FROM administrateur WHERE id_administrateur=:id");
    $adminAmodifier->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $adminAmodifier->execute();
    $adminAmodifierArray=$adminAmodifier->fetch(PDO::FETCH_ASSOC);


    $nom=$adminAmodifierArray['nom'];
    $prenom=$adminAmodifierArray['prenom'];
    $email=$adminAmodifierArray['email'];
    $statut=$adminAmodifierArray['statut'];
    $action='Modifier';
    $id=$adminAmodifierArray['id_administrateur'];

    switch($statut)
    {
        case 1 :
            $nomStatut='Administrateur';
             break;
        
        case 2 :
            $nomStatut='Stagiaire';
            break;
                
    }

    
}

?>

<div class="container">
<h3 class="text-center mt-4"><?php echo $action ?> un administrateur </h3>
    <div class="row  d-flex justify-content-center">
        <div class="col-6 border border-success"> 
            <form method="post" action="admin_DB.php" >
                <label class="form-label   mt-4"  for="nom" >Nom</label>  
                <input type="text"  class="form-control"  required   id="nom"  name="nom"  value="<?php echo $nom ?>">

                <label class="form-label  mt-4" for="prenom">Prénom</label>
                <input type="text"  class="form-control"  required   id="prenom" name="prenom" value="<?php echo $prenom ?>">

                <label class="form-label  mt-4" for="email">Email</label>
                <input type="email" class="form-control"   required  id="email" name="email"  value="<?php echo $email ?>" >

                <label class="form-label  mt-4" for="statut">Statut</label>
                <select class="form-control"  required  id="statut" name="statut">
                    <?php
                if($action=='Modifier')
                    {echo'<option value="'.$statut.'">'.$nomStatut.'</option>';}
                else
                    {echo '<option selected value=""  >Selectionnez ici</option>';}
                    ?>
                
                    <option value="1">Administrateur</option>
                    <option value="2">Stagiaire</option>
                    
                                
                </select>

                <?php
                if($_GET['action']=='ajouter')
                {
                    echo '<label class="form-label  mt-4" for="mdp">Mot de passe </label>';
                    echo '<input  type="password" class="form-control"  required   id="mdp" name="mdp">';
                }
                elseif($_GET['action']=='modifier')
                {
                    echo '<label class="form-label  mt-4" for="mdp">Modifier le mot de passe </label>';
                    echo '<input  type="password" class="form-control" id="mdp" name="mdp">';
                                       
                }

                ?>
            

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="hidden" name="action" value="<?php echo $action ?>">  
                <button type="submit"  class="btn btn-primary  mt-5"><?php echo $action ?></button>
                

                
            </form>
        </div>


    </div>
</div>




<?php
require_once("../../inc/fin.php");
?>