$(document).ready(function() {
    var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor      = $("#contenedorTels"); //ID del contenedor
    var AddButton       = $("#agregarTelefono"); //ID del Botón Agregar
    var EnviarButton    = $("#crearEstudiante");


    //var x = número de campos existentes en el contenedor
    var x = $("#contenedorTels div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos


    $(AddButton).click(function (e) {

        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<div class="added" ><input type="text" name="mitexto[]" id="campo_'+ FieldCount +'" placeholder="Teléfono '+ FieldCount +'"/><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment
        }
        return false;
    });

    // $(AddButtonCels).click(function (e) {

    //     if(x2 <= MaxInputs) //max input box allowed
    //     {
    //         FieldCount2++;
    //         //agregar campo
    //         $(contenedorCels).append('<div class="added" ><input type="text" name="mitexto[]" id="campoCel_'+ FieldCount2 +'" placeholder="Teléfono  móvil'+ FieldCount2 +'"/><a href="#" class="eliminar">&times;</a></div>');
    //         x++; //text box increment
    //     }
    //     return false;
    // });


    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
    
    $(EnviarButton).on("click", function (e) {
        alert($(".added input").size());
        var cad = "";
        var cad2 ="";
        $("#contenedorTels .added input").each(function (index){
            if( $(this).val() !== "") {
                cad +=  $(this).val() +"|";
            }
        });
       alert("contenido "+ cad);
        // $("#contenedorCels .added input").each(function (index){
        //     if( $(this).val() !== "") {
        //         cad2 +=  $(this).val() +"|";
        //     }
        // });

        $( "#inputTel" ).val(cad);
        //$( "#inputCel" ).val(cad2);
    });

});