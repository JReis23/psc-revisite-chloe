

<?php   
require_once('../../inc/init.php');
nestPasAdmin();

$id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);



$elu_photo_select=$DB->prepare("SELECT photo FROM elu WHERE id_elu=:id");
$elu_photo_select->bindValue(':id',$id,PDO::PARAM_INT);
$elu_photo_select->execute();
$elu_photo_selectArray=$elu_photo_select->fetch(PDO::FETCH_ASSOC);

$imageLien=$elu_photo_selectArray['photo'];
unlink($_SERVER['DOCUMENT_ROOT'].RACINE_SITE.$imageLien);


$elu_delete=$DB->prepare("DELETE FROM elu WHERE id_elu =:id");
$elu_delete->bindValue(':id',$id,PDO::PARAM_INT);
$elu_delete->execute();
header("location:elu_liste.php");
exit;   // exit permet d'être sur que ça arrête la porsuit du programe


?>