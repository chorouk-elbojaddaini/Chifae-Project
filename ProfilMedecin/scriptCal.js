var tes = 0
let d 
var getDaysInMonth = function(month,year) {
    // Here January is 1 based
    //Day 0 is the last day in the previous month
   return new Date(year, month, 0).getDate();
  // Here January is 0 based
  // return new Date(year, month+1, 0).getDate();
  };
  var arr = []
function addDays(date, days) {
    var result = new Date(date);
    result.setDate(result.getDate() + days);
    return result;
  }
var date = new Date()
var date2 = date
const months = [
    "Jan",
    "Fev",
    "Mar",
    "Avr",
    "Mai",
    "Jun",
    "Jull",
    "Aou",
    "Sep",
    "Oct",
    "Nov",
    "Dec",
  ];
var year = date.getFullYear()
isLeapYear = (year) => {
  return (year % 4 ===0 && year % 100 !== 0 && year % 400 !==0) || (year % 100 === 0 && year % 400 ===0)
}
getFebDays = (year) => {
  return isLeapYear(year) ? 29 : 28
}
let k =0
let days_of_month = [31,getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

var trueVar = false
var mois = date.getMonth()
var var2 = date.getDate()
const Jours = [
    "Dim",
    "Lun",
    "Mar",
    "Mer",
    "Jeu",
    "Ven",
    "Sam"
  ]
 
function ajoutChild(Days,test){
    var element = document.createElement("div")
        element.innerHTML = Jours[test]
    Days.appendChild(element) 
}




const renderCalendar = () => {
      
     arr.length = 0
    const Days = document.querySelectorAll(".weekdays div");
    
  const monthDays = document.querySelector(".days");
  
  var div = document.querySelectorAll(".days div")


  let a = 0

    trueVar = false
      for(k=0;k<7;k++){
         if(d == new Date().getDate() && date.getMonth() == new Date().getMonth()) {
           var precedent = document.querySelector(".prev")
             precedent.classList.add('hide')
        }
        d= date.getDate() 
        arr.push(date.getDay())
        div[k].innerHTML = d + months[date.getMonth()];
        date = addDays(date,1)
        
        

      }
      
      for(let l=0 ; l < arr.length;l++){
            Days[l].innerHTML = Jours[arr[l]]
         }
          if (d === new Date().getDate() && date.getMonth() === new Date().getMonth()){
        
      div[a].classList.add('today');
    }
       
       
a++
 };

renderCalendar()
console.log("hadi 3la brra"+date)

document.querySelector(".next").addEventListener("click", () => {


  var precedent = document.querySelector(".prev")
          precedent.classList.remove('hide')

 console.log("hadi next :" +date)
  renderCalendar();
});
console.log(date)
 document.querySelector(".prev").addEventListener("click", () => {

date = addDays(date,-14)
console.log("hellooo")
renderCalendar();

  console.log(date)
     

});