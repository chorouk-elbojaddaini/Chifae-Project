<?php
include '../../connexionDoc/cnx.php';
//===============================returning the old values==============================
if(isset($_GET['doc_id']))
{
    $doc_id = mysqli_real_escape_string($conn, $_GET['doc_id']);

    $query = "SELECT  idDoc,nomDoc,date,ajoutPar,categorieDoc FROM documents  WHERE idDoc='$doc_id' ";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $doc = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'le document existe',
            'data' => $doc
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'doc n exite pas'
        ];
        echo json_encode($res);
        return;
    }
}
//=====================================updating=======================

if(isset($_POST['update_doc']) )
{
    $doc_id = mysqli_real_escape_string($conn, $_POST['doc_id']);
    $name = mysqli_real_escape_string($conn, $_POST['nom']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $added_by = mysqli_real_escape_string($conn, $_POST['added']);
    $category = mysqli_real_escape_string($conn, $_POST['category-doc']);

  //=======================error msg about empty fields===========
    if($name == NULL || $date == NULL || $added_by == NULL )
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
    $update = "UPDATE documents SET nomDoc='$name',date='$date',ajoutPar='$added_by',categorieDoc='$category'
                WHERE idDoc='$doc_id'";
    $update_run = mysqli_query($conn, $update);

    if($update_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Les informations du document sont modifiés',
            'queryres'=>$update_run
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Les informations du document ne sont pas modifiés essaye ultérièrement'
        ];
        echo json_encode($res);
        return;
    }
}
}

//=========================delete a doc======================
if(isset($_POST['delete_doc']))
{
    $doc_id = mysqli_real_escape_string($conn, $_POST['doc_id']);

    $delete = "DELETE FROM documents  WHERE idDoc='$doc_id'";
    $delete_run = mysqli_query($conn, $delete);

    if($delete_run)
    {
        $res = [
            'status' => 200,
            'message' => 'le document est supprimé',
          
        ];
        echo json_encode($res);
        return;
    }
    //=============db probleme query return falsy value

    else
    {
        $res = [
            'status' => 500,
            'message' => 'Une erreur, le document n est pas supprimé'
        ];
        echo json_encode($res);
        return;
    }
}

?>