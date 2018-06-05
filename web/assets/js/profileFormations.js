
$(document).ready(function() {
    $('#formationToggle1').on('click', function() {
        var a = document.getElementById("bought");
        var b = document.getElementById("cree");
        if ( a.style.display !== "block"  ){
            a.style.display = "block";
            b.style.display = "none";
        }
    });


    $('#formationToggle2').on('click', function() {
        var a = document.getElementById("bought");
        var b = document.getElementById("cree");
        if (b.style.display !== "block" ){
            b.style.display = "block";
            a.style.display = "none";

        }
    });
});