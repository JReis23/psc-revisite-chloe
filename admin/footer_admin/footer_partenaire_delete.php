<?php
require_once ("../../inc/init.php");

debug($_GET);

$fichierAsupprimer=$DB->query("SELECT logo FROM partenaire WHERE id_partenaire=$_GET[id]");
$fichierAsupprimerArray=$fichierAsupprimer->fetch();
debug($fichierAsupprimerArray);
var_dump($fichierAsupprimerArray);
unlink('../../'.$fichierAsupprimerArray['logo'].'');

$DB->query("DELETE FROM partenaire WHERE id_partenaire=$_GET[id]");

header("location:footer_partenaire_liste.php");
exit;
require_once ("../../inc/head.php");
require_once ("../../inc/nav.php");

echo 'Le partenaire a bien été supprimé <br><br>';
echo '<a href="footer_partenaire_liste.php">Revenir sur la page detail</a>';
require_once ("../../inc/footer.php");



            


            
