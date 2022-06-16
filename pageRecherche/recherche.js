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
      
      //   color  of nav and popup  change when i scroll
      window.addEventListener("scroll", () => {
     
        document
        .querySelector(".content")
        .classList.toggle("aa", window.scrollY > 0);
    });
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


    const faqs = document.querySelectorAll(".faq");
faqs.forEach((faq) => {
  faq.addEventListener("click", () => {
    faq.classList.toggle("open");
    //  change the icon
    const icon = faq.querySelector(".faq_icon i");
    if (icon.className === "uil uil-plus") {
      icon.className = "uil uil-minus";
    } else {
      icon.className = "uil uil-plus";
    }
  });
});

// Show and hide number
const num = document.querySelectorAll(".affichernum");
const numaffiche =document.querySelectorAll(".numero");
// num.addEventListener("click", () =>{
//   num.style.display="none";
//   numaffiche.style.display="block";
// }
// )
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

num.forEach(numero => {
  numero.addEventListener("click", () =>{
    num.forEach(nb =>{
      nb.style.display ="none"
    })
    numaffiche.forEach ( num =>{
    num.style.display="block";
      
      })
  
  }
  )
});
numaffiche.forEach(Number => {
  Number.addEventListener("click", () =>{
    num.forEach(nbe =>{
      nbe.style.display ="block"
    })
    numaffiche.forEach ( nume =>{
    nume.style.display="none";
      
      })
  
  }
  )
});


// num.forEach((nums) =>{
//   nums.addEventListener("click", () => {
// numaffiche.forEach((affiche) =>{

//   nums.style.display ="none";
//   affiche.style.display = "block";

// });

// }
// )

// })

// for (var i = 0; i < numaffiche.length; i++) {
//   for (var j= 0 ; j< num.length ; i++){
//     num[j].addEventListener("click", () => {
//   num[j].style.display ="none";

//   })
 
//   numaffiche[i].style.display = 'block';





// }



// }

    
    




// image and show profile 
const img = document.querySelectorAll(".img-medecin");
const btn = document.querySelectorAll(".medecin-info");

const profile =document.querySelectorAll(".voirplus");

btn.forEach(element => {
  element.addEventListener("mouseover", () =>{
    img.forEach ( imgg =>{
    imgg.style.display="none";
    })
    profile.forEach ( prof =>{
    prof.style.display="block";
      
      })
  
  }
  )
});
btn.forEach(element => {
  element.addEventListener("mouseout", () =>{
    img.forEach ( imgg =>{
    imgg.style.display="block";
    })
    profile.forEach ( prof =>{
    prof.style.display="none";
      
      })
  
  }
  )
});

// btn.addEventListener("mouseout", () =>{
//   img.style.display="block";
//   profile.style.display="none";

// }
// )


// poppup
const pop1 =document.querySelector(".overlay");
const pop2 =document.querySelector(".content");
const popbtn =document.querySelectorAll('.prendre-rdv');
const btnclose = document.querySelector('.close-btn');
const showpopup = () => {
  pop1.style.display = "block";
  pop2.style.display = "inline-block";
};
popbtn.forEach((btn) =>{
  btn.addEventListener("click",showpopup);
})

btnclose.addEventListener("click",() =>{
  pop1.style.display="none";
  pop2.style.display="none";
})

