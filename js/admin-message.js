//Fonction messages

jQuery(document).ready(function($){

    if(document.getElementById('table-messages')) {
        var contentBefore, $td, id_to_delete;
        var clickable = true;
    
        $("#table-messages").on('click', '.deletable', function(e) {
    
          if (clickable == true)  {
            clickable = false;
    
            e.preventDefault();
            var $this = $(this);
            id_to_delete = $this.data('id'); 
            $td = $this.parent();
            contentBefore = $td.html();
    
            $td.html('');
            var stringConfirm  = "<p id='confirm-delete' >La suppression est irréversible!";
            stringConfirm     += "<a id='my-confirm'  href='#'>Confirmer</a>";
            stringConfirm     += "<a id='my-cancel'  href='#'>Annuler</a></p>";
            $td.wrapInner(stringConfirm);
    
          }
        });
    
        $("#table-messages").on('click', '#my-cancel', function(e) {  
          e.preventDefault(); 
          $td.find("#confirm-delete").remove().end().html(contentBefore);
          clickable = true;
        });

        $("#table-messages").on('click', '#my-confirm', function(e) {  
          e.preventDefault();
    
          $.post(
            ajaxurl, 
            {
              'action': 'delete_message',
              'id': id_to_delete,
            },
            function(response){  
              if (response == 'success') {
                $td.parent().remove();
                clickable = true;
              } else {
                alert("Il y eu un problème avec la base de données lors de la suppression, veuillez contacter le responsable technique: ");
                $td.find("#confirm-delete").remove().end().html(contentBefore);
                clickable = true;
              }
            }
          );
        }); 
      }  
    });  