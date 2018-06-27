 <!-- Page Content -->
    <div class="container" >
      <!-- Portfolio Item Row -->
					  
	  <div class="row justify-content-md-center" style="height:35em">
		<div class="col-6" style="overflow: auto; height: 30em">
			<h4 class="my-3 center">Mis Vehiculos</h4>	
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
				{if !empty($vehiculos)}
				{foreach from=$vehiculos item=vehiculo}
					<tr>
					  <th scope="row">{$vehiculo->getPatente()}</th>
					  <td>{$vehiculo->getModelo()}</td>
					  <td>{$vehiculo->getMarca()}</td>
					  <td>{$vehiculo->getCantPasajero()}</td>
					  <td><a href="/aventon/vehiculo/verVehiculo/{$vehiculo->getId()}">Modificar</a><br>
						<a href="/aventon/vehiculo/eliminar/{$vehiculo->getId()}">eliminar</a>
					  </td>
					  
					</tr>
				{/foreach}
				{else}
				  <tr>
					<td colspan="5"> No hay datos</td>
				  </tr>
				{/if}

			  
				

			  </tbody>
			</table>
			
		</div>
		
		
		
	  </div>
	  <div class="row justify-content-md-center" >
			<div class="col-6">
		{if isset($volver)}
			<a class="btn btn-primary"  href="/aventon/vehiculo/nuevo">Volver al alta de vehiculo.</a>
			{/if}
		</div>
		</div>
	  
      <!-- /.row -->
    </div>
    <!-- /.container -->
	

	<script>
		$(document).ready(function(){
			{if isset($mensaje)}
				var mensaje =  new Array();
				mensaje[mensaje.length] = "{$mensaje}";
				mostrarAviso(mensaje);
			{/if}
		});
		
	</script>

