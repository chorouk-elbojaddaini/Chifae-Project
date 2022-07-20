// =============================CHANGEMENT DES PAGES : SMALL DEVICES===============================
// ------------------Transformer ul des tabs en select---------------------
let ul = document.querySelectorAll('.tab')
// Create an empty select node
// without an ID, any attributes, or any content
const select = document.createElement("select");

// Give it an id attribute 
select.id = "tabs";

function ul_to_select(ul,select)
{
    // Create options inside.
for (let i =0; i<ul.length; i++){
    let opt = document.createElement('option');
    opt.value = i+1;
    opt.innerHTML=ul[i].innerHTML;
    // opt.textContent=ul[i].textContent
    opt.setAttribute('class','tab');
    select.appendChild(opt);
    // console.log(ul[i].innerHTML);
}
//activer la premiere page
// select[0].classList.add('is-active');

// Build a reference to the existing node to be replaced
const ul_old = document.getElementById("tabs");
const parentDiv = ul_old.parentNode;
// Replace existing node ul with the new element option
parentDiv.replaceChild(select, ul_old);

}


// ------------------Appliquer aux small devices seulement---------------------
function smallDevices(query) {
    if (query.matches) { // If media query matches
        ul_to_select(ul,select);
    }
  }
  
  let query = window.matchMedia("(max-width:767px)")
  smallDevices(query) // Call listener function at run time


// ------------------Masquer les tableaux aux small devices seulement---------------------

 function tableAffiche()
 {
    const affichage =document.querySelectorAll('.affichage');

    const table =document.querySelectorAll('.show');
    let query2 = window.matchMedia("(max-width:991px)");

   for(let i=0; i<affichage.length; i++)
    {
        if (query2.matches) {
        
            table[i].style.display = 'none';
    

          }
          else{
              affichage[i].style.display = 'none';
          }
        
    }

 }

//auto resizing textarea with
 textarea = document.querySelectorAll("textarea");
 textarea.addEventListener('input',autoResize());

 function autoResize() {
     this.style.height = 'auto';
     this.style.height = this.scrollHeight + 'px';
 }



