
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
        <script src="../script.js"></script>
   </footer>
   </div>
   <div id="boite" >
   <form method = "post" name = "form_ajouter_patient" id = "addPatientForm">
          <!-- <div class="c1">       
            <input type="text" name = "idPatient" placeholder="id" class="">
            <i class="fa-solid fa-circle-xmark" onclick="toggle()"></i>
          </div> -->
          <i class="fa-solid fa-circle-xmark fa-xl" onclick="toggle()"></i>
          <div class="column_form other col2">
            <input class="input_form" type="text" name = "code_patient" autocomplete="off" placeholder=" ">
            <label class="label_form" type="text" for="idPatient">code</label>
            </div>

            <button type="submit" name = "ajouterPatButton" id = "ajouterParId" class="ajouterPatient">ajouter</button>
    </form>
      
             
    </div>
        
   

    <script>
    if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>

$(document).on('click','.deletePat', function (e) {
    console.log(this)
    e.preventDefault();
    let id = $(this).val();
    console.log(id);
    let data = {
        'id':id,
        'deletePatient':true
    }
  //===========to specifiy wich table we will delete from
   
     if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: "../deleteAjaxPat.php",
            data: data,
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
    
    $("#addPatientForm").on('submit',function(e)
        {    
            
            e.preventDefault();
            
           
            let formData = new FormData(this);
            formData.append('insertPatient', true);
           
            for (const pair of formData.entries()) {
                console.log(`${pair[0]}, ${pair[1]}`);
              }
              let ajouter = document.getElementById("ajouterParId");
            $.ajax({
                type: "POST",
                url: "../deleteAjaxPat.php",
                data: formData,
                processData: false,
                contentType: false,
               
                success: function (response) {
                    
                    let res = jQuery.parseJSON(response);
                    //===========success case-----------
                    if(res.status == 200){
                      
                     
                         //------success msg-------------
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                         location.reload(true);
                         ajouter.addEventListener('click', function() {
                        console.log("hi again");
                            $("#boite").hide()
                                // location.reload(true);
                        })
                     
                         
                        
        
                    }    //=============db probleme query return falsy value
        
                    else if(res.status == 500) {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error(res.message);
                      
                    }
                    //--------------empty fields error---------
                    else if(res.status == 422)
                    {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error(res.message);
                     
                    }
                }
            }

            
         )
         
       
        });
      
      
       
</script>


</body>
</html>