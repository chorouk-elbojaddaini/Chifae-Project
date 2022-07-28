 let tabs = document.querySelectorAll(".tabs li");
 let tabsArray = Array.from(tabs);
let divs = document.querySelectorAll(".contenu > div");
 let divsArray = Array.from(divs);
 console.log(tabsArray);
tabsArray.forEach((ele) => {
   ele.addEventListener("click", function (e) {
   tabsArray.forEach((ele) => {
       ele.classList.remove("active");
      });
      e.currentTarget.classList.add("active");
      divsArray.forEach((div)=>{
         div.style.display ="none";
      });
     document.querySelector(e.currentTarget.dataset.cont).style.display ="block";
     });
 });  


//tableau des mois (ex : 10 correspond à novembre)
var tableauMois = new Array(
  'janvier',
  'février',
  'mars',
  'avril',
  'mai',
  'juin',
  'juillet',
  'août',
  'septembre',
  'octobre',
  'novembre',
  'décembre'
);
//tableau des jours
var tableauJours = new Array(
  'dimanche',
  'lundi',
  'mardi',
  'mercredi',
  'jeudi',
  'vendredi',
  'samedi'
);

function afficherDateHeure() {
var dateGlobale = new Date();
var annee = dateGlobale.getFullYear();
//récupérer le numéro du mois
var mois = dateGlobale.getMonth();
mois = tableauMois[mois];

//récupérer le numéro du jour
var jour = dateGlobale.getDay();
var jour = tableauJours[jour];

//le numéro du jour
var num = dateGlobale.getDate()
//récupérer l'heure
var heure = dateGlobale.getHours();
//les minutes 
var minute = dateGlobale.getMinutes();
//les secondes
var seconde = dateGlobale.getSeconds();


var dateHeure =document.getElementById("date_heure");
//mettre la date et l'heure dans div
if (minute < 10 ){
  if(seconde <10){
  dateHeure.innerHTML = jour +" "+num+ " " + mois+ " , " + annee+" - " + heure+" : 0"+ minute+ " :0" + seconde;
  } else{
      dateHeure.innerHTML = jour +" " +num+ " " + mois+ " , " + annee+" - " + heure+" : 0"+ minute+ " : " + seconde;

  }
}else {
  if(seconde <10){
      dateHeure.innerHTML = jour +" " +num+ " " + mois+ " , " + annee+" - " + heure+" : "+ minute+ " :0" + seconde;
      } else{
          dateHeure.innerHTML = jour +" "+num+ " "  + mois+ " , " + annee+" - " + heure+" : "+ minute+ " : " + seconde;
  
      }
  }

}

function afficherChaqueSecondeHeure(){
  afficherDateHeure();

  var delai = 1000; //en ms
  //timer afficher l'heure dynamiquement 
  setInterval('afficherDateHeure()',delai);
}





 
 