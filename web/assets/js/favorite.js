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
