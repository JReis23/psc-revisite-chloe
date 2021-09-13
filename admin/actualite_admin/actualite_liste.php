<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

$aujourdhui=date('Y/m/d');

//selecionne toutes  lignes de la table actualite DES ACTUS DONT LA DATE N'EST PAS PASSEE

 
$actualitePDOStat=$DB->query("SELECT *, DATE_FORMAT(date_debut, '%d/%m/%Y'),DATE_FORMAT(date_fin, '%d/%m/%Y'),DATE_FORMAT(date_evenement, '%d/%m/%Y') FROM actualite WHERE date_fin>='$aujourdhui' ORDER BY date_debut DESC");


// ON RECUPERE LES ACTUS DEPASSEES
$actualitePasseePDOStat=$DB->query("SELECT *, DATE_FORMAT(date_debut, '%d/%m/%Y'),DATE_FORMAT(date_fin, '%d/%m/%Y'),DATE_FORMAT(date_evenement, '%d/%m/%Y') FROM actualite WHERE date_fin<'$aujourdhui' ORDER BY date_fin DESC");  


// ONS STOCKE TOUT DANS DES ARRAYS !!!

$numActuPasseePays=0;
$numActuPasseeFinance=0;
$numActuPasseeForet=0;
$numActuPasseeSante=0;



while($actualitePasseeArray=$actualitePasseePDOStat->fetch(PDO::FETCH_ASSOC))
{
    // var_dump($actualitePasseeArray);
    
    switch($actualitePasseeArray['rubrique'])
    {   case 1 : $numActuPasseePays+=1;
             $actuPasseePays[$numActuPasseePays]['titre']= $actualitePasseeArray['titre'];
             $actuPasseePays[$numActuPasseePays]['dateFin']= $actualitePasseeArray['DATE_FORMAT(date_fin, \'%d/%m/%Y\')'];
             $actuPasseePays[$numActuPasseePays]['id']= $actualitePasseeArray['id_actualite'];
        break;

        case 2 : $numActuPasseeFinance+=1;
        $actuPasseeFinance[$numActuPasseeFinance]['titre']= $actualitePasseeArray['titre'];
        $actuPasseeFinance[$numActuPasseeFinance]['dateFin']= $actualitePasseeArray['DATE_FORMAT(date_fin, \'%d/%m/%Y\')'];
        $actuPasseeFinance[$numActuPasseeFinance]['id']= $actualitePasseeArray['id_actualite'];
        break;

        case 3 : $numActuPasseeForet+=1;
        $actuPasseeForet[$numActuPasseeForet]['titre']= $actualitePasseeArray['titre'];
        $actuPasseeForet[$numActuPasseeForet]['dateFin']= $actualitePasseeArray['DATE_FORMAT(date_fin, \'%d/%m/%Y\')'];
        $actuPasseeForet[$numActuPasseeForet]['id']= $actualitePasseeArray['id_actualite'];
        break;

        case 4 : $numActuPasseeSante+=1;
        $actuPasseeSante[$numActuPasseeSante]['titre']= $actualitePasseeArray['titre'];
        $actuPasseeSante[$numActuPasseeSante]['dateFin']= $actualitePasseeArray['DATE_FORMAT(date_fin, \'%d/%m/%Y\')'];
        $actuPasseeSante[$numActuPasseeSante]['id']= $actualitePasseeArray['id_actualite'];
        break;
    }
    
}

if (!isset($actuPasseePays)){$actuPasseePays='';}
if (!isset($actuPasseeFinance)){$actuPasseeFinance='';}
if (!isset($actuPasseeForet)){$actuPasseeForet='';}
if (!isset($actuPasseeSante)){$actuPasseeSante='';}


function listeActuDepassee($actuPassee, $numActuPassee ) // FONCTION QUI GENERE LA LISTE EN BAS DE PAGE DES DATES DEPASSEES
{
    $listeActuPassee='';
    for($var=1;$var<=$numActuPassee;$var+=1)
    {   
        $listeActuPassee.= $actuPassee[$numActuPassee]['dateFin'].
        '<a href="javascript:ouvre_popup(\'actualite_preview.php?id='.$actuPassee[$var]['id'].'\')">'.$actuPassee[$var]['titre'].
        '</a>-<i><a href="'.RACINE_SITE.'admin/actualite_admin/actualite_form.php?id='.$actuPassee[$var]['id'].'&action=modifier">modif</a>
        / 
        <a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER cet actualite ?\'))  
        document.location.href=\'actualite_delete_DB.php?id='.$actuPassee[$var]['id'].'\'">
        Suppr</a><br/></i>';
        
    }
    return $listeActuPassee;
}




?>

<script type="text/javascript"> // ICI LA FONCTION POUR OUVRIR UNE FENETRE POPUP POUR VISUALISER RAPIDEMENT UNE ACTUALITE COMPLETE SANS CHANGER DE PAGE
                function ouvre_popup(page) {
                window.open(page,"nom_popup","menubar=no, status=no, scrollbars=no, menubar=no, width=1200, height=800");
                }
            </script>



<div class="container">
    <h3>Liste des actualités</h3>
    <h5>Une actualité sans contenu n'apparaîtra pas sur la page d'accueil</5>

    <!--  Lien pour AJOUTER un actualite  -->
    <p><a href="<?php echo RACINE_SITE ?>admin/actualite_admin/actualite_form.php"><h4>Ajouter un actualité</h4></a>

    <div class="row">

        <?php
            while($actualite=$actualitePDOStat->fetch(PDO::FETCH_ASSOC))
            {
                switch($actualite['rubrique'])
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
                echo '<div class="col-2 border my-4 mx-1 py-3 actualiteListe '.$couleur.'">';
                //echo '<p>Id : '.$actualite['id_actualite'].'</p>';
                echo '<a href="javascript:ouvre_popup(\'actualite_preview.php?id='.$actualite['id_actualite'].'\')">
                <h5 class="text-center my-3">'.stripslashes($actualite['titre']).'</h5></a>';
                if(!empty($actualite['image']))
                {
                    echo '<img class="img-fluid" src="'.RACINE_SITE.''.$actualite['image'].'">';
                }
                
                
               
                echo '<p >'.$actualite['accroche'].'</p>';
                

                //$contenuAbrege=substr($actualite['contenu'],0,100).'(...)';  //On affiche seulement les 50 prémiers caracteres
                //echo '<p>Contenu : '.$contenuAbrege.'</p>';
                //echo '<p>Contenu : '.$actualite['contenu'].'</p>';
                echo '<p>Rubrique : '.$nomRubrique.'</p>';
                echo '<p>Début publication : '.$actualite['DATE_FORMAT(date_debut, \'%d/%m/%Y\')'].'</p>';
                echo '<p>Fin publication : '.$actualite['DATE_FORMAT(date_fin, \'%d/%m/%Y\')'].'</p>';
                echo '<p>Évenement : '.$actualite['DATE_FORMAT(date_evenement, \'%d/%m/%Y\')'].'</p>';
                if (empty($actualite['contenu']))
                echo 'sans contenu<br/>';
            

            // lien pour  MODIFIER l'actualite
                echo '<a href="'.RACINE_SITE.'admin/actualite_admin/actualite_form.php?id='.$actualite['id_actualite'].'&action=modifier">Modifier</a>';
                echo ' / ';

                //echo '<a href="actualite_delete_DB.php?id='.$actualite['id_actualite'].'&action=supprimer">Supprimer</a>';

                echo '<a href="#" onclick="if(confirm(\'Êtes-vous sûr de vouloir SUPPRIMER cet actualite ?\'))  
                document.location.href=\'actualite_delete_DB.php?id='.$actualite['id_actualite'].'\'">
                Supprimer</a>';  // message de confirmation onclick script java 
              


                echo '</div>';
            }
            
    
        ?>

    </div>
    <div class="row"><!-- AFFICHAGE DES ACTUS DEPASSEES-->
        <h3 class="m-5"> liste des actualités dont la date de fin de publication est passée </h3>
        <div class="col-3 border">
            <h5 class="text-center">Le Pays</h5>
            <?php echo listeActuDepassee($actuPasseePays, $numActuPasseePays );?>
        </div>
        <div class="col-3 border ">
        <h5 class="text-center">Financez votre projet</h5>
            <?php echo listeActuDepassee($actuPasseeFinance, $numActuPasseeFinance );?>
        </div>
        <div class="col-3 border ">
        <h5 class="text-center">Bois et forêt</h5>
            <?php echo listeActuDepassee($actuPasseeForet, $numActuPasseeForet );?>
        </div>
        <div class="col-3 border ">
        <h5 class="text-center">Santé</h5>
            <?php echo listeActuDepassee($actuPasseeSante, $numActuPasseeSante );?>
        </div>
            

        
    </div>
    
    
</div>

<br>


<?php
require_once("../../inc/fin.php");
?>