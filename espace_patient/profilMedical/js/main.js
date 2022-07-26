//=====================toogle to show the options div=============
// let options = document.querySelectorAll('.options-btn');
// console.log(options)
// for (let i = 0; i < options.length; i++) {
//   options[i].addEventListener('click',()=>{
//     let div=options[i].nextElementSibling
//     $(div).toggle()
//     console.log('')

//   })
// }
// =============================CHANGEMENT DES PAGES : SMALL DEVICES===============================
// ------------------Transformer ul des tabs en select---------------------
//for patient pages
let div = document.createElement("div");
//===========for doctor pages
let divD = document.createElement("div");
const divTabD = document.getElementById("doctor-tabs");

// Create an empty select node
// without an ID, any attributes, or any content
const divTab = document.getElementById("divOfTabs");

// Give it an id attribute

function ul_to_select(div, divTab) {
  $(div).html(`
    <select id="selectTab" onChange="window.location.href=this.value">
    <option class="tab is-active"value="maladie.php" >Maladies et sujets de santé</option>
              <option class="tab "value="traite.php" >Traitements</option>
              <option class="tab "value="hospital.php" >Hospitalisation et chirurgies</option>
              <option  class="tab" value="allergie.php" >Allergies</option>
              <option class="tab "value="vaccin.php" >Vaccinations</option>
              <option class="tab "value="mesure.php" >Mesures</option>
              <option class="tab "value="antecedent.php" >Antécédents familiaux</option>
              <option class="tab"value="historique.php" >Historique des soins</option>
</select>
<div class="chevron">
        <img src ="images/arrow.PNG" alt="arrow" >
      </div>
`);
  div.setAttribute("class", "SelectBox");
  // Build a reference to the existing node to be replaced
  const ul_old = document.getElementById("tabs");
  // Replace existing node ul with the new element option
  divTab.replaceChild(div, ul_old);
}
function ul_to_selectD(divD, divTabD) {
  $(divD).html(`
    <select id="selectTab" onChange="window.location.href=this.value">
    <option class="tab is-active"value="#maladieS" >Maladies et sujets de santé</option>
              <option class="tab "value="#traiteS" >Traitements</option>
              <option class="tab "value="#hospitalS" >Hospitalisation et chirurgies</option>
              <option  class="tab" value="#allergieS" >Allergies</option>
              <option class="tab "value="#vaccinS" >Vaccinations</option>
              <option class="tab "value="#mesureS" >Mesures</option>
              <option class="tab "value="#antecedentS" >Antécédents familiaux</option>
              <option class="tab "value="#documentS" >Documents</option>
              <option class="tab"value="#diagnosticS" >Ajouter une diagnostique</option>
</select>
<div class="chevron">
        <img src ="images/arrow.PNG" alt="arrow" >
      </div>
`);
  divD.setAttribute("class", "SelectBox");
  // Build a reference to the existing node to be replaced
  const ul_old = document.getElementById("tabsD");
  console.log(divTabD);
  // Replace existing node ul with the new element option
  divTabD.replaceChild(divD, ul_old);
}

// ------------------Appliquer aux small devices seulement---------------------
function smallDevices(query) {
  if (query.matches) {
    // If media query matches
    ul_to_select(div, divTab);
   

  }
}
let query = window.matchMedia("(max-width:767px)");
smallDevices(query);
function smallDevicesD(query1) {
    if (query1.matches) {
      // If media query matches
      ul_to_selectD(divD, divTabD);
    }
  }

let query1 = window.matchMedia("(max-width:767px)");
smallDevicesD(query1); // Call listener function at run time

// // ------------------Masquer les tableaux aux small devices seulement---------------------

//  function tableAffiche()
//  {
//     const affichage =document.querySelectorAll('.affichage');

//     const table =document.querySelectorAll('.show');
//     let query2 = window.matchMedia("(max-width:991px)");

//    for(let i=0; iffichage.length; i++)
//     {
//         if (query2.matches) {

//             table[i].style.display = 'none';

//           }
//           else{
//               affichage[i].style.display = 'none';
//           }

//     }

//  }

//auto resizing textarea with
textarea = document.querySelectorAll("textarea");
textarea.addEventListener("input", autoResize());

function autoResize() {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
}
