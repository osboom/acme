<?php
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/controlador/getempleados.php";
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/controlador/getroless.php"; 
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/controlador/getallempleados.php"; 
?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Prueba Php">
    <meta name="author" content="Oscar Bocanegra">
    <meta name="prueba" content="prueba 1.00">
    <title>Empleados</title>

   <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/"> -->

    
	  
	  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	  
    
    <!-- Custom styles for this template -->
	  <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    

	  
	   <!-- Modal de iniciar usuario usuario-->
		  <section>
			  
				<div id="addempleado" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" style="font-size: 12px">
					<form action="" class="needs-validation" novalidate>
  					<div class="modal-dialog modal-dialog-centered" role="document">
    					<div class="modal-content">
      						<div class="modal-header ">
								
								<h2>Crear Empleado</h2>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        						</button>
      						</div>
      						<div class="modal-body">
									<div class=" clfondo p-3">
										
											Los Campos con asteriscos(*) son obligatorios.
										
									</div>
        						 <div class="row">
		
									<div class="  input-group p-1">
										 <label class="col-4 textderecha">Nombre Completo * </label>
										<div class="col-8">
											<input id="frm_nombre" name="frm_nombre" type="text" class="form-control" required>
										</div>
									 </div>


									  <div class="  input-group p-1">
										 <label class="col-4 textderecha">Correo electrónico * </label>
										  <div class="col-8">
											<input id="frm_email" name="frm_email" type="text" class="form-control" required>
										  </div>
									 </div>
    
	  
									  <div class="input-group p-1">
										 <label class="col-4 textderecha">Sexo * </label>
										 <div class="col-8">
											  											 
											<div class="form-check">
											  <input class="form-check-input" type="radio" id="frm_sexm" name="optionsRadios" value="M">
											  <label class="form-check-label" for="frm_sexm">Masculino</label>
											</div>

											<div class="form-check">
											  <input class="form-check-input" type="radio" id="frm_sexf"  name="optionsRadios" value="F">
											  <label class="form-check-label" for="frm_sexf">Femenino</label>
											</div>
										</div>
									 </div>
		
									<div class="  input-group p-1">
									 <label class="col-4 textderecha">Area *</label>
										<div class="col-8">
											<select class="form-control" id="frm_area" name="frm_area" required>
											<?php
												foreach($regareas as $regmovareas){
											?>
												<option value="<?php echo  $regmovareas['id']; ?>"><?php echo  $regmovareas['nombre']; ?></option>
											<?php } ?>  
											</select>
										</div>
								 </div>
		
		
								<div class="  input-group p-1">
									 <label class="col-4 textderecha">Descripcion * </label>
									<div class="col-8">
									 	<textarea id="frm_descripcion" name="frm_descripcion" class="form-control" rows="3" required></textarea>
									</div>
								 </div>	


								<div class="  input-group p-1">
									 <label class="col-4 textderecha"></label>
									<div class="col-8">
										<div class="form-check">
											<input class="form-check-input"   type="checkbox" id="frm-boletin" name="frm-boletin" >
											<label class="form-check-label" for="frm-boletin">Deseo Recibir Boletin Informativo</label>
										</div>
									</div>
								</div>		
		
							  <div class="input-group p-1">
								 <label class="col-4 textderecha">Roles *</label>
								 <div class="col-8">

									 <?php
										foreach($regroles as $regmovroles){
									?>
										<div class="form-check">
									  <input class="form-check-input" type="checkbox" id="<?php echo 'frm-rol-'.$regmovroles['id']; ?>"  value="<?php echo $regmovroles['id']; ?>" >
									  <label class="form-check-label" for="<?php echo 'frm-rol-'.$regmovroles['id']; ?>"><?php echo $regmovroles['nombre']; ?></label>
									</div>
									<?php } ?> 
	 							</div>
	 						</div>
						
								
						</div>
														
      				</div>
      						<div class="modal-footer">
								<div id="msjerror" style="color: red; display: none">Error. Usuario no valido </div>
								<button type="button" class="btn btn-primary" onClick="guardarempl()">Guardar</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								
						  </div>
    					</div>
  					</div>
				</form>
				</div>							
			</section>
	  

	  
<section>
	<article class="my-3" id="tables">
      <div>
        <div class="bd-example">
		<h2>Lista de Empleados</h2>
			<p align="right">
				<button type="button" class="btn btn-primary" onClick="modalempl('addempleado')"><i class="fas fa-user-plus p-1"></i>Crear</button> 
			</p>
        <table class="table table-striped">
          <thead>
          <tr>
            <th scope="col"><i class="fa fa-user p-1"></i>Nombre</th>
            <th scope="col"><i class="fa fa-envelope-square p-1"></i>Email</th>
            <th scope="col"><i class="fas fa-venus-mars p-1"></i>Sexo</th>
            <th scope="col"><i class="fas fa-suitcase p-1"></i>Area</th>
			<th scope="col"><i class="fas fa-envelope p-1"></i></i>Boletin</th>
			<th scope="col">Modificar</th>  
			<th scope="col">Eliminar</th>
			  
          </tr>
          </thead>
          <tbody>
			   <?php
					foreach($regempl as $regmovempl){
				?>
			  
          <tr>
            <th scope="row"><?php echo $regmovempl['nombre']; ?></th>
            <td><?php echo $regmovempl['email']; ?></td>
            <td><?php if($regmovempl['sexo']=="F"){echo "Femenino";} else{echo "Masculino";} ?></td>
            <td><?php echo $regmovempl['area']; ?></td>
			 <td><?php if($regmovempl['boletin']==1){echo "Si";}else{echo "No";} ?></td>
			  <td class="text-center"><i class="far fa-edit"></i></td>
			  <td class="text-center"><i class="fas fa-trash-alt"></i></td>
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
	  
	
    
	  
	 
	  
	  
	  
	
	
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Osboom</p>
    <ul class="list-inline">
      <li class="list-inline-item"><i class="fa fa-phone-alt"></i><a href="tel:+57 322 5971826">+57 322 5971826</a></li>
      <li class="list-inline-item"><i class="fa fa-envelope"><a href="mailto:oscesteban@hotmail.com"></i>oscesteban@hotmail.com</a></li>
      <li class="list-inline-item">Cartagena - Colombia</li>
    </ul>
  </footer>
</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script src="../js/form-validation.js"></script>
	<script language="javascript">
		
		

	</script>



  </body>
</html>
