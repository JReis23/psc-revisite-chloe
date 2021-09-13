<?php
require_once('../../inc/init.php');
nestPasAdmin();
require_once('../../inc/head.php');
require_once('../../inc/nav_admin.php');
require_once('../../inc/nav.php');


$donneeLTD=$DB->query("SELECT * FROM donnee_territoire WHERE id_donnee_territoire=1");
$donneeLTDarray=$donneeLTD->fetch(PDO::FETCH_ASSOC);
//debug($donneeLTDarray);


$donnee4B=$DB->query("SELECT * FROM donnee_territoire WHERE id_donnee_territoire=2");
$donnee4Barray=$donnee4B->fetch(PDO::FETCH_ASSOC);
//debug($donnee4Barray);


$nbCommunesLTD=$donneeLTDarray['nb_communes'];
$nbCommunes4B=$donnee4Barray['nb_communes'];


$nbHabitantsLTD=$donneeLTDarray['nb_habitants'];
$nbHabitants4B=$donnee4Barray['nb_habitants'];

?>



<div class="container">

    <h3 class="text-center m-4">Mettre à jour les données</h3>
    <form class="" method= "post"  action="pays_territoire_DB"> 
           

        <div class="row d-flex justify-content-center">
        
            <div class="col-2 m-3 pb-3">
                    <h5><b>4B</b></h5>
                
                    <label class="form-label" for="nbCommunes4B">Nombre de communes</label>
                    <input required=""  class="form-control  nbCommunes"  type="text" id="nbCommunes4B" name="nbCommunes4B" pattern="[0-9]{1,2}" value="<?php echo $nbCommunes4B ?>">                 
                    <span id="aide_nbCommunes4B" style="color:blue; font-size : 0.8em" ></span>

                    <label class="form-label" for="nbHabitants4B">Nombre d'habitants</label>
                    <input required class="form-control" type="text" id="nbHabitants4B" name="nbHabitants4B" pattern="[0-9]{1,5}" value="<?php echo $nbHabitants4B ?>"> 
                    <span id="aide_nbHabitants4B" style="color:blue; font-size : 0.8em" ></span>
            </div>


            <div class="col-2 m-3 pb-3 ">
                    <h5><b>LTD</b></h5>

                    <label class="form-label" for="nbCommuneLTD">Nombre de communes</label>
                    <input required class="form-control" type="text" id="nbCommunesLTD" name="nbCommunesLTD" pattern="[0-9]{1,2}" value="<?php echo $nbCommunesLTD ?>"> 
                    <span id="aide_nbCommunesLTD" style="color:blue; font-size : 0.8em" ></span>
                    


                    <label class="form-label" for="nbHabitantsLTD">Nombre d'habitants</label>
                    <input required class="form-control" type="text" id="nbHabitantsLTD" name="nbHabitantsLTD" pattern="[0-9]{1,5}" value="<?php echo $nbHabitantsLTD ?>"> 
                    <span id="aide_nbHabitantsLTD" style="color:blue; font-size : 0.8em" ></span> 
            </div>

            <div class="col-12 d-flex justify-content-center">
                <button  type="submit" class="btn btn-primary mt-4 mb-4 ">Modifier</button>
            </div>
        </div>


            
    </form>
</div>


       

<?php
require_once('../../inc/footer.php');
require_once('../../inc/footer_partenaires.php');
require_once('../../inc/fin.php');

?>