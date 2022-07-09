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
    // focus 
    const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});