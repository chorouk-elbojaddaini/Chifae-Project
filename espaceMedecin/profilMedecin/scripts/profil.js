let tabs = document.querySelectorAll(".tabs li");
let tabsArray = Array.from(tabs);
let divs = document.querySelectorAll(".contenu > div");
let divsArray = Array.from(divs);
console.log(tabsArray);
tabsArray.forEach((ele) => {
    ele.addEventListener("click", function (e) {
      // console.log(ele);
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





//   var elt = document.createElement("span");
//  elt.innerHTML = "salut";
//   var v = document.querySelector(".class-spec");
//   var x = document.querySelector(".class-spec p");
//   v.insertBefore(elt,x);
 var spans = document.querySelectorAll(".class-spec span ");
 var nom = document.querySelector(".class-spec ");
 var bi = nom.cloneNode(true);
 var i = spans.length;
 for(var j=i-1 ; j > 2 ; j--){
  spans[j].classList.add('ds');}


function toggle(){
  var blur=document.getElementById("blur");
  blur.classList.toggle('act');
var b = document.getElementById("boite");
b.classList.toggle('act');

b.appendChild(bi);


} 
var b = document.getElementById("boite");
b.removeChild(bi);

//function dis(){
//   for(var j=i-1 ; j > 2 ; j--){
//   spans[j].classList.toggle('ds');
 

// }
//   }

 /* var elt = document.createElement("span");
  elt.innerHTML = "salut";
   var v = document.querySelectorAll(".class-spec span");
 //var i= v.length;
  /* if(i > 2){
       var a = document.createElement("p");
       a.innerHTML="voir plus";
       a.style.color = "red";
       var k = document.querySelector(".class-spec");
   k.appendChild(a); }*/
   
 
 
 
  /*
   var x = document.querySelector(".class-spec p");
   v.insertBefore(elt,x);
   var spans = document.querySelectorAll(".class-spec span ");
   var i = spans.length;
   for(var j=i-1 ; j > 2 ; j--){
 spans[j].classList.add('ds');}
 function dis(){
   for(var j=i-1 ; j > 2 ; j--){
   spans[j].classList.toggle('ds');
   
 
 }
   }*/