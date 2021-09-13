<?php
require_once("../../inc/init.php");
nestPasAdmin();
require_once("../../inc/head.php");
require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

?>

<div class="container">
    <h3 class="text-center mt-4"> tester un truc</h3>
     <a href="page_liste.php">Revenir à la liste</a>
    <div class="row d-flex justify-content-center">
        <div class="col-6">
            <form method="post" action="test_DB.php">

            <label class="form-label" for="nom" >test</label>
            <input type="text" class="form-control"  id="nom" name="nom">




                

                <button class="btn btn-primary"  type="submit">test</button>
            </form>

        </div>
    </div>
</div>





<?php
require_once("../../inc/fin.php");
?>