<?php   //  requete Preparé
require_once('../../inc/init.php');
nestPasAdmin();

$doc_fichier_select=$DB->prepare("SELECT lien FROM document WHERE id_document=:id");
$doc_fichier_select->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$doc_fichier_select->execute();
$doc_fichier_selectArray=$doc_fichier_select->fetch(PDO::FETCH_ASSOC);

$lien=$doc_fichier_selectArray['lien'];
unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$lien);





$doc_delete=$DB->prepare("DELETE FROM document WHERE id_document =:id");
$doc_delete->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$doc_delete->execute();
header("location:doc_liste.php");
exit;   // exit permet d'être sur que ça arrête la porsuit du programe


?>