<?php
require_once("../../inc/init.php");
nestPasAdmin();
print_r($_GET);

//j'ai pris le meme objet du footer_partenaire_supprime($fichierAsupprimer)//
$fichierAsupprimer=$DB->query("SELECT lien_photo FROM equipe WHERE id_equipe=$_GET[id]");
$fichierAsupprimerArray=$fichierAsupprimer->fetch();

unlink('../../'.$fichierAsupprimerArray['lien_photo'].'');


echo '<br>';
echo 'Le ID de la ligne que l\'on veut supprimer est '.$_GET['id'].' ! ';
echo 'Mon fruit preferé est '. $_GET['id']. '. ';
echo 'J\'ai '.$_GET['id'].' ans.';
$DB->query("DELETE FROM equipe WHERE id_equipe=$_GET[id]  ");

require_once("../../inc/head.php");
require_once("../../inc/nav.php");

echo 'L\'équipier a bien été supprimé !';
echo '<br>';
echo '<a href="equipe_liste.php">Revenir à la liste des équipiers.</a>';





require_once("../../inc/fin.php");
?>