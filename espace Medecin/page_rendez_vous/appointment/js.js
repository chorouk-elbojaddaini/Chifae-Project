/*var myElement = document.getElementsByName("here")[0];
var fct = function (){
    document.write("hello world!");
}
var c = function(){
    myElement.innerHTML;
}
myElement.addEventListener("click",fct);
myElement.removeEventListener("click",fct);
*/

function toggle(){
    var blur=document.getElementById("blur");
    blur.classList.add('active');
    var boite = document.getElementById('boite');
    boite.classList.add('cl');
}
function tap(){
    
    var blur=document.getElementById("blur");
    blur.classList.remove('active');

}


















// document.querySelector("#myId").setAttribute("style","color:red;background-color:green;border:1em solid black");
// var elmt = document.createElement("textarea");
// elmt.name="hey";
// var abc = document.querySelector("body").appendChild(elmt);

//cloner et changer id
/*var myElement = document.querySelector("#myId");
var e = myElement.cloneNode(false);
e.id="id4";
document.body.appendChild(e);*/



/*var myElement= document.createElement("div");
myElement.class="divclass";
myElement.innerHTML="le teeeeext";
var var2= document.querySelector("#myId");
document.body.replaceChild(myElement,var2)*/















/*function on(){
    var myElement = document.getElementById("myId").innerHTML = "this is my new content";
    // document.write("<h1>"+myElement.innerHTML+"</h1>");
    
}
function db(){
    var myElement = document.getElementById("myId").innerHTML = "double click";
}*/
/*function v(){
    var e= document.getElementById("myId1");
    var l= document.getElementById("myId2");
    l.innerHTML =e.innerHTML;

}*/

// var myElement=document.querySelector(".myclass").innerHTML;
// document.write(myElement);