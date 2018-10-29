
$(document).ready(function() {
	
	
	//alert(arrTels.length);
	//alert(valInputTels);
    var MaxInputs       = 8; //Número Maximo de Campos
    var contenedor      = $("#contenedorTels"); //ID del contenedor
    var AddButton       = $("#agregarTelefono"); //ID del Botón Agregar
    var EnviarButton    = $("#actualizarEstudiante");


  
    /*
     	Función que permite obtener los números de teléfonos  que se encuentran en el input hidden telefonos, separa los teleefonos dado el 
     	caracter de escape |  con el cual se crean input dinamicos con esos valores
     */
    function inputDinamicosTels(){
		var valInputTels = $("#inputTel").val();
		var arrTels = valInputTels.split("|");
	
		if( arrTels.length > 0 && valInputTels != ""){
			$.each(arrTels, function( key, value ) {
				if(value != ""){
					$(contenedor).append('<div class="added" ><input type="text" name="mitexto[]" id="campo_'+ (key+1) +'" value= "'+ value +'" /><a href="#" class="eliminar">&times;</a></div>');
				}
			});
		}else{
			$(contenedor).append('<div class="added" ><input type="text" name="mitexto[]" id="campo_1" placeholder="Teléfono 1"/><a href="#" class="eliminar">&times;</a></div>');
		}
     }

    inputDinamicosTels();
    

    //var x = número de campos existentes en el contenedor de teléfonos
    var x = $("#contenedorTels div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos
    //var x2 = número de campos existentes en el contenedor de teléfonos móviles
  

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


    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
    
    $(EnviarButton).on("click", function (e) {
        //alert($(".added input").size());
        var cad = "";
        var cad2 ="";
        $("#contenedorTels .added input").each(function (index){
            if( $(this).val() !== "") {
                cad +=  $(this).val() +"|";
            }
        });
       
     

        $( "#inputTel" ).val(cad);
    });

});