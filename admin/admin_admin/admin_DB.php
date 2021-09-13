
<?php
require_once("../../inc/init.php");
nestPasAdmin();

var_dump($_POST);
foreach ($_POST as $name => $val) 
{
    $_POST[$name] = htmlentities(trim(stripslashes($val)), ENT_QUOTES);
}

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$mdp=hash("sha256",$mdp);
$statut=$_POST['statut'];
$id=$_POST['id'];

if($_POST['action']=='Ajouter')
{
    



$ajoutAdmin=$DB->prepare("INSERT INTO administrateur (nom, prenom, email, mdp, statut) VALUES (:nom, :prenom ,:email, :mdp, :statut)");
$ajoutAdmin->bindValue(':nom', $nom, PDO::PARAM_STR);
$ajoutAdmin->bindValue(':prenom', $prenom, PDO::PARAM_STR);
$ajoutAdmin->bindValue(':email', $email, PDO::PARAM_STR);
$ajoutAdmin->bindValue(':mdp', $mdp, PDO::PARAM_INT);
$ajoutAdmin->bindValue(':statut', $statut, PDO::PARAM_INT);
$ajoutAdmin->execute();
header("location:admin_liste.php"); 
exit;


}

elseif($_POST['action']=='Modifier')
{

    $modifAdmin=$DB->prepare("UPDATE administrateur 
                            SET nom=:nom, prenom=:prenom, email=:email , statut=:statut  
                            WHERE id_administrateur=:id");
    $modifAdmin->bindValue(':nom', $nom, PDO::PARAM_STR);
    $modifAdmin->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $modifAdmin->bindValue(':email', $email, PDO::PARAM_STR);
    $modifAdmin->bindValue('id', $id, PDO::PARAM_INT);
    $modifAdmin->bindValue(':statut', $statut, PDO::PARAM_INT);
    $modifAdmin->execute();

    if(!empty($mdp))
    {
        $modifMdp=$DB->prepare("UPDATE administrateur 
                            SET mdp=:mdp
                            WHERE id_administrateur=:id");
        $modifMdp->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $modifMdp->execute();
    }

    //header("location:admin_liste.php"); 
    //exit;
    
}
echo '<a href="admin_liste.php">Revenir à la liste</a>';






?>