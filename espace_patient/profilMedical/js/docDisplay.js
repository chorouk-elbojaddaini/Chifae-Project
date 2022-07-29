// ========================
/*=============status numbers meaning:=====================
200 => successful
422 => empty fields
100 => big format 
110 => interdite format
500=> db erroe while inserting
550 => file error

*/
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
              //display the original file name
              let showName = document.getElementById("show-name");
              showName.style.display = "block";
              showName.textContent = resObject.fileName;
              showName.insertAdjacentHTML('afterbegin',' <i class="fa-solid fa-circle-check"></i>')

              //close the form-step
              let closeForm = document.getElementById("submit-docF");
                closeForm.addEventListener("click", function(event) 
                {
                    event.preventDefault();
                    document.getElementById("doc").classList.add("hide");
                //===================DISPLAY SUCCESS MSGS======================
                alertify.set('notifier','position', 'top-center');
                alertify.success(resObject.msgs);
                //===============we should empty the fields after sending the form===========
                  $("#nom-doc,#date-docs,#added-by-docs,#add-file").val("");
                  //hide the span
                  showName.textContent = "";
                  showName.style.display = "none";
                  //======================refresh after inserting so that we could see the lastest records
                  location.reload(true);
              
              });
              
            } //=============if empty fields
            else if( resObject.status==422){
              alertify.set('notifier','position', 'top-center');
              alertify.error(resObject.msgs);
            }
            //================== interdite extension =================
            else if( resObject.status==110){
              alertify.set('notifier','position', 'top-center');
              alertify.error(resObject.msgs);
            }
            //================== big formats =================
            else if( resObject.status==100){
              alertify.set('notifier','position', 'top-center');
              alertify.error(resObject.msgs);
            }
              //================== DB error =================
              else if( resObject.status==500){
                alertify.set('notifier','position', 'top-center');
                alertify.error(resObject.msgs);
              }
               //================== file error =================
               else if( resObject.status==550){
                alertify.set('notifier','position', 'top-center');
                alertify.error(resObject.msgs);
              }
               //================== file exist=================
               else if( resObject.status==150){
                alertify.set('notifier','position', 'top-center');
                alertify.error(resObject.msgs);
                console.log("hel")
              }
      //================if we failed we should display the reason================
      
        else 
        {
        
          let closeForm = document.getElementById("close-add-doc");
          closeForm.addEventListener("click", function() 
          {
            // event.preventDefault();
            
            alertify.set('notifier','position', 'top-center');
            alertify.error(resObject.msgs);
            document.getElementById("doc").classList.add("hide");
          })
         
      }
     
    } 
    //============================if we have a probleme with the request itself : this.status != 200
    else if (this.readyState == 4) 
    {
      alertify.set('notifier','position', 'top-center');
      alertify.error(resObject.msgs);
      console.log("hello2")

    }
    else{

        //close the form-step
        let closeForm = document.getElementById("close-add-doc");
          closeForm.addEventListener("click", function() 
          {
            document.getElementById("doc").classList.add("hide");
            alertify.set('notifier','position', 'top-center');
            alertify.error(resObject.msgs);
            console.log("hello3")
          })

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
