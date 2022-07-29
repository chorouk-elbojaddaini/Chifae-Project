console.log(document.getElementById('inputId'));
function uploadImage()
{     console.log(document.getElementById('update-photo'));
       
let formData = new FormData(document.getElementById('photo-upload'));
   
      formData.append('upload-photo', true);
      for (const pair of formData.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
      }
      $.ajax({
        type: "POST",
        url: "./uploadAjax.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            let res = jQuery.parseJSON(response);
            //===========success case-----------
            if(res.status == 200){
                 //------success msg-------------
                alertify.set('notifier','position', 'top-center');
                alertify.success(res.message);
                // document.getElementById('photo').style.borderRadius='50%'
                 location.reload(true);
            }    //=============db probleme query return falsy value

          //=============if empty 
          else if( res.status==422){
            alertify.set('notifier','position', 'top-center');
            alertify.error(res.message);
          }
          //================== interdite extension =================
          else if( res.status==110){
            alertify.set('notifier','position', 'top-center');
            alertify.error(res.message);
          }
          //================== big formats =================
          else if( res.status==100){
            alertify.set('notifier','position', 'top-center');
            alertify.error(res.message);
          }
            //================== DB error =================
            else if( res.status==500){
              alertify.set('notifier','position', 'top-center');
              alertify.error(res.message);
            }
            
        }
    }
 )


}
