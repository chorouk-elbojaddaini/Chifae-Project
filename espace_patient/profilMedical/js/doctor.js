//====================getting the forms================
// $(document).ready(function() {

//     let forms = document.querySelectorAll('.filters form');
//     console.log(forms)
//     for(let i = 0; i < forms.length; i++) {
        
        
//           $(forms[i]).on('submit',function(e)
//           {    
//               e.preventDefault();
//               let name =this.name
         
//               console.log(name)
//               let formData = new FormData(this);
//               formData.append('formType',name);
//               for (const pair of formData.entries()) {
//                   console.log(`${pair[0]}, ${pair[1]}`);
//                 }
//               $.ajax({
//                   type: "POST",
//                   url: "doctor.php",
//                   data: formData,
//                   processData: false,
//                   contentType: false,
//                   success: function (response) {
                      

//                   }
//               }
//            )
//           });
//       }
// })