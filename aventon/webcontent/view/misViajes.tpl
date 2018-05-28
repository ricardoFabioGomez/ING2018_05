 <!-- Page Content -->
    <div class="container" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4">
		<div class="col-6">
			<h4>Mis viajes publicados</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
			{if !empty($viajes)}
				{foreach from=$viajes item=viaje}
					<tr>
					  <th scope="row">{$viaje->getOrigen()}</th>
					  <td>{$viaje->getDestino()}</td>
					  <td>{$viaje->getFecha()}</td>
					  <td>
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
	 <div class="row justify-content-md-center mb-12">
		<div class="col-6">
			<h4>Mis viajes pendientes/suscripto</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>

				  <tr>
					<td colspan="4"> No hay datos</td>
				  </tr>
			  </tbody>
			</table>
		</div>
		
	  </div>
	  
      <!-- /.row -->
    </div>
    <!-- /.container -->
	

	<script>
	</script>

