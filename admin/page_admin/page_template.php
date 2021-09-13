<?php

require_once("../../inc/init.php");


//Récuperer des informations des composants de la page 
$pageInfo=$DB->prepare("SELECT * FROM page WHERE nom=:nom");
$pageInfo->bindValue(':nom',$_GET['nom'],PDO::PARAM_STR);
$pageInfo->execute();
$pageInfoArray=$pageInfo->fetch(PDO::FETCH_ASSOC);
// var_dump($pageInfoArray);
if ($pageInfoArray==FALSE)
{
    
   header('location:error404.php');
  
}

//Recuperer les visibilités et ordre

$blocAgendaAffichage=$pageInfoArray['bloc_agenda_affichage'];





//var_dump($pageInfoArray);
$idPage=$pageInfoArray['id_page'];
$titre_page=$pageInfoArray['titre'];
$contenu_special=$pageInfoArray['contenu_special'];
   // Ceci permet d'afficher le titre de la page en question.
   $menu=$pageInfoArray['menu'];
//couleurs de la page
$rubrique=filter_var($pageInfoArray['rubrique'],FILTER_SANITIZE_NUMBER_INT);
switch($rubrique)
       {
            case 1 :
                $couleur='pays';
                break;
            case 2 :
                $couleur='finance';
                break;
            case 3 :
                $couleur='foret';
                break;
            case 4 :
                $couleur='sante';
                break;
            default :
                $couleur='pays';
                break;                     
       }

//Récuperer le bloc_contenu

$blocContenu=$DB->query("SELECT contenu FROM bloc_contenu WHERE id_bloc_contenu=$idPage");
$blocContenuArray=$blocContenu->fetch(PDO::FETCH_ASSOC);
$contenu=$blocContenuArray['contenu'];

//RECUPERER LES actus

/*
$blocActu=$DB->prepare("SELECT *, DATE_FORMAT(date_debut, '%d/%m/%Y') FROM actualite WHERE rubrique=:rubrique LIMIT 4");
$blocActu->bindValue(':rubrique',$rubrique, PDO::PARAM_INT);
$blocActu->execute();

$liActu='';
while ($blocActuArray=$blocActu->fetch(PDO::FETCH_ASSOC))
{
   
    $liActu.= '<li>
                    <a href="'.RACINE_SITE.'actualite/actualite.php?id='                                    
                     .$blocActuArray['id_actualite'].'                   
                       " >'
                       .stripslashes($blocActuArray['titre']).'
                   </a>
                   <p class="d-inline">'.$blocActuArray['DATE_FORMAT(date_creation, \'%d/%m/%Y\')'].'</p>
              </li>';
      
}
*/


//RECUPERER LES AGENDA
if ($blocAgendaAffichage==1)
{   $aujourdhui=date('Y-m-d');
    $blocAgenda=$DB->query("SELECT * FROM bloc_agenda WHERE id_bloc_agenda=$idPage ");
    $blocAgendaArray=$blocAgenda->fetch(PDO::FETCH_ASSOC);
    $ordreAgenda=$blocAgendaArray['ordre'];
    $idAgendas='(';
    for ($num=1; $num<13; $num++)
    {
        $idAgendas.=filter_var($blocAgendaArray['agenda'.$num],FILTER_SANITIZE_NUMBER_INT);
        $idAgendas.=',';
    }
    $idAgendas=rtrim($idAgendas,',');
    $idAgendas.=')';

    $agendaTotalPDOStat=$DB->query("SELECT * FROM actualite WHERE id_actualite IN $idAgendas AND date_fin>'$aujourdhui' ORDER BY date_debut ASC");
    $num=1;


    while ($agendaTotalArray=$agendaTotalPDOStat->fetch(PDO::FETCH_ASSOC))
    {
        $agendaArray[$num]=$agendaTotalArray;
        $num++;
    }

    if (isset($agendaArray))
    {
        $countAgenda=count($agendaArray);
        $liAgenda="";
        for($num=1; $num<=$countAgenda; $num++)
        {
            $liAgenda.= '<li>&bull;
                            <a target="blank" href="'; 
                            if (empty($agendaArray[$num]['contenu']))
                            {$liAgenda.= $agendaArray[$num]['lien_externe'];}
                            else 
                            {$liAgenda.= RACINE_SITE.'actualite/actualite.php?id='.$agendaArray[$num]['id_actualite'];}                  
                            $liAgenda.='">';


                            $liAgenda.=$agendaArray[$num]['accroche'].'
                        </a>
                    </li>';
        }
    }
}

//RECUPERER LES LIENS

$blocLien=$DB->query("SELECT * FROM bloc_lien WHERE id_bloc_lien=$idPage");
$blocLienArray=$blocLien->fetch(PDO::FETCH_ASSOC);
$idLiens='(';
for ($num=1; $num<13; $num++)
{
    $idLiens.=filter_var($blocLienArray['lien'.$num],FILTER_SANITIZE_NUMBER_INT);
    $idLiens.=',';
}
$idLiens=rtrim($idLiens,',');
$idLiens.=')';

$lienTotalPDOStat=$DB->query("SELECT * FROM lien WHERE id_lien IN $idLiens ORDER BY adresse");
$num=1;


while ($lienTotalArray=$lienTotalPDOStat->fetch(PDO::FETCH_ASSOC))
{
    $lienArray[$num]=$lienTotalArray;
     $num++;
}

if (isset($lienArray))
{
$countLien=count($lienArray);
$liLien="";
for($num=1; $num<=$countLien; $num++)
{
$liLien.= '<li>&bull;
                <a href="'                                    
                 .$lienArray[$num]['adresse'].'                   
                   " target="blank">'
                   .$lienArray[$num]['nom'].'
               </a>
          </li>';
}
}


//RECUPERER LES DOCS
$blocDoc=$DB->query("SELECT * FROM bloc_doc WHERE id_bloc_doc=$idPage");
$blocDocArray=$blocDoc->fetch(PDO::FETCH_ASSOC);

$idDocs='(';
for ($num=1; $num<13; $num++)
{
    $idDocs.=filter_var($blocDocArray['doc'.$num],FILTER_SANITIZE_NUMBER_INT);
    $idDocs.=',';
}
$idDocs=rtrim($idDocs,',');
$idDocs.=')';


$docTotalPDOStat=$DB->query("SELECT * FROM document WHERE id_document IN $idDocs ORDER BY lien");

$num=1;
while ($docTotalArray=$docTotalPDOStat->fetch(PDO::FETCH_ASSOC))
{
    $docArray[$num]=$docTotalArray;
     $num++;
}

if (isset($docArray))
{

$countDoc=count($docArray);
$liDoc="";
for($num=1; $num<=$countDoc; $num++)
{
$liDoc.= '<li>&bull;
                <a href="'                                    
                .RACINE_SITE.$docArray[$num]['lien'].'                   
                   "download target="blank">'
                   .$docArray[$num]['nom'].'
               </a>
          </li>';
}
}

//RECUPERER LES RAPPORTS
$blocRapport=$DB->query("SELECT * FROM bloc_rapport WHERE id_bloc_rapport=$idPage");
$blocRapportArray=$blocRapport->fetch(PDO::FETCH_ASSOC);

$idRapports='(';
for ($num=1; $num<13; $num++)
{
    $idRapports.=filter_var($blocRapportArray['rapport'.$num],FILTER_SANITIZE_NUMBER_INT);
    $idRapports.=',';
}
$idRapports=rtrim($idRapports,',');
$idRapports.=')';



$rapportTotalPDOStat=$DB->query("SELECT * FROM document WHERE id_document IN $idRapports ORDER BY lien DESC");

$num=1;
while ($rapportTotalArray=$rapportTotalPDOStat->fetch(PDO::FETCH_ASSOC))
{
    $rapportArray[$num]=$rapportTotalArray;
     $num++;
}


if (isset($rapportArray))
{
    $countRapport=count($rapportArray);
    $liRapport="";
    for($num=1; $num<=$countRapport; $num++)
    {
        $liRapport.= '<li>&bull;
                        <a href="'                                    
                        .RACINE_SITE.$rapportArray[$num]['lien'].'                   
                        " download target="blank">'
                        .$rapportArray[$num]['nom'].'
                        </a>
                    </li>';
    }
}





$equipe=NULL;
$displayContactBouton=NULL;
//récuperer les infos du bloc contact si affiché

$blocContactAffichage=$pageInfoArray['bloc_contact_affichage'];

if($blocContactAffichage==1)
{   
    $blocContactPDOStat=$DB->query("SELECT * FROM bloc_contact WHERE id_bloc_contact=$idPage");
    $blocContactArray=$blocContactPDOStat->fetch(PDO::FETCH_ASSOC);
    $equipe=$blocContactArray['equipier'];
    $equipeAffichage=$blocContactArray['equipier_affichage'];
    $boutonAffichage=$blocContactArray['bouton_affichage'];
    $ordreContact=$blocContactArray['ordre'];
    //infos de l'equipier
    
    if($equipe!=NULL)
    {
        $contactPDOstat=$DB->query("SELECT * FROM equipe WHERE id_equipe=$equipe");
    $contactArray=$contactPDOstat->fetch(PDO::FETCH_ASSOC);
    $nomContact=$contactArray['nom'];
    $prenomContact=$contactArray['prenom'];
    $fonctionContact=$contactArray['fonction'];
    $telContact=$contactArray['tel'];
    $emailContact=$contactArray['email'];
    }
    $displayContactEquipe="";
    $displayContactBouton="";
    if($equipeAffichage!==1){$displayContactEquipe="d-none";}
    if($boutonAffichage!==1){$displayContactBouton="d-none";}
}

// Ordre des blocs
$ordreActu=$pageInfoArray['bloc_actu_ordre'];
$ordreLien=$blocLienArray['ordre'];
$ordreDoc=$blocDocArray['ordre'];
$ordreRapport=$blocRapportArray['ordre'];


//affichage des blocs à droite
$displayAgenda=1;
if($pageInfoArray['bloc_agenda_affichage']!==1){$displayAgenda="d-none";}
$displayLien="";
$displayActu=1;
if($pageInfoArray['bloc_actu_affichage']!==1){$displayActu="d-none";}
$displayLien="";
if($blocLienArray['affichage']!==1){$displayLien="d-none";}
$displayDoc="";
if($blocDocArray['affichage']!==1){$displayDoc="d-none";}
$displayRapport="";
if($blocRapportArray['affichage']!==1){$displayRapport="d-none";}
$displayContact="";
if($pageInfoArray['bloc_contact_affichage']!==1){$displayContact="d-none";}



require_once("../../inc/head.php");
if(adminConnecte())
{
  
    require_once("../../inc/nav_admin.php");
}

require_once("../../inc/nav.php");


if(adminConnecte())
{
  
   echo '<a href="'.RACINE_SITE.'admin/page_admin/page_template_form.php?id='.$pageInfoArray['id_page'].'">Éditer la page</a>';
}

?> 


<div class="container-fluid">
    <div class="container">

        <div class="row pt-5">

            <div class="col-12 col-md" >
               

                    <?php 
                    echo '<div  row py-3 px-5 " <!-- style="background: linear-gradient(rgba(0, 0, 0, 0.178), rgba(0, 0, 0, 0.0)) --> ;
                    border-radius : 30px 0 0 0 ;">';
                   // echo '<h1 class="pb-3 fw-bold">'.$titre_page.'</h1>';

                   
                    //echo $contenu;
                    if(!empty($contenu_special))
                    {   
                        echo '<h1 class="pb-3 fw-bold">'.$titre_page.'</h1>';
                        include($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$contenu_special);
                    }
                    else{
                        echo '<div class=" contenuEditable ">';
                         echo $contenu;
                         echo '</div>';
                        }

                    echo '</div>';
                    if ($menu!==NULL)
                    {   $includeMenu=$_SERVER['DOCUMENT_ROOT'].RACINE_SITE.'admin/page_admin/page_template_menu.php';
                        include($includeMenu);}
                    ?>

            </div>


            <div class="col-12 col-lg-3"> <!-- section droite -->

                <?php
                    $includeMenu=$_SERVER['DOCUMENT_ROOT'].RACINE_SITE.'admin/page_admin/page_template_droite.php';
                    include($includeMenu);
                ?>
 
            </div>
            

        </div>

    </div>

</div>





<?php
require_once("../../inc/footer.php");

require_once("../../inc/footer_partenaires.php");
require_once("../../inc/fin.php");

?>