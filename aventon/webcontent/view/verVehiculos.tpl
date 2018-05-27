 <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div align="center" class="col-6 my-4 mb-8 align-items-center border">
			
			
			<form id="myForm" action="/aventon/vehiculo/guardar" method="post">
				<div align="center">
				<h4 class="my-3 center">
					Crear Vehiculo
					
			</h4>
			</div>
			   <div class="form-group row">
			    <label for="patente" class=" col-form-label col-4 ">* Patente</label>
				<input type="text" class="form-control col-4" name="patente" id="patente" value="{$vehiculo->getPatente()}" >(Ej. ABC123)
				
			  </div>
			   <div class="form-group row">
			    <label for="modelo" class=" col-form-label col-4">* Modelo</label>
				<input type="text" class="form-control col-4" name="modelo" id="modelo"  value="{$vehiculo->getModelo()}">
			  </div>
			  <div class="form-group row">
			    <label for="marcar" class=" col-form-label col-4">* Marca</label>
				<input type="text" class="form-control col-4" name="marca" id="marca" value="{$vehiculo->getMarca()}" >
			  </div>
			  <div class="form-group row">
				<label for="cant" class=" col-form-label col-4">* Pasajeros</label>
				<select class="form-control col-4" name="cant_pasajeros" id="cant" value="{$vehiculo->getCantPasajero()}">
					<option value="">Seleccione</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			  </div>		
			  
			  <button class="btn btn-primary" type="button" onclick="validarCampos()">
				Guardar
			  </button>
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
				{if !empty($vehiculos)}
				{foreach from=$vehiculos item=vehiculo}
					<tr>
					  <th scope="row">{$vehiculo->getPatente()}</th>
					  <td>{$vehiculo->getModelo()}</td>
					  <td>{$vehiculo->getMarca()}</td>
					  <td>{$vehiculo->getCantPasajero()}</td>
					  <td><a href="/aventon/vehiculo/eliminar/{$vehiculo->getId()}">eliminar</a></td>
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
	  
      <!-- /.row -->
    </div>
    <!-- /.container -->
	
{literal}
	<script>
		function validarCampos(){
			var mensaje =  new Array();
			   
			if(!$("#patente").val()){
				mensaje[mensaje.length] = "La patente es requerida";
			}
			else if(!/^[A-Z]{3}\d{3}$/.test($("#patente").val())){
				mensaje[mensaje.length] = "La patente tiene un formato invalido";
			}
			if(!$("#modelo").val()){
				mensaje[mensaje.length] = "El modelo es requerido";
			}
			if(!$("#marca").val()){
				mensaje[mensaje.length] = "La marca es requerida";
			}
			if(!$("#cant").val()){
				mensaje[mensaje.length] = "La cantidad es requerida";
			}
			if(mensaje.length > 0){
				mostrarAviso(mensaje);	
				return false;
			}
			else{
				$("#myForm").submit();
				return true;
			}
			
		}
	</script>

{/literal}