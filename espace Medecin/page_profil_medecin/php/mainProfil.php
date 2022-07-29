<?php 

$medecin_shuffle = $medecin->getData('medecin',$_SESSION['SESSION_EM']);

$lat = $medecin_shuffle[0]['lat'];
$lon = $medecin_shuffle[0]['lon'];
$nom = $medecin_shuffle[0]['nom'];

$ville = $medecin_shuffle[0]["ville"];


$adresse = $medecin_shuffle[0]['adresse'];
$prenom = $medecin_shuffle[0]['prenom'];

$_SESSION["lat"] = $lat;
$_SESSION["lon"] = $lon;
$_SESSION["nom"] = $nom;
$_SESSION["prenom"] = $prenom;
$_SESSION["adresse"] =$adresse;
$_SESSION["ville"] = $ville;

$patient_shuffle = $patient->getData('medecin',$_SESSION['SESSION_EM']);
$arrayspec = $medecin->displayData('medecin','specialites',$_SESSION['SESSION_EM']);
$arrayDesc = $medecin->displayData('medecin','description',$_SESSION['SESSION_EM']);
$arrayLangue = $medecin->displayData('medecin','langue',$_SESSION['SESSION_EM']);
$arrayExperience = $medecin->displayData('medecin','experience',$_SESSION['SESSION_EM']);
$arrayDiplome = $medecin->displayData('medecin','diplome',$_SESSION['SESSION_EM']);
$arrayHoraires = $medecin->displayData('medecin','horaires',$_SESSION['SESSION_EM']);
$days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
?>
<main>
      <div class="bonjour">
            <div class="photo">
            <img src="../images/Doctors-pana.svg" alt="doctorImage" class="doctorImg">

            </div>
            <div class="droite">
                <div id="date_heure"></div>
                <h4 class="b-3">Bonjour !
                    <br>
                    <span class="name"> Dr. <?php echo $medecin_shuffle[0]['nom'].' '.$medecin_shuffle[0]['prenom']?></span>
                </h4>
                <p class="para-desc">Have a nice day ! great day ! take care! great!</p>
                <!-- <h6 class="h6">You have <span class="text-p">10 patients</span> remaining today !</h6> -->
            </div>
     </div>
<div class="middle">
            <ul class="tabs">
                <li class="infos active" data-cont=".one"><i class="fa-solid fa-info"></i> Informations</li>
                <li class="infos " data-cont=".two"><i class="fa-solid fa-stethoscope"></i> Expériences</li>
                <li class="infos" data-cont=".three"><i class="fa-solid fa-location-dot"></i> Localisation</li>
                <li class="infos" data-cont=".four"><i class="fa-solid fa-clock"></i> Horaires et contact</li>

            </ul>
            <div class="contenu">
                <div class="one">
                    <div class="about-d"><i class="fa-solid fa-address-card"></i> About</div>
                    <div class="one-name"><i class="fa-solid fa-user-doctor"></i> Dr.<?php echo $medecin_shuffle[0]['nom'].' '.$medecin_shuffle[0]['prenom']?></div>
                    <div class="spec"><?php echo $medecin_shuffle[0]['specialite']." à ".$medecin_shuffle[0]['ville']?></div>
                    <span class="span-desc">Description</span>
                    <div class="description">
                    <?php 
                        $taille = 0;
                        if(count($arrayDesc) < 50 ){
                            $taille = count($arrayDesc);
                        }
                        if(count($arrayDesc) >= 50 ) {
                            $taille = 50;
                        }
                        for($i=0;$i<$taille;$i++){
                            
                            if($arrayDesc[0]==null){
                                echo "veuillez remplir votre description";
                                break;
                            }
                            
                           echo $arrayDesc[$i];
                        
                        echo " ";
                        if($taille == 50){
                            if($i == 49){
                                echo "[...]";
                            }
                        }
                        }
                         ?>
                    </div>
                    <?php if($arrayDesc[0] != null) {?>
                    <p  class="voir" onclick="toggle('boite2')">Afficher la description complète</p>
                    <?php }?>
                    <div class="infos-spec"><i class="fa-solid fa-heart-pulse"></i> Spécialités</div>
                    <div class="class-spec">
                       
                   <?php   $sizeSpec = 0;
                      if(count($arrayspec)< 4){
                        $sizeSpec = count($arrayspec);
                      }
                      else {
                        $sizeSpec = 3;
                      }
                   for($i=0;$i<$sizeSpec;$i++){ ?>
                      <?php if($arrayspec[0]==null) {
                        echo "veuillez entrer des specialites";
                    break; }
                        else { if($arrayspec[$i] =='') {continue;}
                        ?>
                     <span> <?php echo $arrayspec[$i]; ?>
                      </span>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <?php if($arrayspec[0] != null) {?>
                    <p  class="voir" onclick="toggle('boite')">voir plus</p>
                    <?php }?>
                    
                    <div class="infos-tarifs"><i class="fa-solid fa-credit-card"></i> Tarifs</div>
                    <table id="table">
                        <tr>
                            <th>Type de consultation</th>
                            <th>Prix</th>
                        </tr>
                        <tr>
                            <td>au cabinet</td>
                            <td><?php if( $medecin_shuffle[0]['tarif_cabinet'] ==null){
                                echo "--";
                            }
                                else{
                                    echo $medecin_shuffle[0]['tarif_cabinet']." DH";
                                }
                            
                            ?></td>
                        </tr>
                        <tr>
                            <td>en ligne</td>
                            <td><?php if( $medecin_shuffle[0]['tarif_enLigne'] ==null){
                                echo "--";
                            }
                                else{
                                    echo $medecin_shuffle[0]['tarif_enLigne']." DH";
                                }
                            
                            ?></td>
                        </tr>
                        <tr>
                            <td>à domicile</td>
                            <td><?php if( $medecin_shuffle[0]['tarif_dom'] ==null){
                                echo "--";
                            }
                                else{
                                    echo $medecin_shuffle[0]['tarif_dom']." DH";
                                }
                            
                            ?></td>
                        </tr>
                    </table>
                    <!-- <div class="paiment" id="pai"> <div class="paiment-div">Méthodes de paiment</div><br>
                        <span >espèces  </span>
                        <span >chèques  </span>
                        <span>CB  </span>
                    </div> -->
                    <div class="langue"><i class="fa-solid fa-language"></i> Langues parlées</div>
                        <div class="class-langues">
                        <?php  for($i=0;$i<count($arrayLangue);$i++){ 
                            if($arrayLangue[0]== null){
                                echo "aucune langue n'est choisie";
                                break;
                            }?>
                        <span> <?php echo $arrayLangue[$i]; ?>
                        </span>
                            <?php } ?>
                            
                        </div>
                        <form method = "post">
                        <button type = "submit" name = "delete_diplome" class="delete deleteLangue" id = "delete_langue">supprimer </button>
                    </form>
                    </div> 
                    
                <div class="two">
                    <div class="experiences-content"><i class="fa-solid fa-stethoscope"></i> Expériences </div>
                    <ul class="ul-experiences">
                        
                    <?php  $size = 0;
                      if(count($arrayExperience)< 4){
                        $size = count($arrayExperience);
                      }
                      else {
                        $size = 4;
                      }
                    for($i=0;$i<$size;$i++){ 
                        if($arrayExperience[0]==null){
                             echo "pas encore d'expérience";
                            break;
                        }
                        else if($arrayExperience[$i] == ""){
                            break;
                        }
                        else {?>
                     <li> <?php echo $arrayExperience[$i]; ?>
                    </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php if($arrayExperience[0] != null) {?>
                    <p  class="voir" onclick="toggle('boite3')">voir plus</p>
                    <?php }?>
                    
                    <div class="diplome"><i class="fa-solid fa-graduation-cap"></i> Cursus et diplômes</div>
                    <ul class="ul-diplome" style="list-style: inside">
                    <?php  $sizeDip = 0;
                      if(count($arrayDiplome)< 4){
                        $sizeDip = count($arrayDiplome);
                      }
                      else {
                        $sizeDip = 4;
                      }
                    for($i=0;$i<$sizeDip;$i++){ 
                        if($arrayDiplome[0] == null) {
                            echo "veuillez entrer votre cursus et diplômes";
                            break;
                        } 
                        else if($arrayDiplome[$i] == ""){
                            break;
                        }
                            else {?>
                     <li> <?php echo $arrayDiplome[$i]; ?>
                    </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php if( $arrayDiplome[0] != null) {?>
                    <p  class="voir" onclick="toggle('boite4')">voir plus</p>
                    <?php } ?>
                </div>
                <div class="three">
                    <div class="adresse">
                        <i class="fa-solid fa-location-dot"></i> Adresse
                        <p class="p-adresse"><?php if($medecin_shuffle[0]['adresse']== null) {
                          echo "veuillez entrer votre adresse";
                        }
                        else {echo $medecin_shuffle[0]['adresse'];}
                        ?>
                        </p>
                        <?php if($medecin_shuffle[0]['adresse'] != null) {?>
                            
                            <?php } ?>
                            
                    </div>
                    <div class="map">
                    <div id="googleMap" class = "mapChild"  style="width: 100%;height: 40vh;position: relative;"></div>
                    </div>
                <div id="googleMap" style="width: 100%;height: 40vh;position: relative;"></div>

                   
                </div>

                <div class="four">
                    <div class="horaires-left">
                         <div class="horaires"><i class="fa-solid fa-clock"></i> Horaires </div>
                         <ul>
                            <?php for($i=0;$i<count($days);$i++) { ?>
            
            <li>
                <p class="daysHoraires"><?php echo $days[$i] ?></p>
                <?php if($arrayHoraires[$i] =='00:00 - 00:00') {?>
                    <p class="hours"><?php echo "--&nbsp &nbsp &nbsp-- "?></p>
               <?php }
               else {?>
                <p class="hours"><?php echo $arrayHoraires[$i]?></p>
                <?php }?>
            </li> <?php } ?>

                <form method = "post"  id = "deleteHoraires" >
                    <button type = "submit" name ="delete_horaires" class = "buttondelete deleteH" id = "delete_horaires" value = "1" >supprimer</button>
                </form>

                </ul>
                        </div>
               
                        <div class="contact-side">
                            <div class="contact"><i class="fa-solid fa-address-book"></i> Contact</div>
                            
                                <div> <i class="fa-solid fa-phone"></i> Numéro de téléphone :
                                    <span><?php if($medecin_shuffle[0]['numero'] == null) {
                                        echo "pas de numéro de téléphone";
                                    }
                                    else {echo $medecin_shuffle[0]['numero'];}
                                    ?></span>
                                </div>
                                <div> <i class="fa-solid fa-envelope"></i> Email :
                                <span><?php if($medecin_shuffle[0]['numero'] == null) {
                                        echo "pas d'adresse mail";
                                    }
                                    else {echo $medecin_shuffle[0]['gmail'];}
                                    ?></span>
                                </div>
                            
                        </div>
                </div> 

</main>