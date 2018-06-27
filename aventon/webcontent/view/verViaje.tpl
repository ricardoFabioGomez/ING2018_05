 <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row " 
	  {if $viaje->getTipoViaje() ==  1}style="height:40em"{/if}
	  {if $viaje->getTipoViaje() <>  1}style="height:35em"{/if}>	  
		<div class="col-4" >
			<div class="row">
			<div class="col text-center">
			<h4 class="my-3 center">
				Sobre el {$viajeCreador->getApellido()}, {$viajeCreador->getNombre()} 
			</h4>
			Puntaje {$viajeCreador->getCalificacion()}
			<br>
			<a href="">Ver Perfil</a>
			</div>
			</div>
			
		</div>
        <div class="col-6		my-4 mb-8 border" 
			  {if $viaje->getTipoViaje() ==  1}style="overflow: auto; height: 37em"{/if}
	  {if $viaje->getTipoViaje() <>  1}style="overflow: auto; height: 30em"{/if}
		>
			<form id="idForm" action="/aventon/viaje/verViaje" method="post">
			  <div class="row">
				<div class="col text-center">
				<h4 class="my-3 center">
					Ver Viaje.
				</h4>
				</div>
				</div>
			   <div class="form-group row">
			    <label for="nombre" class="col col-form-label">Origen</label>
				<input type="text" class="form-control-plaintext col" readonly name="nombre" id="nombre"  value="{$viaje->getOrigen()}">
			  </div>
			  <div class="form-group row">
				<label for="apellido" class="col col-form-label">Destino</label>
				<input type="text" class="form-control-plaintext col" readonly name="apellido" id="apellido" value="{$viaje->getDestino()}"  >
			  </div>
			  <div class="form-group row">
				<label for="apellido" class="col col-form-label">Vehiculo</label>
				<input type="text" class="form-control-plaintext col" readonly name="apellido" id="apellido" value="{$vehiculo->getPatente()} , {$vehiculo->getModelo()}, {$vehiculo->getMarca()}, {$vehiculo->getCantPasajero()} personas"  >
			  </div>
			  {if $viaje->getTipoViaje() <>  1}
				<div class="form-group row">
				<label for="fecha_naci" class="col col-form-label">Fecha</label>
				<input type="text" class="form-control-plaintext col" readonly  name="fecha_naci" id="fecha_naci" value="{$viaje->getFechaFrontEnd()}" >
			  </div>
			  {/if}
			  
			  <div class="form-group row">
				<label for="dni" class="col col-form-label">Hora</label>
				<input type="text" class="form-control-plaintext col" readonly name="dni" id="dni"value="{$viaje->getHora()}" >
			  </div>
			  <div class="form-group row">
				<label for="telefono" class="col col-form-label">Precio</label>
				<input type="text" class="form-control-plaintext col" readonly  name="telefono" id="telefono" value="{$viaje->getCosto()}"  >
			  </div>
			  {if $viaje->getTipoViaje() ==  1}
			  <div class="form-group row justify-content-md-center">
				  {$dias = $viaje->getDias()}
				  <span class="col-md-1 border {if $dias['L'] == '1'} btn-success {/if} "> L</span>
				  <span class="col-md-1 border{if $dias["M"] == "1"} btn-success {/if} ">M</span>
				  <span class="col-md-1 border{if $dias["X"] == "1"} btn-success {/if}">X</span>
				  <span class="col-md-1 border{if $dias["J"] == "1"} btn-success {/if}">J</span>
				  <span class="col-md-1 border{if $dias["V"] == "1"} btn-success {/if}">V</span>
				  <span class="col-md-1 border{if $dias["S"] == "1"} btn-success {/if}">S</span>
				  <span class="col-md-1 border{if $dias["D"] == "1"} btn-success {/if}">D</span>
			  </div>
			  <div class="form-group row justify-content-md-center">
				
				<div class="col-md-8" >
				<h6>Mis viajes publicados</h6>
				
			<table class="table table-hover "  >
			  <thead>
				<tr>
				  <th scope="col"></th> 	
				  <th scope="col">Fecha</th>
				  <th scope="col">Cantidad de lugares</th>
				</tr>
			  </thead>
			  <tbody style="overflow: auto; height: 5em">
			{if !empty($viajesRecurrente)}
				{foreach from=$viajesRecurrente item=v}
					<tr>
					  <td scope="row">
					   {if $v->getLugaresDisponibles() <> 0}
						<input type="radio" onclick="seleccionado(this)" name="fecha_seleccionada" class="fecha_seleccionada" value="{$v->getFechaFrontEnd()}">
					  {/if}
					  {if $v->getLugaresDisponibles() == 0}
					  <input type="radio" disabled name="fecha_seleccionada" class="fecha_seleccionada" value="{$v->getFechaFrontEnd()}">
						
					  {/if}
						
					  </td>
					  <td scope="row">{$v->getFechaFrontEnd()}</td>
					  <td>
					  {if $v->getLugaresDisponibles() <> 0}
						Quedan {$v->getLugaresDisponibles()} lugares.
					  {/if}
					  {if $v->getLugaresDisponibles() == 0}
						No hay lugar.
					  {/if}
					  
					  
					  </td>
					</tr>
				{/foreach}
				{else}
				  <tr>
					<td colspan="3"> No hay datos</td>
				  </tr>
				{/if}

			  </tbody>
			</table>  
				
				</div>
							
			  </div>
			  
			   <div class="form-group row justify-content-md-center">
				<label for="telefono" class="col-form-label">Agregar una nueva fecha</label>
				<input onchange="seleccionadoString(this)" onblur="seleccionadoString(this)" onkeydown="seleccionadoString(this)" onkeypress="seleccionadoString(this)" type="text" class="form-control col-3 ml-3"    id="fecha_nueva" value="" maxlength="10"  >
			  </div>
			   
			  {if ! $esMiViaje}
			  <div class="form-group row justify-content-md-center">
				
			  
			  <a href="#" onclick="reservar()" class="btn btn-primary col-3">Reservar Viaje</a>
			  
			  
				
			  </div>
			  {/if}
			  {/if}
			  {if $viaje->getTipoViaje() <>  1}
			  
			  {if ! $esMiViaje}
			  <div class="form-group row justify-content-md-center">
			  		
			  {if  ($estado == 5 || $estado == 2) && $viaje->getLugaresDisponibles() > 0 }
			  <a href="#" onclick="reservar()" class="btn btn-primary col-3">Reservar Viaje</a>
			  {/if}	
			  {if  $viaje->getLugaresDisponibles() <= 0}	  
				<a href="#"  class="btn disabled btn-primary col-3">No hay lugar</a>
			  {/if}
			  </div>
			  {/if}
			  {/if}
			<input type="hidden" id="fechaReal" name="fecha_nueva"> 
			<input type="hidden" id="idViaje" name="id_viaje_" value="{$viaje->getId()}"> 
			<input type="hidden" id="tipoViaje" name="tipo_viaje" value="{$viaje->getTipoViaje()}"> 
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
			
			
			$("#fecha_nueva").datepicker({ minDate:"0D", maxDate: null, dateFormat:"dd/mm/yy"});	
			for(var i = 0, cant = 7; i < cant; i ++){
				if(dias[i]){
					//$(".ui-datepicker-calendar td:eq( "+i+" )").css("background","red !important");		
					var algo = $("#ui-datepicker-div");
					//alert($("#ui-datepicker-div").html());
					//alert(algo.find(".ui-datepicker-calendar").length);
				}
				
			}
			
		});
		 var estado = "{$estado}"
		 var tipoViaje = "{$viaje->getTipoViaje()}";	
		 var dias = new Array();
		 {if $viaje->getTipoViaje() == 1}
		   {$dias = $viaje->getDias()}
		   dias[dias.length] = {if $dias['D'] == '1'} true{else} false{/if}; 
		   dias[dias.length] = {if $dias["L"] == "1"} true {else} false {/if};
		   dias[dias.length] = {if $dias["M"] == "1"} true {else} false {/if};
		   dias[dias.length] = {if $dias["X"] == "1"} true {else} false {/if};
		   dias[dias.length] = {if $dias["J"] == "1"} true {else} false {/if};
		   dias[dias.length] = {if $dias["V"] == "1"} true {else} false {/if};
		   dias[dias.length] = {if $dias["S"] == "1"} true {else} false {/if};
		 {/if} 		
		 function seleccionado(ob){
			 if($(ob).prop("checked")){
				 $("#fecha_nueva").val("");
			 }
		 }
		function seleccionadoString(ob){
			
			 if($(ob).val()){
			
				 $(".fecha_seleccionada").prop("checked", false);
			 }
		 }		 
		 function reservar(){
			 var mensaje =  new Array();	
			 if(tipoViaje == "1"){
				 
				 var flag = false;
				 var fecha= "";
				 $(".fecha_seleccionada").each(function(){
					 if($(this).prop("checked")){
						 flag = true;
						 fecha = $(this).val();
					 }
				 });
				 if( !flag && !$("#fecha_nueva").val()){
					mensaje[mensaje.length] = "Debe seleccionar alguna de las fechas o ingresar una nueva.";			 
				 }else if($("#fecha_nueva").val()){
					var dateString = $("#fecha_nueva").val().split("/");
					var date = new Date(dateString[2], dateString[1] - 1, dateString[0]);
					{if !empty($viajesRecurrente)}
				{foreach from=$viajesRecurrente item=v}
					  {if $v->getLugaresDisponibles() == 0}
						if($("#fecha_nueva").val() == "{$v->getFechaFrontEnd()}"){
							mensaje[mensaje.length] = "El viaje en la fecha {$v->getFechaFrontEnd()} se encuentra completo, por favor seleccione otra Fecha .";			
						}
					  {/if}
				
				{/foreach}
				{/if}	
				
				
						
					if(!dias[date.getDay()]){
					 mensaje[mensaje.length] = "Debe seleccionar una fecha que se encuentre dentro de los dias posibles.";			
					}else{
						fecha = $("#fecha_nueva").val();
					}	
				 }else if(flag){
					 //fecha = fecha;
				 }
				 

				 
				 if(mensaje.length > 0){
					 mostrarAviso(mensaje);	 
				 }
				 else{
					 $("#fechaReal").val(fecha);
					$("#idForm").prop("action", "/aventon/pago");	
					$("#idForm").submit();
					
				 }
				 
					
			 }else{
				 $("#idForm").prop("action", "/aventon/pago");	
				 $("#idForm").submit();
			 }
			 
		 }
		 
		 
		 
		 $(function () {
					
				$("#cancelar").click(function(){
					var mensaje =  new Array();	
					if(estado == "1"){
							mensaje[mensaje.length] = "Su reserva se encuentra aceptada, si la cancela será penalizado.";
					  	mostrarAvisoOpcion(mensaje,function(){
							$("#idForm").prop("action","/aventon/viaje/cancelarReserva/{$viaje->getId()}");
							$("#idForm").submit();
						});	
					
					}else{
						
					}
				});
	
          });
	  </script>
	
      <!-- /.row -->
    </div>
    <!-- /.container -->