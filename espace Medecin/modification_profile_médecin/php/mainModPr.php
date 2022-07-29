<?php 
// require("./database/functions.php");
 $arrayExperience = $medecin->displayData('medecin','experience',$_SESSION['SESSION_EM']);
 $arrayspec = $medecin->displayData('medecin','specialites',$_SESSION['SESSION_EM']);
$arrayMaladie = $medecin->displayData('medecin','diplome',$_SESSION['SESSION_EM']);
$arrayDesc = $medecin->displayData('medecin','description',$_SESSION['SESSION_EM']);
$arraylangue = $medecin->displayData('medecin','langue',$_SESSION['SESSION_EM']);

$arrayData = $medecin->getData('medecin',$_SESSION['SESSION_EM']);

$arrayHoraires = $medecin->displayData('medecin','horaires',$_SESSION['SESSION_EM']);


?>
      <main>
        <div class="tabs">
            <div class="tabs__head">
              <div class="tabs__toggle is-active">
                <span class="tabs__name">Information</span>
              </div>
              <div class="tabs__toggle">
                <span class="tabs__name">Experience</span>
              </div>
              <div class="tabs__toggle">
                <span class="tabs__name">Horaire/Tarif</span>
              </div>
            </div>
            <div class="tabs__body">
              <div class="tabs__content is-active">
                <h2 class="tabs__title">Information</h2>
                <div class="tabs__text">
                             <label for="add-photo">
                            <i class="fa-solid fa-camera" id="cam"></i>
                            </label>
                            <form  method="post" enctype="multipart/form-data" id="photo-upload" onsubmit="return false">
                                   <input type="hidden" name="idP" id="idP"  value='1'>
                                  <input type="file" id="add-photo"name="photo" onchange="uploadImage()">
                           </form>
                           <?php
               if($arrayData[0]['photo'] != null){
               ?>
              <img id="photo"  src="data:image;base64,<?php echo $arrayData[0]['photo'] ;?>" height="100" width="100" border-radius="50%" class="uploadImageMedecin">
            
               <?php
               }
                else{
                  ?>
                    <img  src="../images/avatar.jpeg" alt="profile" id="photo"  height="100" width="100" border-radius="50%" class="uploadImageMedecin">
              
              
              <?php
            }?>

               

                   <form action="#" method = "post">
                       <div class="wrapper">
                        
                            <div class="column_form topSec col1">
                               
                                
                               
                                <div class="rightSec">
                                    <h2 class="doctorName">Dr. <?php echo $arrayData[0]['prenom']." ".$arrayData[0]['nom']?></h2> 
                                </div>
                            </div>
                            
                           

                            <div class="column_form other col2">
                                <input class="input_form" type="text" id="nom" name = "nom" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="nom">nom</label>
                            </div>
                            <div class="column_form other col3">
                                <input class="input_form" type="text" id="prenom" name = "prenom" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="prenom">prenom</label>
                            </div>
                                              
                            <div class="column_form other col4">
                                <input class="input_form" type="email" id="gmail" name = "gmail" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="gmail">email</label>
                            </div>
                            <div class="column_form other col5">
                                <input class="input_form" type="text" id="numero" name = "numero" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="numero">telephone</label>
                            </div>
                            
                            <div class="column_form other col6">
                                <input class="input_form" type="text" id="ville" name = "ville" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="ville">ville</label>
                            </div>
                        
                            

                            <div class="column_form other col7">
                                <input class="input_form" type="text" id="adresse" name = "adresse" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="adresse">localisation</label>
                            </div>
                        
                           

                            </div>
                         <button  class="save_changes_btn" type="submit" name= "submited" >save changes</button> 
                   
                   </form> 
                   <a href="#" class = "change_password" onClick = "toggle('change_pass_boite')">Changer votre mot de passe</a>

               
                   <?php
                   if(isset($_POST['submited'])){ 
                     $nom= $_POST["nom"];
                     $prenom= $_POST["prenom"];
                      $gmail= $_POST["gmail"];
                    
                    $numero= $_POST["numero"];
                   $ville = $_POST["ville"];
                      $adresse= $_POST["adresse"];
                      
                     $specialite = 'chir';
                     

                     $insertInformation = array("nom"=>$nom,"prenom"=>$prenom,"gmail"=>$gmail,"numero"=>$numero,"ville"=>$ville,"adresse"=>$adresse);
                            
                            foreach($insertInformation as $all_keys => $all_values){
                            $teste = $all_keys;
                            
                            $all_values = $medecin->verifyEmpty($all_values,$teste,$_SESSION['SESSION_EM']);
                            $insertInformation[$all_keys] = $all_values;
                        }
                      
                   $medecin->update($_SESSION['SESSION_EM'],$insertInformation,'medecin',"information");
                   if($gmail != null){
                    
                    $_SESSION['SESSION_EM'] = $gmail;
                    
                 }
                }
               
                //    $arrayFormation = $medecin->displayData('medecin','experience');
                  
                //    print_r($arrayFormation);
                   

                   ?>
               

                </div>
              </div>
              <div class="tabs__content ">
                <h2 class="tabs__title">Experience</h2>
                <div class="tabs__text experience">
                    <div class="lines expLine">
                        <form action="#" method="post">
                        <div class="column_form ajouter">
                            <div class="top">
                                <input class="input_form exp_input" type="text" id="formation" name="formation" autocomplete="off" placeholder=" ">
                                <label class="label_form" for="formation" type = "text">Experience</label>
                                <button class="save_change" type="submit"  name="submit_for" onclick="addLi('formation','formationLi')">Ajouter</button>
                            </div>
                            <!-- <div class="bottoms">
                                <ul class="liste listeExperience" id="formationLi">
                                    <li>MASTER EN REPRODUCTION HUMAINE, IVI - UNIVERSIDAD JUAN CARLOS I MADRID, 2007</li>
                                    
                                </ul>
                            </div>
                            <a class="voir_plus" href="#">voir plus</a> -->
                        </div>
                    </form>

                    <!--AJOUTER UNE EXPERIENCE-->
                    <?php if(isset($_POST['submit_for'])){
                       $for = $_POST['formation'];
                       if($for == null){
                        echo "<script>
                  
                        Swal.fire({
                            title: 'Vous n avez rien entré!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                          })
                  
      </script>";
                 }
                       $medecin->ajout($arrayExperience,$for,'experience', $_SESSION['SESSION_EM'] );
                     }     ?>
                     
                    </div>
                   
                    <div class="lines expLine">
                        <form action="" method="post">
                        <div class="column_form ajouter">
                            <div class="top">
                                <input class="input_form exp_input" type="text" id="specialite" name="specialite" autocomplete="off" placeholder=" ">
                                <label class="label_form" for="specialite" type = "text">specialitee</label>
                                <button class="save_change" type="submit"  name="submit_spec" onclick="addLi('specialite','specialiteLi')">Ajouter</button>
                            </div>
                            <!-- <div class="bottoms">
                                
                                    <ul class="liste listespecialite" id="specialiteLi">
                                        <li>géneraliste</li>
                                        <li>cardiologue</li>
                                        <li>chirurgien</li>
                                    </ul>
                            </div>
                            <a class="voir_plus" href="#">voir plus</a> -->
                        </div>
                    </form>

                      <!--AJOUTER UNE SPECIALITE -->
                      <?php if(isset($_POST['submit_spec'])){
                       $specialite = $_POST['specialite'];
                       if($specialite == null){
                        echo "<script>
                  
                        Swal.fire({
                            title: 'Vous n avez rien entré!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                          })
                  
      </script>";
                 }
                        $medecin->ajout($arrayspec,$specialite,'specialites', $_SESSION['SESSION_EM'] );
                         }     ?> 
                    </div>
                    
                    <div class="lines expLine">
                        <form action="#" method="post">
                        <div class="column_form ajouter">
                            <div class="top">
                                <input class="input_form exp_input" type="text" id="maladie" name="maladie" autocomplete="off" placeholder=" ">
                                <label class="label_form" for="maladie" type = "text">Cursus et diplome</label>
                                <button class="save_change" type="submit" name="submit_maladie" >Ajouter</button>
                            </div>
                          
                        </div>
                    </form>


                    <!--AJOUTER une maladie traitée -->
                    <?php if(isset($_POST['submit_maladie'])){
                       $maladie = $_POST['maladie'];
                          if($maladie == null){
                            echo "<script>
                  
                        Swal.fire({
                            title: 'Vous n avez rien entré!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                          })
                  
      </script>";
                       }
                       $medecin->ajout($arrayMaladie,$maladie,'diplome', $_SESSION['SESSION_EM'] );
                         }     ?>
                    </div>
                    <div class="lines expLine">
                        <form action="#" method="post">
                            <div class="column_form ajouter descr">
                                <div class="top">
                                <input class="input_form exp_input" type="text" id="description" name="description" autocomplete="off" placeholder=" ">
                                <label class="label_form" for="description" type = "text">description</label>
                                <button class="save_change " type="submit" name="submit_description">Ajouter</button>
                            </div>
                            </div>
                        </form>

                        <!--AJOUTER à La description-->
                        <?php if(isset($_POST['submit_description'])){
                       $description = $_POST['description'];
                       if($description == null){
                        echo "<script>
                  
                        Swal.fire({
                            title: 'Vous n avez rien entré!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                          })
                  
      </script>";
                 }
                       $medecin->ajout($arrayDesc,$description,'description', $_SESSION['SESSION_EM'] );
                         }     ?>
                    </div>
                    <div class="lines expLine">
                        <form action="#" method="post">
                            <div class="column_form ajouter descr">
                                <div class="top">
                                <input class="input_form exp_input" type="text" id="langue" name="langue" autocomplete="off" placeholder=" ">
                                <label class="label_form" for="description" type = "text">langue</label>
                                <button class="save_change " type="submit" name="submit_langue">Ajouter</button>
                            </div>
                            </div>
                        </form>

                        <!--AJOUTER à La description-->
                        <?php if(isset($_POST['submit_langue'])){
                       $langue = $_POST['langue'];
                       if($langue == null){
                        echo "<script>
                  
                        Swal.fire({
                            title: 'Vous n avez rien entré!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                          })
                  
      </script>";
                 }
                       $medecin->ajout($arraylangue,$langue,'langue', $_SESSION['SESSION_EM'] );
                         }     ?>
                    </div>
                    
                </div>
              </div>
              <div class="tabs__content tab3">
                <h2 class="tabs__title">Horraire</h2>
                <div class="tabs__text">
                    <div class="horraire">
                        <form action="#" method="post">
                        <table>
                            <thead class="head">
                                <tr>
                                    <th>jour</th>
                                    <th>heure d'entrée</th>
                                    <th>heure de sortie</th>
                                </tr>
                           
                            </thead>
                            <tbody>
                                <tr>
                                    <td>lundi</td>
                                    <td><input class="timing" type="time" id="entree_1" name="dateLunEnt" autocomplete="off" ></td>
                                    <td><input  class="timing"  type="time" id="sortie_1" name="dateLunSor" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>mardi</td>
                                    <td><input class="timing"  type="time" id="entree_1" name="dateMarEnt" autocomplete="off" ></td>
                                    <td><input class="timing"  type="time" id="sortie_1" name="dateMarSor" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>mercredi</td>
                                    <td><input  class="timing" type="time" id="entree_1" name="dateMerEnt" autocomplete="off" ></td>
                                    <td><input  class="timing" type="time" id="sortie_1" name="dateMerSor" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>jeudi</td>
                                    <td><input  class="timing" type="time" id="entree_1" name="dateJeuEnt" autocomplete="off" ></td>
                                    <td><input class="timing"  type="time" id="sortie_1" name="dateJeuSor" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>vendredi</td>
                                    <td><input class="timing"  type="time" id="entree_1" name="dateVenEnt" autocomplete="off" ></td>
                                    <td><input class="timing"  type="time" id="sortie_1" name="dateVenSor" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>samedi</td>
                                    <td><input class="timing"  type="time" id="entree_1" name="dateSamEnt" autocomplete="off" ></td>
                                    <td><input class="timing"  type="time" id="sortie_1" name="dateSamSor" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>dimanche</td>
                                    <td><input class="timing"  type="time" id="entree_1" name="dateDimEnt" autocomplete="off" ></td>
                                    <td><input class="timing"  type="time" id="sortie_1" name="dateDimSor" autocomplete="off"></td>
                                </tr>
                            </tbody>
                        </table>
                    
                        <h2 class="tarif_title tabs__title">Tarif </h2>
                            <div class="lines tarif_ligne">
                                
                                <div class="column_form tarif">
                                    <p class="type_consu">au cabinet</p>
                                </div>
                                <div class="column_form tarif">
                                    <input class="input_form" type="text" id="prenom" name="cabinet" autocomplete="off" placeholder=" ">
                                    <label class="label_form" type="text" for="prenom">prix</label>
                                    <button class="save_change btn_tarif" type="submit" name="submit_tarifC">Ajouter</button> 
                                </div>
                                  <!--Changer la valeur de tarif au cabinet-->
                               <?php 
                                        if(isset($_POST['submit_tarifC'])){
                                            $tarifCabinet = $_POST['cabinet'];
                                            if($tarifCabinet == null){
                                                echo "<script>
                  
                                                Swal.fire({
                                                    title: 'Vous n avez rien entré!',
                                                    icon: 'error',
                                                    confirmButtonText: 'Ok'
                                                  })
                                          
                              </script>";
                                         }
                                            $medecin->updateTarif('tarif_cabinet',$tarifCabinet,$_SESSION['SESSION_EM']);
                                        }
                               
                             ?>
                            </div>
                        <div class="lines tarif_ligne">
                                
                            <div class="column_form tarif">
                                <p class="type_consu">en ligne</p>
                            </div>
                            <div class="column_form tarif">
                                <input class="input_form" type="text" id="prenom" name="enLigne" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="prenom">prix</label>
                               <button class="save_change btn_tarif" name="submit_tarifL" type="submit">Ajouter</button> 
                            </div>
                            <!--Changer la valeur de tarif de consultation en ligne-->
                            <?php 
                                        if(isset($_POST['submit_tarifL'])){
                                            $tarifEnLigne = $_POST['enLigne'];
                                            if($tarifEnLigne == null){
                                                echo "<script>
                  
                        Swal.fire({
                            title: 'Vous n avez rien entré!',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                          })
                  
      </script>";
                                         }
                                            $medecin->updateTarif('tarif_enLigne',$tarifEnLigne,$_SESSION['SESSION_EM']);
                                        }
                               
                             ?>
                        </div>
                        <div class="lines tarif_ligne">
                                
                            <div class="column_form tarif">
                                <p class="type_consu">à domicile</p>
                            </div>
                            <div class="column_form tarif">
                                <input class="input_form" type="text" id="prenom" name="domicile" autocomplete="off" placeholder=" ">
                                <label class="label_form" type="text" for="prenom">prix</label>
                                <button class="save_change btn_tarif"  name="submit_tarifD" type="submit">Ajouter</button>
                            </div>
                            <!--Changer la valeur de tarif à domicile-->
                            <?php 
                                        if(isset($_POST['submit_tarifD'])){
                                            $tarifDomicile = $_POST['domicile'];
                                            if($tarifDomicile == null){
                                                echo "<script>
                  
                                                Swal.fire({
                                                    title: 'Vous n avez rien entré!',
                                                    icon: 'error',
                                                    confirmButtonText: 'Ok'
                                                  })
                                          
                              </script>";
                                         }
                                            $medecin->updateTarif('tarif_dom',$tarifDomicile,$_SESSION['SESSION_EM']);
                                        }
                               
                             ?>
                        </div> 
                        <button  class="save_changes_btn tarif_btn" name="saveAll" type="submit">save changes</button>
                         <!--AJOUTER LES TROIS TARIFS à LA FOIS-->
                        <?php 
                                        if(isset($_POST['saveAll'])){
                                            $tarifEnLigne = $_POST['enLigne'];
                                            $medecin->updateTarif('tarif_enLigne',$tarifEnLigne,$_SESSION['SESSION_EM']);
                                            $tarifDomicile = $_POST['domicile'];
                                            $medecin->updateTarif('tarif_dom',$tarifDomicile,$_SESSION['SESSION_EM']);
                                            $tarifCabinet = $_POST['cabinet'];
                                            $medecin->updateTarif('tarif_cabinet',$tarifCabinet,$_SESSION['SESSION_EM']);
                                                //changer les horaires
                                                //lundi
                                                $horaireLunE = $_POST['dateLunEnt'];
                                                $horaireLunS =$_POST['dateLunSor'];
                                                  $medecin->changeHoraire($arrayHoraires,$horaireLunE,$horaireLunS,'Lundi',$_SESSION['SESSION_EM']);
                                                 
                                                 //mardi
                                                $horaireMarE = $_POST['dateMarEnt'];
                                                $horaireMarS =$_POST['dateMarSor'];
                                                  $medecin->changeHoraire($arrayHoraires,$horaireMarE,$horaireMarS,'Mardi',$_SESSION['SESSION_EM']);

                                                // //mercredi
                                                 $horaireMerE = $_POST['dateMerEnt'];
                                                 $horaireMerS =$_POST['dateMerSor'];
                                                  $medecin->changeHoraire($arrayHoraires,$horaireMerE,$horaireMerS,'Mercredi',$_SESSION['SESSION_EM']);
                                                
                                                 //jeudi
                                                 $horaireJeuE = $_POST['dateJeuEnt'];
                                                 $horaireJeuS =$_POST['dateJeuSor'];
                                                  $medecin->changeHoraire($arrayHoraires,$horaireJeuE,$horaireJeuS,'Jeudi',$_SESSION['SESSION_EM']);

                                                 //vendredi 
                                                 $horaireVenE = $_POST['dateVenEnt'];
                                                 $horaireVenS =$_POST['dateVenSor'];
                                                 $medecin->changeHoraire($arrayHoraires,$horaireVenE,$horaireVenS,'Vendredi',$_SESSION['SESSION_EM']);
                                                 //vendredi 
                                                 $horaireSamE = $_POST['dateSamEnt'];
                                                 $horaireSamS =$_POST['dateSamSor'];
                                                 $medecin->changeHoraire($arrayHoraires,$horaireSamE,$horaireSamS,'Samedi',$_SESSION['SESSION_EM']);
                                                
                                                 //dimanche
                                                 $horaireDimE = $_POST['dateDimEnt'];
                                                 $horaireDimS =$_POST['dateDimSor'];
                                                 $medecin->changeHoraire($arrayHoraires,$horaireDimE,$horaireDimS,'Dimanche',$_SESSION['SESSION_EM']);


                                                $arrayEntree = Array ($horaireLunE,$horaireMarE,$horaireMerE,$horaireJeuE,$horaireVenE,$horaireSamE,$horaireDimE);
                                                 $arraySortie = Array ($horaireLunS,$horaireMarS,$horaireMerS,$horaireJeuS,$horaireVenS,$horaireSamS,$horaireDimS);
                                                 $medecin->updateH($arrayHoraires,$arrayEntree,$arraySortie,$_SESSION['SESSION_EM']);
                                                }

                                          
                               
                             ?>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
     </main> 
    
