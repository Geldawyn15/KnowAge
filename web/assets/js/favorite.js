
$(document).ready(function() {
    $('.favoriteSearch').on('click', function() {
        var clicked = this;
        var element = this.querySelector("i");
        if(element.classList == "far fa-heart fa-2x"){
            $.post( {{ path('profil') }}, { formationId: clicked.attr('name'), hasclass: false })
        .done(function( data ) {
                alert( "Data Loaded: " + data );
            });
            alert("this has been clicked");
            return element.classList = "fas fa-heart fa-2x";
        } else {
            return  element.classList = "far fa-heart fa-2x";
        }
    });
});
