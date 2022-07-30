<footer class="footer">
        <div class="content">
            <div class="row">
             <div class="footer-col">
                <div class="logoChifae">
                <a href="../../../pageAcceuil/index.php"><img class="logo" src="../images/logo.png" alt="#"></a>
                <span class="chifae">Shifae</span>
                </div>
                 <div class="social-links">
                     <a href="#"><i class="fab fa-facebook-f fa-lg"></i></a>
                     <a href="#"><i class="fab fa-twitter fa-lg"></i></a>
                     <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                     <a href="#"><i class="fab fa-linkedin-in fa-lg"></i></a>
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
                        <li><a href="#">Dossier medical</a></li>
                        <li><a href="#">Calendrier Pour Medecin</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Aide &amp; Support</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Conditions Générales d’Utilisation </a></li>
                        
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
   </div>
   <div id="boite">
        <div class="infos-spec"><i class="fa-solid fa-heart-pulse"></i> Spécialités</div>
        <div class="class-spec">
        <?php  
        $counterId =0;
        for($i=0;$i<count($arrayspec);$i++){
            if($arrayspec[$i] == null) {break;}
                else {?>
                     <span> 
                        <?php echo $arrayspec[$i]; ?>
                      </span>
                   
                <?php } ?>
        <?php  } ?> 


        <form method = "post">
            <button type = "submit" name = "delete_spec" class="delete" id = "delete_specialite">supprimer</button>
        </form>
        
                      
        
    </div>
    <?php
            
    ?>
        <img src="../images/close.jpeg" class="close" onclick="toggle('boite')">
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
        <form method = "post">
            <button type = "submit" name = "delete_desc" class="delete" id = "delete_description">supprimer </button>
        </form>
        <img src="../images/close.svg.png" class="close" onclick="toggle('boite2')">
    </div>
    <?php
            
    ?>
    <div id="boite3">
    <div class="experiences-content"><i class="fa-solid fa-stethoscope"></i> Expériences </div>
        <ul class="ul-experiences">
                    <?php  for($i=0;$i<count($arrayExperience);$i++){ 
                         if($arrayExperience[0] == "") { ?>
                         <li class="pasExper"> <?php echo "pas encore d'expérience"; ?>
                    </li>
                         <?php 
                            break;
                        }
                        else if($arrayExperience[$i] == ""){
                            break;
                        }
                         else {?>
                     <li> <?php echo $arrayExperience[$i]; ?>
                    </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
        <form method = "post">
            <button type = "submit" name = "delete_experience" class="delete" id = "delete_experience">supprimer </button>
        </form>
        <img src="../images/close.svg.png" class="close" onclick="toggle('boite3')">
    </div>
    <?php
           
    ?>
    <div id="boite4">
    <div class="diplome"><i class="fa-solid fa-graduation-cap"></i> Cursus et diplômes</div>
        <ul class="ul-diplome" style="list-style: inside">
            <?php  for($i=0;$i<count($arrayDiplome);$i++){ 
               if($arrayDiplome[$i] == ""){
                    break;
                }
                else {?>
        <li> <?php echo $arrayDiplome[$i]; ?>
        </li>
            <?php } ?>
            <?php } ?>

        </ul>
        <form method = "post">
            <button type = "submit" name = "delete_diplome" class="delete" id = "delete_diplome">supprimer </button>
        </form>
    <img src="../images/close.svg.png" class="close" onclick="toggle('boite4')">
    </div>
    <?php
            if(isset($_POST["delete_diplome"])){
               $medecin->deleteData("medecin","diplome",$_SESSION['SESSION_EM']);
            }
    ?>
   
  
   
</body>
    <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>

<script>
// position we will use later
<?php if((empty($lat) || empty($lon)) == true){ ?>
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
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="../deleteAjax.js"></script>
     <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script>


$(document).on('click','#delete_horaires', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':1,
        'deleteHoraire':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "./deleteAjax.php",
            data:{
            'id':id,
            'deleteHoraire':true
          },
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});

$(document).on('click','#delete_specialite', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':1,
        'deleteSpecialite':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "./deleteAjax.php",
            data:{
            'id':id,
            'deleteSpecialite':true
          },
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});
$(document).on('click','#delete_description', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':1,
        'deleteDescription':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "./deleteAjax.php",
            data:{
            'id':id,
            'deleteDescription':true
          },
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});

$(document).on('click','#delete_experience', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':1,
        'deleteExperience':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "./deleteAjax.php",
            data:{
            'id':id,
            'deleteExperience':true
          },
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});
$(document).on('click','#delete_diplome', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':1,
        'deleteDiplome':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "./deleteAjax.php",
            data:{
            'id':id,
            'deleteDiplome':true
          },
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});
$(document).on('click','#delete_langue', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':1,
        'deleteLangue':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "./deleteAjax.php",
            data:{
            'id':id,
            'deleteLangue':true
          },
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});

</script>
   <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script  src="../scripts/profil.js"></script> 
    
   