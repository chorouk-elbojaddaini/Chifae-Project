
 <?php 
 echo $_POST['date'];

 
 if(empty($_GET["id"]) == false ){
   $_SESSION["id"] = $_GET["id"];
 $id = $_SESSION["id"];
   $result = mysqli_query($conn, "SELECT * FROM medecin WHERE id = '$_SESSION[id]'");
   $row = mysqli_fetch_array($result);

   echo '<div class="information-medecin">';
    if(empty("$row[photo]")==true){
   if("$row[sexe]" === "femme"){
     echo' <div class="div-photo">
     <img
       src="assets/medecinfemme.jpg"
       alt="medecin homme"
       class="img-medecin medecin1"
     />
   </div>';
   }
   else{
     
   echo' <div class="div-photo">
   <img
     src="assets/medecinhomme.jpg"
     alt="medecin homme"
     class="img-medecin medecin1"
   />
 </div>';
   }
 }
 else{
   echo'<div class="div-photo">
   <img
   src="data:image/jpg;base64,' . base64_encode("$row[photo]"). '"
     alt="medecin homme"
     class="img-medecin medecin1"
   />
 </div>'; 
      }
  
  echo' 
  
  <div class="div-info" >
  <h4> Dr '."$row[nom]"." "."$row[prenom]".'</h4>';
    if(empty("$row[adresse]") == true){
      echo '<p>'."$row[ville]".'</p>';
    }
    else{
      echo '<p>'."$row[adresse]"." ,"."$row[ville]".'</p>';
      }
    echo '<p class="affichernum">Afficher le numéro</p>' ;
   
      if(empty("$row[numero]") == true){
          echo '<p class="numero">pas disponible </p>';
      }
      else{
        echo '<p class="numero">'."$row[numero]".'</p>';
      }
      
   echo'
  </div>
</div>';
     }




 
?>