//============get the id of the row to edit=============

$(document).on('click', '.editDoc', function () {

    let doc_id = $(this).val();
    console.log(doc_id);
    $.ajax({
        type: "GET",
        url: "edit.php?doc_id=" + doc_id,
        
        success: function (response) {

          let res = jQuery.parseJSON(response);
            if(res.status == 404) {
              
                alert(res.message);
            }else if(res.status == 200){
                
                $('#doc_id').val(res.data.idDoc);
                $('#nomDoc').val(res.name);
                $('#dateDoc').val(res.data.date);
                $('#addedDoc').val(res.data.ajoutPar);
                $('#category-doc').val(res.data.categorieDoc);
               
                $('#editDoc').show();
            }
            
        }
    });

});
//======================update the wanted row
$(document).on('submit', '#docs-form-edit', function (e) {

    e.preventDefault();

    let formData = new FormData(this);
    formData.append("update_doc", true);
    for (const pair of formData.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
      }
    $.ajax({
        type: "POST",
        url: "edit.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            
            let res = jQuery.parseJSON(response);
            //===========success case-----------
            if(res.status == 200){

                alertify.success(res.message);
                alertify.set('notifier','position', 'top-center');
               
                                    //   window.setTimeout(function () {window.location.reload();
                                    // }, 700);
                $('#docs-form-edit')[0].reset();
                return false;

           

            }    //=============db probleme query return falsy value

            else if(res.status == 500) {
                alertify.error(res.message);
                alertify.set('notifier','position', 'top-center');
                                
                            //     window.setTimeout(function () {window.location.reload();
                            //   }, 700);
                                return false;
            }
            //--------------empty fields error---------
            else if(res.status == 422)
            {
                alertify.error(res.message);
                alertify.set('notifier','position', 'top-center');
                                
                            //     window.setTimeout(function () {window.location.reload();
                            //   }, 700);
                                return false;
            }
        }
    });

});
//=============================deleting===========================
$(document).on('click','.deleteDoc', function (e) {

    e.preventDefault();

    if(confirm('Vous voulez vraiment supprimer ce document?'))
    {
        //---------ajax request-----------
        let doc_id = $(this).val();
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: {
                'delete_doc': true,
                'doc_id': doc_id
            },
        //-------checking response----------
            success: function (response) {

                var res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-center');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-center');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
});

  let btnClose = document.querySelectorAll('.close_form')
  for(let i = 0; i < btnClose.length; i++) {
    btnClose[i].addEventListener('click',function(e) {
      e.preventDefault()
      console.log('hello')
      let form = this.parentNode.parentNode
    
      $(form).hide()
      location.reload(true);
    })
  }
//   let btnOpen = document.querySelectorAll('.open-form')
//   for(let i = 0; i < btnOpen.length; i++) {
//     btnOpen[i].addEventListener('click',function(e) {
     
//       console.log('hello1')
//       let form = this.parentNode.parentNode
    
//       $(form).show()
//     })
//   }