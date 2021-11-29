$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $("#butsave").click(function(e){
    e.preventDefault();
    
    $.ajax({
      url: "/motscles",
      data:
      {
        'motcle': $('#motcle').val(),
        "_token": "{{ csrf_token }}",
      },
      method : 'POST',
      success : function(){
        console.log("succes");
      },
      error: function(){
        console.log("echec");
      }
    })

    })


});



/*var formAddKeyword = document.getElementById(addKeyword);
var butsave = document.querySelector("#butsave");
butsave.addEventListener("click", function(){
  alert("hihi");
});

function ajouterMotCle(){
  
    var req = new XMLHttpRequest();
    req.onreadystatechange = function() {
     if (req.readyState==4 && req.status==200)
       {
       console.log(req.responseText);
       }
    };

    var data = new FormData(formAddKeyword);
   
    req.open("POST","motscles",true);
     
    req.send(data);
   }
   */