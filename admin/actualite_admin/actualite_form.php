<?php
require_once("../../inc/init.php");

nestPasAdmin();  // eject la personne qui n'est pas administrateur


require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");


// Mode ajouter on laisse vide
$rubrique='1';
$titre='';
$accroche='';
$lienExterne='';
$contenu='';
$id='';
$action='ajouter';  // définir la variable qui sert a

$titreDuFormulaire='Ajouter un actualite';  
$boutonDuFormulaire='Ajouter l\'actualite';
$labelImage='Image';

$aujourdhui = date('Y-m-d');
var_dump($aujourdhui);
$dateAnneeDP=substr($aujourdhui,0,4);
$dateMoisDP=substr($aujourdhui,5,2);
$dateJourDP=substr($aujourdhui,8,2);

$dateAnneeFP=(substr($aujourdhui,0,4))+1;
$dateMoisFP=substr($aujourdhui,5,2);
$dateJourFP=substr($aujourdhui,8,2);

$selectJour='';
for($num=1;$num<10;$num++){$selectJour.='<option value="0'.$num.'">0'.$num.'</option>';}
for($num=10;$num<32;$num++){$selectJour.='<option value="'.$num.'">'.$num.'</option>';}


$selectMois='';
for($num=1;$num<10;$num++){$selectMois.='<option value="0'.$num.'">0'.$num.'</option>';}
for($num=10;$num<13;$num++){$selectMois.='<option value="'.$num.'">'.$num.'</option>';}

$selectAnnee='';
for($num=21;$num<100;$num++){$selectAnnee.='<option value="20'.$num.'">20'.$num.'</option>';}



//var_dump ($_GET);



//  Condition pour MODIFIER un actualite
if(!empty($_GET['id']))  //  Si o index id $_GET n'est pas vide
{
   

    $actualiteAmodifier=$DB->prepare("SELECT * FROM actualite WHERE id_actualite=:id ");
    $actualiteAmodifier->bindValue(':id', $_GET['id'],PDO::PARAM_INT);

    $actualiteAmodifier->execute();
    $actualiteAmodifierArray=$actualiteAmodifier->fetch(PDO::FETCH_ASSOC);


    //var_dump($actualiteAmodifierArray);

    $titre=stripslashes($actualiteAmodifierArray['titre']);
    $accroche=$actualiteAmodifierArray['accroche'];
    $lienExterne=$actualiteAmodifierArray['lien_externe'];
    $contenu=$actualiteAmodifierArray['contenu'];
    $image=$actualiteAmodifierArray['image'];
    $action='modifier';
    $id=$_GET['id'];
    $titreDuFormulaire='Modifier l\'actualite : '.$titre;
   
   
    $rubrique=$actualiteAmodifierArray['rubrique']; //ça permet d'avoir la rubrique par défault

    $boutonDuFormulaire='Modifier l\'actualite';
    $labelImage='Modifier l\'image';
    
    $dateDebut=$actualiteAmodifierArray['date_debut'];
    $dateAnneeDP=substr($dateDebut,0,4);
    $dateMoisDP=substr($dateDebut,5,2);
    $dateJourDP=substr($dateDebut,8,2);

    $dateFin=$actualiteAmodifierArray['date_fin'];
    $dateAnneeFP=substr($dateFin,0,4);
    $dateMoisFP=substr($dateFin,5,2);
    $dateJourFP=substr($dateFin,8,2);

    $dateEvenement=$actualiteAmodifierArray['date_evenement'];
    $dateAnneeE=substr($dateEvenement,0,4);
    $dateMoisE=substr($dateEvenement,5,2);
    $dateJourE=substr($dateEvenement,8,2);
  
}


switch($rubrique)
       {
            case 1 :
                $couleur='pays';
                $nomRubrique='Le Pays';
                break;
            case 2 :
                $couleur='finance';
                $nomRubrique='Financez votre projet';
                break;
            case 3 :
                $couleur='foret';
                $nomRubrique='Bois et forêt';
                break;
            case 4 :
                $couleur='sante';
                $nomRubrique='Santé';
                break;
                         
       }

?>


<!--Formulaire HTML-->
<div class="container ">
    <h3 class="text-center mt-5"><?php echo $titreDuFormulaire?></h3>
    <div class="row  d-flex  justify-content-center">
        <div class="col-8 ">
            <form method="post"  enctype="multipart/form-data" action="actualite_DB.php">

                <label for="rubrique"  class="form-label  mt-3">Selectionnez la rubrique liée à cette actualité</label>
                <select class="form-select "  id="rubrique"  name="rubrique" aria-label="Default select example">
                    <option value="<?php echo $rubrique ?>"><?php echo $nomRubrique ?></option>
                    <option value="1">Le Pays</option>
                    <option value="2">Financez votre projet</option>
                    <option value="3">Bois et forêt</option>
                    <option value="4">Santé</option>
                </select>
                
                <!--Champ  du titre -->
                <label for="titre"  class="form-label ">Le titre de l'actualité </label>
                <input type="text"  class="form-control"   name="titre"   value="<?php echo $titre?>">

                <label for="accroche" class="form-label">L'accroche de l'actualité, qui apparaîtra dans le bloc "action/agenda" de chaque page et en complément du titre</label>
                <textarea type="text" class="form-control"  id="accroche" name="accroche" ><?php echo $accroche ?></textarea>
                <script>
                  CKEDITOR.replace( 'contenu' );
                </script>

                <label for="lienExterne"  class="form-label ">Indiquez un Lien externe vers l'évenement le cas échéant </label>
                <input type="text"  class="form-control" id="lienExterne"  name="lienExterne"   value="<?php echo $lienExterne?>">

                <div class="row my-5">
                <div class="col-12">Date de l'évenement le cas échéant</div>
                <div class="col-2">
                    <?php echo '<label class="form-label" for="dateJourE" ><i>jour</i></label>';
                    echo '<select class="form-select" name="dateJourE">';
                    echo '<option value="'.$dateJourE.'">'.$dateJourE.'</option>';
                    echo $selectJour; echo '</select>'; ?>
                </div>
                <div class="col-2">
                    <?php echo '<label class="form-label" for="dateMoisE" ><i>mois</i></label>';
                    echo '<select class="form-select" name="dateMoisE">';
                    echo '<option value="'.$dateMoisE.'">'.$dateMoisE.'</option>';
                    echo $selectMois; echo '</select>'; ?>
                </div>
                <div class="col-2">
                    <?php echo '<label class="form-label" for="dateAnneeE" ><i>année</i></label>';
                    echo '<select class="form-select" name="dateAnneeE">';
                    echo '<option value="'.$dateAnneeE.'">'.$dateAnneeE.'</option>';
                    echo $selectAnnee; echo '</select>'; ?>
                </div>
            </div>



                <div class="row my-5">
                    <div class="col-12">Date de début de publication</div>
                    <div class="col-2">
                        <?php echo '<label class="form-label" for="dateJourDP" ><i>jour</i></label>';
                        echo '<select class="form-select" name="dateJourDP">';
                        echo '<option value="'.$dateJourDP.'">'.$dateJourDP.'</option>';
                        echo $selectJour; echo '</select>'; ?>
                    </div>
                    <div class="col-2">
                        <?php echo '<label class="form-label" for="dateMoisDP" ><i>mois</i></label>';
                        echo '<select class="form-select" name="dateMoisDP">';
                        echo '<option value="'.$dateMoisDP.'">'.$dateMoisDP.'</option>';
                        echo $selectMois; echo '</select>'; ?>
                    </div>
                    <div class="col-2">
                        <?php echo '<label class="form-label" for="dateAnnee" ><i>année</i></label>';
                        echo '<select class="form-select" name="dateAnneeDP">';
                        echo '<option value="'.$dateAnneeDP.'">'.$dateAnneeDP.'</option>';
                        echo $selectAnnee; echo '</select>'; ?>
                    </div>
                </div>

             

                <div class="row my-5">
                    <div class="col-12">Date de fin de publication</div>
                    <div class="col-2">
                        <?php echo '<label class="form-label" for="dateJourFP" ><i>jour</i></label>';
                        echo '<select class="form-select" name="dateJourFP">';
                        echo '<option value="'.$dateJourFP.'">'.$dateJourFP.'</option>';
                        echo $selectJour; echo '</select>'; ?>
                    </div>
                    <div class="col-2">
                        <?php echo '<label class="form-label" for="dateMoisFP" ><i>mois</i></label>';
                        echo '<select class="form-select" name="dateMoisFP">';
                        echo '<option value="'.$dateMoisFP.'">'.$dateMoisFP.'</option>';
                        echo $selectMois; echo '</select>'; ?>
                    </div>
                    <div class="col-2">
                        <?php echo '<label class="form-label" for="dateAnneeFP" ><i>année</i></label>';
                        echo '<select class="form-select" name="dateAnneeFP">';
                        echo '<option value="'.$dateAnneeFP.'">'.$dateAnneeFP.'</option>';
                        echo $selectAnnee; echo '</select>'; ?>
                    </div>

                </div>



                <br/>
                <label for="contenu"  class="form-label ">Contenu de l'actualité le cas échéant</label>
                <textarea rows="15"   name="contenu"   id="contenu"  class="form-control"><?php echo $contenu ?></textarea>
                <script>
                  
                  CKEDITOR.replace( 'contenu' );
                
                </script>

                <?php
                if(!empty($_GET['id'])&&!empty($image))
                {
                    echo'Image actuelle <br>';
                    echo'<img   class="img-fluid  mt-5 border" style="max-width:300px"  src="'.RACINE_SITE.$image.'">';
                    echo'<br>';
                    echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="delete_image" 
                                name="delete_image">
                            <label class="form-check-label" for="delete_image">supprimer l\'image</label>
                        </div>';

                }

                ?>

                <label for="image" class="form-label  pt-3"><?php echo $labelImage ?></label> 
                <input type="file" name="image" id="image" class="form-control">


                <!--  hidden ça rend l'INPUT invisible  -->
                <input type="hidden" name="action"  value="<?php echo $action ?>">
                <input type="hidden"   name="id"  value="<?php echo $id ?> ">
                <button type="submit" class="btn btn-primary mt-4 mb-4"><?php echo $boutonDuFormulaire?></button>
            </form>
        </div>
    </div>

    
</div>



<?php
require_once("../../inc/footer.php");
require_once("../../inc/footer_partenaires.php");
require_once("../../inc/fin.php");

?>