      <?php 
      session_start();
      require("./database/functions.php");
      if (empty($_SESSION['SESSION_EM'])) {
        header("location:../../../connexionDoc/logout.php");        
            die();
    }
      include("./navBarModPr.php");
      include("./sideBarModPr.php");
       include("./mainModPr.php");
     
      include("./footerModPr.php"); 

    

   
    
?>


    <script src="../assets/script.js"></script>
</body>
</html>