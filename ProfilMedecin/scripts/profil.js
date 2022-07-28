


  let tabs = document.querySelectorAll(".tabs li");
  let tabsArray = Array.from(tabs);
 let divs = document.querySelectorAll(".contenu > div");
  let divsArray = Array.from(divs);
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

  
function toggle(classe){
    var blur=document.getElementById("blur");
    blur.classList.toggle('act');
  var b = document.getElementById(classe);
  b.classList.toggle('act');
  
  } 





