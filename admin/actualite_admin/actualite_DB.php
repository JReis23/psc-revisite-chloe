<?php
require_once("../../inc/init.php");

nestPasAdmin();

//echo'voici mon $_POST';
//var_dump($_POST); 

//echo 'voici mon $_FILES';
//var_dump($_FILES); 





    
    $rubrique = $_POST['rubrique'];

    // htmlentities et addslashes empechent d'écrire du code dans les champs
    $titre = $_POST['titre'];
    $titre=htmlentities(addslashes($titre));

    $accroche=$_POST['accroche'];
    //$accroche=addslashes($accroche);  ne marche pas de tout, voir après !

    $lienExterne=$_POST['lienExterne'];

    $contenu=$_POST['contenu'];
    //$contenu=addslashes($contenu);  


    $action=$_POST['action'];
    $id=$_POST['id'];

    $imageLien='';

    $dateAnneeDP  =   $_POST['dateAnneeDP'];
    $dateMoisDP   =   $_POST['dateMoisDP'];
    $dateJourDP   =   $_POST['dateJourDP'];

    $dateAnneeFP  =   $_POST['dateAnneeFP'];
    $dateMoisFP   =   $_POST['dateMoisFP'];
    $dateJourFP   =   $_POST['dateJourFP'];

    $dateAnneeE  =   $_POST['dateAnneeE'];
    $dateMoisE   =   $_POST['dateMoisE'];
    $dateJourE   =   $_POST['dateJourE'];

    $dateDebut= $dateAnneeDP.'/'.$dateMoisDP.'/'.$dateJourDP;
    $dateFin=$dateAnneeFP.'/'.$dateMoisFP.'/'.$dateJourFP;
    if (empty($dateAnneeE) OR empty($dateAnneeE) OR empty($dateAnneeE))
    {$dateEvenement=NULL;}
    else {$dateEvenement=$dateAnneeE.'/'.$dateMoisE.'/'.$dateJourE;}
    


   

    if ($action=='ajouter') //   Revoir cette action
    { 
        if (!empty($_FILES['image']['name']))
        //copie l'image sur le serveur
        {
            $imageName=$_FILES['image']['name'];
            $imageTmpName=$_FILES['image']['tmp_name'];      

            copy($imageTmpName,$_SERVER['DOCUMENT_ROOT'].''.RACINE_SITE.'inc/image/img_actualite/'.$imageName);

            
            //Preparer un lien vers le fichier

            $imageLien='inc/image/img_actualite/'.$imageName;
            echo '<br>';

        }
    
        /*
        

        $dateDebut= date('Y/m/d');
        $dateFin=date('Y/m/d');
        $dateEvenement=date('Y/m/d');

        */

        
       
     
  
       
        
        $ajoutDB=$DB->prepare("INSERT INTO actualite (rubrique, titre, accroche, lien_externe, contenu, image, date_debut, date_fin, date_evenement)VALUES (:rubrique, :titre, :accroche , :lienExterne, :contenu, :imageLien, :dateDebut, :dateFin, :dateEvenement)");
        $ajoutDB->bindValue(':rubrique',$rubrique, PDO::PARAM_INT);
        $ajoutDB->bindValue(':titre', $titre, PDO::PARAM_STR);
        $ajoutDB->bindValue(':accroche', $accroche, PDO::PARAM_STR);
        $ajoutDB->bindValue(':lienExterne', $lienExterne, PDO::PARAM_STR);
        $ajoutDB->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $ajoutDB->bindValue(':imageLien', $imageLien, PDO::PARAM_STR);
        $ajoutDB->bindvalue(':dateDebut', $dateDebut, PDO::PARAM_STR);
        $ajoutDB->bindvalue(':dateFin', $dateFin, PDO::PARAM_STR);
        $ajoutDB->bindvalue(':dateEvenement', $dateEvenement, PDO::PARAM_STR);

        $ajoutDB->execute();

        
     

    }




    elseif($action=='modifier')  
    {
        $imgLienOBJ=$DB->query("SELECT image FROM actualite WHERE id_actualite=$id ");
            $imageLienArray=$imgLienOBJ->fetch(PDO::FETCH_ASSOC);
            var_dump($imageLienArray);
        if(isset($_POST['delete_image']))
            {unlink('../../'.$imageLienArray['image']);
                $imageLienArray['image']=NULL;
            }


        if (!empty($_FILES['image']['name']))   // supprimer et ajouter une nouvelle image si besoin
        {  if (!empty($imageLienArray['image']))       
            {unlink('../../'.$imageLienArray['image']);}

            $imageName=$_FILES['image']['name'];
            $imageTmpName=$_FILES['image']['tmp_name'];      
    
            copy($imageTmpName,$_SERVER['DOCUMENT_ROOT'].''.RACINE_SITE.'inc/image/img_actualite/'.$imageName);
           
            $imageLien='inc/image/img_actualite/'.$imageName;
            echo '<br>';

            //echo 'il y a une image';
        }

        else{
            //echo 'il n\'y a pas d\'image';
            $imageLien=$imageLienArray['image'];
        }

      

   


        // requete pour mettre à jour
       $modif=$DB->prepare("UPDATE actualite SET rubrique=:rubrique , titre=:titre , accroche=:accroche ,
                                                             contenu=:contenu, lien_externe = :lienExterne,
                                                              image='$imageLien', date_debut = :dateDebut,
                                                              date_fin=:dateFin, date_evenement=:dateEvenement WHERE id_actualite=:id");
       $modif->bindValue(':rubrique' ,$rubrique, PDO::PARAM_STR);
       $modif->bindValue(':titre' ,$titre, PDO::PARAM_STR);
       $modif->bindValue(':accroche' ,$accroche, PDO::PARAM_STR);
       $modif->bindValue(':lienExterne', $lienExterne, PDO::PARAM_STR);
       $modif->bindValue(':contenu' ,$contenu, PDO::PARAM_STR);
       $modif->bindvalue(':dateDebut', $dateDebut, PDO::PARAM_STR);
       $modif->bindvalue(':dateFin', $dateFin, PDO::PARAM_STR);
       $modif->bindvalue(':dateEvenement', $dateEvenement, PDO::PARAM_STR);

       $modif->bindValue(':id' ,$id, PDO::PARAM_STR);

       $modif->execute();
       // echo 'modifier';
     
    }

      header("location:actualite_liste.php");
     //echo '<a href="actualite_liste.php">revenir à la liste </a>';
     exit;


?>