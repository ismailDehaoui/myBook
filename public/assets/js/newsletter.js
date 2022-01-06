$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
//ajouter Mot cle
  $("#3form-newsletter").submit(function(e){
    e.preventDefault();
    alert("hello form");
    var form = this;
    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method'),
      data: new FormData(form),
      processData: false,

      dataType: 'json',
      contentType: false,
      beforeSend: function(){
       // $(form).find('span.error-text').text('');
      },
      success: function(data){
        if(data.code == 0){

           // $(form).find('span.motcle-error').text(data.msg);
        }
        alert(data.msg);
        else{

        
       /* $('#mot-cle').append(new Option(data.keyWordAdded, data.idKeyword, false, true))
          $(form)[0].reset();
          $('#myModal').modal('toggle');
          toastr.success(data.msg);
          //alert(data.msg);*/
        }
      },
      error: function(){
        //toastr.error("Quelque chose ne va pas!");
      }
       
      
      
    })

    });