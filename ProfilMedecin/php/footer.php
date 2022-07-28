<footer class="footer">
            <div class="content">
                <div class="row">
                    <div class="footer-col">
                        <div class="logoChifae">
                            <img class="logo" src="../images/logo.png" alt="#">
                            <span class="chifae">Shifae</span>
                        </div>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h4>des liens rapides</h4>
                        <ul>
                            <li><a href="#">Acceuil </a></li>
                            <li><a href="#">Medecin</a></li>
                            <li><a href="#">Patient</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="#">Prise de RDV</a></li>
                            <li><a href="#">Dossier médical</a></li>
                            <li><a href="#">Calendrier pour medecin</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Aide &amp; Support</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Conditions Générales d’Utilisation </a></li>

                        </ul>
                    </div>
                    <div class="copyright-wrapper">
        <p>
            © 2022 Shifae.com - Tous les droits sont réservés
          <a href="#" target="blank">Shifae</a>
        </p>
      </div>
                </div>
            </div>
        </footer>


    </div>

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
<script>

    <script  src="../scripts/profil.js"></script> 
</body>

</html>