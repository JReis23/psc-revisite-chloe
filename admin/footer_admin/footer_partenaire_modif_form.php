<?php
require_once ("../../inc/init.php");
require_once ("../../inc/head.php");
require_once ("../../inc/nav.php");

print_r($_GET);
$partenaireAmodifier=$DB->query("SELECT * FROM partenaire WHERE id_partenaire=$_GET[id] ");
$partenaireArray=$partenaireAmodifier->fetch();

echo '<pre>';
print_r ($partenaireArray);
echo '</pre>';
?>

<div class="container">
    <h3 class="mt-5">Modifier le partenaire</h3>

    <form class="mt-5 " method="post" action="footer_partenaire_modif_DB.php">
        <label class="form-label" for="nom">Nom</label>
        <input class="form-control" type="text" id="nom" name="nom" value="<?php echo $partenaireArray['nom']  ?>">

        <label class="form-label mt-4" for="logo">Logo</label>
        <input class="form-control" type="file" id="logo" name="logo" >

        <label class="form-label mt-4" for="adresse">Adresse web</label>
        <input class="form-control" type="text" id="adresse" name="adresse" value="<?php echo $partenaireArray['adresse']?>">

        <!--ceci permet de passer ID dans la variable $_POST de manière invisible. Comme ça l'utilisateur ne risque pas de le modifier par accident-->
        <input type="hidden" name="id_partenaire" id="id" class="form-control"  value="<?php echo $partenaireArray['id_partenaire'] ?>">


        <button class="btn btn-primary mb-5 mt-3" type="submit" value="modifier" name="modifier">Modifier partenaire</button>       

    </form>
    <p><a href="<?php echo RACINE_SITE ?>accueil.php">Revenir à l'accueil</a></p>


    <p><a href="<?php echo RACINE_SITE ?>admin/footer_admin/footer_partenaire_liste.php"><b>Revenir à la liste des partenaires</b></a></p>

</div>


