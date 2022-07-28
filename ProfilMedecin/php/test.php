<?php 
include "./database/functions.php";





?>

<aside class="right">
        <?php 
             $time = $calendrier->create_time_range("8:00","12:00","30 mins");
             // print_r($time);
             // echo "<db> <db>";
             $column_horaire = array("Horaires");
             $horaire_medecin = $calendrier->getDataCalendrier("medecin",$column_horaire[0],"id");
             // print_r($horaire_medecin);
             $string_rendez_vous_medecin = "start_datetime,end_datetime";
             $start_end_rendezvous = $calendrier->getDataCalendrier("schedule_list",$string_rendez_vous_medecin,"idMedecin");
            //  print_r($start_end_rendezvous);
     
     
             $semaine = $calendrier->dayRange($horaire_medecin);
            //  print_r($semaine[0]);
            //  print_r($start_end_rendezvous);
        ?>

            <div class="boite-cal">
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
                    <div class="disponibilitesCal" id = "lundi">
                        <span>--</span>
                        <span>09:30</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>13:00</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                    <div class="disponibilitesCal">
                        <span>09:00</span>
                        <span>--</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>13:00</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                    <div class="disponibilitesCal">
                        <span>09:00</span>
                        <span>09:30</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>--</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                    <div class="disponibilitesCal">
                        <span>09:00</span>
                        <span>09:30</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>13:00</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                    <div class="disponibilitesCal">
                        <span>09:00</span>
                        <span>09:30</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>13:00</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                    <div class="disponibilitesCal">
                        <span>09:00</span>
                        <span>09:30</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>13:00</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                    <div class="disponibilitesCal">
                        <span>09:00</span>
                        <span>09:30</span>
                        <span>10:00</span>
                        <span>10:30</span>
                        <span>11:00</span>
                        <span>11:30</span>
                        <span>12:00</span>
                        <span>12:30</span>
                        <span>13:00</span>
                        <span>13:30</span>
                        <span>14:00</span>
                        <span>14:30</span>
                        <span>15:00</span>
                        <span>15:30</span>
                        <span>16:00</span>
                        <span>16:30</span>
                        <span>17:00</span>
                        <span>17:30</span>
                        <span>18:00</span>
                        <span>18:30</span>
                    </div>
                </div>
                <div class="rdv">
                <a href="index.html" class="prendre-rdv">Prendre un RDV</a>
                </div>
            </div>
        </aside>

  

        <script>

        //ghadi njibo les horaires fo9Ach khdam wn7tolo les horaires dyawlo tmak 
        //wmoraha njibo les rendez vous dyawlo bla la date wndbro 3la la date tmak fl calendrier dyalna
        // wila kant l'heure deja kayna fles horaires dyawlna ndiro fblastha tire


            var semaine = <?php echo json_encode($semaine);?>;
        //    console.log(semaine[0].length);
            var appointment = <?php echo json_encode($start_end_rendezvous);?>;
            // console.log(appointment[3]["start_datetime"]);
            // console.log(appointment);
            var todayAppointment = [];
            // console.log(appointment);


            //had la fonction kan3tilha les rendezvous kamlin dyal lmedecin wghadi trj3na
            //ghir les rendez vous li3ndhom nfs la date bhal l current date
            function retournerTodayRendezvous(appointment,currentDate){
                let startDate = ""; 
                
                for(let i=0;i<appointment.length;i++){
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


            //had la fonction bach n9Dr nsupprimer les rendez vous dl medecin ml horaires dyalo
            function retournerDisponibilite(horaire,appointment){
              
                for(let i = 0;i<horaire.length;i++){     
                    for(let j=0;j<appointment.length;j++){
                        let time_start_datetime = appointment[j]["start_datetime"];
                        let time_start_string = time_start_datetime.split(" ");
                        let time_start = time_start_string[1];
                        let time_end_datetime   = appointment[j]["end_datetime"];
                        let time_end_string = time_end_datetime.split(" ");
                        let time_end = time_end_string[1];
                        // console.log(time_start);
                        // console.log(time_end);
                    }
                }

            }  let todaydisp = [];
            todaydisp = semaine[1];
            console.log(todaydisp);
          



            // for(let i = 0;i<semaine[0].length;i++){     
            //        if(appointment[i]!=null){
                    
            //         let time_start_datetime = appointment[i]["start_datetime"];
            //             let time_start_string = time_start_datetime.split(" ");
            //             let time_start = time_start_string[1];
            //             let time_end_datetime   = appointment[i]["end_datetime"];
            //             let time_end_string = time_end_datetime.split(" ");
            //             let time_end = time_end_string[1];
                      
                       
            //              for(let j=0;j<semaine.length;j++){
            //                 console.log("semaine[i et j]"+semaine[i][j]);
            //             //     if(time_start<=semaine[i][j] && time_end>=semaine[i][j]){
            //             //     console.log("time_start"+time_start);
            //             //     console.log("time_end"+time_end);
            //             //     console.log("semaine: "+semaine[i][j]);
                        
            //             // }
            //             // else{
            //             //     todaydisp.push(semaine[i][j]);
            //             //     // console.log("else");
            //             // }
            //             }
                        
                       
            //        }                 
                    
            //     }


            // testeArray = ['9:30:00', '10:30:00', '11:00:00', '11:30:00', '12:00:00', '12:30:00', '13:00:00', '13:30:00', '14:00:00', '14:30:00', '15:00:00', '15:30:00', '16:00:00', '16:30:00', '17:00:00', '17:30:00', '18:00:00'];
            
            // let itemTe = "10:30:00";
            // deleteItem(itemTe,testeArray);
            // console.log("teste array:");
            // console.log(testeArray);




            // console.log(appointment);
            // console.log(semaine[0]);
            function deleteItem(item,array){
                for( var i = 0; i < array.length; i++){ 
                    
                    if ( array[i] === item) { 

                        array.splice(i, 1); 
                    }

            }
            return array;
               
            }
            
            function supprimer(item,start,end){
                        if(start<=item && end>=item){
                           
                            console.log("TRUE");
                            console.log("item: "+item);
                            console.log("start rendez vous: "+start);
                            console.log("end rendez vous : "+end);
                            todaydisp = deleteItem(item,todaydisp);
                            console.log(todaydisp);

                        }
                        else{
                           
                            console.log("FALSE");
                            console.log("item: "+item);
                            console.log("start rendez vous: "+start);
                            console.log("end rendez vous : "+end);
                        }
                   }

                   let compteur = 0;
        function retournerDispo(appointment,todaydisp){
                for(let j=0;j<appointment.length;j++){
                    
                    let time_start_datetime = appointment[j]["start_datetime"];
                    let time_start_string = time_start_datetime.split(" ");
                    let time_start = time_start_string[1];
                    
                    let time_end_datetime   = appointment[j]["end_datetime"];
                    let time_end_string = time_end_datetime.split(" ");
                    let time_end= time_end_string[1];
                    
                    for(let k=0;k<todaydisp.length;k++){
                        //   console.log("item"+semaine[0][k]);
                           if(todaydisp[k]<"10:00:00"){
                                let item = "0"+todaydisp[k];
                                console.log("0 flwl: "+item);
                                console.log("hello");
                           }
                            supprimer(todaydisp[k],time_start,time_end);
                    }
                    console.log("start: "+time_start);
                            
                }
                console.log(todaydisp);
            }
                 
          

        //    semaine[0].forEach(testes);
        //    function testes(item){ 

               
                // for(let i=0;i<todaydisp.length;i++){
                //     console.log(todaydisp[i]);
                // }                   
                

        //     }
             
            // console.log(appointment);
       


            // console.log(app);
            const dates = new Date("2022-06-28");
            let teste = retournerTodayRendezvous(appointment,dates);
            // console.log(dates);
            // console.log(teste);

         
            

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
            
            var div = document.querySelectorAll(".days div");


            let a = 0

                trueVar = false;
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
                // console.log("array: "+arr);
                
                for(let l=0 ; l < arr.length;l++){
                        Days[l].innerHTML = Jours[arr[l]]
                    }
                    if (d === new Date().getDate() && date.getMonth() === new Date().getMonth()){
                    
                div[a].classList.add('today');
                }
                a++
            };

                    renderCalendar()
                    

                    document.querySelector(".next").addEventListener("click", () => {


                    var precedent = document.querySelector(".prev")
                            precedent.classList.remove('hide')

                    
                    renderCalendar();
                    });
                
                    document.querySelector(".prev").addEventListener("click", () => {

                    date = addDays(date,-14)
                    
                    renderCalendar();

                    
                        

                    });
        </script>