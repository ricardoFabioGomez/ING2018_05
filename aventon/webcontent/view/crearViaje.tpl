 <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-8 my-4 mb-8 border">
			<form action="/aventon/viaje/guardar" method="post">
			  <h4 class="my-3 center">Crear Viaje</h4>
			  <div class="form-group">
				<input type="text" class="form-control" name="origen" id="origen"  placeholder="Origen">
			  </div>
			   <div class="form-group">
				<input type="text" class="form-control" name="destino" id="destino"  placeholder="Destino">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="fecha" id="fecha"  placeholder="Fecha">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="hora" id="hora"  placeholder="Hora">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="tiempo_estimado" id="tiempo_estimado"  placeholder="Duración estimada del viaje">
			  </div>
			  <div class="form-group">
				<select class="form-control" name="id_vehiculo" id="idVehiculo" >
					{if !empty($vehiculos)}
					<option value="">Seleccione un vehiculo</option>
					{foreach from=$vehiculos item=vehiculo}
					<option value="{$vehiculo->getId()}">
					{$vehiculo->getPatente()} , {$vehiculo->getModelo()}, {$vehiculo->getMarca()}
					</option>
					{/foreach}
					{else}
					<option value="">No hay vehiculos </option>
					{/if}					
				</select>
				
			  </div>
			  <div class="form-group hidden">
				<label for="nombre" class="col col-form-label">Cantidad de pasajeros</label>
				<input type="text" class="form-control-plaintext col" readonly  id="cantPasajeros"  value="">
			  </div>  
			  <div class="form-group">		
				Puntual <input type="radio" class="form-control"  name="tipoViaje" id="tipoViaje" value="0" checked>
				Recurrente <input type="radio" class="form-control"  name="tipoViaje" id="tipoViaje"  value="1">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="costo" id="costo"  placeholder="Precio por Viaje">
			  </div>
			  <input type="submit" class="btn btn-primary" value="Guardar"> 

			</form>
			
        </div>
      </div>
	 <script>
		function actualizarCantidad(){
			
		}
	 </script>
      <!-- /.row -->
    </div>
    <!-- /.container -->