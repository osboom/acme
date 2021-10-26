<?php
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/controlador/getempleados.php";
require_once $_SERVER['DOCUMENT_ROOT']."/pruebaphp/controlador/getroless.php"; 

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
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

	  
    
    <!-- Custom styles for this template -->
	  <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5">
      <h2>Crear Empleado</h2>
		<div class="bg-info text-dark p-2">
			<p>
				Los Campos con asteriscos(*) son obligatorios.
			</p>
		</div>
    </div>

    <div class="row g-3">
		
	<div class="  input-group">
		 <label class="col-4 textderecha">Nombre Completo * </label>
  	 	<input id="frm_nombre" type="text" class="form-control col-8" placeholder="Nombre" required>
	 </div>
		
		
      <div class="  input-group">
		 <label class="col-4 textderecha">Correo electrónico * </label>
  		<span class="input-group-text" id="basic-addon1">@</span>
  	 	<input id="frm_email" type="text" class="form-control col-8" placeholder="email" required>
	 </div>
    
	  
	  <div class="input-group">
	  	 <label class="col-4 textderecha">Sexo * </label>
	  	 <div class="col-8">
  			<div class="form-check">
			  <input class="form-check-input" type="radio" name="flexRadioDefault" id="frm_sexm">
			  <label class="form-check-label" for="flexRadioDefault1">Masculino</label>
			</div>
		  	
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="flexRadioDefault" id="frm_sexf">
			  <label class="form-check-label" for="flexRadioDefault2">Femenino</label>
			</div>
	 	</div>
	 </div>
		
		<div class="  input-group">
		 <label class="col-4 textderecha">Area * </label>
  	 	<select class="form-select col-8" id="frm_area" required>
			<?php
				foreach($regareas as $regmovareas){
			?>
                <option value="<?php echo  $regmovareas['id']; ?>"><?php echo  $regmovareas['nombre']; ?></option>
            <?php } ?>  
			</select>	
	 </div>
		
		
	<div class="  input-group">
		 <label class="col-4 textderecha">Descripcion * </label>
		 <textarea id="frm_descripcion" class="form-control col-8" id="exampleFormControlTextarea1" rows="3" required></textarea>
	 </div>	
		
		
	<div class="  input-group">
		 <label class="col-4 textderecha"></label>
		<div class="form-check">
  			<input id="frm-boletin" class="form-check-input col-8" type="checkbox" value="" >
  			<label class="form-check-label" for="flexCheckDefault">Deseo Recibir Boletin Informativo</label>
		</div>	 
	</div>		
		
	  <div class="input-group">
	  	 <label class="col-4 textderecha">Roles * </label>
	  	 <div class="col-8">
			 
			 <?php
				foreach($regroles as $regmovroles){
			?>
                <div class="form-check">
			  <input class="form-check-input" type="checkbox" id='<?php echo 'frm-rol-'.$regmovroles['id']; ?>'  value="<?php echo $regmovroles['id']; ?>">
  			  <label class="form-check-label" for="<?php echo 'frm-rol-'.$regmovroles['id']; ?>"><?php echo $regmovroles['nombre']; ?></label>
			</div>
            <?php } ?> 
			   			
		  	

	 	</div>
	 </div>
  	 	<div class="  input-group">
		 <label class="col-4 textderecha"></label>
		<div class="form-check">
  			<button type="button" class="btn btn-primary">Guardar</button>
		</div>	 
	</div>	
	  
	  
	  
	 </div>
	
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; Osboom</p>
    <ul class="list-inline">
      <li class="list-inline-item"><i class="fa fa-phone-alt"></i><a href="tel:+57 322 5971826">+57 322 5971826</a></li>
      <li class="list-inline-item"><i class="fa fa-envelope"><a href="mailto:oscesteban@hotmail.com"></i>oscesteban@hotmail.com</a></li>
      <li class="list-inline-item"><a href="#">Cartagena - Colombia</a></li>
    </ul>
  </footer>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="../js/form-validation.js"></script>
  </body>
</html>
