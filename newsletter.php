<!--FORMULAIRE NEWSLETTER -->

<div class="container-fluid colorGrey text-light py-5 " style="box-shadow: 10px 10px 10px rgba(0, 0, 0,0.5 );">
    <div class="d-flex justify-content-center">
        <div class="row col-10 d-fluid justify-content-center">

            <div class ="col-12 col-md-7 text-center text-md-end px-5">
                <h3>ABONNEZ-VOUS À NOTRE NEWSLETTER !</h3>
                <p class ="fs-6 fst-italic">Les champs "Adresse mail" et "J'accepte de recevoir les informations liées au Pays Sud-Charente" sont obligatoires.</p>
            </div>

            <div class ="col-11 col-sm-7 col-md">
                <form method="post"  action="newsletterDB.php">

                    <div class=" input-group">
                        <input type="email" name="email" class="form-control Abonnement" placeholder="adresse email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button class=" btn-primary input-group-text Abonnement" id="basic-addon2">S'abonner</button>
                    </div>

                
                    <div class="row pt-2">

                        <div class="col-1">
                            <input class=" form-check-input"   type="radio" name="jeSuisDaccord" id="flexRadioDefault1">
                        </div>
                
                        <div class="col">
                            <label class=" form-check-label" for="flexRadioDefault1">J’accepte de recevoir les informations liées au Pays Sud-Charente</label> 
                        </div>

                    </div>
                

                </form>
            </div>

        </div>
    
    </div>


    <?php

    if(isset($_GET['newsletter'])==true)
    {
        if($_GET['newsletter']=='abonne')
        {
            echo '<h5 class="text-center"><i>Vous êtes bien abonné !</i></h5>';
        }
        else
        {
             echo '<h5 class="text-center"><i>N\'oubliez pas d\'accepter les conditions !</i></h5>';
        }


    }


    
    ?>

</div>
