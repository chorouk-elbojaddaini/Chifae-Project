<?php 
"/XMII/Illuminator?Service=Admin&Mode=SessionList&Content-Type=text/xml";


ini_set("display_errors", true);
session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: connected.php");
    die();
}

include 'cnx.php';
$msg="";
if (isset($_GET['verification'])){
    if(mysqli_num_rows(mysqli_query($conn,"SELECT *FROM medecin WHERE code = '{$_GET['verification']}'")) >0){
       $query= mysqli_query($conn ,"UPDATE medecin SET code='' WHERE code='{$_GET['verification']}' ");
        if($query){
            $msg="<p class='alert-succe'>Compte créer avec succé!</p>";
        }
    
    else{
        header("location: index.php");
    }
}

}
    if (isset($_POST['submit'])){
        $email = mysqli_real_escape_string($conn ,$_POST['email']);
        $motdepasse = mysqli_real_escape_string($conn ,$_POST['motdepasse']);
        $sql = "SELECT * FROM medecin WHERE gmail = '{$email}' AND motdepasse ='{$motdepasse}' ";
        $result = mysqli_query($conn ,$sql);
        if(mysqli_num_rows($result)== 1){
            $row = mysqli_fetch_assoc($result);
            if(empty($row['code'])){
                $_SESSION['SESSION_EMAIL'] = $email;
                header("location: connected.php");
            }
            else{
                 $msg="<p class='alert-blue'>vérifier votre compte et essayé de se connecter!</p>";
                
            }
        }
        else{
            $msg="<p class='alert-red'>mot de passe ne correspond pas!</p>";

        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <section class="top-nav"><!--nav bar-->
            <div class="navLogo">
                <img class="logo" src="./images/Layer 1.png" alt="#">
                <span class="chifaeNav">Chifae</span>
            </div>
            <input id="menu-toggle" type="checkbox" />
            <label class='menu-button-container' for="menu-toggle">
            <div class='menu-button'></div>
            </label>
            <ul class="menu">
                <li>
                    <a  class="nav-links" href="#">Acceuil</a>
                </li>
                <li>
                    <a  class="nav-links pink" href="#">Médecin</a>
                </li>
                <li>
                    <a class="nav-links pink" href="#">Patient</a>
                </li>
                <li>
                    <a class="nav-links" href="#">Contact</a>
                </li>
            </ul>
        </section> <!--nav bar end-->

        <main>
      
            <div class="left">
                <div class="wrapCnx">
                    <h1 class="cnx">Connexion</h1>
                    <img src="./images/f.png" alt="">
                    <?php echo $msg; ?>
                    <form action="" method="post">
                        <div class="form_grp">
                           <input class="form_input" type="email" placeholder="email" name="email" >
                           <!-- <label class="form_label">email</label> -->
                        </div>
                    
                        <div class="form_grp">
                           <input class="form_input" type="password" name="motdepasse" placeholder="mot de pass" >
                           <!-- <label class="form_label">mot de pass</label> -->
                        </div>
                    <a class="btnPass" href="#">Mot de passe oublié</a>
                    
                    <button type="submit" class="btn btnCnx" name="submit" >Connexion</button>
                    <p class="signIn">pas encore de compte</p>
                    <a class="btn btnSign" href="inscriptionM/inscription.php">créer mon compte</a>
                    </form>

                </div>
            </div>
            <div class="right">
                <img src="./images/Doctors-pana.png" alt="#">
            </div>
    
    
    
           </main>
           <footer class="footer">
            <div class="content">
                <div class="row">
                 <div class="footer-col">
                    <div class="logoChifae">
                        <img class="logo" src="./images/Layer 1.png" alt="#">
                        <span class="chifae">Chifae</span>
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
                            <li><a href="#">Se connecter</a></li>
                            <li><a href="#">services</a></li>
                            <li><a href="#">contact</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Services</h4>
                        <ul>
                            <li><a href="#">SOS</a></li>
                            <li><a href="#">livraison de médicaments</a></li>
                            <li><a href="#">Pharmacies de garde</a></li>
                            <li><a href="#">Contacts de Laboratoires</a></li>
                            
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
            </div>
       </footer>
    </div>
</body>
</html>