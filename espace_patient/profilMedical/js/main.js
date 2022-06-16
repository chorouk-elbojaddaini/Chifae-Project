// =============================CHANGEMENT DES PAGES ===============================
 const tab_switchers = document.querySelectorAll('[data-switcher]');
    for(let i=0; i<tab_switchers.length; i++)
    {
        const tab_switcher = tab_switchers[i];

        const page_id = tab_switcher.dataset.tab;
        tab_switcher.addEventListener('click',()=>
        {
           document.querySelector('#tabs .tab.is-active').classList.remove('is-active');
           tab_switcher.parentNode.classList.add('is-active');
           switch_page(page_id);
        })


    }
    function switch_page(page_id){
        const current_page = document.querySelector('.page.is-active');

        current_page.classList.remove('is-active');
        const next_page = document.querySelector(`.page[data-page="${page_id}"]`);
        next_page.classList.add('is-active');

    }


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
    opt.textContent=ul[i].textContent;
    opt.setAttribute('class','tab');
    select.appendChild(opt);

}
//activer la premiere page
select[0].classList.add('is-active');
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

// ------------------changement des pages aux small devices seulement---------------------

    select.addEventListener('change',()=>
    {
        let active = select.value;
         switch_page(active);
    })
// ------------------Masquer les tableaux aux small devices seulement---------------------

    const affichage =document.querySelectorAll('.affichage');
    const modif_table =document.querySelectorAll('.modif-table');
    const table =document.querySelectorAll('table');
    let query2 = window.matchMedia("(max-width:991px)");

   for(let i=0; i<affichage.length; i++)
    {
        if (query2.matches) {
        
            table[i].style.display = 'none';
            modif_table[i].style.display = 'none';

          }
          else{
              affichage[i].style.display = 'none';
          }
        
    }


// ------------------voir plus---------------------





