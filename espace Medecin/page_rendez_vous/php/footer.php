<footer class="footer">
        <div class="content">
            <div class="row">
             <div class="footer-col">
                <div class="logoChifae">
                    <img class="logo" src="../images/logo.png" alt="#">
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
   
    <div  id = "boite" >
          <div class="c1">
                <!--input type="submit" value="ajouter"/-->
                <p class="appointmentTitle">Ajouter un rendez vous</p>
                <i class="fa-solid fa-circle-xmark fa-xl" onclick="toggle()"></i>
          </div>
          <form action="#" method = "post">
               
                <div class="column_form other col2">
                    <input class="input_form" type="text" id="nom" name = "boite_nom" autocomplete="off" placeholder=" ">
                    <label class="label_form" type="text" for="nom">nom</label>
                </div>
                <div class="column_form other col2">
                    <input class="input_form" type="text" id="prenom" name = "boite_prenom" autocomplete="off" placeholder=" ">
                    <label class="label_form" type="text" for="prenom">prenom</label>
                </div>
                <div class="column_form other col2">
                    <input class="input_form" type="tel" id="telephone" name = "boite_telephone" autocomplete="off" placeholder=" ">
                    <label class="label_form" type="text" for="telephone">telephone</label>
                </div>
                <div class="column_form other col2">
                    <input class="input_form" type="datetime-local" id="date" name = "boite_date" autocomplete="off" placeholder=" ">
                    
                </div>

               
                <input type="submit" name = "boite_submit"  class="ajouter">
        </form>
        <?php 
         $boite_array= array();
            if(isset($_POST["boite_submit"])){ 
                $nom = $_POST["boite_nom"];
                $prenom = $_POST["boite_prenom"];
                $telephone = $_POST["boite_telephone"];
                 $dateTimeStart = $_POST["boite_date"];
                // echo $dateTimeStart;
                $minutes_to_add = 30;
               
                $time = new DateTime($dateTimeStart);
                $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

                $dateTimeEnd = $time->format('Y-m-d H:i');
                
                // if(isset($_POST["boite_submit"])){
                //     $medecin->insertBoite("yamna","yzaa","05242");
                // }
                $boite_array = array("nom"=>$nom,"prenom"=>$prenom,"telephone"=>$telephone,"start_datetime"=>$dateTimeStart,"end_datetime"=>$dateTimeEnd);
                // print_r($boite_array);
                $medecin->insertInto($boite_array,'schedule_list');
            }
        ?>
    </div>

<?php 
?>
    <script src="../appointment/test.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>
</html>