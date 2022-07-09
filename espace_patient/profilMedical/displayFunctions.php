<?php
include'pagination.php';
include '../../connexionDoc/cnx.php';
include'filter.php';

//  ==============display maladie function:
function table_maladie($malad)
{
  echo"
      
    <table class='show' id='maladie-table'>
    <thead>
      <tr>
        <th>Nom du maladie</th>
        <th>Depuis</th>
        <th>Catégorie</th>

        <th>Description</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
        
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($malad)) 
    { 
       echo"
           <tr>
                <td>".$row["nom"]."</td>
                 <td>".$row["date"]."</td>
                 <td>".$row["categorie"]."</td>

                 <td>".$row["description"]."</td>
                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idMal"]."'>
                      <button class='editM' value='".$row["idMal"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteM' id='delete-'".$row["idMal"]."' value='".$row["idMal"]."'><i class='fa-solid fa-trash-can'></i></button>
                  </div>
                 </td>
            </tr>
         ";       
              
    }
    
echo" 
    </tbody>
    </table> 
    ";
}
//====================display traitements:
function table_traite($traite) {
    echo
    "
  <table  class='show' id='traitement-table'>
  <thead>
  <tr>
    <th>Nom du traitement</th>
    <th>Date de début</th>
    <th>Durée</th>
    <th>Dose</th>
    <th>Description</th>
    <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
  </tr>
  </thead>
  <tbody>";
  while($row = mysqli_fetch_assoc($traite)) 
  { 
  echo"
      <tr>
            <td>".$row["nom"]."</td>
            <td>".$row["date"]."</td>
            <td>".$row["duree"]."</td>
            <td>".$row["dose"]."</td>
            <td>".$row["description"]."</td>
              <td>
              <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
              <div class='options' data-div='".$row["idT"]."'>
                  <button class='editT' value='".$row["idT"]."'><i class='fa-solid fa-pen'></i></button>
                  <button class='deleteT' id='delete-'".$row["idT"]."' value='".$row["idT"]."'><i class='fa-solid fa-trash-can'></i></button>
              </div>
            </td>
        </tr>
    ";       
          
  }

  echo" 
  </tbody>
  </table> 
  ";
}
//==============================hospital funtion=============
function table_hospital($hospital)
{
 echo"
   <table  class='show' id='hospital-table'>
   <thead>
     <tr>
       <th>Cause</th>
       <th>Date d'admission</th>
       <th>Durée de séjour</th>
       <th>Description</th>
       <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
       
     </tr>
   </thead>
   <tbody>";
    while($row = mysqli_fetch_assoc($hospital)) 
   { 
      echo"
          <tr>
               <td>".$row["cause"]."</td>
                <td>".$row["date"]."</td>
                <td>".$row["duree"]."</td>

                <td>".$row["description"]."</td>
                 <td>
                 <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                 <div class='options' data-div='".$row["idH"]."'>
                     <button class='editH' value='".$row["idH"]."'><i class='fa-solid fa-pen'></i></button>
                     <button class='deleteH' id='delete-'".$row["idH"]."' value='".$row["idH"]."'><i class='fa-solid fa-trash-can'></i></button>
                 </div>
                </td>
           </tr>
        ";       
             
   }
   
echo" 
   </tbody>
   </table> 
   ";
}
//===========================allergie==============================
function table_allergie($allergie) {

    echo"
      <table  class='show' id='allergie-table'>
      <thead>
        <tr>
          <th>Nom du allergie</th>
          <th>Description</th>
          <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
          
        </tr>
      </thead>
      <tbody>";
       while($row = mysqli_fetch_assoc($allergie)) 
      { 
         echo"
             <tr>
                  <td>".$row["nom"]."</td>
                   <td>".$row["description"]."</td>
                    <td>
                    <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                    <div class='options' data-div='".$row["idA"]."'>
                        <button class='editA' value='".$row["idA"]."'><i class='fa-solid fa-pen'></i></button>
                        <button class='deleteA' id='delete-'".$row["idA"]."' value='".$row["idA"]."'><i class='fa-solid fa-trash-can'></i></button>
                    </div>
                   </td>
              </tr>
           ";       
                
      }
      
  echo" 
      </tbody>
      </table> 
      ";
   }
//========================vaccin================================
function table_vaccin($vaccin)
{
  echo
  "
<table  class='show' id='vaccint-table'>
<thead>
<tr>
  <th>Nom du vaccin</th>
  <th>Date de l'act</th>
  <th>Durée</th>
  <th>Nombre des rappels</th>
  <th>Description</th>
  <th><i class='fa-solid fa-ellipsis-vertical'></i></th>
</tr>
</thead>
<tbody>";
while($row = mysqli_fetch_assoc($vaccin)) 
{ 
 echo"
     <tr>
          <td>".$row["nom"]."</td>
           <td>".$row["date"]."</td>
           <td>".$row["protegeContre"]."</td>
           <td>".$row["nbRappel"]."</td>
           <td>".$row["description"]."</td>
            <td>
            <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
            <div class='options' data-div='".$row["idV"]."'>
                <button class='editV' value='".$row["idV"]."'><i class='fa-solid fa-pen'></i></button>
                <button class='deleteV' id='delete-'".$row["idV"]."' value='".$row["idV"]."'><i class='fa-solid fa-trash-can'></i></button>
            </div>
           </td>
      </tr>
   ";       
        
}

echo" 
</tbody>
</table> 
";
}
//============================mesures================
function affich_mesure($mesure) {
    while ($row = mysqli_fetch_assoc($mesure))
    {  echo"
      <div class='mesure'>
      <img src='images/poid.png' alt='poids' />
      <p >Poids</p>
      <p id='poids'>".$row["poids"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
      </div>
      <div class='mesure'>
       <img src='images/taille.png' alt='taille' />
        <p>Taille</p>
        <p id='taille'>".$row["taille"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
    </div>
      <div class='mesure'>
      <img src='images/imc.png' alt='icm' />
        <p >
          ICM <span>Indice de Masse Corporelle</span></p>
        <p id='icm'>".$row["icm"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
      </div>
      <div class='mesure'>
      <img src='images/tour.png' alt='Tour de taille' />
       <p >
        Tour de taille</p>
        <p id='tour'>".$row["tour"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
    </div>
      <div class='mesure'>
      <img src='images/temperature.png' alt='Température' />
      <p>Température</p>
        <p id='temp'>".$row["temp"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
    </div>
      <div class='mesure'>
      <img src='images/tension.png' alt='Tension artérielle' />
      <p>
        Tension artérielle</p>
       <p id='tension'>".$row["tension"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
    </div>
      <div class='mesure'>
      <img src='images/frq.png' alt='fréquence cardiaque' />
      <p >
        fréquence cardiaque</p>
        <p id='frq'>".$row["frqCard"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
    </div>
      <div class='mesure'>
      <img src='images/glycemie.png' alt='Glycémie' />
      <p>
        Glycémie</p>
        <p id='gly'>".$row["gly"]."</p>
        <span class='mesure-time'>".$row["date"]."</span>
    </div>
    <br>
    <button type='button' id='mesureUpdate' class='open-form editMes' value='".$row["idMes"]."' >Modifier</button>
    ";
   }
  
  echo"</div> ";
   }
//==========================antecedent===================================
function table_antecedent($antecedent)
{
  echo"
 
<table  class='show' id='antecedentie-table'>
<thead>
  <tr>
    <th>Nom de la antecedentie</th>
    <th>Lien familiale</th>
    <th>Description</th>
    <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
    
  </tr>
</thead>
<tbody>";
 while($row = mysqli_fetch_assoc($antecedent)) 
{ 
   echo"
       <tr>
            <td>".$row["nom"]."</td>
            <td>".$row["lien"]."</td>
             <td>".$row["description"]."</td>
              <td>
              <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
              <div class='options' data-div='".$row["idAnt"]."'>
                  <button class='editAnt' value='".$row["idAnt"]."'><i class='fa-solid fa-pen'></i></button>
                  <button class='deleteAnt' id='delete-'".$row["idAnt"]."' value='".$row["idAnt"]."'><i class='fa-solid fa-trash-can'></i></button>
              </div>
             </td>
        </tr>
     ";       
          
}

echo" 
</tbody>
</table> 
";
}
//=============================docs=============================
function table_doc($doc)
{
  echo"
      
    <table   class='show' id='doc-table'>
    <thead>
      <tr>
        <th>Nom du document</th>
        <th>Date</th>
        <th>Ajouté par</th>
        <th>Catégorie</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($doc)) 
    { 
       echo"
           <tr>
           <td>".$row["nomDoc"]."</td>
           <td>".$row["date"]."</td>
           <td>".$row["ajoutPar"]."</td>
           <td>".$row["categorieDoc"]."</td>
                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idDoc"]."'>
                      <button class='editDoc' value='".$row["idDoc"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteDoc' id='delete-'".$row["idDoc"]."' value='".$row["idDoc"]."'><i class='fa-solid fa-trash-can'></i></button>
                  </div>
                 </td>
            </tr>
         ";       
              
    }
    
echo" 
    </tbody>
    </table> 
    ";

}
//=============================diagno=============================
function table_diag($diag)
{
  echo"
      
    <table   class='show' id='diag-table'>
    <thead>
      <tr>
        <th>Nom et Prénom</th>
        <th>Spécialité</th>
        <th>Diagnostique</th>
        <th>Examens complémentaires</th>
        <th>Traitement</th>
        <th> <i class='fa-solid fa-ellipsis-vertical'></i></th>
      </tr>
    </thead>
    <tbody>";
     while($row = mysqli_fetch_assoc($diag)) 
    { 
       echo"
           <tr>
           <td>".$row["nomComplet"]."</td>
           <td>".$row["specialite"]."</td>
           <td>".$row["diagnostic"]."</td>
           <td>".$row["exam"]."</td>
           <td>".$row["traitement"]."</td>

                  <td>
                  <button class='options-btn '><i class='fa-solid fa-ellipsis-vertical'></i></button>
                  <div class='options' data-div='".$row["idD"]."'>
                      <button class='editD' value='".$row["idD"]."'><i class='fa-solid fa-pen'></i></button>
                      <button class='deleteD' id='delete-'".$row["idD"]."' value='".$row["idD"]."'><i class='fa-solid fa-trash-can'></i></button>
                  </div>
                 </td>
            </tr>
         ";       
              
    }
    
echo" 
    </tbody>
    </table> 
    ";
}