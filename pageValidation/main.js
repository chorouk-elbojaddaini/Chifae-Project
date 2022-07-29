/* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      
      // Close the dropdown if the user clicks outside of it
      window.onclick = function (event) {
        if (!event.target.matches(".dropbtn")) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains("show")) {
              openDropdown.classList.remove("show");
            }
          }
        }
      };
      
      //   color of nav change when i scroll
      window.addEventListener("scroll", () => {
        document
          .querySelector("nav")
          .classList.toggle("window-scroll", window.scrollY > 0);
      });
      
      // show/hide menu
      const menu = document.querySelector(".nav-menu");
      const menuBtn = document.querySelector(".open_menu_botton");
      const closeBtn = document.querySelector(".close_menu_botton");
      menuBtn.addEventListener("click", () => {
        menu.style.display = "flex";
        closeBtn.style.display = "inline-block";
        menuBtn.style.display = "none";
      });
      // close nav menu
      const closeNav = () => {
        menu.style.display = "none";
        closeBtn.style.display = "none";
        menuBtn.style.display = "inline-block";
      };
      closeBtn.addEventListener("click", closeNav);
    //   end close nav menu


    // the body of rdv 
    const prevBtns = document.querySelectorAll(".btn-prev");
const nextBtns = document.querySelectorAll(".btn-next");
const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");
const progressSteps = document.querySelectorAll(".progress-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum++;
    updateFormSteps();
    updateProgressbar();
  });
});

prevBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    formStepsNum--;
    updateFormSteps();
    updateProgressbar();
  });
});

function updateFormSteps() {
  formSteps.forEach((formStep) => {
    formStep.classList.contains("form-step-active") &&
      formStep.classList.remove("form-step-active");
  });

  formSteps[formStepsNum].classList.add("form-step-active");
}

function updateProgressbar() {
  progressSteps.forEach((progressStep, idx) => {
    if (idx < formStepsNum + 1) {
      progressStep.classList.add("progress-step-active");
    } else {
      progressStep.classList.remove("progress-step-active");
    }
  });

  const progressActive = document.querySelectorAll(".progress-step-active");

  progress.style.width =
    ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
}
// end of rdv 

// show and hide number
const num = document.querySelector(".affichernum");
const numaffiche =document.querySelector(".numero");
num.addEventListener("click", () =>{
  num.style.display="none";
  numaffiche.style.display="block";
}
)
numaffiche.addEventListener("click", () =>{
  num.style.display="block";
  numaffiche.style.display="none";
}
)
// const showNumber = () => {
//   num.style.display ="none";
//   numaffiche.style.display = "block";
// };
// hide the number
// const hideNumber = () => {
//   num.style.display = "block";
//   numaffiche.style.display = "none";
// };
// num.addEventListener("click",showNumber);
// numaffiche.addEventListener("click",hideNumber);
// end show and hide number

// show and hide dates 
// const date =document.querySelectorAll('.valide-none');
// const show_date=document.querySelector('.see-more');
// show_date.addEventListener("click", ()=>{
//     for (var i = 0; i < date.length; i++) {
//     date[i].style.display="block";
//     }
//     show_date.style.display="none";
// })

// number check 
let check = document.querySelector(".check");
let number = document.querySelector(".number");
let text = document.querySelector(".text");

let regex = '#^0[6-7]{1}\d{8}$#';

// check.addEventListener("click",()=>{
// 	if(number.value ==""){
// 		text.innerText = "Priére d'entrer un numéro";
// 		text.style.color = "#da3400";
// 	}
//   else if(number.value.length>10){
//     text.innerText = "le numéro doit être en 10 chiffres ";
// 		text.style.color = "#da3400";
// 	}
// 	else if(number.value.match(regex)){
// 		text.innerText = "le numéro est valide ,un code a été envoyé";
// 		text.style.color = "rgba(4,125,9,1)";
// 	}
 
// 	else
// 		{
// 		text.innerText = "le numéro n'est pas valide ";
// 		text.style.color = "#da3400";
// 		}
// });




function validateForm() {
  var x = document.forms["formm"]["nom"].value;
  var y = document.forms["formm"]["prenom"].value;
  var z = document.forms["formm"]["email"].value;
  var e = document.forms["formm"]["phone"].value;
  // var f = document.forms["formm"]["date"].value;
  // var j = document.forms["formm"]["heure"].value;
  var mail_format = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
  function validateEmail(email) 
    {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }
    function validateNUM(num) 
    {
        var re = /^0[6-7]{1}\d{8}$/;
        return re.test(num);
    }
    console.log(x);
    console.log(validateEmail(z));
  if (x == "" || x == null) {
    // alert("Le nom doit être remplit");
  

    alertify.error(' Le nom doit être remplit');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;
  }
  if (y == "" || y == null) {
    
    alertify.error(' Le prenom doit être remplit');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;
  }
  
  if (z == "" || z == null) {
    alertify.error(' Email doit être remplit');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;
  

  }
  if (e == "" || e == null) {
    alertify.error(' Le numéro doit être remplit');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;
  }

  if(e.length >10){
    alertify.error(' Le numéro doit contenir 10 nombres');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;

	}
  if(e.length <9){
    alertify.error(' Le numéro doit contenir 10 nombres');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;
	}
	if(!validateNUM(e)){
    alertify.error(' Le numéro doit commencer par 06 ou 07');
    alertify.set('notifier','position', 'top-center');
                    
                    window.setTimeout(function () {window.location.reload();
                  }, 2000);
                    return false;
	}

  if(validateEmail(z))
  {
    return true;
  }
  else
{
  alertify.error(' Entrer un email valide');
  alertify.set('notifier','position', 'top-center');
                  
                  window.setTimeout(function () {window.location.reload();
                }, 2000);
                  return false;
  }
 


 







}