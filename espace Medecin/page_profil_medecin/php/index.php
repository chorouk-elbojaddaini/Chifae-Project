      <?php 
      session_start();
      require("./database/functions.php");
         
      if (empty($_SESSION['SESSION_EM'])) {
            header("location:../../../connexionDoc/logout.php");        
                die();
        }
        
      include("./navBar.php");
   
      include("./sideBar.php");
      include("./mainProfil.php");
     
      include("./footer.php"); ?>
          
   


    



  
</body>
</html>