<aside class="right">
    <?php 
    $idMed = $_GET['id'];
             $time = $calendrier->create_time_range("8:00","12:00","30 mins");
             // print_r($time);
             // echo "<db> <db>";
             $column_horaire = array("Horaires");
             $horaire_medecin = $calendrier->getDataCalendrier("medecin",$column_horaire[0],"id",$idMed);
            //  print_r($horaire_medecin);
             $string_rendez_vous_medecin = "start_datetime,end_datetime";
             $start_end_rendezvous = $calendrier->getDataCalendrier("schedule_list",$string_rendez_vous_medecin,"idMedecin",$idMed);
            
     
     
             $semaine = $calendrier->dayRange($horaire_medecin);
            // print_r($semaine);

            //  print_r($start_end_rendezvous);
            // for($i=0;$i<count($semaine);$i++){
            //     for($j=0;$j<count($semaine[$i]);$j++){
            //         if(substr($semaine[$i][$j],0,2) < 10){
            //         $string = substr($semaine[$i][$j], 0,4);
            //         $semaine[$i][$j] = $string;}
            //         else {
            //             $string = substr($semaine[$i][$j], 0,5);
            //             $semaine[$i][$j] = $string;
            //         }
            //     }}
                // foreach($semaine[$i] as $item){
                //     $string = substr($item, 0,5);
                //         $item = $string;
                //         echo $item;
                // }
            
        ?>

    <div class="boite-cal" id="boite">
        <i class="fas fa-angle-left prev"></i>
        <div class="weekdays">
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
            <div>Lun</div>
        </div>
        <div class="days">
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>
            <div>04 </div>

        </div>
        <i class="fas fa-angle-right next"></i>
        <div class="containerDispCal">
            <div class="disponibilitesCal " id="A">
        
            </div>
            <div class="disponibilitesCal " id="B">
                

            </div>
            <div class="disponibilitesCal" id="C">
               
            </div>
            <div class="disponibilitesCal" id="D">
                
            </div>
            <div class="disponibilitesCal" id="E">
              
            </div>
            <div class="disponibilitesCal" id="F">
               
            </div>
            <div class="disponibilitesCal" id="G">
               

            </div>

        </div>

        <button class="afficherdisponibilite"  >afficher plus de disponibilités</button>
        <?php if($medecin_shuffle[0]['inscrit'] != null){
           $idC = $medecin_shuffle[0]['id'];
       echo' <div class="rdv"><a href="" class="prendre-rdv" id="$idC">Prendre un RDV</a></div>';
          }
       ?>
        <!-- <div class="rdv"><a href="" class="prendre-rdv" id="1">Prendre un RDV</a></div> -->
    </div>
</aside>
</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<script async defer>
    //ghadi njibo les horaires fo9Ach khdam wn7tolo les horaires dyawlo tmak 
    //wmoraha njibo les rendez vous dyawlo bla la date wndbro 3la la date tmak fl calendrier dyalna
    // wila kant l'heure deja kayna fles horaires dyawlna ndiro fblastha tire
    
    var semaine = <?php echo json_encode($semaine); ?> ;
    console.log(semaine)
    var timeS = <?php echo json_encode($start_end_rendezvous); ?> ;
    var idMedec = <?php echo json_encode($idMed); ?> ;

    
    function ecrireDispo(jour, id, length, day) {

        var jourL = document.getElementById(id)

        for (let i = 0; i < length; i++) {
            day += `<span>${jour[i]}</span>`;
        }

        jourL.innerHTML = day;


    }

    function removeElmt(id) {
        var jourL = document.getElementById(id)
        jourL.replaceChildren()
    }

    function getNextChar(char) {
        return String.fromCharCode(char.charCodeAt(0) + 1);
    }






    var tes = 0
    let d
    var getDaysInMonth = function (month, year) {
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
    // var date2 = date
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
        return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
    }
    getFebDays = (year) => {
        return isLeapYear(year) ? 29 : 28
    }
    let k = 0
    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]

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
    var todaydisp = []


    function deleteItem(item, array, arrayNew) {

        for (var i = 0; i < array.length; i++) {

            if (array[i] === item) {

                array[i] = null

            }


        }
        return array;


    }


    var todayAppointment = []

    function retournerTodayRendezvous(appointment, currentDate) {
        let startDate = "";

        for (let i = 0; i < appointment.length; i++) {
            startDate = appointment[i]["start_datetime"];
            let dateR = new Date(startDate);
            if (dateR.toDateString() === currentDate.toDateString()) {
                todayAppointment.push(appointment[i]);
            } else {
                // Different day
            }
        }
        return todayAppointment;
    }

    function supprimer(todaydisp, item, start, end) {


        if ("1:00:00" <= item && item <= "9:59:00") {
            item = "0" + item

        }
        if (start <= item && end >= item) {
            if (item < "10:00:00") {
                item = item.substr(1, 14)
            }
            todaydisp = deleteItem(item, todaydisp);
        }
        return todaydisp
    }



    function retournerDispo(appointment, todaydisp) {
        var todaydispNew = []
        for (let i = 0; i < todaydisp.length; i++) {
            todaydispNew[i] = todaydisp[i]
        }
        for (let j = 0; j < appointment.length; j++) {

            let time_start_datetime = appointment[j]["start_datetime"];
            let time_start_string = time_start_datetime.split(" ");
            let time_start = time_start_string[1];
            let time_end_datetime = appointment[j]["end_datetime"];
            let time_end_string = time_end_datetime.split(" ");
            let time_end = time_end_string[1];

            for (let k = 0; k < todaydispNew.length; k++) {
                supprimer(todaydispNew, todaydispNew[k], time_start, time_end);
            }
        }
        return todaydispNew
    } 
    // var t = 0
    var dayOut = "0"
    var yearOut = "0"
    var monthOut = "0"
    var hourOut = "0"
    var minOut = "0"
    $('.prendre-rdv').click(function() {

window.history.pushState('', 'New Page Title', '../../pageValidation/validation.php?id='+idMedec+'&year='+yearOut+'&month='+monthOut+'&day='+dayOut+'&hour='+hourOut+'&min='+minOut);


});
 
    function fct(y,m,d,h,min){
        window.history.replaceState('', 'New Page Title', '?id='+idMedec+'&year='+y+'&month='+m+'&day='+d+'&hour='+h+'&min='+min);

        yearOut = y;
        monthOut = m
        dayOut = d
        hourOut = h
        minOut = min
    }


    var nextI = 0
  var nextTrue = 0
  var x = 1
    const renderCalendar = () => {
        var semaine = <?php echo json_encode($semaine); ?> ;
        var week = []
        var id = "A"
        
        var yes = 0
        arr.length = 0
        const Days = document.querySelectorAll(".weekdays div");


        const monthDays = document.querySelector(".days");

        var div = document.querySelectorAll(".days div")


        let a = 0

        trueVar = false
        var dim = []

      
        var s = 0

        for (k = 0; k < 7; k++) {
            todayAppointment = []
            todaydisp = []
            yes = 0
            if (d == new Date().getDate() && date.getMonth() == new Date().getMonth()) {
                var precedent = document.querySelector(".prev")
                precedent.classList.add('hide')
            }
            d = date.getDate()
            var c = date.getDay()
            let time_end

            todayAppointment = retournerTodayRendezvous(timeS, date)
            if (c == 0) {
                todaydisp = retournerDispo(todayAppointment, semaine[6])
            } else {
                todaydisp = retournerDispo(todayAppointment, semaine[c - 1])
            }
            var span = "#" + id + " button"
            var byId = "#" + id
            
            var j = document.querySelectorAll(span)
            var selectId = document.querySelector(byId)
            week = []
            if (c == 6) {
                week = todaydisp
            } else if (c == 0) {
                week = todaydisp
            } else {
                week = todaydisp



            }

            let n = 0
            
            for (n = 0; n < week.length; n++) {
                if(week.length == 1){
                    week.length = 21
                    week[n] = "--"
                }
                var idElmt = x 
                if (week[n] == null) {
                    week[n] = "--"
                    

                } else {
                    if ("1:00:00" <= week[n] && week[n] <= "9:30:00") {
                        week[n] = "0" + week[n]


                    }
                    

                }
                week[n] = week[n].substr(0, 5)
                 var e = document.createElement("button")
                 e.setAttribute("value",week[n])
                e.innerHTML = week[n]
                var input = document.createElement("input")
                input.setAttribute("type","hidden")
                input.setAttribute("value",week[n])
                e.classList.add("Disponible")
                if(week[n] == "--") {
                e.classList.remove("Disponible")
                 }
                 if(n >= 4){
                      e.classList.add("hidden")
                      e.classList.add("showHide")
                 }
                 e.appendChild(input)
                 
                
                             
                            
                e.setAttribute("id",idElmt)
                if(week[n]!="--"){
                    e.setAttribute("onclick","fct("+date.getFullYear()+","+date.getMonth()+","+date.getDate()+","+e.innerHTML.substr(0,2)+","+e.innerHTML.substr(3,2)+")")
                    
                }
                
              
                // console.log(e.id)   
                selectId.appendChild(e)

                x = x+1
            }
            if(nextTrue == 8){
            var selectAll = document.querySelectorAll(span)
             for(let i=0;i<week.length;i++){
                selectAll[i].remove()
             }
           
        }
            id = getNextChar(id)
           
            arr.push(date.getDay())
            div[k].innerHTML = d + months[date.getMonth()];
            date = addDays(date, 1)



        }
        var s = 0
        for (let l = 0; l < arr.length; l++) {
            Days[l].innerHTML = Jours[arr[l]]
        }
        a++
     
    };

    renderCalendar()
    
    document.querySelector(".next").addEventListener("click", () => {
        
        nextTrue = 8
       
        var precedent = document.querySelector(".prev")
        precedent.classList.remove('hide')
        renderCalendar();
    });

    document.querySelector(".prev").addEventListener("click", () => {
        date = addDays(date, -14)
        renderCalendar();

    });


    // function showHideDisp() {
    //    var elmt = document.querySelectorAll(".hidden")
    
    // var button = document.querySelector(".afficherdisponibilite")
    
    //    button.innerHTML = "afficher moins de disponibilites"
    
    // }
    
    
const faqs = document.querySelector(".afficherdisponibilite");
  faqs.addEventListener("click", () => {
    var elmt = document.querySelectorAll(".hidden")
    for (let i = 0; i < elmt.length; i++) {
         elmt[i].classList.toggle("showHide")
       }

    
    if (faqs.textContent === "afficher plus de disponibilités") {
      console.log("moins");
      faqs.textContent = "afficher moins de disponibilités";
    } else {
        console.log("plus");
      faqs.textContent = "afficher plus de disponibilités";
    }
  });

  
</script>

