//======================insert/edit with ajax profil info=====================


    let formsInsert = document.querySelectorAll('.insert');
    for(let i = 0; i < formsInsert.length; i++) {
        
       
        $(formsInsert[i]).on('submit',function(e)
        {    
          
            e.preventDefault();
            let nameBtn =this.name
            let overlay = document.querySelector(`#${nameBtn}`);
            //====================get "ajouter Btn"=============================
            let submitForm = document.querySelector(`button[name='insert-${nameBtn}']`)
            //====================get "close Btn"=============================
            let closeForm = document.querySelector(`button[name='close-insert-${nameBtn}']`)
           
            let formData = new FormData(this);
            formData.append('insert', true);
            formData.append('formType', this.name);
            for (const pair of formData.entries()) {
                console.log(`${pair[0]}, ${pair[1]}`);
              }
            $.ajax({
                type: "POST",
                url: "insertProfil.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    let res = jQuery.parseJSON(response);
                    //===========success case-----------
                    if(res.status == 200){
                     
                         //------success msg-------------
                         alertify.success(res.message);
                        alertify.set('notifier','position', 'top-center');
                         $(formsInsert[i])[0].reset();    
                                    window.setTimeout(function () {window.location.reload();
                                  }, 80);
                                    return false;
                    
                        // location.reload(true);
                    }    //=============db probleme query return falsy value
        
                    else if(res.status == 500) {
          
              alertify.error(res.message);
              alertify.set('notifier','position', 'top-center');
                              
                              window.setTimeout(function () {window.location.reload();
                            }, 80);
                              return false;
               }
                    //--------------empty fields error---------
                    else if(res.status == 422)
                    {
         
                  alertify.error(res.message);
                  alertify.set('notifier','position', 'top-center');
                                  
                                  window.setTimeout(function () {window.location.reload();
                                }, 80);
                                  return false;
                    }
                }
            }
         )
        });
    }


//===========================photo upload=====================
// 200 => successful
// 422 => empty fields
// 100 => big format 
// 110 => interdite format
// 500=> db erroe while inserting
// 550 => file error
function uploadImage()
{

       let formData = new FormData(document.getElementById('photo-upload'));
      formData.append('upload-photo', true);
      for (const pair of formData.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
      }
      $.ajax({
        type: "POST",
        url: "insertProfil.php",
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
                document.getElementById('photo').style.borderRadius='50%'
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