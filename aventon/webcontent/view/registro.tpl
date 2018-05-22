 <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-8 my-4 mb-8 border">
		{if isset($IS_Error) }
			HUBO UN ERROR
		{/if}
			<form action="/aventon/registracion/guardar" method="post">
			  <h4 class="my-3 center">Registrese</h4>
			  <div class="form-group">
				<input type="text" class="form-control" name="user" id="userId"  placeholder="Usuario">
			  </div>
			  <div class="form-group">
				<input type="password" class="form-control"  name="password" id="passwordId"  placeholder="Contraseña">
			  </div>
			  <div class="form-group">
				<input type="password" class="form-control"  name="password_revalidate" id="password_revalidate"  placeholder="Re-ingrese su contraseña">
			  </div>
			   <div class="form-group">
				<input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Nombre">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="apellido" id="apellido"  placeholder="Apellido">
			  </div>
			  <div class="form-group">
				<div class="input-goup date" id="dateFechaNaci">
					<input type="text" class="form-control"  name="fecha_naci" id="fecha_naci"  placeholder="Fecha de nacimiento">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="dni" id="dni"  placeholder="Número de documento">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control"  name="telefono" id="telefono"  placeholder="Telefono">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="direccion" id="direccion"  placeholder="Dirección">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control"  name="depto" id="depto"  placeholder="Nro. Depto">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control"  name="email" id="email"  placeholder="Correo electronico">
			  </div>
			  
			  <input type="submit" class="btn btn-primary" value="Login"> 

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