<script async defer>

//ghadi njibo les horaires fo9Ach khdam wn7tolo les horaires dyawlo tmak 
//wmoraha njibo les rendez vous dyawlo bla la date wndbro 3la la date tmak fl calendrier dyalna
// wila kant l'heure deja kayna fles horaires dyawlna ndiro fblastha tire


    var semaine = <?php echo json_encode($semaine);?>;
    var timeS = <?php echo json_encode($start_end_rendezvous);?>;
    console.log("time : "+timeS[0]["start_datetime"])
    console.log(timeS[0]["start_datetime"].substr(9, 2));
    
    let dimancheT = "";
    let lundiT = "";
    let mardiT = "";
    let mercrediT = "";
    let jeudiT = "";
    let vendrediT = "";
    let samediT = "";

    function ecrireDispo(jour,id,length,day){
        
        var jourL = document.getElementById(id)
        
        for (let i = 0; i < length; i++) {
            day += `<span>${jour[i]}</span>`;
    }
    console.log(day)
    jourL.innerHTML = day;
  
    
}
function removeElmt(id){
    var jourL = document.getElementById(id)
    jourL.replaceChildren()
}

    function getNextChar(char) {
return String.fromCharCode(char.charCodeAt(0) + 1);
}



    

var id = "A"
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
    var test = []
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
    
    // function ajoutChild(Days,test){
    //     var element = document.createElement("div")
    //         element.innerHTML = Jours[test]
    //     Days.appendChild(element) 
    // }
    var s = 0
    const renderCalendar = () => {
        
        arr.length = 0
        const Days = document.querySelectorAll(".weekdays div");
        
    const monthDays = document.querySelector(".days");
    
    var div = document.querySelectorAll(".days div")


    let a = 0

        trueVar = false
        var dim = []
        for(k=0;k<7;k++){
            if(d == new Date().getDate() && date.getMonth() == new Date().getMonth()) {
            var precedent = document.querySelector(".prev")
                precedent.classList.add('hide')
            }
            // var jourL = document.getElementById("J1")
            // console.log(jourL)
            // var elmt = document.createElement("span")
            // elmt.innerHTML = "test"
            // jourL.appendChild(elmt)
            d= date.getDate() 
            
             if(d == timeS[0]["start_datetime"].substr(9, 2) && date.getMonth() == 7){
                         semaine [0] = ['1','2','3','4','5']
                         
             }
             
            // var dim = []
            // dim = semaine[0]
            // / for(let n=0;n<dim.length;n++){
            // var hadi = "#"+id+" span"
                
            
            // var jourL = document.getElementById(id)
            
            // var el = document.createElement("span")
            // el.textContent= dim[n]
            // jourL.appendChild(el)
            // }
            //  var hadi = "#"+id+" span"
            // var jourL = document.querySelectorAll(hadi)
            
            // for(let i=0;i<dim.length;i++){
            //     jourL[i].innerHTML = dim[i]
            // }
            // for (let i = 0; i < dim.length; i++) {
            // day += `<span>${dim[i]}</span>`;
            // }
   
            // jourL.innerHTML = day;
        

            
          
           
            arr.push(date.getDay())
            div[k].innerHTML = d + months[date.getMonth()];
            date = addDays(date,1)
            
            

        }
        
        var x =0
        
        for(let l=0 ; l < arr.length;l++){
                Days[l].innerHTML = Jours[arr[l]]
               
            switch(arr[l]){
                case 0 : dim = semaine[6]
                        length = dim.length
                        break
                 case 1 : dim = semaine[0]
                        length = dim.length
                        console.log("semaine 0 :"+dim)
                        break
                case 2 : dim = semaine[1]
                        length = dim.length
                        break
                case 3 :
                    dim = semaine[2]
                        length = dim.length
                        break
                case 4 :
                    dim = semaine[3]
                        length = dim.length
                        break
                case 5 : dim = semaine[4]
                        length = dim.length
                        break
                case 6 : dim = semaine[5]
                        length = dim.length
                        break

                      
             }

            
            for(let n=0;n<dim.length;n++){
                var hadi = "#"+id+" span"
                
            
            var jourL = document.getElementById(id)
            
            var el = document.createElement("span")
            el.textContent= dim[n]
              jourL.appendChild(el)
             }
             x++
             id = getNextChar(id)
            
        
        }

        
            if (d === new Date().getDate() && date.getMonth() === new Date().getMonth()){
            
        div[a].classList.add('today');
        }
        
        
        a++
    };

            renderCalendar()
            // console.log("hadi 3la brra"+date)

            document.querySelector(".next").addEventListener("click", () => {
                
                // var jourL = document.getElementById("A")
            
            
            //  jourL.replaceChildren()
            var precedent = document.querySelector(".prev")
                    precedent.classList.remove('hide')
            

                    
            
            renderCalendar();
            });
           
            document.querySelector(".prev").addEventListener("click", () => {
            //     var jourL = document.getElementById("A")
            
            
            // jourL.replaceChildren()
            date = addDays(date,-14)
            
            renderCalendar();

           
                

            });
</script>