//======================FUNCTIONS TO UPDATE AND DELETE==========================
//================function to send ajax update request
function update(url,submitEditBtn,overlayId,closeEditBtn,formData) {

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                
                let res = jQuery.parseJSON(response);
                //===========success case-----------
                if(res.status == 200){
                      alertify.set('notifier','position', 'top-right');
                      alertify.success(res.message);
                    $(submitEditBtn).click(function(e){
                      e.preventDefault();
                   
                        console.log('close')
                        $(overlayId).hide();
                         location.reload(true);
    
                    })
                   

                    
                     //------success msg-------------
                    
                    // $(idForm)[0].reset();
    
                   
                }    //=============db probleme query return falsy value
    
                else if(res.status == 500) {
                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                    $(closeEditBtn).click(function() {
                        $(overlayId).hide();
                        location.reload(true);
                    })
                }
                //--------------empty fields error---------
                else if(res.status == 422)
                {
                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                    $(closeEditBtn).click(function() {
                        $(overlayId).hide();
                    })
                }
            }
        })
    }
//=============================deleting function =====================
function deleteRow(url,data){
    if(confirm('Vous voulez vraiment le supprimer ?'))
    {
        //---------ajax request-----------
        
        $.ajax({
            type: "POST",
            url: url,
            data:data,
        //-------checking response----------
            success: function (response) {

                let res = jQuery.parseJSON(response);
                //------fail---------------
                if(res.status == 500) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.error(res.message);
                }else{
                //--------success--------- 
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);
                     location.reload(true);

                }
            }
        });
    }
}
//=========================================maladie===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
 $(document).on('click', '.editM', function (e) {
e.stopImmediatePropagation()
let idMal = $(this).val();
console.log(idMal);
$.ajax({
   type: "GET",
   url: "updateProfil.php?idMal=" + idMal,
   
   
   success: function (response) {

     let res = jQuery.parseJSON(response);
       if(res.status == 404) {
         
           alert(res.message);
       }else if(res.status == 200){
           console.log($('#mal'))
           $('#mal').val(res.data.idMal);
           $('#nomMal').val(res.data.nom);
           $('#dateMal').val(res.data.date);
           $('#category').val(res.data.category);

           $('#descMal').val(res.data.description);
           $('#maladie1').show();
       }
       $('#maladie-btn-close').click(function(e) {
        e.preventDefault()
                    $('#update-maladie').hide();
                    location.reload(true);

                })
   }
   });
   });
//    console.log($('#maladie-form-update'))
//==================call update ajax request for maladies============================
$(document).on('submit','#maladie-form-update' , function(e) {
    e.preventDefault()
    let formData = new FormData(this);
    formData.append("updateMal", true);
    // for (const pair of formData.entries()) {
    //     console.log(`${pair[0]}, ${pair[1]}`);}
    update('updateProfil.php','#update-maladie','#maladie1','#maladie-btn-close',formData)
});
//=============================deleting===========================

$(document).on('click','.deleteM', function (e) {

    e.preventDefault();
    let idMal= $(this).val();
    console.log(idMal);
    let data = {
        'id':idMal,
        'deleteMal':true
    }
  //===========to specifiy wich table we will delete from
   
    deleteRow('updateProfil.php',data)
      console.log(this.data)
});

//=========================================traitements===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
$(document).on('click', '.editT', function (e) {
e.stopPropagation();
    let idT = $(this).val();
    console.log(idT);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idT=" + idT,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#traite'))
               $('#traite').val(res.data.idT);
               $('#nomT').val(res.data.nom);
               $('#dateT').val(res.data.date);
               $('#dureeT').val(res.data.duree);
               $('#doseT').val(res.data.dose);
               $('#descT').val(res.data.description);
               $('#traitement1').show();
           }
           $('#traitement-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-traitement').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request ============================
    $(document).on('submit','#traitement-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateT", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-traitement','#traitement1','#traitement-btn-close',formData)
    });
    //=============================deleting ===========================
    
    $(document).on('click','.deleteT', function (e) {
    
        e.preventDefault();
        let idT= $(this).val();
        console.log(idT);
        let data = {
            'id':idT,
            'deleteT':true
        }
      //===========to specifiy wich table we will delete from
       
        deleteRow('updateProfil.php',data)
          console.log(this.data)
    });
    
//=========================================hospialisation===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
$(document).on('click', '.editH', function (e) {
e.stopPropagation();
    let idH = $(this).val();
    console.log(idH);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idH=" + idH,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#traite'))
               $('#hosp').val(res.data.idH);
               $('#causeH').val(res.data.cause);
               $('#dateH').val(res.data.date);
               $('#dureeH').val(res.data.duree);
               $('#descH').val(res.data.description);
               $('#hospital1').show();
           }
           $('#hospital-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-hospital').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request ============================
    $(document).on('submit','#hospital-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateH", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-hospital','#hospital1','#hospital-btn-close',formData)
    });
    //=============================deleting ===========================
    
    $(document).on('click','.deleteH', function (e) {
    
        e.preventDefault();
        let idH= $(this).val();
        console.log(idH);
        let data = {
            'id':idH,
            'deleteH':true
        }
      //===========to specifiy wich table we will delete from
       
        deleteRow('updateProfil.php',data)
          console.log(data)
    });
    
//=========================================allergie===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
$(document).on('click', '.editA', function (e) {
e.stopImmediatePropagation()
    let idA = $(this).val();
    console.log(idA);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idA=" + idA,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#alg'))
               $('#alg').val(res.data.idA);
               $('#nomA').val(res.data.nom);
               $('#descA').val(res.data.description);
               $('#allergy1').show();
           }
           $('#allergy-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-allergy').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request ============================
    $(document).on('submit','#allergy-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateA", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-allergy','#allergy1','#allergy-btn-close',formData)
    });
    //=============================deleting ===========================
    
    $(document).on('click','.deleteA', function (e) {
    
        e.preventDefault();
        let idA= $(this).val();
        console.log(idA);
        let data = {
            'id':idA,
            'deleteA':true
        }
      //===========to specifiy wich table we will delete from
       
        deleteRow('updateProfil.php',data)
          console.log(this.data)
    });
    
//=========================================vaccins===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
$(document).on('click', '.editV', function (e) {
e.stopImmediatePropagation()
    let idV = $(this).val();
    console.log(idV);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idV=" + idV,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#vac'))
               $('#vac').val(res.data.idV);
               $('#nomV').val(res.data.nom);
               $('#dateV').val(res.data.date);
               $('#protegeV').val(res.data.protegeContre);
               $('#nbRappel').val(res.data.nbRappel);
               $('#descV').val(res.data.description);
               $('#vaccin1').show();
           }
           $('#vaccin-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-vaccin').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request ============================
    $(document).on('submit','#vaccin-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateV", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-vaccin','#vaccin1','#vaccin-btn-close',formData)
    });
    //=============================deleting ===========================
    
    $(document).on('click','.deleteV', function (e) {
    
        e.preventDefault();
        let idV= $(this).val();
        console.log(idV);
        let data = {
            'id':idV,
            'deleteV':true
        }
      //===========to specifiy wich table we will delete from
       
        deleteRow('updateProfil.php',data)
          console.log(this.data)
    });
    
//=========================================mesures===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============

$(document).on('click', '.editMes', function (e) {
   e.stopImmediatePropagation()
    let idMes = $(this).val();
    console.log(idMes);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idMes=" + idMes,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#mes'))
               $('#mes').val(res.data.idMes);
               $('#m1').val(res.data.poids);
               $('#m2').val(res.data.taille);
               $('#m3').val(res.data.icm);
               $('#m4').val(res.data.tour);
               $('#m5').val(res.data.temp);
               $('#m6').val(res.data.tension);
               $('#m7').val(res.data.frqCard);
               $('#m8').val(res.data.gly);
               $('#date1').val(res.data.date);
               $('#mesure1').show();
           }
           $('#mesure-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-mesure').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request ============================
    $(document).on('submit','#mesure-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateM", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-mesure','#mesure1','#mesure-btn-close',formData)
        location.reload(true);

    });
    // //=============================deleting ===========================
    
    // $(document).on('click','.deleteM', function (e) {
    
    //     e.preventDefault();
    //     let idM= $(this).val();
    //     console.log(idM);
    //     let data = {
    //         'id':idM,
    //         'deleteM':true
    //     }
    //   //===========to specifiy wich table we will delete from
       
    //     deleteRow('updateProfil.php',data)
    //       console.log(this.data)
    // });
    
//=========================================antecedente===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
$(document).on('click', '.editAnt', function (e) {
e.stopImmediatePropagation()
    let idAnt = $(this).val();
    console.log(idAnt);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idAnt=" + idAnt,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#antece'))
               $('#antece').val(res.data.idAnt);
               $('#nomAnt').val(res.data.nom);
               $('#lienAnt').val(res.data.lien);
               $('#descAnt').val(res.data.description);
               $('#antecedent1').show();
           }
           $('#antecedent-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-antecedent').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request ============================
    $(document).on('submit','#antecedent-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateAnt", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-antecedent','#antecedent1','#antecedent-btn-close',formData)
    });
    //=============================deleting===========================
    
    $(document).on('click','.deleteAnt', function (e) {
    
        e.preventDefault();
        let idAnt= $(this).val();
        console.log(idAnt);
        let data = {
            'id':idAnt,
            'deleteAnt':true
        }
      //===========to specifiy wich table we will delete from
       
        deleteRow('updateProfil.php',data)
          console.log(this.data)
    });
    //=========================================mesures===========================================
//============get the id of the row to edit and dispaly the old values in the form inputs fields=============

$(document).on('click', '#profilBtn', function (e) {
    e.stopImmediatePropagation();
    let idP = $(this).val();
    console.log(idP);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idP="+idP,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#idP'))
               $('#idP').val(res.data.id);
               $('#nom').val(res.data.nom);
               $('#pre').val(res.data.prenom);
               $('#nais').val(res.data.dateNaissance);
               $('#sexe').val(res.data.sexe);
               $('#mail').val(res.data.email);
               $('#tel').val(res.data.tel);
               $('#adr').val(res.data.adresse);
               $('#grp').val(res.data.groupSanguin);
               $('#mutuel').val(res.data.mutuelle);
               $('#etat').val(res.data.etatCivil);
               $('#profil').show();
           }
           $('#profil-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-profil').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //==================call update ajax request ============================
    $(document).on('submit','#profil-form-update' , function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        let formData = new FormData(this);
        formData.append("updateP", true);
        for (const pair of formData.entries()) {
            console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-profil','#profil','#profil-btn-close',formData)
    });

//============get the id of the row to edit and dispaly the old values in the form inputs fields=============
 $(document).on('click', '.editD', function (e) {
e.stopImmediatePropagation()
    let idD = $(this).val();
    console.log(idD);
    $.ajax({
       type: "GET",
       url: "updateProfil.php?idD=" + idD,
       
       
       success: function (response) {
    
         let res = jQuery.parseJSON(response);
           if(res.status == 404) {
             
               alert(res.message);
           }else if(res.status == 200){
               console.log($('#diag'))
               $('#diag').val(res.data.idD);
               $('#nomMed1').val(res.data.nomComplet);
               $('#dateD1').val(res.data.date);
               $('#spec1').val(res.data.specialite);
               $('#diag1').val(res.data.diagnostic);
               $('#exam1').val(res.data.exam);
    
               $('#traite1').val(res.data.traitement);
               $('#diagno1').show();
           }
           $('#diagno-btn-close').click(function(e) {
            e.preventDefault()
                        $('#update-diagno').hide();
                        location.reload(true);

                    })
       }
       });
       });
    //    console.log($('#maladie-form-update'))
    //==================call update ajax request for maladies============================
    $(document).on('submit','#diagno-form-update' , function(e) {
        e.preventDefault()
        let formData = new FormData(this);
        formData.append("updateD", true);
        // for (const pair of formData.entries()) {
        //     console.log(`${pair[0]}, ${pair[1]}`);}
        update('updateProfil.php','#update-diagno','#diagno1','#diagno-btn-close',formData)
    });
    //=============================deleting===========================
    
    $(document).on('click','.deleteD', function (e) {
    
        e.preventDefault();
        let idD= $(this).val();
        console.log(idD);
        let data = {
            'id':idD,
            'deleteD':true
        }
      //===========to specifiy wich table we will delete from
       
        deleteRow('updateProfil.php',data)
          console.log(this.data)
    });