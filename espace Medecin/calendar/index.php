<?php 
session_start();
include('database/functions.php');
require_once('db-connect.php');
$medecin_shuffle = $medecin->getData('medecin',$_SESSION['SESSION_EM']);
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calendrier</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="./logo.png" />

    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Anton&family=Josefin+Sans:wght@100&family=Lexend+Deca:wght@100&family=Livvic:wght@100&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script src="./fullcalendar/lib/locales/fr.js"></script>

    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }
 
        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Apple Chancery, cursive;
        }
 
        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>
 
<body class="bg-light">
    
<div class="containere" id = "blur">

<div class="navbare">
  <section class="top-nav"><!--nav bar-->
      
  <div class="navLogo">

<a href="../../pageAcceuil/index.php">

                <img class="logo" src="images/logo.png" alt="#" style ="height:48px; margin-bottom:7px">
</a>
        <a href="../../pageAcceuil/index.php">

                <span class="chifaeNav" style ="font-family:'Poppins">Shifae</span>
</a>
            </div>
      <input id="menu-toggle" type="checkbox" />
      <label class='menu-button-container' for="menu-toggle">
      <div class='menu-button'></div>
      </label>
      <ul class="menu">
          <li>
              <a  class="nav-links pink" href="../../pageAcceuil" style ="font-family:'Poppins">Acceuil</a>
          </li>
          <li>
              <a  class="nav-links " href="../../connexionDoc/logout.php" style ="font-family:'Poppins"><i class="fa-solid fa-arrow-right-from-bracket icon .logout " ></i> Deconnexion</a>
          </li>
          
          
      </ul>
      <a href="../page_profil_medecin/php">
      <?php
         if($medecin_shuffle[0]['photo'] != null){
         ?>
        <img id="photo"  src="data:image;base64,<?php echo $medecin_shuffle[0]['photo'] ;?>" width = "90px" class="imageNavbar">
      
         <?php
         }
          else{
            ?>
              <img  src="images/avatar.jpeg" alt="profile" id="photo" style="width:55px; margin-bottom:7px" class="imageNavbar">
        
        
        <?php
      }?>
          
  </a>
  </section> <!--nav bar end-->
</div>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <div class="cardt rounded-0 shadow">
                    <div class="card-header bg-gradient bg-primary text-light">
                        <h5 class="card-title" style="margin-left:70px;">Rendez vous</h5>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <form action="save_schedule.php" method="post" id="schedule-form">
                                <input type="hidden" name="id" value="">
                                <!-- <div class="form-group mb-2">
                                    <label for="title" class="control-label">title</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                </div> -->
                                <div class="form-group mb-2">
                                    <label for="nom" class="control-label">nom</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="nom" id="nom" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="prenom" class="control-label">prenom</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="prenom" id="prenom" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="email" class="control-label">email</label>
                                    <input type="text" class="form-control form-control-sm rounded-0" name="email" id="email" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="start_datetime" class="control-label">Début du RDV</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                </div>
                                <div class="form-group mb-2">
                                    <label for="end_datetime" class="control-label">Fin du RDV</label>
                                    <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-center">
                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Enregistrer</button>
                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Details du RDV</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                        <!-- <dt class="text-muted">title</dt>
                           
                           <dd id="title" class=""></dd> -->
                           <dt class="text-muted">nom</dt>
                           
                           <dd id="nom" class=""></dd>
                            
                            <dt class="text-muted">prenom</dt>
                            <dd id="prenom" class=""></dd>
                            <dt class="text-muted">email</dt>
                            <dd id="email" class=""></dd>
                            <dt class="text-muted">Début du RDV</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Fin du RDV</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Modifier</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Supprimer</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->
 
<?php 
$schedules = $conn->query("SELECT * FROM `schedule_list` where idMedecin = '{$_SESSION['id']}'"); 
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
     $sched_res[$row['id']] = $row;
     
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>