<?php 
require_once("../../inc/init.php");
nestPasAdmin();




$idPage=filter_var($_POST['id_page'],FILTER_SANITIZE_NUMBER_INT);
$nomRubrique=$_POST['nomRubrique'];

//MODIFIER LE CONTENU

$contenu=$_POST['contenu'];

$contenuUpdate=$DB->prepare("UPDATE bloc_contenu SET contenu=:contenu WHERE id_bloc_contenu=:id");
$contenuUpdate->bindValue(':contenu', $contenu,PDO::PARAM_STR);
$contenuUpdate->bindValue(':id', $idPage,PDO::PARAM_INT);
$contenuUpdate->execute();


//MODIFIER LE BLOC CONTACT
$blocActuAffichage=0;
if (isset($_POST['bloc_actu_affichage']))
{$blocActuAffichage=1;}
$blocActuOrdre=filter_var($_POST['bloc_actu_ordre'],FILTER_SANITIZE_NUMBER_INT);
$blocActuTitre=htmlentities(trim(stripslashes($_POST['titre_bloc_actu'])), ENT_QUOTES);
$blocActuUpdate=$DB->query("UPDATE page SET bloc_actu_titre='$blocActuTitre' , bloc_actu_affichage=$blocActuAffichage, bloc_actu_ordre=$blocActuOrdre WHERE id_page=$idPage");

//$blocActuUpdate=$DB->query("UPDATE page SET bloc_actu_titre=$blocActuTitre, bloc_actu_affichage=$blocActuAffichage, bloc_actu_ordre=$blocActuOrdre WHERE id_bloc_contenu=$idPage");
//$blocActuUpdate=$DB->prepare("UPDATE page SET bloc_actu_titre=:bloc_actu_titre, bloc_actu_affichage=:bloc_actu_affichage, bloc_actu_ordre=:bloc_actu_ordre WHERE id_bloc_contenu=:id");
/*$blocActuUpdate->bindValue(':bloc_actu_affichage', $blocActuAffichage,PDO::PARAM_INT);
$blocActuUpdate->bindValue(':bloc_actu_ordre', $blocActuOrdre,PDO::PARAM_INT);
$contenuUpdate->bindValue(':bloc_actu_titre', $blocActuTitre,PDO::PARAM_STR);
$blocActuUpdate->bindValue(':id', $idPage,PDO::PARAM_INT);
$blocActuUpdate->execute();

*/

//MODIFIER LES AGENDAS


$id_bloc_agenda=$idPage;
if(isset($_POST['affichage_agenda_bloc']))
    {$affichage_agenda_bloc=1;}
    else{$affichage_agenda_bloc=0;}
$titreBlocagenda=$_POST['titre_bloc_agenda'];
$ordreAgenda=filter_var($_POST['ordreAgenda'],FILTER_SANITIZE_NUMBER_INT);


for ($num=1; $num<13; $num++)
{
    $agenda[$num]=filter_var($_POST['agenda'.$num],FILTER_SANITIZE_NUMBER_INT);
    //$agenda[$num]=$_POST['agenda'.$num];
    if (empty($agenda[$num]))
    {
        $agenda[$num]=0;
    }   
}

$agendaAffichUpdate=$DB->query("UPDATE page SET 
bloc_agenda_affichage=$affichage_agenda_bloc
WHERE id_page=$idPage");

$agendasUpdate=$DB->query("UPDATE bloc_agenda SET

titre='$titreBlocagenda',
ordre=$ordreAgenda,
agenda1=$agenda[1],
agenda2=$agenda[2],
agenda3=$agenda[3],
agenda4=$agenda[4],
agenda5=$agenda[5],
agenda6=$agenda[6],
agenda7=$agenda[7],
agenda8=$agenda[8],
agenda9=$agenda[9],
agenda10=$agenda[10],
agenda11=$agenda[11],
agenda12=$agenda[12]


WHERE id_bloc_agenda=$id_bloc_agenda");




//MODIFIER LES LIENS
$id_bloc_lien=$idPage;
if(isset($_POST['affichage_lien_bloc']))
    {$affichage_lien_bloc=1;}
    else{$affichage_lien_bloc=0;}
$titreBloclien=$_POST['titre_bloc_lien'];
$ordreLien=filter_var($_POST['ordreLien'],FILTER_SANITIZE_NUMBER_INT);


for ($num=1; $num<13; $num++)
{
    $lien[$num]=filter_var($_POST['lien'.$num],FILTER_SANITIZE_NUMBER_INT);
    //$lien[$num]=$_POST['lien'.$num];
    if (empty($lien[$num]))
    {
        $lien[$num]=0;
    }   
}

    



$liensUpdate=$DB->query("UPDATE bloc_lien SET
affichage=$affichage_lien_bloc,
titre='$titreBloclien',
ordre=$ordreLien,
lien1=$lien[1],
lien2=$lien[2],
lien3=$lien[3],
lien4=$lien[4],
lien5=$lien[5],
lien6=$lien[6],
lien7=$lien[7],
lien8=$lien[8],
lien9=$lien[9],
lien10=$lien[10],
lien11=$lien[11],
lien12=$lien[12]
WHERE id_bloc_lien=$id_bloc_lien");
//var_dump($id_bloc_lien);

//MODIFIER LES DOCS
$id_bloc_doc=$idPage;
if(isset($_POST['affichage_doc_bloc']))
    {$affichage_doc_bloc=1;}
    else{$affichage_doc_bloc=0;}
$titreBlocDoc=$_POST['titre_bloc_doc'];
$ordreDoc=filter_var($_POST['ordreDoc'],FILTER_SANITIZE_NUMBER_INT);

for ($num=1; $num<13; $num++)
{
    $doc[$num]=filter_var($_POST['doc'.$num],FILTER_SANITIZE_NUMBER_INT);
    if (empty($doc[$num]))
    {
        $doc[$num]=0;
    }   
}

$docsUpdate=$DB->query("UPDATE bloc_doc SET 
affichage=$affichage_doc_bloc,
titre='$titreBlocDoc',
ordre=$ordreDoc,
doc1=$doc[1],
doc2=$doc[2],
doc3=$doc[3],
doc4=$doc[4],
doc5=$doc[5],
doc6=$doc[6],
doc7=$doc[7],
doc8=$doc[8],
doc9=$doc[9],
doc10=$doc[10],
doc11=$doc[11],
doc12=$doc[12]
WHERE id_bloc_doc=$id_bloc_doc");

//MODIFIER LES RAPPORTS


$id_bloc_rapport=$idPage;
if(isset($_POST['affichage_rapport_bloc']))
    {$affichage_rapport_bloc=1;}
    else{$affichage_rapport_bloc=0;}
$titreBlocrapport=$_POST['titre_bloc_rapport'];
$ordreRapport=filter_var($_POST['ordreRapport'],FILTER_SANITIZE_NUMBER_INT);

for ($num=1; $num<13; $num++)
{
    $rapport[$num]=filter_var($_POST['rapport'.$num],FILTER_SANITIZE_NUMBER_INT);
    if (empty($rapport[$num]))
    {
        $rapport[$num]=0;
    }   
}

$rapportsUpdate=$DB->query("UPDATE bloc_rapport SET 
affichage=$affichage_rapport_bloc,
titre='$titreBlocrapport',
ordre=$ordreRapport,
rapport1=$rapport[1],
rapport2=$rapport[2],
rapport3=$rapport[3],
rapport4=$rapport[4],
rapport5=$rapport[5],
rapport6=$rapport[6],
rapport7=$rapport[7],
rapport8=$rapport[8],
rapport9=$rapport[9],
rapport10=$rapport[10],
rapport11=$rapport[11],
rapport12=$rapport[12]
WHERE id_bloc_rapport=$id_bloc_rapport");


//MODIFIER LES CONTACTS

$ordreContact=filter_var($_POST['ordreContact'],FILTER_SANITIZE_NUMBER_INT);
if(isset($_POST['affichage_contact_bloc']))
    {$affichage_contact_bloc=1;}
else{$affichage_contact_bloc=0;}

if(isset($_POST['affichage_contact_equipe']))
    {$affichage_contact_equipe=1;}
else{$affichage_contact_equipe=0;}

if(isset($_POST['affichage_contact_bouton']))
    {$affichage_contact_bouton=1;}
else{$affichage_contact_bouton=0;}

$ContactAffichUpdate=$DB->query("UPDATE page SET 
bloc_contact_affichage=$affichage_contact_bloc
WHERE id_page=$idPage");

$id_bloc_contact=$idPage;
$equipe=$_POST['equipe'];

$contactUpdate=$DB->query("UPDATE bloc_contact SET 
ordre=$ordreContact,
equipier=$equipe,
equipier_affichage=$affichage_contact_equipe,
bouton_affichage=$affichage_contact_bouton

WHERE id_bloc_contact=$id_bloc_contact");

// MODIFIER LE MENU SI IL EXISTE
if ($_POST['id_menu']!=0)
{
    $idMenu=$idPage;
    $bandeau=$_POST['bandeau'];
    $bandeau= htmlentities(trim(stripslashes($bandeau)), ENT_QUOTES);

    $affichageMenuBandeau=0;
    if(isset($_POST['affichage_menu_bandeau']))
    {$affichageMenuBandeau=1;}
    $affichageMenuImage=0;
    if(isset($_POST['affichage_menu_image']))
    {$affichageMenuImage=1;}
    $affichageMenuTexte=0;
    if(isset($_POST['affichage_menu_texte']))
    {$affichageMenuTexte=1;}
    //$affichageMenu=$_POST['affichage_menu'];
    //$affichageMenuImage=$_POST['affichage=menu'];
    // $affichageMenu=$_POST['affichage_menu'];

    //modifier bandeau
    $modifMenu=$DB->prepare("UPDATE menu 
    SET bandeau=:bandeau,
    affichage_bandeau=:affichage_bandeau, affichage_image=:affichage_image, affichage_texte=:affichage_texte
     WHERE id_menu=:id_menu");
    $modifMenu->bindValue(':bandeau',$bandeau,PDO::PARAM_STR);
    $modifMenu->bindValue(':affichage_bandeau', $affichageMenuBandeau,PDO::PARAM_INT);
    $modifMenu->bindValue(':affichage_image',$affichageMenuImage,PDO::PARAM_INT);
    $modifMenu->bindValue(':affichage_texte',$affichageMenuTexte,PDO::PARAM_INT);
    $modifMenu->bindValue(':id_menu',$idMenu,PDO::PARAM_INT);

    $modifMenu->execute();

    // copier les nouvelles images des vignettes
    for($num=1;$num<7;$num++)
    {
        $imageArray['imageVignette'.$num]=$_POST['vignette'.$num.'OldImage']; // une variable qui contient les liens des images des 6 vignettes
        if (!empty($_FILES['vignette'.$num.'Image']['name']))
        {
            $name=$nomRubrique.'_vignette'.$num.'.jpg';
            $tmpName=$_FILES['vignette'.$num.'Image']['tmp_name'];
            copy($tmpName,$_SERVER['DOCUMENT_ROOT'].RACINE_SITE.'inc/image/img_menu/'.$name);
            
            $imageArray['imageVignette'.$num]='inc/image/img_menu/'.$name;
        }
    }
    //récuperer liste des id des vignettes à modifier
    $listeIdVignette=$DB->query("SELECT vignette1,vignette2,vignette3,vignette4,vignette5,vignette6 FROM menu WHERE id_menu=$idMenu" );
    $listeIdVignetteArray=$listeIdVignette->fetch(PDO::FETCH_ASSOC);

    $titre='a'; $texte='a'; $lien='a'; $nomLien='a'; $idVignette='0'; $affichage=0;
    //requete préparée pour récuperer le nom de la page en lien
    $recupNomLien=$DB->prepare("SELECT nom FROM page WHERE lien=:lien");
    $recupNomLien->bindParam(':lien',$lien,PDO::PARAM_STR);
    //requete preparée pour updater la vignette
    
    $updateVignette=$DB->prepare("UPDATE vignette 
                                SET affichage=:affichage, titre=:titre, texte=:texte, lien=:lien, lienNom=:lienNom, image=:image
                                WHERE id_vignette=:id_vignette");
    $updateVignette->bindParam(':titre',$titre,PDO::PARAM_STR);
    $updateVignette->bindParam(':texte',$texte,PDO::PARAM_STR);
    $updateVignette->bindParam(':lien',$lien,PDO::PARAM_STR);
    $updateVignette->bindParam(':lienNom',$lienNom,PDO::PARAM_STR);
    $updateVignette->bindParam(':affichage',$affichage,PDO::PARAM_INT);
    $updateVignette->bindParam(':id_vignette',$idVignette,PDO::PARAM_INT);
    $updateVignette->bindParam(':image',$image,PDO::PARAM_STR);
    for($num=1; $num<7;$num++)
    {
        $vignetteNum='vignette'.$num;
        $idVignette=$listeIdVignetteArray[$vignetteNum];

        if($idVignette!=0)
        {   $lien=$_POST['vignette'.$num.'Lien'];
            $recupNomLien->execute();
            $recupNomLienArray=$recupNomLien->fetch(PDO::FETCH_ASSOC);
            
            $affichage=0;
            if (isset($_POST['affichage_vignette'.$num]))
                {$affichage=1;}
            $lienNom=$recupNomLienArray['nom'];
            $lienNom=trim(stripslashes($lienNom));
            $titre=$_POST['vignette'.$num.'Titre'];
            $titre=htmlentities(trim(stripslashes($titre)),ENT_QUOTES);
            $texte=$_POST['vignette'.$num.'Texte'];
            $texte=htmlentities(trim(stripslashes($texte)),ENT_QUOTES);
           
            $image=$imageArray['imageVignette'.$num];
            $image=trim(stripslashes($image));

            //var_dump($lienNom);

            $updateVignette->execute();
        }
    }

    //SET titre=:titre, texte=:texte image=:image lien=:lien lienNom=:lienNom
    //WHERE id_vignette=:id_vignette");

    

}
//var_dump($_POST);
//var_dump($_FILES);
$pageRetour=RACINE_SITE.'admin/page_admin/page_template.php?nom='.$_POST['nom_page'];
$location='location:'.$pageRetour;
header("Pragma: no-cache");
header($location);
exit;
echo '<a href="'.$pageRetour.'"> revenir à la page</a>';
