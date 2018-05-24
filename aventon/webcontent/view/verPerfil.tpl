 <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-6		my-4 mb-8 border">
			
			<form action="/aventon/registracion/guardar" method="post">
			  <div class="row">
				<div class="col text-center">
				<h4 class="my-3 center">
					Mis datos 
					<button class="btn btn-primary">
						<span class="oi oi-pencil"></span>
					</button>
				</h4>
				</div>
				</div>
			   <div class="form-group row">
			    <label for="nombre" class="col col-form-label">Nombre</label>
				<input type="text" class="form-control-plaintext col" readonly name="nombre" id="nombre"  value="{$USER->getNombre()}">
			  </div>
			  <div class="form-group row">
				<label for="apellido" class="col col-form-label">Apellido</label>
				<input type="text" class="form-control-plaintext col" readonly name="apellido" id="apellido" value="{$USER->getApellido()}"  >
			  </div>
			  <div class="form-group row">
				<label for="fecha_naci" class="col col-form-label">Fecha de Nacimiento</label>
				<input type="text" class="form-control-plaintext col" readonly  name="fecha_naci" id="fecha_naci" value="{$USER->getFechaNaci()}" >
			  </div>
			  <div class="form-group row">
				<label for="dni" class="col col-form-label">Dni</label>
				<input type="text" class="form-control-plaintext col" readonly name="dni" id="dni"value="{$USER->getDni()}" >
			  </div>
			  <div class="form-group row">
				<label for="telefono" class="col col-form-label">Telefóno</label>
				<input type="text" class="form-control-plaintext col" readonly  name="telefono" id="telefono" value="{$USER->getTelefono()}"  >
			  </div>
			  <div class="form-group row" >
				<label for="direccion" class="col col-form-label">Dirección</label>
				<input type="text" class="form-control-plaintext col" readonly name="direccion" id="direccion" value="{$USER->getDireccion()}">
			  </div>
			  <div class="form-group row">
				<label for="depto" class="col col-form-label">Depto</label>
				<input type="text" class="form-control-plaintext col" readonly  name="depto" id="depto" value="{$USER->getDepto()}" >
			  </div>
			  <div class="form-group row">
				<label for="email" class="col col-form-label">Correo electronico</label>
				<input type="text" class="form-control-plaintext col" readonly  name="email" id="email" value="{$USER->getEmail()}" >
			  </div>
			  
			  <input type="submit" class="btn btn-primary" value="Actualizar"> 

			</form>
			
        </div>
      </div>
	  <script>
		 $(function () {
           //     $('#dateFechaNaci').datetimepicker();
            });
	  </script>
	
      <!-- /.row -->
    </div>
    <!-- /.container -->