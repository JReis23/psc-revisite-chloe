<?php 
require_once("../../inc/init.php");
nestPasAdmin();


require_once("../../inc/head.php");

require_once("../../inc/nav_admin.php");
require_once("../../inc/nav.php");

//Récuperer les infos de la page
$aujourdhui=date('Y-m-y');
$pageAmodifier=$DB->prepare("SELECT * FROM page WHERE id_page=:id");
$pageAmodifier->bindValue(':id',$_GET['id'],PDO::PARAM_INT);
$pageAmodifier->execute();
$pageAmodifierArray=$pageAmodifier->fetch(PDO::FETCH_ASSOC);
//var_dump($pageAmodifierArray);
$idPage=$pageAmodifierArray['id_page'];
$nomPage=$pageAmodifierArray['nom'];
$titrePage=$pageAmodifierArray['titre'];
$blocAgendaAffichage=$pageAmodifierArray['bloc_agenda_affichage'];



$blocContactAffichage=$pageAmodifierArray['bloc_contact_affichage'];
$menu=$pageAmodifierArray['menu'];

$rubrique=$pageAmodifierArray['rubrique'];
//Définir les couleurs selon la rubrique
switch($rubrique)
       {
            case 1 :
                $nomrubrique='pays';
                break;
            case 2 :
                $nomrubrique='finance';
                break;
            case 3 :
                $nomrubrique='foret';
                break;
            case 4 :
                $nomrubrique='sante';
                break;
            default :
                $nomrubrique='pays';
                break;                     
       }

     //  var_dump($nomrubrique);
//récuperer le contenu correspondant à la page
$contenuPDOStat=$DB->query("SELECT * FROM bloc_contenu WHERE id_bloc_contenu=$idPage");
$contenuArray=$contenuPDOStat->fetch(PDO::FETCH_ASSOC);
$contenu=$contenuArray['contenu'];

//récuperer les infos concerant le bloc Actu
$checkedAffichageActu='';
if ($pageAmodifierArray['bloc_actu_affichage']==1)
{$checkedAffichageActu='checked';}
$ordreActu=$pageAmodifierArray['bloc_actu_ordre'];


//récuperer les infos du menu si existant
if ($menu!=0)
{
    $formVignette='<div class=" container row d-flex justify-content-around mt-5">';
    $infoMenuPDOstat=$DB->query("SELECT * FROM menu WHERE id_menu=$menu");
    $infoMenuArray=$infoMenuPDOstat->fetch(PDO::FETCH_ASSOC);
    $bandeau=$infoMenuArray['bandeau'];
    $checkedBandeau='';
    if($infoMenuArray['affichage_bandeau']==1)
    {$checkedBandeau='checked';}

    $checkedImage='';
    if($infoMenuArray['affichage_image']==1)
    {$checkedImage='checked';}

    $checkedTexte='';
    if($infoMenuArray['affichage_texte']==1)
    {$checkedTexte='checked';}

    //var_dump($infoMenuArray);



    $id_vignette='';
    $selectPage='';
    $formVignette='';
    $infoVignettePDOStat=$DB->prepare("SELECT * FROM vignette WHERE id_vignette=:id_vignette");
    $infoVignettePDOStat->bindParam('id_vignette',$id_vignette,PDO::PARAM_INT);
    //récupérer la totalité des pages pour GENERER UNE LISTE DES PAGES
    $infoPagePDOStat=$DB->query("SELECT titre, lien FROM page WHERE rubrique=$rubrique AND placement>0 ORDER BY placement, nom");
    while($infoPageArray=$infoPagePDOStat->fetch(PDO::FETCH_ASSOC))
    {  // $infoPageArray['lien'] = htmlentities(trim(stripslashes($infoPageArray['lien'])), ENT_QUOTES);
        $selectPage.='<option value="'.$infoPageArray['lien'].'">'.$infoPageArray['titre'].'</option>';
        //var_dump($infoPageArray);
    }
    
    //bandeau
    
    
    $formVignette.='<div class=" container row d-flex justify-content-around mt-5">';
    $formVignette.='<h3 class="text-center mb-5">Éditer le menu</h3>';
    $formVignette.='<div class="col-12 mb-5">';
   
    $formVignette.='<div class="form-check form-check-inline"> 
        <input '.$checkedBandeau.' class="form-check-input" type="checkbox" value="1" id="affichage_menu_bandeau" 
            name="affichage_menu_bandeau" >
        <label class="form-check-label" for="affichage_menu_bandeau">afficher le bandeau</label>
        </div>
        
        <div class="form-check form-check-inline">
        <input '.$checkedImage.' class="form-check-input" type="checkbox" value="1" id="affichage_menu_image" 
            name="affichage_menu_image">
        <label class="form-check-label" for="affichage_menu_image">afficher les images</label>
        </div>

        <div class="form-check form-check-inline">
        <input '.$checkedTexte.' class="form-check-input" type="checkbox" value="1" id="affichage_menu_texte" 
            name="affichage_menu_texte">
        <label class="form-check-label" for="affichage_menu_texte">afficher les textes</label>
        </div>
        <br/>
        ';
        $formVignette.='
        <div class=" col menuRight mb-2 mt-4 mx-5 p-3 '.$nomrubrique.'" style="border-radius : 10px">
        <label class=" form-label" for="bandeau">Bandeau</label>
        <input type="text" class="form-control" id="bandeau" name="bandeau" value="'.$bandeau.'">
        </div>';
        
        $formVignette.='</div>';

        //boucle qui génère les vignettes-form
    for($num=1; $num<7;$num++)
    {
        $id_vignette=$infoMenuArray['vignette'.$num];
        $infoVignettePDOStat->execute();
        $infoVignetteArray=$infoVignettePDOStat->fetch(PDO::FETCH_ASSOC);
        
        $vignette[$num]=$infoVignetteArray;
        $display='';
        if ($vignette[$num]['affichage']==1)
        {$display='checked';}
        $formVignette.=
      ' <div class=" col-5 mx-1 mb-5 p-2 border menuRight '.$nomrubrique.'">
        <h5> Vignette '.$num.'</h5>

        <div class="form-check form-check-inline">
        <input '.$display.' class="form-check-input" type="checkbox" value="1" id="affichage_vignette'.$num.'" 
            name="affichage_vignette'.$num.'" >
        <label class="form-check-label" for="affichage_vignette'.$num.'">visible</label>
        </div>

        

        <br/>
        <label class="mt-3 form-label" for="vignette'.$num.'Titre">Titre</label>
        <input type="text" class="form-control" id="vignette'.$num.'Titre" name="vignette'.$num.'Titre" value="'.addslashes($vignette[$num]['titre']).'">
        <input type="hidden" name="vignette'.$num.'OldImage" value="'.$vignette[$num]['image'].'">';
        if(!empty($vignette[$num]['image']))
        {                   
            $formVignette.='
            <div class="form-check ">
            <input class="form-check-input" type="checkbox" value="'.NULL.'" id="delete_image" 
            name="vignette'.$num.'OldImage">
            <label class="form-check-label" for="delete_image">supprimer l\'image</label>
            </div>';
            $formVignette.= '<img  class="px-5 py-2 img-fluid" src="'.RACINE_SITE.$vignette[$num]['image'].'">';
        }

        $formVignette.='
        <label class="form-label" for="vignette'.$num.'Image">Modifier l\'image</label>
        <input type="file" class="form-control" id="vignette'.$num.'Image" name="vignette'.$num.'Image">
        <label class="form-label" for="vignette'.$num.'Texte">Texte</label>
        <textarea  class="form-control" id="vignette'.$num.'Texte" name="vignette'.$num.'Texte"rows="4">'.addslashes($vignette[$num]['texte']).'</textarea>
        <label class="form-label" for="vignette'.$num.'Lien">Cette vignette mène vers</label>
        <select class="form-control" id="vignette'.$num.'Lien" name="vignette'.$num.'Lien">';
        if(!empty($vignette[$num]['lien']))
        {
           $formVignette.= '<option value="'.$vignette[$num]['lien'].'">'.$vignette[$num]['lienNom'].'</option>';
        }
        $formVignette.='<option value="">aucune page</option>';
        $formVignette.=$selectPage;
        $formVignette.='</select>
       
        </div>
    ';
    }
    $formVignette.='</div>';
    //var_dump($vignette);

    
    


}

//récuperer le id des agendas du bloc de agenda
$aujourdhui=date('Y/m/d');
$blocAgendaPDOStat=$DB->query("SELECT * FROM bloc_agenda WHERE id_bloc_agenda=$idPage");
$blocAgendaArray=$blocAgendaPDOStat->fetch(PDO::FETCH_ASSOC);
//Génerer la liste des agendas disponibles
$agendaListe=$DB->query("SELECT * FROM actualite WHERE rubrique IN (0,$rubrique) AND date_fin>'$aujourdhui' ORDER BY date_debut DESC");
$agendaListeTotale='';
while ($agendaListeArray=$agendaListe->fetch())
{$agendaListeTotale.='<option value="'.$agendaListeArray['id_actualite'].'">'.$agendaListeArray['titre'].'</option>';}
//récuperer la visibilité des agendas
if ($blocAgendaAffichage==1)
{$agendaBlocAffichage="checked";}
else{$agendaBlocAffichage="";}
//récuperer l'ordre des agendas
$ordreAgenda=$blocAgendaArray['ordre'];


//récuperer le id des liens du bloc de lien
$blocLienPDOStat=$DB->query("SELECT * FROM bloc_lien WHERE id_bloc_lien=$idPage");
$blocLienArray=$blocLienPDOStat->fetch(PDO::FETCH_ASSOC);
//Génerer la liste des liens disponibles
$lienListe=$DB->query("SELECT * FROM lien WHERE rubrique IN(0,$rubrique) ORDER BY nom");
$lienListeTotale='';
while ($lienListeArray=$lienListe->fetch())
{$lienListeTotale.='<option value="'.$lienListeArray['id_lien'].'">'.$lienListeArray['nom'].'</option>';}
//récuperer la visibilité des liens
if ($blocLienArray['affichage']==1)
{$lienBlocAffichage="checked";}
else{$lienBlocAffichage="";}
//récuperer l'ordre des liens
$ordreLien=$blocLienArray['ordre'];

//récuperer le id des doc du bloc de docs
$blocDocPDOStat=$DB->query("SELECT * FROM bloc_doc WHERE id_bloc_doc=$idPage");
$blocDocArray=$blocDocPDOStat->fetch(PDO::FETCH_ASSOC);
//Génerer la liste des docs disponibles
$docListe=$DB->query("SELECT * FROM document WHERE rubrique IN(0,$rubrique) ORDER BY nom");
$docListeTotale='';
while ($docListeArray=$docListe->fetch())
{$docListeTotale.='<option value="'.$docListeArray['id_document'].'">'.$docListeArray['nom'].'</option>';}
//récuperer la visibilité des docs
if ($blocDocArray['affichage']==1)
{$docBlocAffichage="checked";}
else{$docBlocAffichage="";}
//récuperer l'ordre des docs
$ordreDoc=$blocDocArray['ordre'];

//récuperer le id des doc du bloc de rapport
$blocRapportPDOStat=$DB->query("SELECT * FROM bloc_rapport WHERE id_bloc_rapport=$idPage");
$blocRapportArray=$blocRapportPDOStat->fetch(PDO::FETCH_ASSOC);
//Génerer la liste des docs disponibles
$rapportListe=$DB->query("SELECT * FROM document WHERE rubrique IN(0,$rubrique) ORDER BY nom DESC");
$rapportListeTotale='';
while ($rapportListeArray=$rapportListe->fetch())
{$rapportListeTotale.='<option value="'.$rapportListeArray['id_document'].'">'.$rapportListeArray['nom'].'</option>';}
//récuperer la visibilité des docs
if ($blocRapportArray['affichage']==1)
{$rapportBlocAffichage="checked";}
else{$rapportBlocAffichage="";}
//récuperer l'ordre des docs
$ordreRapport=$blocRapportArray['ordre'];


//récuperer les infos du bloc contact

    $blocContactPDOStat=$DB->query("SELECT * FROM bloc_contact WHERE id_bloc_contact=$idPage");
    $blocContactArray=$blocContactPDOStat->fetch(PDO::FETCH_ASSOC);
    $equipe=$blocContactArray['equipier'];
    $equipeAffichage=$blocContactArray['equipier_affichage'];
    $boutonAffichage=$blocContactArray['bouton_affichage'];
    //var_dump($blocContactArray);
    //infos de l'equipier
    if($equipe!=NULL)
    {
    $contactPDOstat=$DB->query("SELECT * FROM equipe WHERE id_equipe=$equipe");
    $contactArray=$contactPDOstat->fetch(PDO::FETCH_ASSOC);
    $nomContact=$contactArray['nom'];
    $prenomContact=$contactArray['prenom'];
    $fonctionContact=$contactArray['fonction'];
    $telContact=$contactArray['tel'];
    $emailmContact=$contactArray['email'];
    }
    //Génerer la liste des équipiers disponibles
    $equipeListe=$DB->query("SELECT * FROM equipe ORDER BY nom");
    $equipeListeTotale='';
    while ($equipeListeArray=$equipeListe->fetch())
    {$equipeListeTotale.='<option value="'.$equipeListeArray['id_equipe'].'">'.$equipeListeArray['prenom'].' '.$equipeListeArray['nom'].'</option>';}
    //récuperer la visibilité du contact
    if ($blocContactAffichage==1)
    {$blocContactAffichage="checked";}
    else{$blocContactAffichage="";}

    if ($equipeAffichage==1)
    {$blocContactAffichageEquipe="checked";}
    else{$blocContactAffichageEquipe="";}
    if ($boutonAffichage==1)
    {$blocContactAffichageBouton="checked";}
    else{$blocContactAffichageBouton="";}

    //récuperer l'ordre du bloc contact
    $ordreContact=$blocContactArray['ordre'];

    //var_dump($equipeListeTotale);





$contactListe=$DB->query("SELECT * FROM bloc_contact WHERE id_bloc_contact=$idPage");
$contactArray=$contactListe->fetch(PDO::FETCH_ASSOC);
















?>
<form method="post" enctype="multipart/form-data" action="page_template_DB.php">
<div class="container-fluid">
    <div class="container-fluid">

        <div class="row pt-5">
            
            <div class="col-12 col-md-7"><!-- section_gauche -->
            <h5 class="fst-italic"> Modifiez la page : </h5> 
            <button type="submit" class="btn btn-primary">Modifier</button>
            <h1 class="pb-3 fw-bold"> <?php echo $titrePage ?></h1>
            
                <h3 class="fst-italic"> Texte Principal </h3> 

                <a href="javascript:ouvre_popup('../galerie_admin/galerie_selection.php')">Inserer une image depuis la galerie</a><br/>
                <script type="text/javascript">
                function ouvre_popup(page) {
                window.open(page,"nom_popup","menubar=no, status=no, scrollbars=no, menubar=no, width=700, height=500");
                }
            </script>
                <span>Pour ajouter une image, copier le lien depuis la galerie et cliquez sur l'icone d'image dans l'éditeur de texte. Collez l'adresse et ajuster la taille de l'image.</span>

                <label for="contenu"   class="form-label  pt-1"></label> 
                <textarea rows="15"   name="contenu"   id="contenu"  class="form-control"><?php echo $contenu ?></textarea>
                <script>
                  CKEDITOR.replace( 'contenu' );
                </script>
            
            <?php
            if ($menu!=0)
            {echo $formVignette;}
            ?>

            </div>


            <div class="col-12 col-lg-5"> <!-- section droite -->

            <div class="row">

            <div class="col-12 col-md-6 col-lg-6 pb-5  " > <!--menu_de_droite--><!--BLOC ACTION/AGENDA-->
                    <div class="p-3 text-center text-md-start menuRight <?php echo $nomrubrique ?>">
                    <p class="text-center fst-italic">bloc destiné aux actions et évenements</p>

                    <div class="row">

                        <div class="col">
                            <label class="form-label" for ="titre_bloc_agenda">Titre du bloc</label>
                            <input type="text" class="form-control" id="titre_bloc_agenda" name="titre_bloc_agenda" 
                            value="<?php echo $blocAgendaArray['titre'] ?>">
                        </div>

                        <div class="col-3">
                            <?php
                                echo '
                                    <label class="form-label" for="ordreAgenda" >Ordre</label>
                                    <select class="form-select" name="ordreAgenda"  id="ordreAgenda">';

                                    
                                        echo'<option value="'.$ordreAgenda.'">'.$ordreAgenda.'</option>';
                                        for($var=1;$var<7;$var++)
                                        {echo'<option value="'.$var.'">'.$var.'</option>';}

                                echo' </select>';  
                                
                                ?>
                        </div>
                    </div>

                        

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_agenda_bloc" 
                                name="affichage_agenda_bloc" <?php echo $agendaBlocAffichage ?>>
                            <label class="form-check-label" for="affichage_agenda_bloc">visible</label>
                        </div>
                        <br/>
                        <?php
                        
                        $agendaExistant=$DB->prepare("SELECT * FROM actualite WHERE id_actualite=:id AND date_fin>'$aujourdhui'");
                        $agendaExistant->bindParam(':id',$idAgenda,PDO::PARAM_INT);
                        for($numAgenda=1;$numAgenda<13;$numAgenda++)
                        {   $agenda='agenda'.$numAgenda;
                           
                            
                            $idAgenda=$blocAgendaArray[$agenda];

                            $agendaExistant->execute();
                            $agendaExistantArray=$agendaExistant->fetch(PDO::FETCH_ASSOC);
                         
                            echo '<select class="mt-1 form-select" id="'.$agenda.'" name="'.$agenda.'">';
                                if(!empty($agendaExistantArray['titre']))
                                {
                                    echo '<option value="'.$agendaExistantArray['id_actualite'].'">'.$agendaExistantArray['titre'].'</option>'; 
                                }
                                echo '<option value="NULL">Aucun</option>';
                                echo $agendaListeTotale;
                            
                            echo '</select>';

                        }
                        ?>
                    </div>
                </div>


            
   
                <div class="col-12 col-md-6 col-lg-6 pb-5  " > <!--menu_de_droite--><!--bloc lien-->
                    <div class="p-3 text-center text-md-start menuRight <?php echo $nomrubrique ?>">
                    <p class="text-center fst-italic">bloc destiné à des liens externes</p>

                    <div class="row">

                        <div class="col">
                            <label class="form-label" for ="titre_bloc_lien">Titre du bloc</label>
                            <input type="text" class="form-control" id="titre_bloc_lien" name="titre_bloc_lien" 
                            value="<?php echo $blocLienArray['titre'] ?>">
                        </div>

                        <div class="col-3">
                            <?php
                                echo '
                                    <label class="form-label" for="ordreLien" >Ordre</label>
                                    <select class="form-select" name="ordreLien"  id="ordreLien">';

                                    
                                        echo'<option value="'.$ordreLien.'">'.$ordreLien.'</option>';
                                        for($var=1;$var<7;$var++)
                                        {echo'<option value="'.$var.'">'.$var.'</option>';}

                                echo' </select>';  
                                
                                ?>
                        </div>
                    </div>

                        

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_lien_bloc" 
                                name="affichage_lien_bloc" <?php echo $lienBlocAffichage ?>>
                            <label class="form-check-label" for="affichage_lien_bloc">visible</label>
                        </div>
                        <br/>
                        <?php
                        
                        $lienExistant=$DB->prepare("SELECT * FROM lien WHERE id_lien=:id");
                        $lienExistant->bindParam(':id',$idLien,PDO::PARAM_INT);
                        for($numLien=1;$numLien<13;$numLien++)
                        {   $lien='lien'.$numLien;
                           
                            
                            $idLien=$blocLienArray[$lien];

                            $lienExistant->execute();
                            $lienExistantArray=$lienExistant->fetch(PDO::FETCH_ASSOC);
                         
                            echo '<select class="mt-1 form-select" id="'.$lien.'" name="'.$lien.'">';
                                if(!empty($lienExistantArray['nom']))
                                {
                                    echo '<option value="'.$lienExistantArray['id_lien'].'">'.$lienExistantArray['nom'].'</option>'; 
                                }
                                echo '<option value="NULL">Aucun</option>';
                                echo $lienListeTotale;
                            
                            echo '</select>';

                        }
                        ?>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 pb-5  " > <!--menu_de_droite--> <!--bloc doc-->
                    <div class="p-3 text-center text-md-start menuRight <?php echo $nomrubrique ?>">
                        <p class="text-center fst-italic">bloc destiné à des documents téléchargeables</p>

                        <div class="row">

                            <div class="col">
                                <label class="form-label" for ="titre_bloc_doc">Titre du bloc</label>
                                <input type="text" class="form-control" id="titre_bloc_doc" name="titre_bloc_doc" 
                                value="<?php echo $blocDocArray['titre'] ?>">
                            </div>

                            <div class="col-3">
                                <?php
                                    echo '
                                        <label class="form-label" for="ordreDoc" >Ordre</label>
                                        <select class="form-select" name="ordreDoc"  id="ordreDoc">';

                                        
                                            echo'<option value="'.$ordreDoc.'">'.$ordreDoc.'</option>';
                                            for($var=1;$var<7;$var++)
                                            {echo'<option value="'.$var.'">'.$var.'</option>';}
                        
                                    echo' </select>';  
                                    
                                    ?>
                            </div>
                        </div>

                       

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_doc_bloc" 
                                name="affichage_doc_bloc" <?php echo $docBlocAffichage ?>>
                            <label class="form-check-label" for="affichage_doc_bloc">visible</label>
                        </div>
                        <br/>
                        <?php
                        
                        $docExistant=$DB->prepare("SELECT * FROM document WHERE id_document=:id");
                        $docExistant->bindParam(':id',$idDoc,PDO::PARAM_INT);
                        for($numDoc=1;$numDoc<13;$numDoc++)
                        {   
                            $doc='doc'.$numDoc;
                           
                            
                            $idDoc=$blocDocArray[$doc];

                            $docExistant->execute();
                            $docExistantArray=$docExistant->fetch(PDO::FETCH_ASSOC);
                         
                            echo '<select class="mt-1 form-select" id="'.$doc.'" name="'.$doc.'">';
                                if(!empty($docExistantArray['nom']))
                                {
                                    echo '<option value="'.$docExistantArray['id_document'].'">'.$docExistantArray['nom'].'</option>'; 
                                }
                                echo '<option value="0">Aucun</option>';
                                echo $docListeTotale;
                            
                            echo '</select>';

                        }
                        ?>
                    </div>
                </div>

               

                <div class="col-12 col-md-6 col-lg-6 pb-5  " > <!--menu_de_droite--> <!--bloc rapport-->
                    <div class="p-3 text-center text-md-start menuRight <?php echo $nomrubrique ?>">
                        <p class="text-center fst-italic">bloc destiné à des rapports et comptes-rendus</p>
                        <div class="row">
                            <div class="col">
                                <label class="form-label" for ="titre_bloc_rapport">Titre du bloc</label>
                                <input type="text" class="form-control" id="titre_bloc_rapport" name="titre_bloc_rapport" 
                                value="<?php echo $blocRapportArray['titre'] ?>">
                            </div>
                            <div class="col-3">
                            <?php
                                echo '
                                    <label class="form-label" for="ordreRapport" >Ordre</label>
                                    <select class="form-select" name="ordreRapport"  id="ordreRapport">';

                                       
                                        echo'<option value="'.$ordreRapport.'">'.$ordreRapport.'</option>';
                                        for($var=1;$var<7;$var++)
                                        {echo'<option value="'.$var.'">'.$var.'</option>';}
                    
                                echo' </select>';  
                                
                                ?>
                            </div>
                        </div>


                        <div class="form-check">
                            
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_rapport_bloc" 
                                name="affichage_rapport_bloc" <?php echo $rapportBlocAffichage ?>>
                            <label class="form-check-label" for="affichage_rapport_bloc">visible</label>
                        </div>
                        <br/>
                        <?php
                        
                        $rapportExistant=$DB->prepare("SELECT * FROM document WHERE id_document=:id");
                        $rapportExistant->bindParam(':id',$idRapport,PDO::PARAM_INT);
                        for($numRapport=1;$numRapport<13;$numRapport++)
                        {   
                            $rapport='rapport'.$numRapport;
                           
                            
                            $idRapport=$blocRapportArray[$rapport];

                            $rapportExistant->execute();
                            $rapportExistantArray=$rapportExistant->fetch(PDO::FETCH_ASSOC);
                         
                            echo '<select class="mt-1 form-select" id="'.$rapport.'" name="'.$rapport.'">';
                                if(!empty($rapportExistantArray['nom']))
                                {
                                    echo '<option value="'.$rapportExistantArray['id_document'].'">'.$rapportExistantArray['nom'].'</option>'; 
                                }
                                echo '<option value="0">Aucun</option>';
                                echo $rapportListeTotale;
                            
                            echo '</select>';

                        }
                        ?>
                    </div>
                </div>





                <div class="col-12 col-md-6 col-lg-6 pb-5  " > <!--menu_de_droite CONTACT--> 
                    <div class="p-3 text-center text-md-start menuRight <?php echo $nomrubrique ?>">
                        <div class="row">
                            <div class="col">
                                <h5 class="text-center">Contact</h5>
                            </div>
                        
                      

                        <div class="col-3">
                            <?php
                                echo '
                                    <label class="form-label" for="ordreContact" >Ordre</label>
                                    <select class="form-select" name="ordreContact"  id="ordreContact">';

                                       
                                        echo'<option value="'.$ordreContact.'">'.$ordreContact.'</option>';
                                        for($var=1;$var<7;$var++)
                                        {echo'<option value="'.$var.'">'.$var.'</option>';}
                    
                                echo' </select>';  
                                
                                ?>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_contact_bloc" 
                                name="affichage_contact_bloc" <?php echo $blocContactAffichage ?>>
                            <label class="form-check-label" for="affichage_contact_bloc">visible</label>
                        </div>
                        <!--checkbox contact equipe-->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_contact_equipe" 
                                name="affichage_contact_equipe" <?php echo $blocContactAffichageEquipe ?>>
                            <label class="form-check-label" for="affichage_contact_equipe">Afficher l'équipier</label>
                        </div>
                         
                      
                        <?php
                        
                        $equipeExistant=$DB->prepare("SELECT * FROM equipe WHERE id_equipe=:id");
                        $equipeExistant->bindParam(':id',$equipe,PDO::PARAM_INT);
                        $equipeExistant->execute();
                            $equipeExistantArray=$equipeExistant->fetch(PDO::FETCH_ASSOC);
                            
                            echo '<select class="mt-1 form-select" id="equipe" name="equipe">';
                                if(!empty($equipeExistantArray['nom']))
                                {
                                    echo '<option value="'.$equipeExistantArray['id_equipe'].'">'.$equipeExistantArray['prenom'].' '.$equipeExistantArray['nom'].'</option>'; 
                                }
                                echo '<option value="NULL">Aucun</option>';
                                echo $equipeListeTotale;
                            
                            echo '</select>';

                        
                        ?>
                          <br/>
                        <!--checkbox contact bouton-->
                         <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="affichage_contact_bouton" 
                                name="affichage_contact_bouton" <?php echo $blocContactAffichageBouton ?>>
                            <label class="form-check-label" for="affichage_contact_bouton">Afficher le bouton</label>
                        </div>
                    </div>
                </div>


            </div>
            
           
        </div>

    </div>

</div>
<div class="pt-5 d-flex justify-content-center row">
    <div class="col-3">

        <input type="hidden" name="id_page" value="<?php echo $idPage ?>">
        <input type="hidden" name="nom_page" value="<?php echo $nomPage ?>">
        <input type="hidden" name="id_menu" value="<?php echo $menu ?>">
        
        
        
        
        
       
        <input type="hidden" name="nomRubrique" value="<?php echo $nomrubrique ?>">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</div>
</form>



<?php
require_once("../../inc/footer.php");

require_once("../../inc/footer_partenaires.php");
require_once("../../inc/fin.php");

?>