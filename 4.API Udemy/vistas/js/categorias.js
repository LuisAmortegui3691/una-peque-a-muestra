/* Indentificar la pantalla */
if(window.matchMedia("(min-width:1200px)").matches) {
    $(document).on("mouseover", ".listaCategorias li", function() {
        var enlace = $(this).attr("idCategoria");
        verSubcategorias(enlace);
    });
} else {
    $(document).on("click", ".listaCategorias li", function() {
        var enlace = $(this).attr("idCategoria");
        verSubcategorias(enlace);
    });
}

/* Cambio en la ventana modal de categorias */

function verSubcategorias(enlace) {

    /* Cambios en las sub-categorias */
    var datosSubcategorias = new FormData();
    datosSubcategorias.append("idCategoria", enlace);
    datosSubcategorias.append("item", "id_categoria");
    datosSubcategorias.append("tabla", "subcategorias");

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method:"POST",
		data: datosSubcategorias,
		cache: false,
		contentType: false,
		processData:false,
		dataType: "json",
        success: function(respuesta){

            if(window.matchMedia("(max-width:575px)").matches) {
                $(".listaCategorias").hide();
                $(".listaSubcategorias").parent().removeClass("d-none");
                $(".listaSubcategorias").parent().show();
                $(".listaSubcategorias").parent().append(
                    '<button class="btn btn-default btn-sm regresarCategorias">Regresar</button>'
                );

                $(".regresarCategorias").click(function() {
                    $(this).remove();
                    $(".listaCategorias").show();
                    $(".listaSubcategorias").parent().hide();
                });
            }

            $(".listaSubcategorias").html("");
            console.log("respuesta", respuesta);

            for(var i = 0; i < respuesta.length; i++) {
                $(".listaSubcategorias").append(
                    '<a href="#" class="text-secondary">'+
                        '<li class="small my-2">' + respuesta[i]["subcategoria"] + '</li>'+
                    '</a>'
                );
            }
        }
    });

    /* Cambios en categorias */
    var datosCategorias = new FormData();
    datosCategorias.append("idCategoria", enlace);
    datosCategorias.append("item", "id");
    datosCategorias.append("tabla", "categorias");

    $.ajax({
        url: "ajax/categorias.ajax.php",
		method:"POST",
		data: datosCategorias,
		cache: false,
		contentType: false,
		processData:false,
		dataType: "json",
		success: function(respuesta){
            console.log("respuesta", respuesta);
            $(".tituloCategoria").html(respuesta[0]["categoria"]);
            $(".desCategoria").html(respuesta[0]["descripcion"]);
			$(".imgCategoria").attr("src", respuesta[0]["imgOferta"]);
        }
    });
}

/* Botonera auxiliar categorias */
var datosCategorias = new FormData();
datosCategorias.append("idCategoria", "");
datosCategorias.append("item", "");
datosCategorias.append("tabla", "categorias");

$.ajax({
    url: "ajax/categorias.ajax.php",
	method:"POST",
	data: datosCategorias,
	cache: false,
	contentType: false,
	processData:false,
	dataType: "json",
	success: function(respuesta){
        
        if(window.matchMedia("(min-width:1200px)").matches){

			var longitud = 8;

		}else if(window.matchMedia("(max-width:1199px) and (min-width:992px)").matches){

			var longitud = 6;

		}else if(window.matchMedia("(max-width:991px) and (min-width:768px)").matches){

			var longitud = 5;

		}else{

			var longitud = 0;

		}

        for(var i = 0; i < longitud; i++) {
            $(".botoneraAuxiliar").before(
                '<li class="nav-item">'+
                    '<a class="nav-link text-secondary p-0 py-2 small" href="#">'+
                        '<span class="badge badge-pill">'+
                            '<i class="'+respuesta[i]["icono"]+'"></i>'+
                        '</span>'+respuesta[i]["categoria"]+
                    '</a>'+
                '</li>'
            );
        }

        for(var i = longitud; i < respuesta.length; i++){
            $(".botoneraOtros").append(
                '<a class="dropdown-item text-secondary small" href="#">'+
                    '<span class="badge badge-pill">'+
                        '<i class="'+respuesta[i]["icono"]+'"></i>'+
                    '</span>'+respuesta[i]["categoria"]+ 
                '</a>'
            )
        }
    }
});