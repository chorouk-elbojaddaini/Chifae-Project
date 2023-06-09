<?php 
$idMed = $_GET['id'];
$medecin_shuffle = $medecin->getData('medecin',$idMed);
// print_r($medecin_shuffle);
$patient_shuffle = $patient->getData('medecin',$idMed);
$arrayspec = $medecin->displayData('medecin','specialites',$idMed);
$arrayDesc = $medecin->displayData('medecin','description',$idMed);
$arrayLangue = $medecin->displayData('medecin','langue',$idMed);
$arrayExperience = $medecin->displayData('medecin','experience',$idMed);
$arrayDiplome = $medecin->displayData('medecin','diplome',$idMed);
$arrayHoraires = $medecin->displayData('medecin','horaires',$idMed);
$days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
$lat = $medecin_shuffle[0]['lat'];
$lon = $medecin_shuffle[0]['lon'];
$adresse = $medecin_shuffle[0]['adresse'];
$ville = $medecin_shuffle[0]['ville'];
$nom = $medecin_shuffle[0]['nom'];
$prenom = $medecin_shuffle[0]['prenom'];


?>
<div class="inside">
<div class="carte">
        <?php
               if($medecin_shuffle[0]['photo'] != null){
               ?>
              <img id="photo"  src="data:image;base64,<?php echo $medecin_shuffle[0]['photo'] ;?>" width = "90px" class="avatar">
            
               <?php
               }
                else{
                  ?>
                    <img  src="avatar.jpeg" alt="profile" id="photo" style="width:100px; height:100px;" class="avatar">
              
              
              <?php
            }?>
            <div class="name-spec">
                <h1 class="name"><i class="fa-solid fa-user-doctor"></i> Dr.<?php echo $medecin_shuffle[0]['nom'].' '.$medecin_shuffle[0]['prenom']?></h1>
                <h2 class="spec"><?php echo $medecin_shuffle[0]['specialite']; ?></h2>
                
                <?php if($medecin_shuffle[0]['inscrit'] != null){
           $idC = $medecin_shuffle[0]['id'];
       echo' <div class="rdv"><a href="" class="prendre-rdv buttonRdv" id="$idC">Prendre un RDV</a></div>';
          }
       ?>
<script>
    function fct()
    {
        console.log('Clicked');
    }
</script>
            </div>
            
        </div>

<div class="mainRight">
        <main >
            
             <div class="contenu"> 
                
                <div class="one">
                    <div class="about-d"><i class="fa-solid fa-address-card"></i> About</div>
                    <div class="one-name"><i class="fa-solid fa-user-doctor"></i> Dr.<?php echo $medecin_shuffle[0]['nom'].' '.$medecin_shuffle[0]['prenom']?></div>
                    <div class="specInfo"><?php echo strtolower($medecin_shuffle[0]['specialite'])." à ".strtolower($medecin_shuffle[0]['ville']);?></div>
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
                                echo "pas de description ";
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
                        echo "pas de specialite";
                    break; }
                        else { if($arrayspec[$i] =='') {continue;}
                        ?>
                     <span> <?php echo $arrayspec[$i]; ?>
                      </span>
                        <?php } ?>
                        <?php } ?>
                    </div>
                    <?php if($arrayspec[0] != null) {?>
                    <p  class="voir" onclick="toggle('boiteAffichage')">voir plus</p>
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
                        else {?>
                     <li> <?php echo $arrayExperience[$i]; ?>
                    </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                    <?php if($arrayExperience[0] != null) {?>
                    <p  class="voir" onclick="toggle('boite3')">voir plus</p>
                    <?php }?>
                    </ul>
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
                        if($arrayDiplome[$i] == null) {
                            echo "pas de cursus et diplômes";
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
                        ?></p>
                         <?php if($medecin_shuffle[0]['adresse'] != null) {?>
                            
                      
                            <?php } ?>

                    </div>
                    <div id="googleMap" style="width: 100%;height: 40vh;"></div>

                    <!-- <div class="map">

                    </div> -->
                </div>
                
                <div class="four">
                    <div class="contenu-four">
                        <div class="horaires-left">
                            <div class="horaires"><i class="fa-solid fa-clock"></i> Horaires </div>
                            <div class="clock">
                                <ul>
                                <?php for($i=0;$i<count($days);$i++) { ?>
            
                                <li>
                                    <p class="daysHoraires"><?php echo $days[$i] ?></p>
                                    <?php if($arrayHoraires[$i] =='00:00 - 00:00') {?>
                                        <p class="hours"><?php echo "--  --   &nbsp &nbsp &nbsp -- --"?></p>
                                   <?php }
                                   else {?>
                                    <p class="hours"><?php echo $arrayHoraires[$i]?></p>
                                    <?php }?>
                                </li> <?php } ?>
                                
                                </ul>
                            </div>
                        </div>
                        <div class="contact-side">
                            <div class="contact"><i class="fa-solid fa-address-book"></i> Contact</div>
                            <div class="num_email">
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
                    </div> 
                 </div>
        </main>

