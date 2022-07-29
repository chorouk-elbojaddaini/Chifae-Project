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
   <div class="change_pass" id = "change_pass_boite">

        <h2 class="title_pass">Changer votre mot de passe</h2>
        <div class = "appointmentTitle"></div>

<?php 
      function check_mdp_format($mdp)
      {
        $majuscule = preg_match('@[A-Z]@', $mdp);
        $minuscule = preg_match('@[a-z]@', $mdp);
        $chiffre = preg_match('@[0-9]@', $mdp);
        
        if(!$majuscule || !$minuscule || !$chiffre || strlen($mdp) < 5)
        {
          return false;
        }
        else 
          return true;
      }
   $msg = "hello wordl";
   if (isset($_POST['changePassword'])) {
            $old_password = mysqli_real_escape_string($medecin->db->con, $_POST['oldPwd']);
            $new_password = mysqli_real_escape_string($medecin->db->con, $_POST['newPwd']);

            $confirm_password = mysqli_real_escape_string($medecin->db->con, $_POST['confirmPwd']);
            if(empty($old_password) == true){
             
              echo" <script>
             
              swal.fire({
                  title: 'veuillez remplir l'ancien mot de passe',
                  text: '',
                  icon: 'error',
                  
                });
                
  </script>
  ";
            }
        
            elseif(empty($new_password) == true){
                $msg ="<p class='alert-red'> veuillez remplir le champ mot de passe</p> ";
              
              }
              elseif(empty($confirm_password) == true){
                $msg ="<p class='alert-red'> veuillez remplir le champ confirmation mot de passe </p> ";
             
              }

            elseif($new_password === $confirm_password ) {
                if (check_mdp_format("$new_password") != true)
                {
                $msg ="<p class='alert-red'> Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, et 8 caractères!</p> ";
                }
                else{
                
                $old =  $medecin->db->con->query("SELECT * FROM medecin WHERE gmail='{$_SESSION['SESSION_EM']}' ");
                if(mysqli_num_rows($old) > 0){
                  $resultat = mysqli_fetch_assoc($old);
                  $oldPwd = $resultat['motdepasse'];
                  if($oldPwd !=  $old_password)
                  {
                    $msg ="<p class='alert-red'>l'ancien mot de passe est éronné</p> ";
                  }
                  else{
                     $query = $medecin->db->con->query("UPDATE medecin SET motdepasse='{$new_password}' WHERE gmail='{$_SESSION['SESSION_EM']}' ");
                if ($query) {
                    echo"<script>
                    alertify.set('notifier','position', 'top-right');
                      alertify.success('Votre mot de passe a été modifié avec succés ✔');
                    </script>";
                }
                  }
                }
               
            }
            } else {
              
                $msg = "<div class='alert-red'>Assurez-vous que le mot de passe a été entré correctement.</div>";
            }
            
        }
        ?>
         <?php echo $msg; ?>

 

      
        <form method = "post">
            <div class="column_form   old_pass">
            <i class="fa-solid fa-xmark fa-xl close_icon" onclick="toggle('change_pass_boite')"></i>
          
                <input class="input_form" type="text" id="motdepasse" name="oldPwd" autocomplete="off" placeholder=" ">
                <label class="label_form" type="text" for="motdepasse">ancien mot de passe</label>
            </div>
            <div class="column_form   new_pass">
                <input class="input_form" type="password" id="motdepasse" name="newPwd" autocomplete="off" placeholder=" ">
                <label class="label_form" type="text" for="motdepasse">nouveau mot de passe</label>
            </div>
            <div class="column_form   confirmer">
                <input class="input_form" type="password" id="motdepasse" name="confirmPwd" autocomplete="off" placeholder=" ">
                <label class="label_form" type="text" for="motdepasse">confirm</label>
            </div>
            <button type = "submit" name="changePassword" class= "ajouter_btn" >save changes</button>
        </form>
   </div>
 
   <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script src="../uploadAjax.js"></script>
    <script>
        console.log(document.getElementById('khdmi3afak'));
    </script>
    <script>
        function toggle(classe){
        var blur=document.getElementById("blur");
        console.log(blur);
        blur.classList.toggle('act');
        var b = document.getElementById(classe);
        b.classList.toggle('act');
  
  }
    </script>