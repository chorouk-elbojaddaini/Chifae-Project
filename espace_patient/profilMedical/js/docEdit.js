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
                $('#nomDoc').val(res.data.nomDoc);
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

                $('#submit-doc-edit').click(function(e){
                  e.preventDefault();
                    console.log('close')
                    $('#editDoc').hide();
                })
                 //------success msg-------------
                alertify.set('notifier','position', 'top-center');
                alertify.success(res.message);
                $('#docs-form-edit')[0].reset();

                location.reload(true);

            }    //=============db probleme query return falsy value

            else if(res.status == 500) {
                alertify.set('notifier','position', 'top-center');
                alertify.error(res.message);
                $('#close-edit-doc').click(function() {
                    res.message=""
                    $('#editDoc').hide();
                })
            }
            //--------------empty fields error---------
            else if(res.status == 422)
            {
                alertify.set('notifier','position', 'top-center');
                alertify.error(res.message);
                $('#close-edit-doc').click(function() {
                    res.message=""
                    $('#editDoc').hide();
                })
            }
        }
    });

});
//=============================deleting===========================
$(document).on('click','.deleteDoc', function (e) {

    e.preventDefault();

    if(confirm('Vous voulez vraiment supprimer ce docuemnt?'))
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

