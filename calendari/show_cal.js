function Mostra() {
    if (document.getElementById("muni").value=="Municipio I" || document.getElementById("muni").value=="Municipio XI" || document.getElementById("muni").value=="Municipio XV" ) {
    $(document).ready(function() {
            $("div.box_m1").addClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio II" || document.getElementById("muni").value=="Municipio XII" || document.getElementById("muni").value=="Municipio XIV") {
    $(document).ready(function() {
            $("div.box_m2").addClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio III" || document.getElementById("muni").value=="Municipio VI" || document.getElementById("muni").value=="Municipio XIII") {
    $(document).ready(function() {
            $("div.box_m3").addClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio IV" || document.getElementById("muni").value=="Municipio VII" || document.getElementById("muni").value=="Municipio IX") {
    $(document).ready(function() {
            $("div.box_m4").addClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio V" || document.getElementById("muni").value=="Municipio X" || document.getElementById("muni").value=="Municipio VIII") {
    $(document).ready(function() {
            $("div.box_m5").addClass("box_open");  
    });
    }
}

function Chiudi() {
    if (document.getElementById("muni").value=="Municipio I" || document.getElementById("muni").value=="Municipio XI" || document.getElementById("muni").value=="Municipio XV" ) {
    $(document).ready(function() {
            $("div.box_m1").removeClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio II" || document.getElementById("muni").value=="Municipio XII" || document.getElementById("muni").value=="Municipio XIV") {
    $(document).ready(function() {
            $("div.box_m2").removeClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio III" || document.getElementById("muni").value=="Municipio VI" || document.getElementById("muni").value=="Municipio XIII") {
    $(document).ready(function() {
            $("div.box_m3").removeClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio IV" || document.getElementById("muni").value=="Municipio VII" || document.getElementById("muni").value=="Municipio IX") {
    $(document).ready(function() {
            $("div.box_m4").removeClass("box_open");  
    });
    }
    if (document.getElementById("muni").value=="Municipio V" || document.getElementById("muni").value=="Municipio X" || document.getElementById("muni").value=="Municipio VIII") {
    $(document).ready(function() {
            $("div.box_m5").removeClass("box_open");  
    });
    }
    

}