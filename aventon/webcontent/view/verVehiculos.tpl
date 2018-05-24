 <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div align="center" class="col-6 my-4 mb-8 align-items-center border">
			
			
			<form action="/aventon/vehiculo/guardar" method="post">
				<div align="center">
				<h4 class="my-3 center">
					Crear Vehiculo
					
			</h4>
			</div>
			   <div class="form-group row">
			    <label for="patente" class=" col-form-label col-6 ">Patente</label>
				<input type="text" class="form-control col-4" name="patente" id="patente"  >
				
			  </div>
			   <div class="form-group row">
			    <label for="modelo" class=" col-form-label col-6">Modelo</label>
				<input type="text" class="form-control col-4" name="modelo" id="modelo"  >
			  </div>
			  <div class="form-group row">
			    <label for="marcar" class=" col-form-label col-6">Marca</label>
				<input type="text" class="form-control col-4" name="marca" id="marca"  >
			  </div>
			  <div class="form-group row">
				<label for="modelo" class=" col-form-label col-6">Pasajeros</label>
				<input type="text" class="form-control col-4" name="cant_pasajeros" id="cant"  >
			  </div>		
			  
			  <input type="submit" class="btn btn-primary" value="Guardar"> 

			</form>
			
        </div>
      </div>
	  <div class="row justify-content-md-center">
		<div class="col-6">
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">patente</th>
				  <th scope="col">modelo</th>
				  <th scope="col">marca</th>
				  <th scope="col">pasajeros</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>4</td>
				  <td><a href="#">eliminar</a></td>
				</tr>

			  </tbody>
			</table>
		</div>
		
	  </div>
	  
      <!-- /.row -->
    </div>
    <!-- /.container -->