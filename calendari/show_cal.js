var last_box = null

function Mostra() {
    if (document.getElementById("muni").value=="Municipio I" || document.getElementById("muni").value=="Municipio XI" || document.getElementById("muni").value=="Municipio XV" ) {
        Chiudi(last_box);
        $(document).ready(function() {
                $("div.box_m1").addClass("box_open");  
                last_box = "box_m1";
        });
    }
    if (document.getElementById("muni").value=="Municipio II" || document.getElementById("muni").value=="Municipio XII" || document.getElementById("muni").value=="Municipio XIV") {
        Chiudi(last_box);
        $(document).ready(function() {
                $("div.box_m2").addClass("box_open");
                last_box = "box_m2";  
        });
    }
    if (document.getElementById("muni").value=="Municipio III" || document.getElementById("muni").value=="Municipio VI" || document.getElementById("muni").value=="Municipio XIII") {
        Chiudi(last_box);
        $(document).ready(function() {
                $("div.box_m3").addClass("box_open");  
                last_box = "box_m3";
        });
    }
    if (document.getElementById("muni").value=="Municipio IV" || document.getElementById("muni").value=="Municipio VII" || document.getElementById("muni").value=="Municipio IX") {
        Chiudi(last_box);
        $(document).ready(function() {
                $("div.box_m4").addClass("box_open");
                last_box = "box_m4";  
        });
    }
    if (document.getElementById("muni").value=="Municipio V" || document.getElementById("muni").value=="Municipio X" || document.getElementById("muni").value=="Municipio VIII") {
        Chiudi(last_box);
        $(document).ready(function() {
                $("div.box_m5").addClass("box_open");
                last_box = "box_m5";  
        });
    }
}

function Chiudi(box) {
        if (box==null) {return null;}

        switch (box){
                case "box_m1":
                        $("div.box_m1").removeClass("box_open");  
                        break;
                case "box_m2":
                        $("div.box_m2").removeClass("box_open");
                        break;
                case "box_m3":
                        $("div.box_m3").removeClass("box_open");
                        break;
                case "box_m4":
                        $("div.box_m4").removeClass("box_open");
                        break;
                case "box_m5":
                        $("div.box_m5").removeClass("box_open");
                        break;
                default:
                        return;
        } 
}