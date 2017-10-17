// $("#Upload").click(function() {
//   fichier = document.getElementById("uploadFile").value;
//   $.post(
//     "PHP/importcsv.php", {
//       Files: new FormData(fichier),
//     },
//     function(data) {
//       alert(data);
//       $("#corps").append(data);
//     },
//   )
// });

$(document).ready(function(){
  $("#formUpload").submit(function(e){
    e.preventDefault();
    $.ajax({
      url: "PHP/importcsv.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
        alert(data);
        $(".corps").append(data);
      },
    })
  })
})
