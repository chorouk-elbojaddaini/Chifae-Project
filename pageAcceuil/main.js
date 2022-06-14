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

// Wrap every letter in a span
var textWrapper = document.querySelector(".ml12");
textWrapper.innerHTML = textWrapper.textContent.replace(
  /\S/g,
  "<span class='letter'>$&</span>"
);

anime
  .timeline({ loop: true })
  .add({
    targets: ".ml12 .letter",
    translateX: [40, 0],
    translateZ: 0,
    opacity: [0, 1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i,
  })
  .add({
    targets: ".ml12 .letter",
    translateX: [0, -30],
    opacity: [1, 0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i,
  });
//   end wrap letter

// Wrap every letter in a span
var textWrapper = document.querySelector(".ml1");
textWrapper.innerHTML = textWrapper.textContent.replace(
  /\S/g,
  "<span class='letter'>$&</span>"
);

anime
  .timeline({ loop: true })
  .add({
    targets: ".ml1 .letter",
    translateX: [40, 0],
    translateZ: 0,
    opacity: [0, 1],
    easing: "easeOutExpo",
    duration: 1200,
    delay: (el, i) => 500 + 30 * i,
  })
  .add({
    targets: ".ml1 .letter",
    translateX: [0, -30],
    opacity: [1, 0],
    easing: "easeInExpo",
    duration: 1100,
    delay: (el, i) => 100 + 30 * i,
  });
//   end wrap letter

// start slider
var swiper = new Swiper(".blog-slider", {
  spaceBetween: 30,
  effect: "fade",
  loop: true,
  mousewheel: {
    invert: false,
  },
  // autoHeight: true,
  pagination: {
    el: ".blog-slider__pagination",
    clickable: true,
  },
});
// end slider
// faq open |close
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
// end faq open |close

// CHANGE THE LANGUAGE
var data = {
  french: {
    title:" prenez vos rendez-vous , accédez à vos espaces personnels en toute faciliter",
    ville: "ville",
    specialite: "Specialiste/generaliste",
    shifae:"shifae"
  },
  arabe: {
    title: "قم بأخذ موعد مع طبيبك ، تصفح منتداك الخاص بكل سهولة ",
    ville: "المدينة",
    specialite: "تخصص |عام",
    shifae:"شفاء"
  }
};

const langEl = document.querySelector(".langWrap");
const link = document.querySelectorAll("a");
const titleEl = document.querySelector(".title");
const villeEl = document.querySelector(".ville");
const shifaeEl = document.querySelector(".shifae");
const specialiteEl = document.querySelector(".specialite");
link.forEach((zl) => {
  zl.addEventListener("click", () => {
    const attr = zl.getAttribute("language");
    titleEl.textContent = data[attr].title;
    villeEl.textContent =data[attr].ville;
    specialiteEl.textContent =data[attr].specialite;
    shifaeEl.textContent =data[attr].shifae;
    // villeEl.textContent = data[attr].ville;
  });
});
//  black video
// this.video.pause();
// setTimeout(() => {
//     this.video.play().then((res) => {
//         console.log("playing start", res);
//     })
//     .catch((err) => {
//         console.log("error playing", err);
//     });
// }, 0);

// var videoEl = document.createElement('video');
// videoEl.srcObject = mediaStream;
// videoEl.setAttribute('playsinline', '');
// videoEl.muted = true;

