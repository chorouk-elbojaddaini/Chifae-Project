<footer>
    <div class="container">
      <div class="wrapper">
        <div class="footer-widget">
          <a href="../../pageAcceuil/index.php">
              <div class="logo-footer">
            <img src="../images/logo.png" class="logo" />
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
            <li><a href="../../pageAcceuil/index.php">Acceuil</a></li>
            <li><a href="../../connexionDoc/index.php">Medecin</a></li>
            <li><a href="../../connexionPat/index.php">Patient</a></li>
            <!-- <li><a href="#">testimonial</a></li> -->
            <li><a href="../../ContactPage/contact.php">contact</a></li>
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Services</h6>
          <ul class="links">
            <li><a href="../../pageAcceuil/index.php">prise de RDV</a></li>
            <li><a href="../../connexionPat/index.php">Dossier médical</a></li>
            <li><a href="../../connexionDoc/index.php">calendrier pour medecin</a></li>
            <!-- <li><a href="#">Contacts de Laboratoires</a></li> -->
          </ul>
        </div>
        <div class="footer-widget">
          <h6>Aide &amp; Support</h6>
          <ul class="links">
            <!-- <li><a href="#">support center</a></li> -->
            <!-- <li><a href="#">live chat</a></li> -->
            <li><a href="../../pageAcceuil/index.php#qa">FAQ</a></li>
            <li><a href="#">Conditions Générales d’Utilisation </a></li>
          </ul>
        </div>
      </div>
      <div class="copyright-wrapper">
        <p>
            © 2022 Shifae.com - Tous les droits sont réservés
          <a href="../../pageAcceuil/index.php" target="blank">Shifae</a>
        </p>
      </div>
    </div>
  </footer>
  
  <div id="boiteAffichage">
        <div class="infos-spec"><i class="fa-solid fa-heart-pulse"></i> Spécialités</div>
        <div class="class-spec">
        <?php  for($i=0;$i<count($arrayspec);$i++){
            if($arrayspec[$i] == null) {break;}
             else {?>
                     <span> <?php echo $arrayspec[$i]; ?>
                      </span>
                      <?php } ?>
                        <?php } ?> </div>
        <img src="../images/close.svg.png" class="close" onclick="toggle('boiteAffichage')">
    </div>
    <div id="boite2">
    <span class="span-desc">Description</span>
        <div class="description">
                        <?php 
                        for($i=0;$i<count($arrayDesc);$i++){
                            echo $arrayDesc[$i];
                            echo " ";
                        }
                         ?>
                    </div>
        <img src="../images/close.svg.png" class="close" onclick="toggle('boite2')">
    </div>
    <div id="boite3">
    <div class="experiences-content"><i class="fa-solid fa-stethoscope"></i> Expériences </div>
        <ul class="ul-experiences">
                    <?php  for($i=0;$i<count($arrayExperience);$i++){ 
                         if($arrayExperience[$i] == "") { ?>
                         <li class="pasExper"> <?php echo "pas encore d'expérience"; ?>
                    </li>
                         <?php 
                            break;
                        }
                         else {?>
                     <li> <?php echo $arrayExperience[$i]; ?>
                    </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
        <img src="../images/close.svg.png" class="close" onclick="toggle('boite3')">
    </div>
    <div id="boite4">
    <div class="diplome"><i class="fa-solid fa-graduation-cap"></i> Cursus et diplômes</div>
                    <ul class="ul-diplome" style="list-style: inside">
                    <?php  for($i=0;$i<count($arrayDiplome);$i++){ ?>
                     <li> <?php echo $arrayDiplome[$i]; ?>
                    </li>
                        <?php } ?>
                    </ul>
                    <img src="../images/close.svg.png" class="close" onclick="toggle('boite4')">
    </div>
    <script>
// position we will use later
<?php if((isset($lat) || isset($lon))!= true){ ?>
  var lat = 33.589886 ;
var lon = 7.603869;
<?php }

else{
?>
var lat = <?php 


echo $lat;
 ?>;
var lon = <?php 
echo $lon; }?>

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

<script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="./navscript.js"></script>
  <script src="./scripts/profil.js"></script>

