 <?php 

function insert_allergie(){
 echo'
 <div class="overlay allergy hide" id="allergy">
 <form action="" method="post" name="allergy" class="form border insert" id="allergy-form">
   <button class="close_form" onclick="hideForm()"id="allergy-btn" name="close-insert-allergy" > <i class="uis uis-multiply closer"></i> </button> 
 
           <label >
             Nom d\'allergie : 
             <input type="text" minlength="3" name="nom-allergy"  placeholder="exp:Allergie alimentaire" />
           </label>
             <label >
               Description :
                 <textarea name="desc-allergy"  id="desc-allergy"   placeholder=" Description "></textarea>
             </label>
             
         <button type="submit" class="form-btn" name="insert-allergy">Ajouter</button>
</form>
</div>';
}
//  <!-- -----------------------------update allergy----------------------------------- -->
function update_allergie()
{
 echo'
 <div class="overlay allergy hide" id="allergy1">
 <form action="" method="post" name="allergy" class="form border update" id="allergy-form-update">
   <button class="close_form" onclick="hideForm()"id="allergy-btn-close" name="close-update-allergy" > <i class="uis uis-multiply closer"></i> </button> 
       <input type="hidden" name="idAlg" id="alg" >
         
           <label >
             Nom d\'allergie : 
             <input type="text" minlength="3" name="nomA" id="nomA" placeholder="exp: Allergie alimentaire" />
           </label>
             <label >
               Description :
                 <textarea name="descA"  id="descA"   placeholder=" Description "></textarea>
             </label>
             
         <button type="submit" class="form-btn" id="update-allergy" name="update-allergy">Modifier</button>
</form>
</div>    
 ';
}

              
             
// <!-- -----------------------------insert antecedent----------------------------------- -->
function insert_antecedent()
{
echo'
<div class="overlay antecedent hide" id="antecedent">
<form action="" method="post" name="antecedent" class="form border insert" id="antecedent-form">
 <button class="close_form" onclick="hideForm()" id="antecedent-btn" name="close-insert-antecedent"> <i class="uis uis-multiply closer"></i> </button> 

         <label >
           Nom de la antecedentie : 
           <input type="text" minlength="3" name="nom-antecedent"  placeholder="Exp: Diabête type 1" />
         </label>
         <label >
           Lien Familiale : 
           <input type="text" minlength="3" name="lien-antecedent"  placeholder="Exp: Mère"/>
         </label>
           <label >
             Description :
               <textarea name="desc-antecedent"  id="desc-antecedent"   placeholder=" Description "></textarea>
           </label>
           
       <button type="submit" class="form-btn"  name="insert-antecedent">Ajouter</button>
</form>
</div>';
}
// <!-- -----------------------------update antecedent----------------------------------- -->
function update_antecedent() {
echo'
<div class="overlay antecedent hide" id="antecedent1">
<form action="" method="post" name="antecedent" class="form border update" id="antecedent-form-update">
 <button class="close_form" onclick="hideForm()" id="antecedent-btn-close" name="close-update-antecedent"> <i class="uis uis-multiply closer"></i> </button> 
      <input type="hidden" name="idAnt" id="antece" >
  
         <label >
           Nom de la antecedentie : 
           <input type="text" minlength="3" name="nomAnt"id="nomAnt"   placeholder="Exp: Diabête type 1" />
         </label>
         <label >
           Lien Familiale : 
           <input type="text" minlength="3" name="lienAnt" id="lienAnt"  placeholder="Exp: Mère"/>
         </label>
           <label >
             Description :
               <textarea name="descAnt"  id="descAnt"   placeholder=" Description "></textarea>
           </label>
           
       <button type="submit" class="form-btn"id="update-antecedent" name="update-antecedent">Modifier</button>
</form>
</div>
';
}
// <!-- -----------------------REMPLISSAGE DES docsS------------------------ -->
function insert_doc()
{
echo'
<div class="overlay docs hide" id="doc">
     <form   class="form border docForm" id="docs-form" enctype="multipart/form-data" >
     <button class="close_form" onclick="hideForm()"id="close-add-doc"> <i class="uis uis-multiply closer"></i> </button> 
             <label >
                 Nom du document : 
                 <input type="text" minlength="3" name="nom-docs" id="nom-doc" placeholder="Entrez le nom du document"  />
                 <!-- add condition about existing file name -->
             </label>
               <label >
                   Date :
                   <input type="date"id="date-docs"name="docs-date"  />
               </label>
               <label >
                 Ajouté par :
                 <input type="text"id="added-by-docs"name="added-by"  />
             </label>
             <label >
                 Catégorie :
                 <select id="category" name="category">
                     <option value="resultats">Résultats de biologie</option>
                     <option value="compte-rendu">Comptes rendu</option>
                     <option value="imagerie">Imageries médicales</option>
                     <option value="certifs">Certificats</option>
                     <option value="piece">Pièces administratives</option>
                     <option value="autres">autres documents</option>
                 </select>
             </label>
             <label id="choisir">
               Choisir un document
               <input type="file" name="file" id="add-file"/>
               <span id="show-name"></span>
              </label>
             <button  class="form-btn" id="submit-docF" >Ajouter</button>
    </form>
   </div>
';
}
// <!-- -----------------------Editer un docsS------------------------ -->
function update_doc()
{
echo'
<div class="overlay docs hide" id="editDoc">
<form   class="form border docForm" id="docs-form-edit" enctype="multipart/form-data" >
<button class="close_form" onclick="hideForm()"id="close-edit-doc"> <i class="uis uis-multiply closer"></i> </button> 
<input type="hidden" name="doc_id" id="doc_id" >
     <label >
         Nom du document : 
         <input type="text" minlength="3" name="nom" id="nomDoc" placeholder="Entrez le nom du document"  />
         <!-- add condition about existing file name -->
     </label>
       <label >
           Date :
           <input type="date"id="dateDoc"name="date"  />
       </label>
       <label >
         Ajouté par :
         <input type="text"id="addedDoc"name="added"  />
     </label>
     <label >
         Catégorie :
         <select id="category-doc" name="category-doc">
         <option value="Résultats de biologie">Résultats de biologie</option>
         <option value="Comptes rendu">Comptes rendu</option>
         <option value="Imageries médicales">Imageries médicales</option>
         <option value="Certificats">Certificats</option>
         <option value="Pièces administratives">Pièces administratives</option>
         <option value="autres documents">autres documents</option>
         </select>
     </label>
    
     <button  class="form-btn" id="submit-doc-edit" value="Edit" >Modifier</button>
</form>
</div>';
}
// <!-- -----------------------------Insert hospitalisations----------------------------------- -->
function insert_hospital()
{
echo'
<div class="overlay hospital hide" id="hospital">
                 <form action="" method="post" name="hospital" class="form border insert" id="hospital-form">
                   <button class="close_form" onclick="hideForm()"id="hospital-btn" name="close-insert-hospital"> <i class="uis uis-multiply closer"></i> </button> 
                 
                           <label >
                             Cause : 
                             <input type="text" minlength="3" name="cause-hospital"  placeholder="Chirurgie cardiaque"/>
                         </label>
                           <label >
                               Date d\'admission :
                               <input type="date"id="date-hospital" name="hospital-date" />
                           </label>
                           <label >
                             Durée de séjour :
                             <input type="text" minlength="3"id="duree-hospital" name="hospital-duree" />
                         </label>
                             <label >
                               Description :
                                 <textarea name="desc-hospital"  id="desc-hospital"   placeholder=" Description "></textarea>
                             </label>
                             
                         <button type="submit" class="form-btn"  name="insert-hospital">Ajouter</button>
               </form>
               </div>';
}
// <!-- -----------------------------update hospitalisations----------------------------------- -->
function update_hospital() {
echo'   <div class="overlay hospital hide" id="hospital1">
<form action="" method="post" name="hospital" class="form border update" id="hospital-form-update">
 <button class="close_form" onclick="hideForm()"id="hospital-btn-close" name="close-update-hospital"> <i class="uis uis-multiply closer"></i> </button> 
         <input type="hidden" name="idH" id="hosp" >
         
         <label >
           Cause : 
           <input type="text" minlength="3" name="cause" id="causeH"  placeholder="Chirurgie cardiaque"/>
       </label>
         <label >
             Date d\'admission :
             <input type="date"id="dateH" name="dateH" />
         </label>
         <label >
           Durée de séjour :
           <input type="text" minlength="3"id="dureeH" name="dureeH" />
       </label>
           <label >
             Description :
               <textarea name="descH"  id="descH"   placeholder=" Description "></textarea>
           </label>
           
       <button type="submit" class="form-btn"  name="update-hospital"id="update-hospital">Modifier</button>
</form>
</div>    ';
}
// <!-- -----------------------REMPLISSAGE DES MALADIES------------------------ -->
function insert_maladie(){
echo'
<div class="overlay maladie hide" id="maladie">
                 <form action="" method="post" name="maladie" class="form border insert" id="maladie-form">
                   <button class="close_form" onclick="hideForm()"id="maladie-btn" name="close-insert-maladie"> <i class="uis uis-multiply closer"></i> </button> 
                           <label >
                             Nom du maladie : 
                             <input type="text" minlength="3" name="nom-maladie"  placeholder="Entrez le nom du maladie" />
                         </label>
                           <label >
                               Date début du maladie :
                               <input type="date"id="date-maladie"name="maladie-date" />
                           </label>
                           <label >
                 Catégorie :
                 <select id="category" name="category">
                 <option value="Résultats de biologie">Résultats de biologie</option>
                 <option value="Comptes rendu">Comptes rendu</option>
                 <option value="Imageries médicales">Imageries médicales</option>
                 <option value="Certificats">Certificats</option>
                 <option value="Pièces administratives">Pièces administratives</option>
                 <option value="autres documents">autres documents</option>
                 </select>
                             <label >
                                 Description :
                                 <textarea name="desc-maladie"  id="desc-maladie"   placeholder="Décrivez votre maladie"></textarea>
                             </label>
                             
                         <button type="submit" class="form-btn " name="insert-maladie" >Ajouter</button>
                         
               </form>
               </div>
               
';
}
// <!-- -----------------------UPDATE DES MALADIES------------------------ -->
function update_maladie() {
echo'
 
<div class="overlay maladie hide" id="maladie1">
<form action="" method="post" name="maladie" class="form border update" id="maladie-form-update">
 <button class="close_form" onclick="hideForm()"id="maladie-btn-close" name="close-update-maladie"> <i class="uis uis-multiply closer"></i> </button> 
     <input type="hidden" name="idMal" id="mal" >

         <label >
           Nom du maladie : 
           <input type="text" minlength="3" id="nomMal" name="nomMal"  placeholder="Entrez le nom du maladie" />
       </label>
         <label >
             Date début du maladie :
             <input type="date"id="dateMal"name="dateMal" />
         </label>
         <label >
Catégorie :
<select id="category" name="category">
<option value="ordinaire">ordinaire</option>
<option value="chronique">chronique</option>
<option value="Tumeur">Tumeur</option>
<option value="Grossesse">Grossesse</option>
<option value="autres">autres </option>
</select>
           <label >
               Description :
               <textarea name="descMal"  id="descMal"   placeholder="Décrivez votre maladie"></textarea>
           </label>
           
       <button type="submit" class="form-btn "id="update-maladie" name="update-maladie">Modifier</button>
       
</form>
</div>';
}
// <!-- ---------------------------form to add mesures------------------------- -->

function insert_mesure(){
echo'
<div class="overlay mesureForm hide" id="mesure">
<form action="" method="post" name="mesure" class="form border insert" id="mesure-form">
 <button class="close_form" onclick="hideForm()"id="mesure-btn" name="close-insert-mesure"> <i class="uis uis-multiply closer"></i> </button> 
   <div class="mesure-inputs">
     <label >
       Poids
       <input type="text"  name="poid" id="M1" placeholder="en Kg...">
       </label>

       <label >
         Taille
         <input type="text"  name="taille" id="M2"placeholder="en cm...">
       </label>

       <label >
         ICM 
         <input type="text"  name="IMC" id="M3" placeholder="Indice de Masse Corporelle">
       </label>

       <label >
           Tour de taille
           <input type="text"  name="tour-taille" id="M4" placeholder="en cm...">
       </label>

       <label >
         Température
         <input type="text"  name="temperature" id="M5"  placeholder="en degrée...">
       </label>
   
       <label >
         Tension artérielle
         <input type="text"  name="tension-arterielle" id="M6"placeholder=" en cmHg...">
       </label>
     
       <label >
         fréquence cardiaque
         <input type="text"  name="frq-cardiaque" id="M7"placeholder=" en bpm...">
       </label>
   
       <label >
         Glycémie
         <input type="text"  name="glycemie" id="M8" placeholder=" en  mmol/L....">
       </label>
       <label >
       Date
     <input type="date"  name="date" id="date">
   </label>
   </div>
   
       <button type="submit" class="form-btn"  name="insert-mesure">Ajouter</button>
</form>
</div>
';

}

// <!-- ---------------------------form to update mesures------------------------- -->
function update_mesure() {
echo'
<div class="overlay mesureForm hide" id="mesure1">
<form action="" method="post" name="mesure" class="form border update" id="mesure-form-update">
 <button class="close_form" onclick="hideForm()"id="mesure-btn-close" name="close-update-mesure"> <i class="uis uis-multiply closer"></i> </button> 
   <input type="hidden" name="idM" id="mes" >

 <div class="mesure-inputs">
 <label >
   Poids
    <input type="text"  name="M1" id="m1"placeholder=" en Kg...">
   </label>

   <label >
     Taille
     <input type="text"  name="M2" id="m2"en cm...">
   </label>

   <label >
     ICM 
     <input type="text"  name="M3" id="m3" placeholder="Indice de Masse Corporelle">
   </label>

   <label >
       Tour de taille
        <input type="text"  name="M4" id="m4"en cm...">
   </label>

   <label >
     Température
     <input type="text"  name="M5" id="m5"placeholder="en degrée...">
   </label>

   <label >
     Tension artérielle
     <input type="text"  name="M6" id="m6"placeholder=" en cmHg...">
   </label>
  
   <label >
     fréquence cardiaque
     <input type="text"  name="M7" id="m7"placeholder=" en bpm...">
   </label>

   <label >
     Glycémie
     <input type="text"  name="M8" id="m8"placeholder=" en  mmol/L....">
   </label>
   <label >
   Date
     <input type="date"  name="date1" id="date1">
   </label>

</div>

       <button type="submit" class="form-btn"  id="update-mesure"name="update-mesure">Modifier</button>
</form>
</div>
';
}
// <!-- -----------------------REMPLISSAGE DES TARAITEMENTS------------------------ -->
function insert_traite()
{
echo'<div class="overlay traitement hide" id="traitement" >
<form action="" method="post" name="traitement" class="form border insert" id="traitement-form">
 <button class="close_form" onclick="hideForm()"id="traitement-btn-close" name="close-insert-traitement" > <i class="uis uis-multiply closer"></i> </button> 

         <label >
           Nom du traitement : 
           <input type="text" minlength="3" name="nom-traitement"  placeholder="Entrez le nom du traitement" />
       </label>
         <label >
             Date début  :
             <input type="date"id="date-traitement"name="traitement-date" />
         </label>
         <label >
           Durée du Traitement : 
           <input type="text" minlength="3" name="duree-traitement"  placeholder="exp: 3 mois ....." />
       </label>
       <label >
         Dose : 
         <input type="text" minlength="3" name="dose-traitement"  placeholder="exp: 2 fois par jour ....." />
     </label>
           <label >
               Description :
               <textarea name="desc-traitement"  id="desc-traitement"   placeholder=""></textarea>
           </label>
           
       <button type="submit" class="form-btn"  name="insert-traitement">Ajouter</button>
</form>
</div>';
}
// <!-- -----------------------UPDATE DES TARAITEMENTS------------------------ -->
function update_traite()
{
echo'
<div class="overlay traitement hide" id="traitement1" >
<form action="" method="post" name="traitement" class="form border update" id="traitement-form-update">
<button class="close_form" onclick="hideForm()"id="traitement-btn-close" name="close-update-traitement" > <i class="uis uis-multiply closer"></i> </button> 
              <input type="hidden" name="idT" id="traite" >
            
          <label >
            Nom du traitement : 
            <input type="text" minlength="3"id="nomT"  name="nomT"  placeholder="Entrez le nom du traitement" />
        </label>
          <label >
              Date début  :
              <input type="date"id="dateT"name="dateT" />
          </label>
          <label >
          Durée du Traitement : 
          <input type="text" minlength="3" id="dureeT"name="dureeT"  placeholder="exp: 3 mois ....." />
      </label>
      <label >
        Dose : 
        <input type="text" minlength="3" id="doseT"name="doseT"  placeholder="exp: 2 fois par jour ....." />
    </label>
            <label >
                Description :
                <textarea name="descT"  id="descT"   placeholder=""></textarea>
            </label>
            
        <button type="submit" class="form-btn"  id="update-traitement"name="update-traitement">Modifier</button>
  </form>
</div>
</div>';
}
// <!-- -----------------------------vaccin insert----------------------------------- -->
function insert_vaccin()
{
echo'
<div class="overlay vaccin hide" id="vaccin">
<form action="" method="post" name="vaccin" class="form border insert" id="vaccin-form">
 <button class="close_form" onclick="hideForm()"id="vaccin-btn" name="close-insert-vaccin"> <i class="uis uis-multiply closer"></i> </button> 

         <label >
           Nom du vaccin : 
           <input type="text" minlength="3" name="nom-vaccin"  placeholder="Exp: astrazeneca" />
         </label>
         <label >
           Date de l\'act  :
           <input type="date"id="date-vaccin"name="vaccin-date" />
       </label>
       <label >
       Protège contre : 
       <input type="text" minlength="3" name="utilite-vaccin"  placeholder="exp: Protège contre covid-19 ....."/>
   </label>
   <label >
     Nombre des rappels : 
     <input type="text"  name="nbr-vaccin"  placeholder="exp: 2 fois ....."/>
 </label>
         <label >
             Description :
             <textarea name="desc-vaccin"  id="desc-vaccin"   placeholder="Exp: J\'ai eu des effets secondaires ..."></textarea>
         </label>
           
       <button type="submit" class="form-btn"  name="insert-vaccin">Ajouter</button>
</form>
</div>';
}
// <!-- -----------------------------vaccin update----------------------------------- -->
function update_vaccin() {
echo' <div class="overlay vaccin hide" id="vaccin1">
<form action="" method="post" name="vaccin" class="form border update" id="vaccin-form-update">
 <button class="close_form" onclick="hideForm()"id="vaccin-btn-close" name="close-update-vaccin"> <i class="uis uis-multiply closer"></i> </button> 
     <input type="hidden" name="idV" id="vac" >
         
         <label >
           Nom du vaccin : 
           <input type="text" minlength="3" name="nomV" id="nomV" placeholder="Exp: astrazeneca" />
         </label>
         <label >
           Date de l\'act  :
           <input type="date"id="dateV"name="dateV" />
       </label>
       <label >
       Protège contre : 
       <input type="text" minlength="3" id="protegeV" name="protegeV"  placeholder="exp: Protège contre covid-19 ....."/>
   </label>
   <label >
     Nombre des rappels : 
     <input type="text"  name="nbV" id="nbRappel" placeholder="exp: 2 fois ....."/>
 </label>
         <label >
             Description :
             <textarea name="descV"  id="descV"   placeholder="Exp: J\'ai eu des effets secondaires ..."></textarea>
         </label>
           
       <button type="submit" class="form-btn"  name="update-vaccin" id="update-vaccin">Modifier</button>
</form>
</div>  
';
}
// <!-- -----------------------------diagno insert----------------------------------- -->
function insert_diagno()
{
echo'
<div class="overlay diagno hide" id="diagno">
<form action="" method="post" name="diagno" class="form border insert" id="diagno-form">
             <button class="close_form" onclick="hideForm()"id="diagno-btn" name="close-insert-diagno" > <i class="uis uis-multiply closer"></i> </button> 
 
           <label >
             Nom et Prénom : 
             <input type="text" minlength="3" name="nomMed"  placeholder="Nom du medecin" />
           </label>
             <label >
               Spécialité :
               <input type="text" minlength="3" name="spec"  placeholder="entrez votre specialite..." />
             </label>
             <label >
               Date:
                 <input name="dateD"  id="dateD"   type="date" />
             </label>
             <label >
               Diagnostique :
                 <textarea name="diago"  id="diago"   placeholder=" Diagnostique... "></textarea>
             </label><label >
             Examens complémentaires :
                 <textarea name="exam"  id="exam"   placeholder="(Si necessaire).... "></textarea>
             </label><label >
             Traitement  :
                 <textarea name="traite"  id="traite"   placeholder=" (ordonnance, geste technique...) "></textarea>
             </label>
           <button type="submit" class="form-btn" name="insert-diagno">Ajouter</button>
           </form>
</div>';
}
// <!-- -----------------------------diagno update----------------------------------- -->
function update_diagno() {
echo' <div class="overlay diagno hide" id="diagno1">
<form action="" method="post" name="diagno" class="form border update" id="diagno-form-update">
 <button class="close_form" onclick="hideForm()"id="diagno-btn-close" name="close-update-diagno"> <i class="uis uis-multiply closer"></i> </button> 
     <input type="hidden" name="idD" id="diag" >
         
        
     <label >
     Nom et Prénom : 
     <input type="text" minlength="3" name="nomMed1" id="nomMed1" placeholder="Nom du medecin" />
   </label>
     <label >
       Spécialité :
       <input type="text" minlength="3" name="spec1" id="spec1" placeholder="entrez votre specialite..." />
     </label>
     <label >
     <label >
     Date:
       <input name="dateD1"  id="dateD1"   type="date" />
   </label>
       Diagnostique :
         <textarea name="diag1"  id="diag1"   placeholder=" Diagnostique... "></textarea>
     </label><label >
     Examens complémentaires :
         <textarea name="exam1"  id="exam1"   placeholder="(Si necessaire).... "></textarea>
     </label><label >
     Traitement  :
         <textarea name="traite1"  id="traite1"   placeholder=" (ordonnance, geste technique...) "></textarea>
     </label>
           
       <button type="submit" class="form-btn"  name="update-diagno" id="update-diagno">Modifier</button>
</form>
</div>  
';
}

//========================call the functions================
insert_maladie();
update_maladie();
//================
insert_allergie();
update_allergie();
//========================
insert_antecedent();
update_antecedent();
//==================
insert_mesure();
update_mesure();
//=================
insert_doc();
update_doc();
//=================
insert_vaccin();
update_vaccin();
//==================
insert_traite();
update_traite();
//===================
insert_hospital();
update_hospital();
// ===================
insert_diagno();
update_diagno();
?>

          
            

   
            
  


             

               
            
               

               
            

                 
                