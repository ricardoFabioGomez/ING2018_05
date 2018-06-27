 <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
		<form  id="myForm" action="" method="post">
		<input type="hidden" name="fecha_actual" id="fecha_actual">
			<h4>Mis viajes publicados</h4>
			{if !empty($viajes)}
				{foreach from=$viajes item=viaje}
				<table class="table table-hover ">
				<thead>
				<tr>
				  <th scope="col" colspan="2"><a href="/aventon/viaje/verViaje/{$viaje->getId()}">{$viaje->getOrigen()} - {$viaje->getDestino()}</a></th> 	
				  <th scope="col" >Patente {$viaje->getVehiculo()->getPatente()}</th>
				  <th scope="col" >
					<a href="/aventon/viaje/verViaje/{$viaje->getId()}">modificar</a>	
					<a href="/aventon/viajeRecurrente/preEliminar/{$viaje->getId()}">eliminar</a>		
				  </th>
					
				</tr>
				<tr>
				  <td scope="col">Fecha</td>
				  <td scope="col">Estado</td>
				  <td scope="col">Cantidad de lugares</td>
				  <td scope="col">Acciones</td>
				</tr>
				</thead>
				<tbody>
				{if !empty($viaje->getViajesRecurrentes())}
				  {$recurrentes = $viaje->getViajesRecurrentes()}
				{foreach from=$recurrentes item=v}
									<tr>
					  <td>{$v->getFechaFrontEnd()}</td>
					  <td>{if $v->isFinalizado()}
							Finalizado
						  {/if}	
						  {if !$v->isFinalizado()}
							Pendiente
						  {/if}	
					  </td>
					  <td>
						{if $v->getLugaresDisponibles() != 0}
							Quedan {$v->getLugaresDisponibles()} lugares.
						{/if}
						{if $v->getLugaresDisponibles() == 0}
							Completo
						{/if}
					 </td>
					  <td>
						    <a href="#" onclick="listarPasajeros('{$v->getId()}','{$v->getFecha()}')">Listar viajeros</a>	
					  </td>
				</tr>
				{/foreach}	
				{else}
				<tr>
					<td colspan="4">No hay datos</td>
				</tr>
	
				{/if}

				</tbody>
			   </table>
				
				{/foreach}
			{else}
				<table class="table table-hover ">
				<thead>
				<tr>
				  <th scope="col" colspan="2">--- - ----</th> 	
				  <th scope="col" colspan="2">Patente ----</th>

				</tr>
				<tr>
				  <th scope="col">Fecha</th>
				  <th scope="col">Estado</th>
				  <th scope="col">Cantidad de lugares</th>
				  <th scope="col">Acciones</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td colspan="4">No hay datos</td>
				</tr>

				</tbody>
			   </table>
			{/if}
			</form>
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
		mensaje[mensaje.length] = "{$mensaje}";
		mostrarAvisoOpcion(mensaje,function(){
			
			window.location.href = '/aventon/viajeRecurrente/eliminar/{$preEliminar}';
		});	
	
	{else if isset($mensaje)}
		 var mensaje =  new Array();	
		mensaje[0] = "{$mensaje}";
		if(mensaje[0])
			mostrarAviso(mensaje);	
	{/if}
	
		
		
	});
	function listarPasajeros(idviaje, fecha){
	  var action =  "/aventon/viajeRecurrente/verViajeros/" + idviaje;
	  $("#fecha_actual").val(fecha);
	  $("#myForm").prop("action", action);
	  $("#myForm").submit();
	}
	</script>

