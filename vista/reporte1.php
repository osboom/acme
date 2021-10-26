<?php
$rutavmenu="/acme/vista/menu.php";
$rutafooter="/acme/vista/footer.php";
require_once $_SERVER['DOCUMENT_ROOT']."/acme/controlador/getreport1.php"; 
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	  
	  
    <title>Report Vehiculo</title>
  </head>
  <body class="bg-light">
	  	
	<div class="container-fluid scrollable">
  		<main>
	  		<!-- inicio menu de navegacion -->
    		<?php
	  			require_once $_SERVER['DOCUMENT_ROOT'].$rutavmenu;
	 		?>
	  		<!-- fin menu de navegacion -->
			
			
			 
			<!-- inicio listar Vehiculos -->
	  
			<section>
				<article class="my-5 pt-5" id="tables">
      				<div>
        				<div class="bd-example">
							<h2 class="text-center">Listar Vehiculos Placa</h2>
							
        					<table id="tbl-report1" class="table table-striped">
          						<thead>
          							<tr>
										<th>Placa</th>
										<th>Marca</th>
										<th>Conductor</th> 
										<th>Propietario</th> 
          							</tr>
          						</thead>
          						<tbody>
									<?php
										foreach($regveh as $regmoveh){
									?>
			   						<tr>
										<td><?php echo $regmoveh['placa']; ?></td>
										<td><?php echo $regmoveh['marca']; ?></td>
										<td><?php echo $regmoveh['conductor']; ?></td>
										<td><?php echo $regmoveh['Propietario']; ?></td>
										
									</tr>
									<?php
										}
									?> 
								</tbody>
       					</table>
        			</div>
				</div>
    		</article>
		</section>
	  
			<!-- inicio pie pagina -->
    		<?php
	  			require_once $_SERVER['DOCUMENT_ROOT'].$rutafooter;
	 		?>
	  		<!-- fin pie pagina -->
			
  	</main>	
		
	
</div>
	
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

	  <script src="plugins/dataTables/jquery/jquery-3.3.1.min.js"></script>
	<script src="plugins/dataTables/popper/popper.min.js"></script>
	<script src="plugins/dataTables/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="plugins/dataTables/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="plugins/dataTables/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="plugins/dataTables/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="plugins/dataTables/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="plugins/dataTables/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="plugins/dataTables/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
	  
	  <script src="../js/form-validation.js"></script>
   
	       <script>
         $(document).ready(function () {
			 btn_tbl_head=[];
			btn_tbl_head.push({     
				 extend:    'copyHtml5',
				 text:      '<div class="icon-circle bg-secondary text-white"><i class="fas fa-clipboard"></i></div>',
				 titleAttr: 'Copiar'
			 });
			btn_tbl_head.push({    
				 extend:    'excelHtml5',
				 text:      '<div class="icon-circle bg-secondary text-white"><i class="far fa-file-excel"></i></div>',
				 titleAttr: 'Excel'
			 });
			btn_tbl_head.push({  
				 extend:    'pdfHtml5',
				 text:      '<div class="icon-circle bg-secondary text-white"><i class="far fa-file-pdf"></i></div>',
				 titleAttr: 'PDF'
			 })
			btn_tbl_head.push({
				 extend:    'colvis',
				 text:      '<div class="icon-circle bg-secondary text-white"><i class="fa fa-eye-slash"></i></div>',
				 titleAttr: 'Visibilidad'
			 })
			 var ancho=$("#tbl-report1").attr("width");
		
             $('#tbl-report1').DataTable({
				 "destroy" : true,
				    "language": {
						"lengthMenu": "Mostrar _MENU_ Registros por Pagina",
						"zeroRecords": "No hay registros",
						"info": "Mostrando  _PAGE_ de _PAGES_ paginas",
						"infoEmpty": "No hay Registros disponibles",
						"infoFiltered": "(Filtrado _MAX_ total registros)",
						"sSearch": "Buscar:",
                		"oPaginate": {
						"sFirst": "Primero",
						"sLast":"Último",
						"sNext":"Siguiente",
						"sPrevious": "Anterior"
			     		},
			     		"sProcessing":"Procesando...",
					},
				 "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todo"]],
				 
				 	 
				 "scrollY": true,
				 "scrollX": true,
		
				"autoWidth": false,
				 
					 
				  responsive: "true",
        dom: 'lBfrtip',       
        buttons:[ 
			{
				extend:    'excelHtml5',
				text:      '<i class="fas fa-file-excel"></i> ',
				titleAttr: 'Exportar a Excel',
				className: 'btn btn-success'
			},
			{
				extend:    'pdfHtml5',
				text:      '<i class="fas fa-file-pdf"></i> ',
				titleAttr: 'Exportar a PDF',
				className: 'btn btn-danger'
			},
			{
				extend:    'print',
				text:      '<i class="fa fa-print"></i> ',
				titleAttr: 'Imprimir',
				className: 'btn btn-info'
			},
		],	        
			
				 fixedColumns:   {
				leftColumns: 1
				}
				 
				 
			 });
         });
	 </script>
	 <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>