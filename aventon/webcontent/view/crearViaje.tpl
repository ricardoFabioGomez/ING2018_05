 <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-6 my-4 mb-8 border">
			<form  id="myForm" action="/aventon/viaje/guardar" method="post">
			  <h4 class="my-3 center">Crear Viaje</h4>
			  <div class="form-group">
				<!--input type="hidden" name="tipo_viaje" id="puntual" value="0" /-->
				<input type="text" class="form-control" name="origen" id="origen" value="{$viaje->getOrigen()}"  placeholder="Origen">
			  </div>
			   <div class="form-group">
				<input type="text" class="form-control" name="destino" id="destino" value="{$viaje->getDestino()}"  placeholder="Destino">
			  </div>
			  <div class="custom-control custom-radio custom-control-inline mb-2">
				  <input type="radio" name="tipo_viaje" id="puntual" value="0" checked class="custom-control-input">
				  <label class="custom-control-label" for="puntual">Viaje Puntual</label>
			   </div>
				<div class="custom-control custom-radio custom-control-inline">
				  <input type="radio"  name="tipo_viaje" id="recurrente" value="1" class="custom-control-input">
				  <label class="custom-control-label" for="recurrente">Viaje Recurrente</label>
				</div> 
			  <div class="form-group" id="buttons_dias" style="display:none">
				<button type="button" class="btn" onclick="selectDay('lunes',this)">L</button>
				<button type="button" class="btn" onclick="selectDay('martes',this)">M</button>
				<button type="button" class="btn" onclick="selectDay('miercoles',this)">X</button>
				<button type="button" class="btn" onclick="selectDay('jueves',this)">J</button>
				<button type="button" class="btn" onclick="selectDay('viernes',this)">V</button>
				<button type="button" class="btn" onclick="selectDay('sabado',this)">S</button>
				<button type="button" class="btn" onclick="selectDay('domingo',this)">D</button>
			  </div>
			  <div id="buttons_dias_real" style="display:none">
				<input name="dias[]" id="lunes" type="checkbox" value="L">
				<input name="dias[]" id="martes" type="checkbox" value="M">
				<input name="dias[]" id="miercoles" type="checkbox" value="X">
				<input name="dias[]" id="jueves" type="checkbox" value="J">
				<input name="dias[]" id="viernes" type="checkbox" value="V">
				<input name="dias[]" id="sabado" type="checkbox" value="S">
				<input name="dias[]" id="domingo" type="checkbox" value="D">
			  </div>			  
			  <div class="form-group row">
				<input type="text" class="form-control col-3 ml-3" name="fecha" id="fecha" value="{$viaje->getFecha()}"  placeholder="Fecha">
				<input type="text" class="form-control col-2 ml-2" name="hora" id="hora" value="{$viaje->getHora()}" placeholder="HH:mm" maxlength="5" >
				<input type="text" class="form-control col-2 ml-2" name="tiempo_estimado" value="{$viaje->getTiempoEstimado()}" id="tiempo_estimado"  placeholder="Duración estimada del viaje">
				<input type="text" class="form-control col-3 ml-2" name="costo" id="costo" value="{$viaje->getCosto()}" placeholder="Precio por Viaje">
			  </div>
			  <div class="form-group">
				<select class="form-control" name="id_vehiculo" id="idVehiculo" >
					{if !empty($vehiculos)}
					<option value="">Seleccione un vehiculo</option>
					{foreach from=$vehiculos item=vehiculo}
					<option value="{$vehiculo->getId()}" 
					{if $viaje->getIdVehiculo() == $vehiculo->getId()}
					selected
					{/if}>
					{$vehiculo->getPatente()} , {$vehiculo->getModelo()}, {$vehiculo->getMarca()}, {$vehiculo->getCantPasajero()} personas
					</option>
					{/foreach}
					{else}
					<option value="">No hay vehiculos </option>
					{/if}					
				</select>
				
			  </div>
			  <button class="btn btn-primary" type="button" onclick="validarCampos()"> 
				Guardar
			  </button>
			</form>
			
        </div>
      </div>
	 <script>
		$(document).ready(function(){
			{if isset($mensaje)}
				var mensaje =  new Array();
				mensaje[mensaje.length] = "{$mensaje}";
				mostrarAviso(mensaje);
			{/if}
			$("#fecha").datepicker({ minDate:"0D", maxDate: null, dateFormat:"dd/mm/yy"});	
			$("#recurrente").click(function(){
				$("#buttons_dias").show();
				$("#fecha").hide();
				$("#fecha").val("");
				
			});
			$("#puntual").click(function(){
				$("#buttons_dias").hide();
				$("#fecha").show();
				$.each($("#buttons_dias").children(), function(){
					$(this).removeClass("btn-success");
				});
				$.each($("#buttons_dias_real").children(), function(){
					$(this).prop("checked", false);
				});
			});
			{if $viaje->getTipoViaje() == 1 }
				$("#recurrente").trigger("click");
			{/if}
		});
		{literal}
		function selectDay(day,obj){
			if($(obj).hasClass("btn-success")){
				$(obj).removeClass("btn-success");
				$("#"+day).prop("checked", false);
			}
			else{
				$(obj).addClass("btn-success");
				$("#"+day).prop("checked", true);
			}
			
		}
		function validarCampos(){
			var mensaje =  new Array();
			var campos =  [{"name":"origen","descripcion":"Origen"},
						   {"name":"destino","descripcion":"Destino"}, 
						   {"name":"hora","descripcion":"Hora"}, 
						   {"name":"tiempo_estimado","descripcion":"Tiempo Estimado"}, 
						   {"name":"costo","descripcion":"Precio"}, 
						   {"name":"idVehiculo","descripcion":"Vehiculo"}]
			//valido los campos requeridos
			$.each(campos, function(key, value){
				if(!$("#"+value.name).val()){
					mensaje[mensaje.length] = "El campo "+value.descripcion+" es requerido.";
				}
			});
			var res = /^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/;
			if(!res.test($("#hora").val())){
					mensaje[mensaje.length] = "El formato del campo hora es incorrecto.";
			}
			//valido los dias recurrentes
			if($("#recurrente").prop("checked")){
				var isChecked = false;
				$.each($("#buttons_dias_real").children(), function(){
					isChecked = isChecked || $(this).prop("checked");
				});
				if(!isChecked){
					mensaje[mensaje.length] = "Debe seleccionar algun día.";
				}
			}
			if(mensaje.length > 0){
				mostrarAviso(mensaje);	
				return false;
			}
			else{
				if($("#recurrente").prop("checked")){
					$("#myForm").prop("action","/aventon/viajeRecurrente/guardar");
				}
				$("#myForm").submit();
				return true;
			}
			
		}
		{/literal}	
	 </script>
      <!-- /.row -->
    </div>
    <!-- /.container -->