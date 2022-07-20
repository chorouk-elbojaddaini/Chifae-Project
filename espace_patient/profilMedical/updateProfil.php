<?php 
include '../../connexionDoc/cnx.php';


//================================filter function=================
//test input function:
function test_input($data) 
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
//====================================update maladies================================

//==========function to return old values in the inputs fields==============
function fetchData($id,$tabName,$idName,$conn)
   {
    $idFetch = mysqli_real_escape_string($conn, $id);

    $query = "SELECT  * FROM $tabName  WHERE $idName='$idFetch' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    { 
        $result = mysqli_fetch_array($query_run);
        $res = [
            'status' => 200,
            'message' =>  'donnee existe',
            'data' => $result
        
        ];
        echo json_encode($res);
    }
    else
    {
        $res = [
            'status' => 404,
            'message' =>  'aucunes resultats trouves'
        ];
        echo json_encode($res);
        return;
    }
   }
//=============================fucntion to delete rows
function deleteRow($conn,$id,$idName,$tabName){
    $idDel = mysqli_real_escape_string($conn, $id);

    $delete = "DELETE FROM $tabName  WHERE $idName='$idDel'";
    $delete_run = mysqli_query($conn, $delete);

    if($delete_run)
    {
        $res = [
            'status' => 200,
            'message' => 'la donnee est supprimé'
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value

    else
    {
        $res = [
            'status' => 500,
            'message' => 'Une erreur est survenue'
        ];
        echo json_encode($res);
        return;
    }
}
//===============================returning the old values maladie==============================
if(isset($_GET['idMal']))
{ 
    $id=$_GET['idMal'];
    $tabName="maladies";
    $idName="idMal";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values traitements==============================
if(isset($_GET['idT']))
{ 
    $id=$_GET['idT'];
    $tabName="traitements";
    $idName="idT";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values hospitalisation==============================
if(isset($_GET['idH']))
{ 
    $id=$_GET['idH'];
    $tabName="hospitalisation";
    $idName="idH";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values allergies==============================
if(isset($_GET['idA']))
{ 
    $id=$_GET['idA'];
    $tabName="allergies";
    $idName="idA";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values vaccins==============================
if(isset($_GET['idV']))
{ 
    $id=$_GET['idV'];
    $tabName="vaccins";
    $idName="idV";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values mesures==============================
if(isset($_GET['idMes']))
{ 
    $id=$_GET['idMes'];
    $tabName="mesures";
    $idName="idMes";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values antecedents==============================
if(isset($_GET['idAnt']))
{ 
    $id=$_GET['idAnt'];
    $tabName="antecedents";
    $idName="idAnt";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values DIAGNO==============================
if(isset($_GET['idD']))
{ 
    $id=$_GET['idD'];
    $tabName="diagnostic";
    $idName="idD";
    fetchData($id,$tabName,$idName,$conn);
}
//===============================returning the old values [profil]==============================
if(isset($_GET['idP']))
{ 
    $id=$_GET['idP'];
    // $tabName="dossiermedical";
   
    $idFetch = mysqli_real_escape_string($conn, $id);

    $query = "SELECT  * FROM dossiermedical  WHERE id = '$idFetch' ";
    $query_run = mysqli_query($conn, $query);

    // if(mysqli_num_rows($query_run))
    // { 
        $result = mysqli_fetch_assoc($query_run);
        $res = [
            'status' => 200,
            'message' =>  'donnee existe',
            'data' =>   $result
        
        ];
        echo json_encode($res);
        // print_r($result);
    // }
    // $idName="id";
    // fetchData($id,$tabName,$idName,$conn);
}
//=================================updating tables rows===================================
//=====================================updating maladie=======================

if(isset($_POST['updateMal']) )
{
  $idMal = test_input($_POST["idMal"]);
  $name = test_input($_POST["nomMal"]);
  $date = test_input($_POST["dateMal"]);
  $categorie = test_input($_POST["category"]);
  $desc = test_input($_POST["descMal"]);

  //=======================error msg about empty fields===========
    if($name == NULL || $date == NULL || $categorie == NULL  )
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE maladies SET nom='$name',date='$date',categorie='$categorie',description='$desc'
                WHERE idMal='$idMal'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating traitements=======================

if(isset($_POST['updateT']) )
{
  $idT = test_input($_POST["idT"]);
  $name = test_input($_POST["nomT"]);
  $date = test_input($_POST["dateT"]);
  $duree = test_input($_POST["dureeT"]);
  $dose = test_input($_POST["doseT"]);
  $desc = test_input($_POST["descT"]);

  //=======================error msg about empty fields===========
    if($name == NULL || $date == NULL || $duree == NULL|| $dose == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE traitements SET nom='$name',date='$date',duree='$duree',dose='$dose',description='$desc'
                WHERE idT='$idT'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating hospitale=======================

if(isset($_POST['updateH']) )
{
  $idH = test_input($_POST["idH"]);
  $cause = test_input($_POST["cause"]);
  $date = test_input($_POST["dateH"]);
  $duree = test_input($_POST["dureeH"]);
  $desc = test_input($_POST["descH"]);

  //=======================error msg about empty fields===========
    if($cause == NULL || $date == NULL || $duree == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE hospitalisation SET cause='$cause',date='$date',duree='$duree',description='$desc'
                WHERE idH='$idH'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating allergies=======================

if(isset($_POST['updateA']) )
{
  $idA = test_input($_POST["idAlg"]);
  $nom = test_input($_POST["nomA"]);
  $desc = test_input($_POST["descA"]);

  //=======================error msg about empty fields===========
    if($nom == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'le nom de l allergie est obligatoire'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE allergies SET nom='$nom',description='$desc'
                WHERE idA='$idA'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating vaccins=======================

if(isset($_POST['updateV']) )
{
  $idV = test_input($_POST["idV"]);
  $nom = test_input($_POST["nomV"]);
  $date = test_input($_POST["dateV"]);
  $protege = test_input($_POST["protegeV"]);
  $nb = test_input($_POST["nbV"]);
  $desc = test_input($_POST["descV"]);

  //=======================error msg about empty fields===========
    if($nom == NULL || $date == NULL || $protege == NULL||  $nb == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE vaccins SET nom='$nom',date='$date',protegeContre='$protege',nbRappel='$nb',description='$desc'
                WHERE idV='$idV'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating mesures=======================

if(isset($_POST['updateM']) )
{
  $idM = test_input($_POST["idM"]);
  $poids = test_input($_POST["M1"]);
  $taille = test_input($_POST["M2"]);
  $icm = test_input($_POST["M3"]);
  $tour = test_input($_POST["M4"]);
  $temp = test_input($_POST["M5"]);
  $tension = test_input($_POST["M6"]);
  $frq = test_input($_POST["M7"]);
  $gly = test_input($_POST["M8"]);
  $date = test_input($_POST["date1"]);

  //=======================error msg about empty fields===========
    if($poids == NULL || $taille == NULL || $tour == NULL||  $frq == NULL || $gly == NULL || $tension == NULL || $temp == NULL||  $icm == NULL ||$date == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE mesures SET poids='$poids',taille='$taille',icm='$icm',tour='$tour',temp='$temp',tension='$tension',frqCard='$frq',gly='$gly',date='$date'
                WHERE idMes='$idM'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating antecedents=======================

if(isset($_POST['updateAnt']) )
{
  $idAnt = test_input($_POST["idAnt"]);
  $nom = test_input($_POST["nomAnt"]);
  $lien = test_input($_POST["lienAnt"]);
  $desc = test_input($_POST["descAnt"]);

  //=======================error msg about empty fields===========
    if($nom == NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'le nom de l allergie est obligatoire'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE antecedents SET nom='$nom',lien='$lien',description='$desc'
                WHERE idAnt='$idAnt'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
//=====================================updating digno=======================

if(isset($_POST['updateD']) )
{
  $idD = test_input($_POST["idD"]);
  $name = test_input($_POST["nomMed1"]);
  $date = test_input($_POST["dateD1"]);
  $spec = test_input($_POST["spec1"]);
  $diag = test_input($_POST["diag1"]);
  $exam = test_input($_POST["exam1"]);
  $traite = test_input($_POST["traite1"]);


  //=======================error msg about empty fields===========
    if($name == NULL || $spec == NULL || $date == NULL|| $diag == NULL || $traite==NULL )
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE diagnostic SET nomComplet='$name',specialite='$spec',date='$date',diagnostic='$diag',exam='$exam',traitement='$traite'
                WHERE idD='$idD'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}
// //=========================delete ======================
// if(isset($_POST['deleteMal']))
// {
    
//     $idDel = mysqli_real_escape_string($conn, $_POST['id']);

//     $delete = "DELETE FROM maladies  WHERE $idVar='$idDel'";
//     $delete_run = mysqli_query($conn, $delete);

//     if($delete_run)
//     {
//         $res = [
//             'status' => 200,
//             'message' => 'la maladie est supprimé'
//         ];
//         echo json_encode($res);
//         return;
//     }
//     //=============db probleme query return falsy value

//     else
//     {
//         $res = [
//             'status' => 500,
//             'message' => 'Une erreur est survenue'
//         ];
//         echo json_encode($res);
//         return;
//     }
// }
//=====================================updating profil infos=======================

if(isset($_POST['updateP']) )
{
  $id = test_input($_POST["idP"]);
  $nom = test_input($_POST["nom"]);
  $pre = test_input($_POST["pre"]);
  $nais = test_input($_POST["nais"]);
  $mail = test_input($_POST["mail"]);
  $tel = test_input($_POST["tel"]);
  $etat = test_input($_POST["etat"]);
  $adr = test_input($_POST["adr"]);
  $grp = test_input($_POST["grp"]);
  $sexe = test_input($_POST["sexe"]);
  $mut = test_input($_POST["mutuel"]);

  //=======================error msg about empty fields===========
    if($nom == NULL || $pre == NULL || $mail == NULL||  $nais == NULL || $tel == NULL || $adr == NULL || $sexe == NULL||  $mut == NULL|| $grp == NULL||  $etat== NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'tous les champs sont oligatoires'
        ];
        echo json_encode($res);
            return;
        }
    //========================update to the new values===============
    else
{
    $update = "UPDATE dossiermedical SET nom='$nom',prenom='$pre',dateNaissance='$nais',sexe='$sexe',email='$mail',tel='$tel',adresse='$adr',etatCivil='$etat',groupSanguin='$grp',mutuelle='$mut'
                WHERE id='$id'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations sont modifiés'
            
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' =>'Les informations  ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}

// //=========================delete maladies======================
if(isset($_POST['deleteMal']))
{
    $id=$_POST['id'];
    $tabName="maladies";
    $idName="idMal";
    deleteRow($conn,$id,$idName,$tabName);
}
// //=========================delete traitements======================
if(isset($_POST['deleteT']))
{
    $id=$_POST['id'];
    $tabName="traitements";
    $idName="idT";
    deleteRow($conn,$id,$idName,$tabName);
}
// //=========================delete allergies======================
if(isset($_POST['deleteA']))
{
    $id=$_POST['id'];
    $tabName="allergies";
    $idName="idA";
    deleteRow($conn,$id,$idName,$tabName);
}
// //=========================delete vaccins======================
if(isset($_POST['deleteV']))
{
    $id=$_POST['id'];
    $tabName="vaccins";
    $idName="idV";
    deleteRow($conn,$id,$idName,$tabName);
}
// //=========================delete hospital======================
if(isset($_POST['deleteH']))
{
    $id=$_POST['id'];
    $tabName="hospitalisation";
    $idName="idH";
    deleteRow($conn,$id,$idName,$tabName);
}
// // //=========================delete mesures======================
// if(isset($_POST['deleteM']))
// {
//     $id=$_POST['id'];
//     $tabName="mesures";
//     $idName="idMes";
//     deleteRow($conn,$id,$idName,$tabName);
// }
// //=========================delete antecedents======================
if(isset($_POST['deleteAnt']))
{
    $id=$_POST['id'];
    $tabName="antecedents";
    $idName="idAnt";
    deleteRow($conn,$id,$idName,$tabName);
}
// //=========================delete hospital======================
if(isset($_POST['deleteD']))
{
    $id=$_POST['id'];
    $tabName="diagnostic";
    $idName="idD";
    deleteRow($conn,$id,$idName,$tabName);
}