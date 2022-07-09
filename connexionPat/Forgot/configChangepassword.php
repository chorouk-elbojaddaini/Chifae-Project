<?php

$msg = "";

include '../cnx.php';
//check mot de passe caractères
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
if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM patient WHERE code='{$_GET['reset']}'")) > 0) {
        if (isset($_POST['submit'])) {
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $confirm_password = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
            if(empty($password) == true){
                $msg ="<p class='alert-red'> veuillez remplir le champ mot de passe</p> ";
              
              }
              elseif(empty($confirm_password) == true){
                $msg ="<p class='alert-red'> veuillez remplir le champ confirmation mot de passe </p> ";
              
              }

            elseif($password === $confirm_password) {
                if (check_mdp_format("$password") != true)
                {
                $msg ="<div class='alert-red'> Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre, et 8 caractères!</div> ";
                }
                else{
                $query = mysqli_query($conn, "UPDATE patient SET motdepasse='{$password}', code='' WHERE code='{$_GET['reset']}'");

                if ($query) {
                    header("Location: modifesucc.php");
                }
            }
            } else {
                $msg = "<div class='alert-red'>Assurez-vous que le mot de passe a été entré correctement.</div>";
            }
        }
    } else {
        $msg = "<div class='alert-red'>Le lien n'est plus valide.</div>";
        echo '<style>.form { display:none;}</style>';
    }
} else {
    header("Location: forgot.php");
}
?>