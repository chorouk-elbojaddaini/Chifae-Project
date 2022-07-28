<?php 
$arrayData = $medecin->getData('medecin',$_SESSION['SESSION_EM']);
?>
<div class="sidebar"><!--Side bar-->
        <div class="top"><!--Top section-->
           
            <img class="imgTop" src="../images/doctor.png" alt="#">
            
            <div class="profile">
            <?php
               if($arrayData[0]['photo'] != null){
               ?>
              <img id="photo"  src="data:image;base64,<?php echo $arrayData[0]['photo'] ;?>" width = "90px">
            
               <?php
               }
                else{
                  ?>
                    <img  src="../images/avatar.jpeg" alt="profile" id="photo" style="width:100px; height:100px; margin-left:90px;" class="medecinNophoto">
              
              
              <?php
            }?>
            </div>
            <div class="text">
                <h3>Dr.<?php echo $arrayData[0]['nom']." ".$arrayData[0]['prenom']?></h3>
                <p> <?php echo $arrayData[0]['specialite']?></p>
            </div>
        </div><!--Top section end-->
        <div class="line"></div>
        <div class="bottom"><!--bottom section-->
            
            <ul >
                <li class = "nav-item">
                    <a  class = "nav-link"  href="#">
                        <i class="fa-solid fa-user icon"></i>
                        <span class="text nav-text">profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class = "nav-link"  href="../../page_rendez_vous/php">
                        <i class="fa-solid fa-calendar-check icon googleFont"></i>
                        <span class="text nav-text">rendez-vous</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class = "nav-link"  href="../../page_patient/php">
                        <i class="fa-solid fa-hospital-user icon"></i>
                        <span class="text nav-text">patients</span>
                    </a>
                </li>
                
                <li class = "nav-item">
                    <a class = "nav-link"  href="../../calendar">
                    <i class="fa-solid fa-calendar-days icon"></i>
                        <span class="text nav-text">Calendrier</span>
                    </a>
                </li>
                 
                <li class = "nav-item">
                    <a  class = "nav-link" href="../../modification_profile_médecin/php/modifProfilMed.php">
                        <i class="fa-solid fa-gear icon"></i>
                        <span class="text nav-text">parametres</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class = "nav-link"  href="../../../connexionDoc/logout.php" >
                        <i class="fa-solid fa-arrow-right-from-bracket icon .logout "></i>
                        <span class="text nav-text">log out</span>
                    </a>
                </li>
            </ul>
        </div><!--bottom section end-->
        
    </div> <!--side bar end-->