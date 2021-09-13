<?php

require_once("../../inc/init.php");
nestPasAdmin();
function enleverCaracteresSpeciaux($text) {
    $utf8 = array(
    '/[áàâãªäà@]/u' => 'a',
    '/[ÁÀÂÃÄ]/u' => 'A',
    '/[ÍÌÎÏ]/u' => 'I',
    '/[íìîï]/u' => 'i',
    '/[éèêë]/u' => 'e',
    '/[ÉÈÊË]/u' => 'E',
    '/[óòôõºö]/u' => 'o',
    '/[ÓÒÔÕÖ]/u' => 'O',
    '/[úùûü]/u' => 'u',
    '/[ÚÙÛÜ]/u' => 'U',
    '/ç/' => 'c',
    '/Ç/' => 'C',
    '/ñ/' => 'n',
    '/Ñ/' => 'N',
    
    '/—/' => '-', // conversion d'un tiret UTF-8 en un tiret simple
    '/[\']/u' => '', // guillemet simple
    '/[""]/u' => ' ', // guillemet simple
    '/[«»]/u' => ' ', // guillemet double
    '/ /' => ' ', // espace insécable (équiv. à 0x160)
    );
    return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }
  
    function nettoyerChaine($string) 
    {
        $string = preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
        $string = str_replace(' ', '_', $string);
        $string = preg_replace('/_+/', '_', $string);
        $string= strtolower($string);
        return $string;
    }

var_dump($_POST);
$titrePourNom=$_POST['titre'];
$titrePourNom=enleverCaracteresSpeciaux($_POST['titre']);
$titrePourNom= nettoyerChaine($titrePourNom);



if ($_POST['nom']!='menu')
{$nom=$titrePourNom;}


foreach ($_POST as $name => $val) {
    $_POST[$name] = htmlentities(trim(stripslashes($val)), ENT_QUOTES);
    }


$nom = str_replace(' ', '_', $nom);
$titre=$_POST['titre'];





$rubrique=$_POST['rubrique'];
$placement=$_POST['placement'];
//$description=$_POST['description'];
$description='';
$action=$_POST['action'];
$id=$_POST['id'];
if(empty($description)){$description=NULL;}

switch($rubrique)
    {
        case 1 : $nomRubrique='pays';break;
        case 2 : $nomRubrique='finance';break;
        case 3 : $nomRubrique='foret';break;
        case 4 :$nomRubrique='sante';break;             
    }

$nom=$nomRubrique.'_'.$nom;
$lien=$nom;

if ($action=='Ajouter')
{
    //ajouter une ligne sur la table page
    $createPage=$DB->prepare("INSERT INTO page (nom, titre,rubrique, placement, description, lien) 
                                VALUES (:nom, :titre, :rubrique, :placement,:description, :lien)");
    $createPage->bindParam(':nom',$nom,PDO::PARAM_STR);
    $createPage->bindParam(':titre',$titre,PDO::PARAM_STR);
    $createPage->bindParam(':rubrique',$rubrique,PDO::PARAM_INT);
    $createPage->bindParam(':placement',$placement,PDO::PARAM_INT);
    $createPage->bindParam(':description',$description,PDO::PARAM_STR);
    $createPage->bindParam(':lien',$lien,PDO::PARAM_STR);
    //$table='bloc_contenu';
    //$page=1;
    $createPage->execute();
    //Recuperer l'id de la page nouvellement créee
    $idPagePDOStat=$DB->prepare("SELECT id_page FROM page WHERE nom=:nom");
    $idPagePDOStat->bindParam(':nom',$nom,PDO::PARAM_STR);
    $idPagePDOStat->execute();
    $idPage=$idPagePDOStat->fetch(PDO::FETCH_ASSOC);
    var_dump($idPage);
    $idPage=$idPage['id_page'];

    //créer des lignes dans les sous-tables
    $table='bloc_contenu';
    
    $DB->query("INSERT INTO $table (id_$table) VALUES ($idPage)");

    $table='bloc_lien';
    $DB->query("INSERT INTO $table (id_$table) VALUES ($idPage)");

    $table='bloc_doc';
    $DB->query("INSERT INTO $table (id_$table) VALUES ($idPage)");

    $table='bloc_contact';
    $DB->query("INSERT INTO $table (id_$table) VALUES ($idPage)");

    $table='bloc_rapport';
    $DB->query("INSERT INTO $table (id_$table) VALUES ($idPage)");

    $table='bloc_agenda';
    $DB->query("INSERT INTO $table (id_$table) VALUES ($idPage)");

    //récuperer tous ces ID et les mettre a jour dan la table page
/*
    function insertId($bloc)
    {
        global $DB;
        global $idPage;
        $idcolonne='id_'.$bloc;
        $recupPDOStat=$DB->query("SELECT $idcolonne FROM $bloc WHERE page=$idPage");
        $recupArray=$recupPDOStat->fetch(PDO::FETCH_ASSOC);
        $recup=$recupArray[$idcolonne];

        var_dump($recup);
        var_dump($bloc);
        $DB->query("UPDATE page SET $bloc=$recup WHERE id_page=$idPage ");

    }
    insertId('bloc_lien');
    insertId('bloc_doc');
    insertId('bloc_contact');
insertId('bloc_contenu');
*/
}

//MODIFIER LES CARATEREISTIQUES PRINCIPALES DE LA PAGE

elseif($action=='Modifier')
{ echo 'on modifie...';
    $modifPage=$DB->prepare("UPDATE page SET nom=:nom, lien=:lien, titre=:titre, rubrique=:rubrique, placement=:placement, description=:description WHERE id_page=:id");
    //$modifPage=$DB->prepare("UPDATE page SET nom=:nom WHERE id_page=$id");  
    
$modifPage->bindParam(':nom',$nom,PDO::PARAM_STR);
$modifPage->bindParam(':titre',$titre,PDO::PARAM_STR);
$modifPage->bindParam(':rubrique',$rubrique,PDO::PARAM_INT);
$modifPage->bindParam(':placement',$placement,PDO::PARAM_INT);
$modifPage->bindParam(':id',$id,PDO::PARAM_INT);
$modifPage->bindParam(':description',$description,PDO::PARAM_STR);
$modifPage->bindParam(':lien',$lien,PDO::PARAM_STR);

$modifPage->execute(); 

}





//$location='location:'.RACINE_SITE.$lien.'';
//header($location);
header('location:page_liste.php');
exit;

echo '<a href="page_liste.php"> revenir à la liste</a>';
?>