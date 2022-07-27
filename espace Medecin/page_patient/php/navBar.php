<?php
$medecin_shuffle = $medecin->getData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css ?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="../appointment/appointment.css ?v=<?php echo time(); ?>"> -->
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans:wght@100&family=Lexend+Deca:wght@100&family=Livvic:wght@100&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
     <title>Liste des patients | Shifae</title>
     <link rel="icon" type="image/png" href="../images/logo.png" />
</head>
<body>
    
    
    <div class="container" id = "blur">

      <div class="navbar">
        <section class="top-nav"><!--nav bar-->
            <div class="navLogo">
                <img class="logo" src="../images/logo.png" alt="#">
                <span class="chifaeNav">Shifae</span>
            </div>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
            </label>
            <ul class="menu">
                <li>
                    <a  class="nav-links pink" href="#">Acceuil</a>
                </li>
                <li>
                    <a  class="nav-links " href="#"><i class="fa-solid fa-arrow-right-from-bracket icon .logout "></i> Deconnexion</a>
                </li>
                
                
            </ul>
            <a href="#">
            <?php
               if($medecin_shuffle[0]['photo'] != null){
               ?>
              <img id="photo"  src="data:image;base64,<?php echo $medecin_shuffle[0]['photo'] ;?>" width = "90px" class="imageNavbar">
            
               <?php
               }
                else{
                  ?>
                    <img  src="../images/avatar.jpeg" alt="profile" id="photo" style="width:55px;" class="imageNavbar">
              
              
              <?php
            }?>
                
        </a>
        </section> <!--nav bar end-->
      </div>