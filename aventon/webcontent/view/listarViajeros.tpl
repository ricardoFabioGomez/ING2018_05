 <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
			<h4>Listar Viajeros</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Apellido</th>
				  <th scope="col">Estado</th>
				  <th scope="col">Reputación</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
			{if !empty($viajeros)}
				{foreach from=$viajeros item=v}
					<tr>
					  <th scope="row">{$v->getNombre()}</th>
					  <td>{$v->getApellido()}</td>
					  <td>
					  {if $v->getEstado() == "0"}
						 Esperando confirmación.
					 {/if}
					 {if $v->getEstado() == "1"}
						Aprobado.
					 {/if}
					 {if $v->getEstado() == "3"}
						Realizo Pago, es Espera de verificación.
					 {/if}
					  
					  </td>
					  <td>{$v->getCalificacion()}</td>
					  <td>
						
						  {if !$viaje->isFinalizado()}
							  
							 {if ($v->getEstado() == "0" || $v->getEstado() == 0) && $viaje->getLugaresDisponibles() > 0}
								 {if $viaje->getTipoViaje() == 1}
									<a href="/aventon/viajeRecurrente/aceptaViajero/{$viaje->getId()}/{$v->getIdViajero()}">Aceptar</a><br>
								 {else}
									<a href="/aventon/viaje/aceptaViajero/{$viaje->getId()}/{$v->getUserId()}">Aceptar</a><br>
								 {/if}
								
							 {/if}
							 {if $v->getEstado() != "3"}
							 {if $viaje->getTipoViaje() == 1}
								<a href="#" onclick="rechazarRecurrente('{$viaje->getId()}','{$v->getIdViajero()}', '{$v->getEstado()}')">Rechazar</a>	
							
							 {else}
								<a href="#" onclick="rechazar('{$viaje->getId()}','{$v->getUserId()}', '{$v->getEstado()}')">Rechazar</a>	
							 {/if}
							
							{/if}
						  {/if}
						  {if $viaje->isFinalizado()}
							{if ($v->getEstado() == "1" || $v->getEstado() == 1) }
								 {if $viaje->getTipoViaje() == 1}
									<a href="/aventon/puntuar/">Puntuar viajero</a><br>
								 {else}
									<a href="/aventon/puntuar/">Puntuar viajero</a><br>
								 {/if}
								
							 {/if}	
							
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
	<form id="idForm" action="" method="POST">
		<input type="hidden" name="penalty" id="penalty">
	</form> 
	<script>
		function rechazar(idViaje, idUsuario, estado){
			if(estado == "1"){
				var mensaje =  new Array();	
				mensaje[mensaje.length] = "El viajero que quiere rechazar ya fue aceptado, si continua será penalizado.";
				mostrarAvisoOpcion(mensaje,function(){
				$("#penalty").val("true");	
				$("#idForm").prop("action", "/aventon/viaje/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();	
				});	
			}else{
				$("#idForm").prop("action", "/aventon/viaje/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();	
			}
		}
		function rechazarRecurrente(idViaje, idUsuario, estado){
			if(estado == "1"){
				var mensaje =  new Array();	
				mensaje[mensaje.length] = "El viajero que quiere rechazar ya fue aceptado, si continua será penalizado.";
				mostrarAvisoOpcion(mensaje,function(){
				$("#penalty").val("true");	
				$("#idForm").prop("action", "/aventon/viajeRecurrente/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();
				});	
			}else{
				$("#idForm").prop("action", "/aventon/viajeRecurrente/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();
			}
			
		}
	</script>

	<script>
	</script>

