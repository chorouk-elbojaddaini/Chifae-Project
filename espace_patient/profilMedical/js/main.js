//for patient pages
let div = document.createElement("div");
//===========for doctor pages


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

// ------------------Appliquer aux small devices seulement---------------------
function smallDevices(query) {
  if (query.matches) {
    // If media query matches
    ul_to_select(div, divTab);
   

  }
}
let query = window.matchMedia("(max-width:767px)");
smallDevices(query);
       
//auto resizing textarea with
textarea = document.querySelectorAll("textarea");
textarea.addEventListener("input", autoResize());

function autoResize() {
  this.style.height = "auto";
  this.style.height = this.scrollHeight + "px";
}
//===============
