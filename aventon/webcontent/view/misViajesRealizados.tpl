 <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	<div class="row justify-content-md-center" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
			<h4>Mis viajes pendientes/suscripto</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Patente</th>	
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Estado</th>
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
							  {if $viaje->getAceptado() == 0}
								Esperando Aprobación.
							  {/if}   		
							  {if $viaje->getAceptado() == 1}
								Aceptado.
							  {/if}  
							  {if $viaje->getAceptado() == 2}
								Rechazado.
							  {/if} 
						  {/if}	
					  </td>
					  <td>
						  {if !$viaje->isFinalizado()}
						  <a href="/aventon/viaje/verViaje/{$viaje->getId()}">Ver detalle</a>
						  
						  {/if}
						  {if $viaje->isFinalizado()}
						   <a href="/aventon/viaje/verViaje/{$viaje->getId()}">Puntuar Conductor</a>
						  
						  {/if}
						
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
	

	<script>
	</script>

