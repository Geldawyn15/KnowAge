$(document).ready(function() {
    $('.favorite').on('click', function() { // Au clic sur un élément
        var element = document.getElementById("favorite");
        if(element.classList == "far fa-heart fa-5x"){
            return element.classList = "fas fa-heart fa-5x";
        } else {
            return  element.classList = "far fa-heart fa-5x";
        }
    });
});

$(document).ready(function() {
    $('.favoriteSearch').on('click', function() { // Au clic sur un élément
        var element = document.getElementById("favoriteSearch");
        if(element.classList == "far fa-heart fa-2x"){
            return element.classList = "fas fa-heart fa-2x";
        } else {
            return  element.classList = "far fa-heart fa-2x";
        }
    });
});
