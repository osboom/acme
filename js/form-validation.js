function validar(){
	
	var seguir=true;
	$("#frmDatos").find(':input').each(function() {
         var elemento= this;
			if(elemento.id!=''){
				var valor= elemento.value;
				valor.trim();
				var atributoreq =  document.getElementById(elemento.id).hasAttribute('required');
				 if(atributoreq==true){
					if( valor.length <= 0 ) { 
					 	alert(elemento.name + ': Rellenar Campo');
						seguir=false;
						return false;
					}
				 } 
			//alert("elemento.id="+ elemento.id + ", elemento.value=" + elemento.value + ", elemento.requerido=" ); 
			}	
	 });
	
	if(seguir==true){
		guardarpers()
	}	
}


function guardarpers(){
	
	var cedula=$('#frm_cedula').val();
	var nombre1=$('#frm_nombre1').val();
	var nombre2=$('#frm_nombre2').val();
	var apellido1=$('#frm_apellido1').val();
	var apellido2=$('#frm_apellido2').val();
	var direccion=$('#frm_direccion').val();
	var movil=$('#frm_movil').val();
	var ciudad=$('#frm_ciudad').val();
	var clasificacion=$('#frm_clasificacion').val();
	
	$.ajax({
				data:{"cedula":cedula, "nombre1":nombre1, "nombre2":nombre2, "apellido1":apellido1, "apellido2":apellido2, "direccion":direccion, "movil":movil, "ciudad":ciudad, "clasificacion":clasificacion},
				url:   '../controlador/inserpersonal.php',
				type:  'post',		
				success:  function (respuesta)
				{
					//alert(respuesta);
					//location.reload();
					//$("#addpersonal").modal("hide");
				},
				// código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
        alert('Disculpe, existió un problema');
    },

    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
        alert('Petición realizada');
		location.reload();
    }
		        
			})
		

		
			
	}

function modalempl(ventmodal){
			$('#'+ventmodal).modal("show");
}