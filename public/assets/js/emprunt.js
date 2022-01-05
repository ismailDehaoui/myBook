var abonneResultHasChild = false;
var livreResultatHasChild = false;
var id_abonne;
var lien = "http://mybook.test/emprunts/enregistrer";

$(document).ready(function(){
    setInterval(function(){
        if(abonneResultHasChild){
            $('#douchette-livre').focus();
            $('#message-emprunt').text('Veuillez scanner les livres');
        }
        else{
            $('#douchette-abonne').focus();
            $('#message-emprunt').text("Veuillez scanner la carte de l\'abonne");
        }
        lectureDouchetteAbonne();
        lectureDouchetteLivre();
    }, 1000);
});


function lectureDouchetteAbonne(){
    var id = $('#douchette-abonne').val();
    if(id.length>0){
        $.ajax({
            url: 'http://mybook.test/emprunts/getabonne/{id}',
            type: 'GET',
            data: { id: id },
            success: function(response)
            {
                if(response){
                    $('#resultat-abonne').html(response);
                    $('#douchette-abonne').val('');
                    lien = lien+'/'+id+'/';
                    abonneResultHasChild = true;
                    id_abonne = id;
                   
                }
                else{
                    toastr.warning("Cet abonné n'est pas enregistré");
                    $('#douchette-abonne').val('');
                   
                }
                
            }
        });
        
    }
}

function lectureDouchetteLivre(){
    var isbn = $('#douchette-livre').val();
    if(isbn.length>0){
        $.ajax({
            url: 'http://mybook.test/livres/getlivre/{isbn}',
            type: 'GET',
            data: { isbn : isbn, id_abonne : id_abonne },
            success: function(response)
            {
                if(response){
                    $('#resultat-livre').append(response);
                    $('#douchette-livre').val('');
                    if(seTermineParSlash(lien)){
                        lien = lien+isbn;
                    }
                    else{
                        lien = lien+'&'+isbn;
                    }
                    if($('#enregistrer').hasClass('disabled')){
                        $('#enregistrer').removeClass('disabled');
                        $('#enregistrer').removeClass('btn-secondary');
                        $('#enregistrer').addClass('btn-primary');
                    };
                }
                else{
                    toastr.warning("Ce livre n'est pas enregistré");
                    $('#douchette-livre').val('');
                }    
            }
        });
    }
}

function seTermineParSlash(href){
    var taille = href.length;
    if(href[taille-1] == '/'){
        return true;
    }
}

$('#enregistrer').click(function(e){
    e.preventDefault();
    window.location.href = lien;
});