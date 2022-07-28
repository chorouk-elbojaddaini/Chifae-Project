<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styleProfil.css ?v=<?php echo time(); ?>">
    <link
        href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans:wght@100&family=Lexend+Deca:wght@100&family=Livvic:wght@100&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
        <link rel="icon" type="image/png" href="../images/logo.png" />
    <title>Profil | Shifae</title>
</head>

<body>
    <div class="container" id="blur">

    <nav>
      <div class="container nav_container">
        <div class="logo_cont">
          <a href="#"><img src="../images/logo.png" alt="logo" class="logo"/></a>
          <h4 class="shifae">Shifae</h4>
        </div>
        <ul class="nav-menu">
          <li><a href="#">Acceuil</a></li>
          <li class="medecin"><a href="#">Medecin</a></li>
          <li class="patient"><a href="#">Patient</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#" class="iconnav" ><i class="uil uil-info-circle" ></i></a></li>
          <!-- <li >
            <div class="langWrap">
            <a href="#" language="arabe"><img src="assets/maroc.jpg" alt="maroc" class="arabe"> Ar</a>
            <a href="#" language="french"><img src="assets/french.jpg" alt="maroc" class="arabe">Fr</a>
          </div>
        </li> -->
          </ul>
        <!-- drop down medecin  -->
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"></button>
          <div id="myDropdown" class="dropdown-content">
            <hr class="solid" />
            <a href="#">Mon espace </a>
            <hr class="solid" />
            <a href="#">Mes blogs</a>
            <hr class="solid" />
            <a href="#">Se déconnecter</a>
            <hr class="solid" />
          </div>
        </div>
        <!-- end  drop down medecin  -->
        <!-- drop down patient -->
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn"></button>
          <div id="myDropdown" class="dropdown-content">
            <hr class="solid" />
            <a href="#">Mon dossier medical</a>
            <hr class="solid" />
            <a href="#">Prendre un rendez-vous</a>
            <hr class="solid" />
            <a href="#">Se déconnecter</a>
            <hr class="solid" />
          </div>
        </div>
        <!-- end drop down patient -->
        <button class="open_menu_botton"><i class="uis uis-bars"></i></button>
        <button class="close_menu_botton">
          <i class="uis uis-multiply"></i>
        </button>
      </div>
    </nav>