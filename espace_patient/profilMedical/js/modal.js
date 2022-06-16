// =================MODAL PROFIL===================
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
//============upload file===============================
const file__upload = document.querySelector(".file__upload");
const overlay_file = document.querySelector(".overlay-file");

document.querySelector("#doc-btn").addEventListener("click", ()=>
{

    overlay_file.style.display="block";
})
document.querySelector(".fermer").addEventListener("click", ()=>
{
    overlay_file.style.display="none";
})
//=========================FUNCTION TO DISPLAY FORMS=================================

function displayForm(overlay_id)
{
   
    const overlay = document.querySelector(`#${overlay_id}`);

     let open_btn ="#add-"+overlay.id.slice(0);
     let close_btn ="#"+overlay.id.slice(0)+"-btn";
     
    
document.querySelector(`${open_btn}`).addEventListener("click", ()=>
{
   

    overlay.style.display="block";
})
document.querySelector(`${close_btn}`).addEventListener("click", ()=>
{
    overlay.style.display="none";
})
}

