const popup = document.querySelector("#popup");
const overlay = document.querySelector(".overlay");
document.querySelector("#user").addEventListener("click", ()=>
{

    overlay.style.display="block";
})
document.querySelector(".close_menu_botton2").addEventListener("click", ()=>
{
    overlay.style.display="none";
})