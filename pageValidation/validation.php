
<?php
 session_start();

 $_SESSION["id"] = $_GET["id"];


 include('../pageAcceuil/cnx.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="./assets/logo.png" />
    <script
    src="https://kit.fontawesome.com/64d58efce2.js"
    crossorigin="anonymous"
  ></script>
  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link
  rel="stylesheet"
  href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css"
/>
    <!-- cdn icons link  -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <title>validation|Shifae</title>
      <!-- Font Awesome CDN Link -->
      <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
  />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</head>
<body>
    <nav>
        <div class="container nav_container">
          <div class="logo_cont">
            <a href="index.html"
              ><img src="./assets/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Shifae</h4>
          </div>
          <ul class="nav-menu">
            <li><a href="../pageAcceuil/index.php">Acceuil</a></li>
            <li class="medecin"><a href="../connexionDoc/index.php">Medecin</a></li>
            <li class="patient"><a href="../connexionPat/index.php">Patient</a></li>
            <li><a href="../ContactPage/contact.php">Contact</a></li>
          <li><a href="../aboutUs/about.html" class="iconnav" ><i class="uil uil-info-circle " ></i></a></li>

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
<!-- Start section  -->
<div class="validation">

<div class="form " >
    <h1 class="text-center"> </h1>
    <!-- Progress bar -->
    <div class="progressbar">
      <div class="progress" id="progress"></div>
      
      <div
        class="progress-step progress-step-active"
        data-title="Date/Heure"
      ></div>
      <div class="progress-step" data-title="Vérification"></div>
      <div class="progress-step" data-title="Confirmation"></div>
      <!-- <div class="progress-step" data-title="Succès"></div> -->
    </div>

    <!-- Steps -->
    <script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>

<form action="site.php?medecin=<?php echo  $_SESSION["id"] ;?>"  method ="POST" id="confirm-email" name="formm" onsubmit="return validateForm()" >

    <div class="form-step form-step-active " id="activee">
    <?php if(isset($_GET["id"])== true){ 
        $id = $_GET["id"];
        $result = mysqli_query($conn, "SELECT * FROM medecin WHERE id = $id ");
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
    } ?>
    
      <div class="step-grid">
      <div class="day">

          <h5 >Veuillez choisir la date   du rendez-vous </h5>
          <input type="date" name="date" class="jour" id="date" value ="<?php if(isset($_POST['sub'])){ echo $_POST["date"] ;} ?>"/>
        <!-- <h5 >Veuillez choisir l'heure  du rendez-vous </h5> -->
      </div>
      <div class="time">
        <div class="heure"  >
            <button type="button"   value="09:00"><input type="hidden"  name="heure" value="09:35" class ="heurehidden" id="heure" value ="<?php if(isset($_POST['sub'])){ echo $_POST["heure"] ;} ?>">09:35</button>
        </div>
       
      </div>
      
      <p class="see-more">voir plus</p>
          
      
      <button type="button"  class="btn btn-next width-50 ml-auto"  >Suivant</button>
      
    </div>
  
  

    </div>
        
        
  
    <!-- ===================================== step 2 =========================================  -->
    
    <div class="form-step " >
       
              <div class="" id="ste">
                <div class="input-group">
                    <label for="dob">Votre nom </label>
                    <input type="text" name="nom" id="name" placeholder="ex: mohammed" value ="<?php if(isset($_POST['sub'])){ echo $_POST["nom"] ;} ?>" />
                  </div>
                  
                  <div class="input-group">
                    <label for="dob">Votre prénom</label>
                    <input type="text" name="prenom" id="prename" placeholder="ex: kassimi" value ="<?php if(isset($_POST['sub'])){ echo $_POST["prenom"] ;} ?>"/>
                  </div>
                  <div class="input-group ">
                        <label for="dob">Votre email
                        </label>
                        <input  type="email" name="email" class="number" placeholder="ex: mohammed@gmail.com" value ="<?php if(isset($_POST['sub'])){ echo $_POST["email"] ;} ?>"/>
                      </div>
                    <div class="input-group input-number">
                        <label for="dob">Votre numéro 
                        </label>
                        <input id="phone" type="number" name="phone" class="number" value ="<?php if(isset($_POST['sub'])){ echo $_POST["phone"] ;} ?>" />
                      </div>
                      
	                  	
                      
              </div>        
            <div class="information-confid">
                <p>Nous allons vous envoyer un Email à votre E-mail contenant un code de Confirmation , Ce code vous aide à valider votre rendez-vous . Priére d'entrer un email valide</p>
            </div>
        <div class="btns-group">
          <button type="button" value="Revenir" class="btn btn-prev"> Revenir </button>
          <button type="submit"   name="sub" value="next" id="subbtn" class="btn btn-next"  >Suivant</button>
        </div>
      </div> 
      
</form>
    <!-- ===================================== step 3 =========================================  -->
  


      <!-- <div class="form-step   " id="step3" >
  
        <h3 class="stepnb3">Nous avons envoyé un Email contenant un code au  </h3>
          <div class="step3">
            
              
                    <img src="assets/Mobile apps-bro.svg" alt="img"/>
                
                
                <div class="text-valide">
                    <p>Saisez le code de validation </p>
                    <input type="number"  name="code" placeholder="######"  />
                    <input type="submit"  value="vérifier" class="sub_code"/>
                  
                </div>
            
        </div>

        <div class="btns-group">
         <button type="button" value="Revenir" class="btn btn-prev">Revenir</button>
          <button type="button" value="Suivant" class="btn btn-next" id= "sub">Suivant</button>
        </div>
      </div>  -->


      
    <!-- ===================================== step 4 =========================================  -->
    <?php
    

    ?>
    </div>




    <footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="#">
              <div class="logo-footer">
            <img src="assets/logo.png" class="logo" />
            <p>Shifae</p></div>
          </a>
          <p class="desc">
          </p>
          <ul class="socials">
            <li>
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>des liens rapides</h6>
          <ul class="links">
            <li><a href="../pageAcceuil/index.php">Acceuil</a></li>
            <li><a href="../connexionDoc/index.php">Medecin</a></li>
            <li><a href="../connexionPat/index.php">Patient</a></li>
            <!-- <li><a href="#">testimonial</a></li> -->
            <li><a href="../ContactPage/contact.php">contact</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Services</h6>
          <ul class="links">
            <li><a href="../pageAcceuil/index.php">prise de RDV</a></li>
            <li><a href="../connexionPat/index.php">Dossier médical</a></li>
            <li><a href="../connexionDoc/index.php">calendrier pour medecin</a></li>
            <!-- <li><a href="#">Contacts de Laboratoires</a></li> -->
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Aide &amp; Support</h6>
          <ul class="links">
            <!-- <li><a href="#">support center</a></li> -->
            <!-- <li><a href="#">live chat</a></li> -->
            <li><a href="../pageAcceuil/index.php#qa">FAQ</a></li>
            <li><a href="../condition/condition.php">Conditions Générales d’Utilisation </a></li>
          </ul>
        </div>
      </div>
      <div class="copyright-wrapper">
        <p>
            © 2022 Shifae.com - Tous les droits sont réservés
          <a href="#" target="blank">Shifae</a>
        </p>
      </div>
    </div>
  </footer>

    <script src="main.js"></script>
    <script>



        function getIp(callback) {
 fetch('https://ipinfo.io/json?token=27ccfac15fd1e9 ', { headers: { 'Accept': 'application/json' }})
   .then((resp) => resp.json())
   .catch(() => {
     return {
       country: 'us',
     };
   })
   .then((resp) => callback(resp.country));
}
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
         preferredCountries: ["ma", "fr"],
            initialCountry: "auto",
            geoIpLookup: getIp,
          utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        const info = document.querySelector(".alert-info");

        function process(event) {
 event.preventDefault();

 const phoneNumber = phoneInput.getNumber();

 info.style.display = "none";
 error.style.display = "none";

 const data = new URLSearchParams();
 data.append("phone", phoneNumber);

 fetch("http://https://chifae-7431.twil.io/lookup.twil.io/lookup", {
   method: "POST",
   body: data,
 })
   .then((response) => response.json())
   .then((json) => {
     if (json.success) {
       info.style.display = "";
       info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
     } else {
       console.log(json.error);
       error.style.display = "";
       error.innerHTML = `Invalid phone number.`;
     }
   })
   .catch((err) => {
     error.style.display = "";
     error.innerHTML = `Something went wrong: ${err}`;
   });
}



  

 
 



$(document).on('submit',"#confirm-email" , function(e) {
  

    
const validate = document.querySelector(".validation");
validate.style.display = "none";

   
    // let formData = new FormData(this);
    // formData.append("abc", true);
    // for (const pair of formData.entries()) {
    //             console.log(`${pair[0]}, ${pair[1]}`);
    //           }
    // $.ajax({
    //     type: "POST",
    //     url: "site.php",
    //     data: formData,
    //     processData: false,
    //     contentType: false,
        
    // })
})
      </script>
      <!-- include the script -->
      <script src="http://code.jquery.com/jquery-latest.js"></script>
   
    <script src="./app.js"></script>

</body>
</html>