
<?php 
 session_start();
 include("./database/functions.php");
 $medecin_shuffle = $medecin->getData();
foreach ($medecin_shuffle as $item) { 
 
     if("$item[photo]"!=null){ 

     $_SESSION["photo"] =$item['photo'];

     
 }
 break;
}
    
    include("./navBar.php");
    include("./sideBar.php");
    include("./main.php");
    include("./footer.php");
    
      

      

     

