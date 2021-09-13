<?php   //  requete Preparé
require_once('../../inc/init.php');
nestPasAdmin();
foreach ($_GET as $name => $val) {
    $_GET[$name] = htmlentities(trim(stripslashes($val)), ENT_QUOTES);
    }
$idPage=$_GET['id'];

$DB->query("DELETE FROM bloc_contenu WHERE id_bloc_contenu =$idPage");
$DB->query("DELETE FROM bloc_lien WHERE id_bloc_lien =$idPage");
$DB->query("DELETE FROM bloc_doc WHERE id_bloc_doc =$idPage");
$DB->query("DELETE FROM bloc_contact WHERE id_bloc_contact =$idPage");
$DB->query("DELETE FROM bloc_rapport WHERE id_bloc_rapport =$idPage");
$DB->query("DELETE FROM bloc_agenda WHERE id_bloc_agenda =$idPage");


$page_delete=$DB->prepare("DELETE FROM page WHERE id_page =:id");
$page_delete->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$page_delete->execute();
header("location:page_liste.php");
exit;   // exit permet d'être sur que ça arrête la porsuit du programe


?>