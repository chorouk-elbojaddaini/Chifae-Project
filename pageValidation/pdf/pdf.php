<?php 
 session_start();
//  $_SESSION["email"] = "$_GET[patient]";
include('../../pageAcceuil/cnx.php'); 



    $query = mysqli_query($conn, "SELECT * FROM medecin WHERE id='$_SESSION[id]'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

    
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PdfValidation|Shifae</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="icon" type="image/png" href="../assets/logo.png" />
</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> télècharger pdf</button>
            </div>
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="card-header bg-transparent header-elements-inline">
                        <img src="../assets/logo.png" class="logopdf" alt="logo" />
                        <h6 class="card-title text-primary">Document de validation Rendez-vous</h6>
                    
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">

                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li> Nom : <?php echo $_SESSION["nom"]; ?></li>
                                        <li> Prenom: <?php echo $_SESSION["prenom"]; ?></li>
                                        <li>Numero : <?php echo $_SESSION["phone"]; ?></li>
                                        <li>Email : <?php echo $_SESSION["email"]; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Votre ID : #BBB1243</h4>
                                        <ul class="list list-unstyled mb-0">
                                   
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-flex flex-md-wrap">
                            <div class="mb-4 mb-md-2 text-left"> <span class="text-muted">Chez:</span>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2"> 
                                        Dr. <?php echo $row['nom']." ".$row['prenom'] ; ?></li>

                                        </h5>
                                    </li>
                                    <li><span class="font-weight-semibold"> Specialite:<?php echo $row['specialite']; ?></span></li>
                                    <li> Adresse : <?php echo $row['adresse']; ?></li>
                                    <li>Ville : <?php echo $row['ville'] ; ?></li>
                                    <li> Numero : <?php echo $row['numero']; ?></li>
                                    <li><a href="#" data-abc="true"> gmail : <?php echo $row['gmail']; ?></a></li>
                                </ul>
                            </div>
                            <div class="mb-2 ml-auto"> <span class="text-muted">Details:</span>
                                <div class="d-flex flex-wrap wmin-md-400">
                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>
                                            <h5 class="my-2">Date et heure:</h5>
                                        </li>
                                        <li>Date:</li>
                                        <li>Heure:</li>
                                        
                                    </ul>
                                    <ul class="list list-unstyled text-right mb-0 ml-auto">
                                        <li>
                                            <h5 class="font-weight-semibold my-2">...</h5>
                                        </li>
                                        <li></li>
                                        <li><span class="font-weight-semibold"><?php echo $_SESSION["date"]; ?></span></li>
                                        <li><?php echo $_SESSION["heure"]; ?></li>
                                        
                                    
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                                <div  class="info">
<p>information :</br> Votre rendez-vous est bien confirmé ,Prière de vous y présenter 20 minutes avant l'heure prévue du rendez-vous. </p>
                                </div>
                        
                    
                    <div class="card-footer"> <span class="text-muted">Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                            ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.Duis aute irure dolor in reprehenderit</span> </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>