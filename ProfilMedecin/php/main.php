<?php 
$medecin_shuffle = $medecin->getData();
$patient_shuffle = $patient->getData();
$arrayspec = $medecin->displayData('medecin','specialites');
$arrayDesc = $medecin->displayData('medecin','description');
$arrayLangue = $medecin->displayData('medecin','langue');
$arrayExperience = $medecin->displayData('medecin','experience');
$arrayDiplome = $medecin->displayData('medecin','diplome');
$arrayHoraires = $medecin->displayData('medecin','horaires');
$days = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
?>
<div class="carte">
<?php foreach ($medecin_shuffle as $item) { ?>
                <?php 
                    if("$item[photo]"==null){ ?>

                    <img src="../images/profile2.jpeg" alt="#" class="avatar">
                    
                    <?php break;}
                    else{
                        echo'<img  src = "data:image/jpeg;base64,' . base64_encode("$item[photo]") . '" width = "90px" " class="avatar"/>';
                    break;}
                 ?>
        <?php }?>
            <div class="name-spec">
                <h1 class="name"><i class="fa-solid fa-user-doctor"></i> Dr.<?php echo $medecin_shuffle[0]['nom'].' '.$medecin_shuffle[0]['prenom']?></h1>
                <h2 class="spec"><?php echo $medecin_shuffle[0]['specialite']; ?></h2>
            </div>
        </div>


        <main>
            
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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d105994.59262669296!2d-5.608060686464307!3d33.88112770504354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda044d23bfc49d1%3A0xfbbf80a99e4cde18!2zTWVrbsOocw!5e0!3m2!1sfr!2sma!4v1655074703314!5m2!1sfr!2sma"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="iframe-map"></iframe>
                            <?php } ?>
                    </div>
                    <div class="map">

                    </div>
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