<?php
$rutavmenu="/acme/vista/menu.php";
$rutafooter="/acme/vista/footer.php";
require_once $_SERVER['DOCUMENT_ROOT']."/acme/controlador/getallpersonal.php"; 
require_once $_SERVER['DOCUMENT_ROOT']."/acme/controlador/getciudad_personal.php"; 
require_once $_SERVER['DOCUMENT_ROOT']."/acme/controlador/getclasificacion_personal.php"; 


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
	  
	  
    <title>Personal</title>
  </head>
  <body class="bg-light">
	  	
	<div class="container-fluid scrollable">
  		<main>
	  		<!-- inicio menu de navegacion -->
    		<?php
	  			require_once $_SERVER['DOCUMENT_ROOT'].$rutavmenu;
	 		?>
	  		<!-- fin menu de navegacion -->
			
			
			 <!-- Modal de crear personal-->
		  <section>
			  
				<div id="addpersonal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" style="font-size: 12px">
					<form name="frmDatos" id="frmDatos">
  						<div class="modal-dialog modal-dialog-centered" role="document">
    						<div class="modal-content">
      							<div class="modal-header ">
									<h2>Crear Personal</h2>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        							</button>
      							</div>
      						<div class="modal-body">
								<div class=" clfondo p-3">Los Campos con asteriscos(*) son obligatorios.</div>
        						 <div class="row">
									 
									 <div class="input-group p-1">
										 <label class="col-4 textderecha">Cedula * </label>
										<div class="col-8">
											<input id="frm_cedula" name="frm_cedula" type="number" class="form-control" required>
										</div>
									 </div>
									 
									<div class="input-group p-1">
										 <label class="col-4 textderecha">Primer Nombre * </label>
										<div class="col-8">
											<input id="frm_nombre1" name="frm_nombre1" type="text" class="form-control" required>
										</div>
									 </div>

									<div class="input-group p-1">
										<label class="col-4 textderecha">Segundo Nombre </label>
										<div class="col-8">
											<input id="frm_nombre2" name="frm_nombre2" type="text" class="form-control" >
										</div>
									 </div>
									 
									 <div class="input-group p-1">
										<label class="col-4 textderecha">Primer Apellido * </label>
										<div class="col-8">
											<input id="frm_apellido1" name="frm_apellido1" type="text" class="form-control" required>
										</div>
									 </div>
									 
									  <div class="input-group p-1">
										<label class="col-4 textderecha">Segundo Apellido </label>
										<div class="col-8">
											<input id="frm_apellido2" name="frm_apellido2" type="text" class="form-control" >
										</div>
									 </div>
									 
									  <div class="input-group p-1">
										<label class="col-4 textderecha">Direccion * </label>
										<div class="col-8">
											<input id="frm_direccion" name="frm_direccion" type="text" class="form-control" required>
										</div>
									 </div>
									 
									 <div class="input-group p-1">
										<label class="col-4 textderecha">Movil </label>
										<div class="col-8">
											<input id="frm_movil" name="frm_movil" type="number" class="form-control" >
										</div>
									 </div>
									 
									 <div class="input-group p-1">
									 	<label class="col-4 textderecha">Ciudad *</label>
										<div class="col-8">
											<select class="form-control" id="frm_ciudad" name="frm_ciudad" required>
											<?php
												foreach($regciudad as $regmovciudad){
											?>
												<option value="<?php echo  $regmovciudad['id_ciudad']; ?>"><?php echo  $regmovciudad['ciudad']; ?></option>
											<?php } ?>  
											</select>
										</div>
								 	</div>
									 
									 <div class="input-group p-1">
									 	<label class="col-4 textderecha">Tipo Area *</label>
										<div class="col-8">
											<select class="form-control" id="frm_clasificacion" name="frm_clasificacion" required>
											<?php
												foreach($regclasificacion as $regmovclas){
											?>
												<option value="<?php echo  $regmovclas['id_casspersonal']; ?>"><?php echo  $regmovclas['classpersonal']; ?></option>
											<?php } ?>  
											</select>
										</div>
								 	</div>
								
						</div>
														
      				</div>
      						<div class="modal-footer">
								<div id="msjerror" style="color: red; display: none">Error. Usuario no valido </div>
								<button type="button" class="btn btn-primary" onClick="validar()">Guardar</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								
						  </div>
    					</div>
  					</div>
				</form>
				</div>							
			</section>
	  
			
			
			
			
			
			<!-- inicio listar personal -->
	  
			
			<section>
				<article class="my-5 pt-5" id="tables">
      				<div>
        				<div class="bd-example">
							<h2 class="text-center">Listar Personal</h2>
							<p align="right">
								<button type="button" class="btn btn-primary" onClick="modalempl('addpersonal')"><i class="fas fa-user-plus p-1"></i>Crear</button> 
							</p>
        					<table class="table table-striped">
          						<thead>
          							<tr>
										<th scope="col"><i class="fa fa-id-card p-1"></i>Cedula</th>
										<th scope="col"><i class="fa fa-user p-1"></i>Personal</th>
										<th scope="col"><i class="fa fa-phone-alt p-1"></i>Movil</th>
										<th scope="col"><i class="fas fa-suitcase p-1"></i>Tipo</th> 
										<th scope="col">Activo</th>
										<th scope="col">Modificar</th> 
          							</tr>
          						</thead>
          						<tbody>
									<?php
										foreach($regempl as $regmovempl){
									?>
			   						<tr>
										<th scope="row"><?php echo $regmovempl['numcedula']; ?></th>
										<td><?php echo $regmovempl['apellcond1']." ".$regmovempl['apellcond2']." ".
											$regmovempl['nomcond1']." ".$regmovempl['nomcond2']; ?></td>
										<td><?php echo $regmovempl['telcond']; ?></td>
										<td><?php echo $regmovempl['classpersonal']; ?></td>
										<td></td>
										<td class="text-center"><i class="far fa-edit"></i></td>
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

	  <script src="../js/form-validation.js"></script>
   
	 
	 <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>