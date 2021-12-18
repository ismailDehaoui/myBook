$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  //ajouter Mot cle
  $("#addKeyword").submit(function(e){
    e.preventDefault();
    //alert("hello form")
    var form = this;
    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: new FormData(form),
      processData: false,

      dataType: 'json',
      contentType: false,
      beforeSend: function(){
        $(form).find('span.error-text').text('');
      },
      success: function(data){
        if(data.code == 0){
            $(form).find('span.motcle-error').text(data.msg);
        }
        else{

        
        $('#mot-cle').append(new Option(data.keyWordAdded, data.idKeyword, false, true))
          $(form)[0].reset();
          $('#myModal').modal('toggle');
          toastr.success(data.msg);
          //alert(data.msg);
        }
      },
      error: function(){
        toastr.error("Quelque chose ne va pas!");
      }
       
      
      
    })

    })



    //supprimer mot clé
    
    $("#minus-motcle").click(function(e){
      e.preventDefault();
      var motsclesSelectionne = $("#mot-cle").find(":selected").val();
      $.ajax({
        url: "http://mybook.test/motscles/"+motsclesSelectionne+"/supprimer",
        dataType : 'json',
        type: 'POST',
        data: {},
        contentType: false,
        processData: false,
        success: function(data){
          if(data.code == 0){
            toastr.warning(data.msg);
          }
          else{
            $("#mot-cle option[value="+motsclesSelectionne+"]").remove();
            toastr.success(data.msg);
          }
        },
        error: function(){
          toastr.error("Quelque chose ne va pas!");
        }


    });
  });





    //ajouter auteur


    $("#addAuthor").submit(function(e){
      e.preventDefault();
      //alert("hello form")
      var form = this;
      $.ajax({
        url: $(form).attr('action'),
        method: $(form).attr('method'),
        data: new FormData(form),
        processData: false,
        dataType: 'json',
        contentType: false,
        beforeSend: function(){
          $(form).find('span.error-text').text('');
        },
        success: function(data){
          if(data.code == 0){
              $(form).find('span.auteur-error').text(data.msg);
          }
          else{
  
          
          $('#auteur').append(new Option(data.auteurAdded, data.idAuteur, false, true))
            $(form)[0].reset();
            $('#myModal2').modal('toggle');
            toastr.success(data.msg);
            //alert(data.msg);
          }
        },
        error: function(){
          toastr.error("Quelque chose ne va pas!");
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