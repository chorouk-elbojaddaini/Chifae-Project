<?php 
error_reporting(E_ALL & ~E_NOTICE);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete_rendezvous'])) {
            
            $deletedRecord = $medecin->delete($_POST['id']);
           
        }
    }
    



    if(empty( $_SESSION['choixOption']))
    {
    $_SESSION['choixOption']='tous';
    
    }
    if(isset($_POST['submit']))
    {
    $_SESSION['submit']=$_POST['submit'];
      $_SESSION['choixOption'] = $_POST['choix'];
      
    }

?>

<div class="main"><!--main-->

            
<div class="top"><!--top section-->
     <div class="left">
         <p>Rendez-vous</p>
     </div>
     <div class="right">
     <a class="appointment" href="#"  onclick= "toggle()"><i class="uil uil-plus-circle" style="color:white;"></i> RDV</a>
        <form method= "post" id="frm">
            <select class="select" name="choix" id="dateFilter">
                <option name = "tous" value="tous" <?php if(isset($_SESSION['submit'])){if($_SESSION['choixOption']=="tous"){echo "selected";} }?>>tous</option>
                <option name = "aujoudhui" value="aujoudhui" <?php if(isset($_SESSION['submit'])){if($_SESSION['choixOption']=="aujoudhui"){echo "selected";} }?>>aujoud'hui</option>
                <option name = "hier" value="hier" <?php if(isset($_SESSION['submit'])){if($_SESSION['choixOption']=="hier"){echo "selected";} }?>>hier</option>
                <option name = "demain" value="demain" <?php if(isset($_SESSION['submit'])){if($_SESSION['choixOption']=="demain"){echo "selected";} }?>>demain</option>
            </select>
            <button class="ok" type = "submit" name = "submit" id = "buttonSubmit"><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>
            
         </form>
     </div>
</div><!--top section end-->

<?php 

 
   $arrayToday = $medecin->getDataChoix("schedule_list", $_SESSION["choixOption"],$_SESSION['id']);
   
   $sortedRendezVous = $medecin->sortRendezVous($arrayToday);
   
   $displayTable    =  $medecin->getDataPagination('schedule_list',$sortedRendezVous);
  
    ?>

<div class="line line2"></div>
 <div class="appointment_section"><!--appointment section-->
     <div class="patient">
     <table class="content-table">
         <thead>
             <tr>
                
                 <th class="image">image</th>
                 <th>nom </th>
                 <th>prenom</th>
                 <th>age</th>
                 <th>date</th>
                 <th>heure</th>
                 <th>genre</th>
                 <!-- <th>email</th>  -->
                 <th>ajouter </th>
                 <th>supprimer</th>
             </tr>
         </thead>
         <tbody>

            <?php 
            if($displayTable != null) { 
             foreach($displayTable as $item) { 
            ?>

             <tr>
             <?php 
                    
                    if($item["idPatient"]!=NULL){
                        $patientInfo = $medecin->getDataPatient('patient',$item["idPatient"]);
                        //print_r($patientInfo);
                        // print_r($item);
                       
                             
                 ?>   
             
                 <td>  
                    <?php 
                        //if the image exists
                        if($patientInfo[0]["photo"]!= NULL){
                            //printing the image
                            echo'<img class ="patientImg" src = "data:image/jpg;base64,' .$patientInfo[0]["photo"] . '" width = "100px" height="100px" "/>';	
                            // foreach ($patientInfo as $itemPhoto) {
                            //     echo'<img class = "patientImg" src = "data:image/jpeg;base64,' . base64_encode("$itemPhoto[photo]") . '" />'; 
                            // }
                        }
                        else{
                             echo  '<img class = "patientImg"   src = "../images/default-avatar.jpg"/>'; 
                        }
                    ?>
                </td>
                 
                 <td><?php echo $patientInfo[0]["nom"] ?></td>
                 <td><?php echo $patientInfo[0]["prenom"] ?></td>
                 <td>
                    <?php 
                            $from = new DateTime($patientInfo[0]['datenaissace']);
                            $to   = new DateTime('today');
                            echo $from->diff($to)->y;
                    ?>
                    </td>
                 <td>
                    <?php 
                        $dateTimeArr = $medecin->separateDateTime($item);
                        echo $dateTimeArr[0];
                    ?>
                 </td>
                 <td>
                 <?php 
                        // $dateTimeArr = $medecin->separateDateTime($item);
                        $string = $dateTimeArr[1];
                        $string = substr($string, 0,5);
                        echo $string ;
                    ?>
                 </td>
                 <td><?php echo $patientInfo[0]["sexe"] ?></td>
                 

                 <td class="accept">
                 <form method = "post">
                    <input type="hidden" value = "<?php echo $patientInfo[0]["id"] ;  ?>" name =  "idPatient">
                    <button type = "submit" class="deleteP" name = "ajouter_patient" onClick="return confirm('Voulez-vous ajouter ce patient ?')"><i class="fa-solid fa-user-plus fa-lg"></i></button>
                </form>  
                    </td>
                <?php
                    if(isset($_POST["ajouter_patient"])){
                        $idPatientMed = $_POST["idPatient"];
                        echo $idPatientMed;
                        $medecin->ajouterPatient($_SESSION['SESSION_EM'],$idPatientMed,'medecin');
                       
                       
$medecin->ajouterPatient($_SESSION['SESSION_EM'],$idPatientMed,'medecin');
                    }
                ?>    
                   <td>
                  <form method="post">
                        <input type="hidden" value="<?php echo $item['id'] ;?>" name="id">
                        <!-- <button type="submit" name="delete_rendezvous" >Delete</button> -->
                        <button type="submit" class='deleteP' name="delete_rendezvous" onClick="return confirm('êtes-vous sûr de vouloir supprimer ce patient?')"><i class='fa-solid fa-trash-can fa-lg'></i></button>
                </form>       
                 </td>

                 
                 <?php } ?>
                 <?php if($item["idPatient"] ==NULL){?>
                    <td>  
                    <?php 
                        // the image  donsent  exists
                             echo  '<img class = "patientImgNot"   src = "../images/default-avatar.jpg" width = "90px" "/>';  
                    ?>
                </td>
                 
                 <td><?php echo $item["nom"] ?></td>
                 <td><?php echo $item["prenom"] ?></td>
                 <td>
                    <?php echo "--"?>
                    </td>
                 <td>
                    <?php 
                        $dateTimeArr = $medecin->separateDateTime($item);
                        echo $dateTimeArr[0];
                    ?>
                 </td>
                 <td>
                 <?php 
                        $dateTimeArr = $medecin->separateDateTime($item);
                        $string = $dateTimeArr[1];
                        
                        $string = substr($string, 0,5);
                        echo $string ;
                    ?>
                 </td>
                 <td><?php echo  "--"; ?></td>
                
                 
                 
                 <td class="accept">
                       <i class="fa-solid fa-ban" style = "color:red"></i>  
                 </td>
                 <td>
                      <form method="post">
                                <input type="hidden" value="<?php echo $item['id'] ; ?>" name="id">
                        <button type="submit" class='deleteP' name="delete_rendezvous" onClick="return confirm('Êtes-vous sûr de vouloir supprimer ce patient?')"><i class='fa-solid fa-trash-can fa-lg'></i></button>
                                
                        </form>
                 </td>
                 <?php ?>
             </tr>



            <?php } ?>
            
             <?php } }
               
             ?>
           
         </tbody>

         <!-- <div class="prevNext">
             <a class="sec prNe" href="#">prev</a>
             <a class="sec" href="#">1</a>
             <a class="sec" href="#">2</a>
             <a class="sec" href="#">3</a>
             <a class="sec prNe" href="#">next</a>
         </div> -->
     </table>
 </div>
 </div><!--appointment section end-->


</div><!--main section end-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    
    let select = document.querySelector('#dateFilter');
    let buttonSubmit = document.getElementById("buttonSubmit");
    //console.log(select);

    let form = document.querySelector("#frm");
   form.addEventListener('submit',function(e){ 

        e.preventDefault();
        let formData = new FormData(this);
for (const pair of formData.entries()) {
    console.log(`${pair[0]}, ${pair[1]}`);
    }
    
//         console.log($(form));
//         e.preventDefault();
//     let select = document.querySelector('#dateFilter')
//     $(select).on('change',function()
// {
    console.log(this.name);
// let option = select.value;

    $.ajax({
    type: "POST",
    url: "mainRendezVous.php",
    data: formData,
    processData: false,
    contentType: false,
    // success: function (response) {
        
    //     let res = jQuery.parseJSON(response);
    //     //===========success case-----------
    //     if(res.status == 200){
            
    //         alert(res.message);
           
    //         //==============refresh la page
    //         //location.reload(true);

    //     }    //=============db probleme query return falsy value

        // else {
            
        //     alert(res.message);
            
        // }
        } 
})
})



</script>