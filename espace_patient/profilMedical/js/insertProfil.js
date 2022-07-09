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
                      
                      console.log(document.querySelector(`button[name='insert-${nameBtn}']`))
                      //============================On click close the form=====================
                        $(submitForm).click(function(e){
                          e.preventDefault();
                            console.log('close')
                            $(overlay).hide();
                        })
                         //------success msg-------------
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                        $(formsInsert[i])[0].reset();
                     
                         
                        location.reload(true);
        
                    }    //=============db probleme query return falsy value
        
                    else if(res.status == 500) {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error(res.message);
                        $(closeForm).click(function() {
                            
                            $(overlay).hide();
                        })
                    }
                    //--------------empty fields error---------
                    else if(res.status == 422)
                    {
                        alertify.set('notifier','position', 'top-right');
                        alertify.error(res.message);
                        
                        
                        $(closeForm).click(function() {
                          
                            $(overlay).hide();
                        })
                    }
                }
            }
         )
        });
    }

//=====================toogle to show the options div=============
let options = document.querySelectorAll('.options-btn');
for (let i = 0; i < options.length; i++) {
  options[i].addEventListener('click',()=>{
    let div=options[i].nextElementSibling
    $(div).toggle()
   
  })
}
//===========================photo upload=====================
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
                alertify.set('notifier','position', 'top-right');
                alertify.success(res.message);
                document.getElementById('photo').style.borderRadius='50%'
                location.reload(true);
            }    //=============db probleme query return falsy value

            else if(res.status == 500) {
                alertify.set('notifier','position', 'top-right');
                alertify.error(res.message);

            }
            //--------------empty fields error---------
            else if(res.status == 422)
            {
                alertify.set('notifier','position', 'top-right');
                alertify.error(res.message);
           
            }//================erreur de serveur soit de taille ou erreur de sql insert
            else {
                alertify.set('notifier','position', 'top-right');
                alertify.error(res.message);
            }
        }
    }
 )

}