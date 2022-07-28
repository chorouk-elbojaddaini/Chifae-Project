<?php 
$patientResn = $patient->getDataPatientMed("medecin",$_SESSION['SESSION_EM']);



// print_r($patientResn);
    $arrayTest = implode(",",$patientResn);
    
    

    // for($i=0;$i<count($patientResn);$i++){
    //     $arrayTest = array_push($arrayTest,$patientResn[$i]);

    
    // }
    
// $arrayTest = array("patient"=>8,"patients"=>1);
$patient_shuffle = $patient->getData('patient',$arrayTest);
// $idsPatient = $patient->getDataPatientMed("medecin"); 
 
 $patient_shuffle = $patient->getDataPagination("patient",$patient_shuffle);
    if(isset($_GET['s']) AND !empty($_GET['s'])){
        $recherche = htmlspecialchars($_GET['s']);
        $patient_shuffle = $patient->db->con->query('SELECT * from patient where nom LIKE "%'.$recherche.'%"  and id IN ('.$arrayTest.')ORDER BY id DESC');
       
    }
    
  ?>
<main>
            <div class="top_section">
                <h2 class="main_title">liste des patients</h2>
                
                <a class="add_patient" href="#"  onclick="toggle()">ajouter patient</a>
        </div>
        <form method = "GET">
                    <input type = "search" name= "s" placeholder = "rechercher par nom" class="rechercher" >
                    <input type="submit" name = "envoyer" value="rechercher" style="background:#fe6686; border:none; color:white; padding:3px 9px; cursor:pointer; border-radius:10px; ">
                </form>
           <div class="patient_wrapper">
            <?php 


            if($patient_shuffle !=null){ ?>
                <?php foreach($patient_shuffle as $item) {  ?>
                    <div class="patient">
                        
                        <div class="patient_content">
                            
                            <div class="ligne top_patient">

                                <?php 
                                if($item['photo'] != null){
                                    echo'<img class ="doctorImg" src = "data:image/jpg;base64,' . $item['photo'] . '" width = "300px" height="80px" />';	
                                 }
                                 else { ?>
                                 <img class ="" src = "../images/avatar.jpeg" width = "150px" height="85px"/>
                                <?php } ?>
                                <form action="" method="post" id = "supprimerPat">
                                    
                                    <!-- <button type="submit" name="deletePatient" class="icones circle deletePat" value="" >supprimer</button>  -->
                                    <button type="submit" name="deletePatient" class='deleteP icones circle deletePat' value="<?php echo $item['id'] ?? 0 ?>"><i class='fa-solid fa-trash-can fa-lg'></i></button>
                                </form>
                            
                            </div>
                            <div class="bottom_patient">
                            <div class="ligne">
                                <p class="id"><?php echo $item["id"] ?></p>
                            </div>
                            <div class="ligne">
                                <p class="left">nom:&nbsp;</p>
                                <p class="right"><?php echo $item["nom"] ?></p>
                            </div>
                            <div class="ligne">
                                <p class="left">prenom:&nbsp;</p>
                                <p class="right"><?php echo $item["prenom"] ?></p>
                            </div>
                                <div class="ligne">
                                    <p class="left">sexe:&nbsp;</p>
                                    <p class="right"><?php echo $item["sexe"] ?></p>
                                </div>
                                <div class="ligne">
                                    <p class="left">age:&nbsp;</p>
                                    <p class="right"><?php 
                                        $from = new DateTime($item['datenaissace']);
                                        $to   = new DateTime('today');
                                        echo $from->diff($to)->y;
                                    ?></p>
                                </div>
                                <div class="ligne">
                                    
                                    <p><i class="fa-solid fa-folder-medical icones circle"></i></p> 
                                    <form action="../../../espace_patient/profilMedical/doctor.php" method="get">
                                    <button type="submit" class= "dossier" id = "medicale" name='code_patient' value="<?php echo $item["code_patient"];
                                    
                                    ?>" name="code_patient">dossier médicale</button>
                                 </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                <?php } ?> 
                <?php } ?> 
               
                
                
                
               
             
                


           </div>
     </main>
     <?php 
       
        
        // for($i=0;$i<count($patientResn)+1;$i++){
        //     if (isset($patientResn[$i])) {
        //         echo $patientResn[$i];
        //         $patientResn['name'] = $patientResn[$i];
        //         unset($patientResn[$i]);
        //     }
        // }
      //  print_r($patientRes);
     ?>
     
