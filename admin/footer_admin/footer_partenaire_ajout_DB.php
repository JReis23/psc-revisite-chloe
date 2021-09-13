<?php
require_once ("../../inc/init.php");



debug($_POST);

debug($_FILES);


$nomPhoto=$_FILES['logo']['name'];
$photoDossier=$_SERVER['DOCUMENT_ROOT'] .''.RACINE_SITE.'inc/image/logo/'.$nomPhoto;
echo $nomPhoto;
echo'<br>';
echo $photoDossier;
echo '<br>';

copy($_FILES['logo']['tmp_name'],$photoDossier);

$logo='inc/image/logo/'.$_FILES['logo']['name'];
echo $logo;





$DB->query("INSERT INTO partenaire (nom, adresse,logo )
            VALUES('$_POST[nom]','$_POST[adresse]','$logo')");


//header("location:footer_partenaire_liste.php");
//
exit;
        
require_once ("../../inc/head.php");
require_once ("../../inc/nav.php");



echo "<b>Votre partenaire a bien été ajouté !</b>";
echo '<br><br>';
echo '<a href="footer_partenaire_liste.php">Revenir à la liste des partenaires en pied de page</a>';

require_once ("../../inc/footer.php");

?>

