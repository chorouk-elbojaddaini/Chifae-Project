    <?php 
         session_start();
         
        include("./database/functions.php");
        // $data = $medecin->getData('medecin',$_SESSION['SESSION_EM']);
        // $idMed = $data[0]['id'];
        // $_SESSION['id'] = $idMed;
        if (empty($_SESSION['SESSION_EM'])) {
            header("location:../../../connexionDoc/logout.php");        
                die();
        }
        include("navbar.php");
        include("sidebar.php");
        include("mainRendezVous.php");
        include("footer.php");
       
    ?>


     
            
            
        
       


    
   