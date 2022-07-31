
<?php 
 session_start();
 include("./database/functions.php");
 if (empty($_SESSION['SESSION_EM'])) {
   header("location:../../../connexionDoc/logout.php");        
       die();
}
    include("./navBar.php");
    include("./sideBar.php");
    include("./main.php");
  
    include("./footer.php");
    
      

      

     

