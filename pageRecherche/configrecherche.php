<?php
        // if(isset($_POST['search'])){
        //   $_SESSION['ville'] = $_POST['ville'];
        //   $_SESSION['specialite'] = $_POST['specialite'];
        //   $ville = $_SESSION['ville'] ;
        //   $specialite = $_SESSION['specialite'] ;
        // Start pagination
        
        $perPage =10 ; 
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $start = ($page > 1 ) ? ($page * $perPage) -$perPage : 0;
        $divs="SELECT * FROM medecin WHERE (specialite= '$_SESSION[specialite]' AND ville='$_SESSION[ville]' ) OR ( ( nom = '$_SESSION[nom]' OR prenom = '$_SESSION[nom]'  OR CONCAT(CONCAT(nom,' '),prenom) LIKE '%$_SESSION[nom]%') AND ville='$_SESSION[ville2]' )    lIMIT  $start , $perPage";
        $result2 = mysqli_query ($conn , $divs);
        $result3 = mysqli_query($conn, "SELECT * FROM medecin WHERE (specialite= '$_SESSION[specialite]' AND ville='$_SESSION[ville]' ) OR ( ( nom = '$_SESSION[nom]' OR prenom = '$_SESSION[nom]'  OR CONCAT(CONCAT(nom,' '),prenom) LIKE '%$_SESSION[nom]%') AND ville='$_SESSION[ville2]' )  ");
        $total = mysqli_num_rows($result3);
        $pages = ceil($total/$perPage);

        $result = mysqli_query($conn,"select * from medecin WHERE (specialite= '$_SESSION[specialite]' AND ville='$_SESSION[ville]' ) OR ( ( nom = '$_SESSION[nom]' OR prenom = '$_SESSION[nom]'  OR CONCAT(CONCAT(nom,' '),prenom) LIKE '%$_SESSION[nom]%') AND ville='$_SESSION[ville2]' )    lIMIT  $start , $perPage ");
        $resultArray = array();
        //fetch data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        
        
        // End pagination
        // $query="SELECT * FROM medecin WHERE specialite= '$_SESSION[specialite]' AND ville='$_SESSION[ville]'";
        // $result= mysqli_query($conn,$query);
        // $queryResults = mysqli_num_rows($result);
        if ($total > 0){
          $u=0;
          while($row=mysqli_fetch_array($result2)){

           $b = $i++;
           
      
          // echo $resultArray[$i]['nom'];
          if($resultArray[$u]['photo'] != null){ 
            echo' <div class="medecin-info info1" id="'."$row[id]".'">
          <div class="div-photo">';
           ?>
            
            <img id="photo"  src="data:image;base64,<?php echo $resultArray[$u]['photo'] ;?>" class="img-medecin med1">
          
         
       <?php  $u++;}
        else{
          
          if("$row[sexe]" === "femme"){
            echo' <div class="medecin-info info1" id="'."$row[id]".'" >
        <div class="div-photo">
        <img
        src="assets/medecinfemme.jpg"
        alt="medecin femme"
        class="img-medecin"
        
      />';
          }
          else{
            
          echo' <div class="medecin-info info1" id="'."$row[id]".'" >
          <div class="div-photo">
          <img
          src="assets/medecinhomme.jpg"
          alt="medecin "
          class="img-medecin"
          
        />';
          } 
             }
        
 
          echo '<div class="voirplus plus1">
          <button class="btn-voirplus btn1 voirprof" id="'."$row[id]".'">voir  profil</button>
        </div>
      </div>
      <div class="div-info" >
      <h4> Dr '."$row[nom]"." "."$row[prenom]".'</h4>';
        if(empty("$row[adresse]") == true){
          echo '<p>'."$row[ville]".'</p>';
        }
        else{
          echo '<p>'."$row[adresse]"." ,"."$row[ville]".'</p>';
          }
       
          if(empty("$row[numero]") == true){
              echo '<p > numero non disponible </p>';
          }
          else{
            echo '<p >'."$row[numero]".'</p>';
          }
          if(empty("$row[inscrit]") == true){
       echo' <button class="voir-rdv" id="'."$row[id]".'" >Voir Profil</button> ';
          }
        else{
       echo' <button class="prendre-rdv" id="'."$row[id]".'" >Prendre rendez-vous</button> ';

        }
     
       echo'
      </div>
    </div>';
         
        }
        
      }

      // config lat and lon
      if(isset($_GET["var1"])){
      $requete="SELECT * FROM medecin WHERE id = '$_GET[var1]'";
      $res = mysqli_query ($conn , $requete);
      $ro=mysqli_fetch_array($res);
      $lat ="$ro[lat]";
      $lon = "$ro[lon]";
      $nom = "$ro[nom]";
      $adresse = "$ro[adresse]";
      $prenom = "$ro[prenom]";
      $ville = "$ro[ville]";

      }
      $b = isset($_GET["var1"]);
    
        ?>
        