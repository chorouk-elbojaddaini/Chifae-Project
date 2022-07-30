// ========================
/*=============status numbers meaning:=====================
200 => successful
422 => empty fields
500 => big format 
110 => interdite format
500=> db erroe while inserting
550 => file error

*/
let img = document.getElementById("add-file");
img.addEventListener("change",function (){
  let showName = document.getElementById("show-name");
  showName.style.display = "block";
  showName.textContent = img.files[0].name;
  console.log(img.value)
  showName.insertAdjacentHTML('afterbegin',' <i class="fa-solid fa-circle-check"></i>')
  
})

document.getElementById("docs-form").addEventListener("submit", function (e) {
  
  e.preventDefault();
  
  const data = new FormData(this);

  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) 
    {
      let resObject = this.response;
          //========success case===============
            if (resObject.success) 
            {
              
                            
                            
                        
              alertify.success(resObject.msgs);
              alertify.set('notifier','position', 'top-center');
             
                                    window.setTimeout(function () {window.location.reload();
                                  },500);
                                  console.log('log')
                // document.getElementById("docs-form").reset(); 
                $("#nom-doc,#date-docs,#added-by-docs,#add-file").val("");
//===============we should empty the fields after sending the form===========
  //hide the span
                      showName.textContent = "";
                      showName.style.display = "none";
                                    return false;
            } //=============if empty fields
            else if( resObject.status==422){
              alertify.error(resObject.msgs);
              alertify.set('notifier','position', 'top-center');
                              
                              window.setTimeout(function () {window.location.reload();
                            },500);
                              return false;
            }
            //================== interdite extension =================
            else if( resObject.status==110){
              alertify.error(resObject.msgs);
              alertify.set('notifier','position', 'top-center');
                              
                              window.setTimeout(function () {window.location.reload();
                            },500);
                            console.log('log2')

                              return false;
            }
            //================== big formats =================
            else if( resObject.status==500){
              alertify.error(resObject.msgs);
              alertify.set('notifier','position', 'top-center');
                              
                              window.setTimeout(function () {window.location.reload();
                            },500);
                              return false;
            }
              //================== DB error =================
              else if( resObject.status==500){
                alertify.error(resObject.msgs);
                alertify.set('notifier','position', 'top-center');
                                
                                window.setTimeout(function () {window.location.reload();
                              },500);
                                return false;
              }
               //================== file error =================
               else if( resObject.status==550){
                alertify.error(resObject.msgs);
                alertify.set('notifier','position', 'top-center');
                                
                                window.setTimeout(function () {window.location.reload();
                              },500);
                                return false;
              }
               //================== file exist=================
               else if( resObject.status==150){
                alertify.error(resObject.msgs);
                alertify.set('notifier','position', 'top-center');
                                
                                window.setTimeout(function () {window.location.reload();
                              },500);
                                return false;
              }
      //================if we failed we should display the reason================
      
        else 
        {
        
          alertify.error(resObject.msgs);
          alertify.set('notifier','position', 'top-center');
                          
                          window.setTimeout(function () {window.location.reload();
                        },500);
                          return false;
         
      }
     
    } 
    //============================if we have a probleme with the request itself : this.status != 200
    else if (this.readyState == 4) 
    {
      alertify.error(resObject.msgs);
      alertify.set('notifier','position', 'top-center');
                      
                      window.setTimeout(function () {window.location.reload();
                    },500);
                      return false;
    }
    else{

        //close the form-step
        alertify.error(resObject.msgs);
        alertify.set('notifier','position', 'top-center');
                        
                        window.setTimeout(function () {window.location.reload();
                      },500);
                        return false;
    }
  };
  // for (const pair of data.entries()) {
  //   console.log(`${pair[0]}, ${pair[1]}`);
  // }

  xhr.open("POST", "upload.php", true);
  xhr.responseType = "json";
  // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(data);

  return false;
});
