<?php   //  requete Preparé
require_once('../../inc/init.php');
nestPasAdmin();




$lien_delete=$DB->prepare("DELETE FROM lien WHERE id_lien =:id");
$lien_delete->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$lien_delete->execute();
header("location:lien_liste.php");
exit;   // exit permet d'être sur que ça arrête la porsuit du programe


?>