<?php 
require_once("../../inc/init.php");
require_once("../../inc/head.php");
echo '<pre>';
print_r($_POST);
echo '</pre>';

$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$id = $_POST['id_partenaire'];

$DB->query("UPDATE partenaire SET nom='$nom', adresse='$adresse' WHERE id_partenaire='$id' ");

header("location:footer_partenaire_liste.php");
exit;




require_once("../../inc/nav.php");

?>

<p>Le partenaire a bien été modifié !</p>
<a href="footer_partenaire_liste.php" button class="btn btn-primary mb-5 mt-3"><b>Revenir  Liste des partenaires en pied de page</b></a>















<?php
require_once("../../inc/fin.php");
?>