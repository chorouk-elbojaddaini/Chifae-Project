
<?php
 session_start();
 $_SESSION["id"] = $_GET["id"];
 $idMed = $_GET["id"];
 $hour = $_GET["hour"];
 $min = $_GET["min"];

 if($hour <= "9"){
   $hour = "0".$hour;
 }
 if($min == "0"){
  $min = $min."0";
 }
 

 $time = $hour.":".$min;

 if($_GET["month"]+1 < "10"){
   $month = "0".$_GET["month"];
 }
 else{
   $month = $_GET["month"];
 }


 
 $_SESSION["year"] = $_GET["year"];
 $_SESSION["month"] = $_GET["month"]+1;
 $_SESSION["day"] = $_GET["day"];
 $_SESSION["hour"] = $_GET["hour"];
 $_SESSION["min"] = $_GET["min"];
$_SESSION["heure"] = $time;

 $_SESSION["date"] = $_SESSION["year"]."-".$_SESSION["month"]."-".$_SESSION["day"];

      
  

 include('../pageAcceuil/cnx.php'); 


 include("./dbController.php");
 include("./calendar.php");
 $db = new DBController();
 $calendrier = new Calendrier($db);




            $time = $calendrier->create_time_range("8:00","12:00","30 mins");
             // print_r($time);
             // echo "<db> <db>";
             $column_horaire = array("Horaires");
             $horaire_medecin = $calendrier->getDataCalendrier("medecin",$column_horaire[0],"id",$idMed);
             $string_rendez_vous_medecin = "start_datetime,end_datetime";
             $start_end_rendezvous = $calendrier->getDataCalendrier("schedule_list",$string_rendez_vous_medecin,"idMedecin",$idMed);
            
     
     
             $semaine = $calendrier->dayRange($horaire_medecin);
              // $medecin_shuffle =$calendrier->getData('medecin',$idMed);
              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style.css ?v=<?php echo time(); ?>" />
    <link rel="icon" type="image/png" href="logo.png" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
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
          <a href="../pageAcceuil/index.php">
              <img src="./assets/logo.png" alt="logo" class="logo"
            /></a>
            <h4>Shifae</h4>
          </div>
          <ul class="nav-menu">
            <li><a href="../pageAcceuil/index.php">Acceuil</a></li>
            <li class="medecin"><a href="../connexionDoc/index.php">Medecin</a></li>
            <li class="patient"><a href="../connexionPat/index.php">Patient</a></li>
            <li><a href="../ContactPage/contact.php">Contact</a></li>
          <li><a href="../aboutUs/about.php" class="iconnav" ><i class="uil uil-info-circle " ></i></a></li>

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

<form action="site.php?medecin=<?php echo  $_SESSION["id"] ;?>&year=<?php echo $_SESSION["year"];?>&month=<?php echo $_SESSION["month"];?>&day=<?php echo $_SESSION["day"]; ?>&hour=<?php echo $_SESSION["hour"];?>&min=<?php echo $_SESSION["min"]; ?>"  method ="POST" id="confirm-email" name="formm" onsubmit="return validateForm()" >

    <div class="form-step form-step-active " id="activee">
    <?php if(isset($_GET["id"])== true){ 
        $id = $_GET["id"];
        $result = mysqli_query($conn, "SELECT * FROM medecin WHERE id = $id ");
        $row = mysqli_fetch_array($result);
        $medecin_shuffle =$calendrier->getData('medecin',$idMed);
        echo '<div class="information-medecin">';
         if($medecin_shuffle[0]['photo'] != null){ ?>
          <div class="div-photo">
          <img id="photo"  src="data:image;base64,<?php echo $medecin_shuffle[0]['photo'] ;?>" height="100" width="100" border-radius="50%" class="img-medecin medecin1">
        </div>

     <?php }
      else{
        
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
          
          <!-- <input type="date" name="date" class="jour" id="date" value =" // if(isset($_POST['sub'])){ echo $_POST["date"] ;} "/> -->
        <!-- <h5 >Veuillez choisir l'heure  du rendez-vous </h5> -->
      </div>

      <div class="time">
      <div class="boite-cal" id="boite">
        <i class="fas fa-angle-left prev"></i>
        <div class="weekdays">
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
        </div>
        <div class="days">
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>

        </div>
        <i class="fas fa-angle-right next"></i>
        <div class="containerDispCal">
            <div class="disponibilitesCal " id="A">
              
            </div>
            <div class="disponibilitesCal " id="B">
              
            </div>
            <div class="disponibilitesCal" id="C">
               
            </div>
            <div class="disponibilitesCal" id="D">
                
            </div>
            <div class="disponibilitesCal" id="E">
               
            </div>
            <div class="disponibilitesCal" id="F">
               
            </div>
            <div class="disponibilitesCal" id="G">
                
            </div>

        </div>

        <p class="afficherdisponibilite" >afficher plus de disponibilités</p>
    </div>

    
      </div>
      
      
          
      
      <button type="button"  name = "submitDateTime" class="btn btn-next width-50 ml-auto"  >Suivant</button>
      


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
                        <input  type="text" name="email" class="number" placeholder="ex: mohammed@gmail.com" value ="<?php if(isset($_POST['sub'])){ echo $_POST["email"] ;} ?>"/>
                      </div>
                    <div class="input-group input-number">
                        <label for="dob">Votre numéro 
                        </label>
                        <input id="phone" type="tel" name="phone" class="number" value ="<?php if(isset($_POST['sub'])){ echo $_POST["phone"] ;} ?>" />
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

<?php 
  
 
  
?>
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
        <a href="../pageAcceuil/index.php">
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

<script async defer>
    //ghadi njibo les horaires fo9Ach khdam wn7tolo les horaires dyawlo tmak 
    //wmoraha njibo les rendez vous dyawlo bla la date wndbro 3la la date tmak fl calendrier dyalna
    // wila kant l'heure deja kayna fles horaires dyawlna ndiro fblastha tire

    var semaine = <?php echo json_encode($semaine); ?> ;
    var timeS = <?php echo json_encode($start_end_rendezvous); ?> ;
    var year = <?php echo $_SESSION["year"]; ?> ;
    var month = <?php echo $_SESSION["month"]; ?> ;
    var day = <?php echo $_SESSION["day"]; ?> ;
    var hour  = <?php echo $_SESSION["hour"]; ?> ;
    var min  = <?php echo $_SESSION["min"]; ?> ;
    var idMedecin = <?php echo $_SESSION["id"]; ?>;
    if(min == "0"){
      min = min + "0";

    }
    if(hour<="9"){
      hour = "0"+hour;
    }
    var time 
    time = hour+":"+min;
    
   


    function ecrireDispo(jour, id, length, day) {

        var jourL = document.getElementById(id)

        for (let i = 0; i < length; i++) {
            day += `<span>${jour[i]}</span>`;
        }

        jourL.innerHTML = day;


    }

    function removeElmt(id) {
        var jourL = document.getElementById(id)
        jourL.replaceChildren()
    }

    function getNextChar(char) {
        return String.fromCharCode(char.charCodeAt(0) + 1);
    }






    var tes = 0
    let d
    var getDaysInMonth = function (month, year) {
        // Here January is 1 based
        //Day 0 is the last day in the previous month
        return new Date(year, month, 0).getDate();
        // Here January is 0 based
        // return new Date(year, month+1, 0).getDate();
    };
    var arr = []
    var test = []

    function addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }
    var date = new Date()
    var date2 = date
    const months = [
        "Jan",
        "Fev",
        "Mar",
        "Avr",
        "Mai",
        "Jun",
        "Jull",
        "Aou",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];
    var year = date.getFullYear()
    isLeapYear = (year) => {
        return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
    }
    getFebDays = (year) => {
        return isLeapYear(year) ? 29 : 28
    }
    let k = 0
    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

    var trueVar = false
    var mois = date.getMonth()
    var var2 = date.getDate()
    const Jours = [
        "Dim",
        "Lun",
        "Mar",
        "Mer",
        "Jeu",
        "Ven",
        "Sam"
    ]
    var todaydisp = []


    function deleteItem(item, array, arrayNew) {

        for (var i = 0; i < array.length; i++) {

            if (array[i] === item) {

                array[i] = null

            }


        }
        return array;


    }


    var todayAppointment = []

    function retournerTodayRendezvous(appointment, currentDate) {
        let startDate = "";

        for (let i = 0; i < appointment.length; i++) {
            startDate = appointment[i]["start_datetime"];
            let dateR = new Date(startDate);
            if (dateR.toDateString() === currentDate.toDateString()) {
                todayAppointment.push(appointment[i]);
            } else {
                // Different day
            }
        }
        return todayAppointment;
    }

    function supprimer(todaydisp, item, start, end) {


        if ("1:00:00" <= item && item <= "9:59:00") {
            item = "0" + item

        }
        if (start <= item && end >= item) {
            if (item < "10:00:00") {
                item = item.substr(1, 14)
            }
            todaydisp = deleteItem(item, todaydisp);
        }
        return todaydisp
    }



    function retournerDispo(appointment, todaydisp) {
        var todaydispNew = []
        for (let i = 0; i < todaydisp.length; i++) {
            todaydispNew[i] = todaydisp[i]
        }
        for (let j = 0; j < appointment.length; j++) {

            let time_start_datetime = appointment[j]["start_datetime"];
            let time_start_string = time_start_datetime.split(" ");
            let time_start = time_start_string[1];
            let time_end_datetime = appointment[j]["end_datetime"];
            let time_end_string = time_end_datetime.split(" ");
            let time_end = time_end_string[1];

            for (let k = 0; k < todaydispNew.length; k++) {
                supprimer(todaydispNew, todaydispNew[k], time_start, time_end);
            }
        }
        return todaydispNew
    }
  

    function fct(y,m,d,h,min){
        window.history.replaceState('', 'New Page Title','?id='+idMedecin+'&year='+y+'&month='+m+'&day='+d+'&hour='+h+'&min='+min);
        $('.prendre-rdv').click(function() {
      
      window.history.pushState('', 'New Page Title', '../cabinetProject/pageValidation/validation.php?id='+idMedecin+'&year='+y+'&month='+m+'&day='+d+'&hour='+h+'&min='+min);
       
    });
    window.location.reload()
    }

    var nextI = 0
  var nextTrue = 0
  var x = 1
    const renderCalendar = () => {
        var semaine = <?php echo json_encode($semaine); ?> ;
        var week = []
        var id = "A"
        var yes = 0
        arr.length = 0
        const Days = document.querySelectorAll(".weekdays div");


        const monthDays = document.querySelector(".days");

        var div = document.querySelectorAll(".days div")


        let a = 0

        trueVar = false
        var dim = []

        
        var s = 0

        for (k = 0; k < 7; k++) {
            todayAppointment = []
            todaydisp = []
            yes = 0
            if (d == new Date().getDate() && date.getMonth() == new Date().getMonth()) {
                var precedent = document.querySelector(".prev")
                precedent.classList.add('hide')
            }
            d = date.getDate()
            var c = date.getDay()
            let time_end
            console.log(date)

            todayAppointment = retournerTodayRendezvous(timeS, date)
            if (c == 0) {
                todaydisp = retournerDispo(todayAppointment, semaine[6])
            } else {
                todaydisp = retournerDispo(todayAppointment, semaine[c - 1])
            }
            var span = "#" + id + " button"
            var byId = "#" + id
            var j = document.querySelectorAll(span)
            var selectId = document.querySelector(byId)
            week = []
            if (c == 6) {
                week = todaydisp
            } else if (c == 0) {
                week = todaydisp
            } else {
                week = todaydisp



            }

            let n = 0
            
            for (n = 0; n < week.length; n++) {
              if(week.length == 1){
                    week.length = 21
                    week[n] = "--"
                }
                var idElmt = x 
                if (week[n] == null) {
                    week[n] = "--"
                    

                }
               else {
                    if ("1:00:00" <= week[n] && week[n] <= "9:30:00") {
                        week[n] = "0" + week[n]


                    }
                    

                }
                // week[n] = week[n].substr(0, 5)
                //  var e = document.createElement("span")
                //  e.innerHTML = week[n]
                //  e.classList.add("nonDisponible")
                //  if(week[n] == "--") {
                //     e.classList.remove("nonDisponible")
                //  }

                week[n] = week[n].substr(0, 5)
                 var e = document.createElement("button")
                 e.setAttribute("value",week[n])
                 e.setAttribute("type","button")

                e.innerHTML = week[n]
                var input = document.createElement("input")
                input.setAttribute("type","hidden")
                input.setAttribute("name","heure")
                input.setAttribute("value",week[n])
                e.classList.add("Disponible")
                if(week[n] == "--") {
                e.classList.remove("Disponible")
                 }

                
                 if(n >= 4){
                      e.classList.add("hidden")
                      e.classList.add("showHide")
                 }
                //  e.appendChild(input)
                 e.setAttribute("id",idElmt)
                 if(year == date.getFullYear() && month-1 == date.getMonth() && day ==date.getDate() && e.innerHTML == time){
                    
                    e.classList.add("clickable")

                 }
                 if(week[n]!="--"){
                    e.setAttribute("onclick","fct("+date.getFullYear()+","+date.getMonth()+","+date.getDate()+","+e.innerHTML.substr(0,2)+","+e.innerHTML.substr(3,2)+")")
                }
                // e.classList.add("classClick")
                

                //  console.log(e.innerHTML);
                 e.appendChild(input)
                selectId.appendChild(e)
                // var click = document.querySelector(".classClick")
                // click.addEventListener("click",()=>{
                //   window.location.reload()
                // })
                x = x+1
            }

          
            if(nextTrue == 8){
            var selectAll = document.querySelectorAll(span)
             for(let i=0;i<week.length;i++){
                selectAll[i].remove()
             }
           
        }
            id = getNextChar(id)

            arr.push(date.getDay())
            div[k].innerHTML = d + months[date.getMonth()];
            date = addDays(date, 1)



        }
        var s = 0
        for (let l = 0; l < arr.length; l++) {
            Days[l].innerHTML = Jours[arr[l]]
        }
        a++
     
    };

    renderCalendar()
    
    document.querySelector(".next").addEventListener("click", () => {
        
        nextTrue = 8
       
        var precedent = document.querySelector(".prev")
        precedent.classList.remove('hide')
        renderCalendar();
    });

    document.querySelector(".prev").addEventListener("click", () => {
        date = addDays(date, -14)
        renderCalendar();

    });


    const faqs = document.querySelector(".afficherdisponibilite");
  faqs.addEventListener("click", () => {
    var elmt = document.querySelectorAll(".hidden")
    for (let i = 0; i < elmt.length; i++) {
         elmt[i].classList.toggle("showHide")
       }

    
    if (faqs.textContent === "afficher plus de disponibilités") {
      console.log("moins");
      faqs.textContent = "afficher moins de disponibilités";
    } else {
        console.log("plus");
      faqs.textContent = "afficher plus de disponibilités";
    }
  });

  
</script>

      <!-- include the script -->
      <script src="http://code.jquery.com/jquery-latest.js"></script>
   
    <script src="./app.js"></script>
    <script src="main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

</html>