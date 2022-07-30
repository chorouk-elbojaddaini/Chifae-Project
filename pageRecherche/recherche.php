<?php 
 session_start();
 error_reporting(E_ERROR | E_PARSE);

// header("Cache-Control: no cache");
// session_cache_limiter("private_no_expire");
include('../pageAcceuil/cnx.php'); 



// pagination 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" type="image/png" href="./logo.png" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css"
    />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css"
    />
    <!-- Jquery lin  -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
      charset="utf-8"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" charset="utf-8"></script>
    <!-- cdn icons link  -->
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <title>Rechercher|Shifae</title>
    <!-- Font Awesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <nav>
      <div class="container nav_container">
        <div class="logo_cont">
          <a href="index.html"
            ><img src="./assets/logo.png" alt="logo" class="logo"
          /></a>
          <h4>Shifae 
            <div id="div_refresh">
            </div>
          </h4>
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
   
    <!-- search section  -->
    <div class="search-container">
      <div class="search">
        <form action="?var1=0&page=1" method="post">
          <input
            type="text"
            name="nom"
            id="nom"
            placeholder="cherchez médecin"
            value ="<?php if(isset($_SESSION['search2'])){ echo $_POST['nom'];} ?>" 
          />
          <select id="villes" name="ville2">
            <option value=" (ville?)" class="ville">Ville</option>
            <?php
                  $query = "SELECT DISTINCT ville FROM medecin " ;
                  $result = mysqli_query($conn , $query);
                 $total = mysqli_num_rows($result);
                 echo $total;
                 while($row=mysqli_fetch_array($result)){
                  echo '<option value="'."$row[ville]".'" ';?><?php if(isset($_POST['search2'])){if($_POST["ville2"] == "$row[ville]"){echo "selected";} } ?> <?php echo '>'."$row[ville]".'</option>'; 
                 }
                 ?>
          </select>
          <div>
            <button type="submit" name="search2" id="search" onClick="history.go(0);">
              Chercher
              <i class="uil uil-search"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="medecin-container1"><h3> 
    <?php
      if(isset($_POST['search']))
      {


   
    
    
      if(isset($_POST['search'])){
        $_SESSION['search']=$_POST['search'];

        $_SESSION['ville'] = $_POST['ville'];
        $_SESSION['specialite'] = $_POST['specialite'];
        $ville = $_SESSION['ville'] ;
        $specialite = $_SESSION['specialite'] ; 
        $_SESSION['nom'] = "";
        $_SESSION['ville2'] = "";  

      } 

      elseif (isset($_POST['search2']))
      {
             $_SESSION['nom'] = $_POST['nom'];

      elseif (isset($_POST['search2'])){
        $_SESSION['search2']=$_POST['search2'];
            $_SESSION['nom'] = $_POST['nom'];

             $_SESSION['ville2'] = $_POST['ville2'];
             $_SESSION['ville'] = "";
             $_SESSION['specialite'] = "";
      }
     
        $query="SELECT * FROM medecin WHERE (specialite= '$_SESSION[specialite]' AND ville='$_SESSION[ville]' ) OR (( nom = '$_SESSION[nom]' OR prenom = '$_SESSION[nom]'  OR CONCAT(CONCAT(nom,' '),prenom) LIKE '%$_SESSION[nom]%' ) AND ville='$_SESSION[ville2]')  ";
        $result= mysqli_query($conn,$query);
      $queryResults = mysqli_num_rows($result);
      echo $queryResults ; ?> médecins <?php if  (isset($_POST['search2'])) {echo "$_SESSION[nom]";} elseif (isset($_SESSION['search'])){ echo "$_SESSION[specialite]";}   ?>  <?php if  (isset($_POST['search2'])) {echo "à  "."$_SESSION[ville2]";} elseif (isset($_SESSION['search'])){ echo "à  "."$_SESSION[ville]";}  ?> trouvés</h3></div>
    <!-- <div class="popup" id="popup-1"> -->
      <!-- <section class="overlay"></section>
      <div class="content" scroll="no" style="overflow: hidden">
        <div class="close-btn">&times;</div>
        <iframe
          src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23009688&ctz=Africa%2FCasablanca&showTitle=0&showDate=1&showNav=1&showPrint=0&showCalendars=0&showTz=0&src=Z2hpemxhbmVrYXNzaW1pOEBnbWFpbC5jb20&src=Y2xhc3Nyb29tMTAzMTA1MjcxNjA0ODQ2MjI4NzM0QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y2xhc3Nyb29tMTA0Mzc3MzU1NDczMzc3OTI0MTUzQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=dW1wLm1hX2NsYXNzcm9vbTRmYTQwNDljQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&src=Y19jbGFzc3Jvb20xZGFkMjlmOEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y2xhc3Nyb29tMTE1NzIwNjk4MzQ4NDE4OTk0ODY2QGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y2xhc3Nyb29tMTEyNzgwNjkyNjYzNDQ1NjczNTcwQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&src=ZnIubWEjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&src=Y19jbGFzc3Jvb205OTRjN2Y2YUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=Y2xhc3Nyb29tMTA2NTY0NjU4NjE0OTMyMjkzODkxQGdyb3VwLmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23039BE5&color=%233F51B5&color=%230B8043&color=%233F51B5&color=%2333B679&color=%230B8043&color=%233F51B5&color=%237627bb&color=%230B8043&color=%230B8043&color=%23c26401"
          style="border-width: 0"
          width="95%"
          height="80%"
          frameborder="0"
          scrolling="yes"
        ></iframe>
        
        <button class="prendre-rd" >Prendre un rendez-vous</button>
      </div>
       -->
    <!-- </div> -->
    <div class="medecin-container">
      <div class="medecin-lists">
       <?php include "configrecherche.php";
       ?>
      </div>

      <!-- <div id="googleMap"  style="width:110%;height:100%;"></div> -->
  <div id="googleMap" style="width:110%;height:100%;"></div>
       
<!-- 
<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnJyBCKh5zKV2G0e3KlFQrByK-ldNcSJQ&callback=myMap"></script> -->
        <!-- <iframe style="border: 1px solid rgb(214, 211, 211)" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7213.797775664161!2d51.48032200000001!3d25.307601!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4445832ba623e286!2zMjXCsDE4JzI3LjQiTiA1McKwMjgnNDkuMiJF!5e0!3m2!1sfr!2sus!4v1654691692413!5m2!1sfr!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
      
      <!-- ====  pagination Bar =======  -->
      
      <div class="pagination">
    <?php 
    if($_GET["page"] > 1){
    ?>
    <li class="">
          <a class="precedent"  href="?var1=0&page=<?php echo ($_GET["page"]-1); ?>"><i class="uil uil-previous"></i></a>
        </li>
      <?php } 
        $i=1;
        if( $i <$pages){ ?>
        <li class="">
          <a class="numberpage"  href="?var1=0&page=<?php echo $_GET["page"]; ?>"> page <?php echo $_GET["page"]; ?> de <?php echo $pages; ?></a>
        </li>
         <?php } ?>
        <?php
        if($_GET["page"] < $pages){
          ?>
        <li class="">
          <a class="precedent"  href="?var1=0&page=<?php echo ($_GET["page"]+1); ?>"><i class="uil uil-step-forward"></i></a>
        </li>
        <?php
        $i++;
        }
        ?>

        
      </div>
    </div>
    <!-- ===== end pagination Bar ========= -->
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
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnJyBCKh5zKV2G0e3KlFQrByK-ldNcSJQ&callback=myMap"></script> -->
<script>

// position we will use later
<?php if(isset($_GET["var1"])!= true){ ?>
  var lat = 33.589886 ;
var lon = 7.603869;
<?php }

else{
?>
var lat = <?php 
if(empty($lat)== true){ echo 33.589886 ;}

else {echo $lat;} 
 ?>;
var lon = <?php 
if(empty($lon)== true){ echo -7.603869;}
else {echo $lon;} ?>
<?php } ?>

// initialize map
map = L.map('googleMap').setView([lat, lon], 13);
// set map tiles source
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
  maxZoom: 18,
}).addTo(map);
// add marker to the map
marker = L.marker([lat, lon]).addTo(map);
// add popup to the marker

marker.bindPopup("<b><?php   if(isset($nom)){
    echo "dr ".$nom;
  }
  else{
    echo "";
  }?><?php   if(isset($prenom)){
    echo "  ".$prenom;
  }
  else{
    echo "";
  }?></b><br/><center><?php if(isset($adresse)){
    echo " ".$adresse."</br> ";
  }
  else{
    echo "";
  }
  
  if(isset($ville)){
    echo " ".$ville;
  }
  else{
    echo "";
  }?></center>").openPopup();
</script>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>



// console.log(myFunction());
var l = document.querySelectorAll(".page-link");
l.forEach(element => {
  element.addEventListener("click", () =>{
    var c=  element.textContent;
    
      })
  
  }
  )
 

$(document).ready(function(){
var a;
$('.medecin-info').mouseover(function(e) {
window.setTimeout(function () {
window.location.reload();
}, 2200);

   a = this.id;
var b = a;

const params = new URLSearchParams(location.search);

params.set('var1',a);
window.history.replaceState({}, '', `${location.pathname}?${params}`);





});


$('.prendre-rdv').click(function() {
   a = this.id;
var b = a;
window.history.pushState('', 'New Page Title', '../pageValidation/validation.php?id='+a+'&year=0&month=0&day=0&hour=0&min=0');
// document.location.href = '../pageValidation/validation.php';

});
$('.voir-rdv').click(function() {
    ide = this.id;
window.history.pushState('', 'New Page Title', '../profil/php?id='+ide);
// document.location.href = '../pageValidation/validation.php';

});
$('.voirprof').click(function() {
    ide = this.id;
window.history.pushState('', 'New Page Title', '../profil/php?id='+ide);
// document.location.href = '../pageValidation/validation.php';

});

});   
</script>


    <script src="recherche.js"></script>
  </body>
</html>
