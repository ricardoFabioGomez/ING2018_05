 <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
			<h4>Mis viajes publicados</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Patente</th> 	
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Estado</th>
				  <th scope="col">Cantidad de lugares</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
			{if !empty($viajes)}
				{foreach from=$viajes item=viaje}
					<tr>
					  <th scope="row">{$viaje->getVehiculo()->getPatente()}</th>
					  <th scope="row">{$viaje->getOrigen()}</th>
					  <td>{$viaje->getDestino()}</td>
					  <td>{$viaje->getFechaFrontEnd()}</td>
					  <td>{if $viaje->isFinalizado()}
							Finalizado
						  {/if}	
						  {if !$viaje->isFinalizado()}
							Pendiente
						  {/if}	
					  </td>
					  <td>
						{if $viaje->getLugaresDisponibles() != 0}
							Quedan {$viaje->getLugaresDisponibles()} lugares.
						{/if}
						{if $viaje->getLugaresDisponibles() == 0}
							Completo
						{/if}
					 </td>
					  <td>
						  {if !$viaje->isFinalizado()}
						  <a href="/aventon/viaje/verViaje/{$viaje->getId()}">modificar</a>	<br>
						  <a href="/aventon/viaje/preEliminar/{$viaje->getId()}">eliminar</a>	<br>
						  <a href="/aventon/viaje/verViaje/{$viaje->getId()}">Ver detalle</a>

						  <br>
						 
						  {/if}
						    <a href="/aventon/viaje/verViajeros/{$viaje->getId()}">Listar viajeros</a>	
					  </td>
					  
					</tr>
				{/foreach}
				{else}
				  <tr>
					<td colspan="4"> No hay datos</td>
				  </tr>
				{/if}

			  </tbody>
			</table>
		</div>
		
	  </div>
    <!-- /.row -->
    </div>
    <!-- /.container -->
	<form id="idForm" action="">
	</form>

	<script>
	$(document).ready(function(){
	{if isset($preEliminar)}
		var mensaje =  new Array();	
		mensaje[mensaje.length] = "El viaje que intenta eliminar tiene viajeros aceptados. Si continua con la operación será penalizado.";
		mostrarAvisoOpcion(mensaje,function(){
			
			window.location.href = '/aventon/viaje/eliminar/{$preEliminar}';
		});	
	{/if}	
		
	});
	
	</script>

