jQuery(document).ready(function($){
    $(document).on('click','#sommaire-article a',function(){
        var h = $(this).attr('href');

        $('body,html').animate({  
            scrollTop:$(h).offset().top  
        }, 500); 
        return false;
    });
});

jQuery(function($) {
    if($(window).width() < 992) {
       $(".dropdown-toggle").attr('data-toggle', 'dropdown');   $('.dropdown').on('show.bs.dropdown', function () {
     $(this).siblings('.open').removeClass('open').find('a.dropdown-toggle').attr('data-toggle', 'dropdown');
     $(this).find('a.dropdown-toggle').removeAttr('data-toggle');
       });
    } 
});


$(function() {
    $( '.toggle-button' ).on( 'click', function() {
        // À décommenter si tu veux masquer toutes les autres div
        // $( '.togglable' ).not( this.getAttribute( 'data-target' ) ).hide( 'slow' );
         
        $( this.getAttribute( 'data-target' ) ).toggle( 'slow' );
    });
});