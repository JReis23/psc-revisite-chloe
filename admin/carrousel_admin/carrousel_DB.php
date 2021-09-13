<?php 
require_once("../../inc/init.php");

nestPasAdmin();



//var_dump($_POST);

//var_dump($_FILES);


//  $imageNom=$_FILES['image']

$affichage=0;



if (isset($_POST['affichage']))
{$affichage=1;}else{$affichage=0;}

$ordre=$_POST['ordre'];
$titre=htmlentities(trim(stripslashes($_POST['titre'])), ENT_QUOTES);
$accroche=htmlentities(trim(stripslashes($_POST['accroche'])), ENT_QUOTES);
$lien=htmlentities(trim(stripslashes($_POST['lien'])), ENT_QUOTES);
$id=$_POST['id'];
$alt=htmlentities(trim(stripslashes($_POST['alt'])), ENT_QUOTES);

$nom=($_FILES['image']['name']);
$tmp_name=($_FILES['image']['tmp_name']);

if($_FILES['image']['name'])
{   $imageCible='inc/image/carrousel/carrousel'.$id.'.jpg';
    copy($tmp_name,$_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$imageCible);
}


$DB->query("UPDATE carrousel SET ordre=$ordre, affichage=$affichage, accroche='$accroche',  alt='$alt', lien='$lien',titre='$titre' WHERE id_carrousel=$id ");





header('location:carrousel_liste.php');
exit;
echo '<a href="carrousel_liste.php">Revenir à la liste</a>';








require_once("../../inc/fin.php");

?>




