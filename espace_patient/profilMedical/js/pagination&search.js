function sortTable(formName)
{
   let form = document.getElementById(`${formName}`);
   console.log(form);
   form.addEventListener('submit',function(e){
    e.preventDefault();
    let formData = new FormData(this);
    
    for (const pair of formData.entries()) {
        console.log(`${pair[0]}, ${pair[1]}`);
      }
      $.ajax({
        type: "POST",
        url: "doctor.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function () {
            // location.reload(true);
        }})
   })
}