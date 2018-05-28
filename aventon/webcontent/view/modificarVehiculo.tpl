 <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div align="center" class="col-6 my-4 mb-8 align-items-center border">
			
			
			<form id="myForm" action="/aventon/vehiculo/modificar" method="post">
				<div align="center">
				<h4 class="my-3 center">
					Modificar Vehiculo
					
			</h4>
			</div>
			   <div class="form-group row">
			    <label for="patente" class=" col-form-label col-4 ">* Patente</label>
				<input type="text" class="form-control col-4" readonly name="patente" id="patente" value="{$vehiculo->getPatente()}" >(Ej. ABC123)
				
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
				<select class="form-control col-4" name="cant_pasajeros" id="cant" >
					<option value="">Seleccione</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			  </div>		
			  <input name="id" type="hidden" value="{$vehiculo->getId()}">
			  <button class="btn btn-primary" type="button" onclick="validarCampos()">
				Modificar
			  </button>
			</form>
			
        </div>
      </div>
	 
      <!-- /.row -->
    </div>
    <!-- /.container -->
	

	<script>
		$(document).ready(function(){
			var cant = "{$vehiculo->getCantPasajero()}";
			$("#cant").val(cant);
		});

		{literal}
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
		{/literal}
	</script>

