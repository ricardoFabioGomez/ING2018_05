<?php
/* Smarty version 3.1.32, created on 2018-06-26 23:56:03
  from 'C:\xampp\htdocs\aventon\webcontent\view\verViaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b32fcc387f5f2_21345833',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84e728e50197b1b7073ac12c1804b613f717517a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\verViaje.tpl',
      1 => 1530068132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b32fcc387f5f2_21345833 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row " 
	  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>style="height:40em"<?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() <> 1) {?>style="height:35em"<?php }?>>	  
		<div class="col-4" >
			<div class="row">
			<div class="col text-center">
			<h4 class="my-3 center">
				Sobre el <?php echo $_smarty_tpl->tpl_vars['viajeCreador']->value->getApellido();?>
, <?php echo $_smarty_tpl->tpl_vars['viajeCreador']->value->getNombre();?>
 
			</h4>
			Puntaje <?php echo $_smarty_tpl->tpl_vars['viajeCreador']->value->getCalificacion();?>

			<br>
			<a href="">Ver Perfil</a>
			</div>
			</div>
			
		</div>
        <div class="col-6		my-4 mb-8 border" 
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>style="overflow: auto; height: 37em"<?php }?>
	  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() <> 1) {?>style="overflow: auto; height: 30em"<?php }?>
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
				<input type="text" class="form-control-plaintext col" readonly name="nombre" id="nombre"  value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>
">
			  </div>
			  <div class="form-group row">
				<label for="apellido" class="col col-form-label">Destino</label>
				<input type="text" class="form-control-plaintext col" readonly name="apellido" id="apellido" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>
"  >
			  </div>
			  <div class="form-group row">
				<label for="apellido" class="col col-form-label">Vehiculo</label>
				<input type="text" class="form-control-plaintext col" readonly name="apellido" id="apellido" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getPatente();?>
 , <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getModelo();?>
, <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getMarca();?>
, <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getCantPasajero();?>
 personas"  >
			  </div>
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() <> 1) {?>
				<div class="form-group row">
				<label for="fecha_naci" class="col col-form-label">Fecha</label>
				<input type="text" class="form-control-plaintext col" readonly  name="fecha_naci" id="fecha_naci" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getFechaFrontEnd();?>
" >
			  </div>
			  <?php }?>
			  
			  <div class="form-group row">
				<label for="dni" class="col col-form-label">Hora</label>
				<input type="text" class="form-control-plaintext col" readonly name="dni" id="dni"value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getHora();?>
" >
			  </div>
			  <div class="form-group row">
				<label for="telefono" class="col col-form-label">Precio</label>
				<input type="text" class="form-control-plaintext col" readonly  name="telefono" id="telefono" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getCosto();?>
"  >
			  </div>
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>
			  <div class="form-group row justify-content-md-center">
				  <?php $_smarty_tpl->_assignInScope('dias', $_smarty_tpl->tpl_vars['viaje']->value->getDias());?>
				  <span class="col-md-1 border <?php if ($_smarty_tpl->tpl_vars['dias']->value['L'] == '1') {?> btn-success <?php }?> "> L</span>
				  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["M"] == "1") {?> btn-success <?php }?> ">M</span>
				  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["X"] == "1") {?> btn-success <?php }?>">X</span>
				  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["J"] == "1") {?> btn-success <?php }?>">J</span>
				  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["V"] == "1") {?> btn-success <?php }?>">V</span>
				  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["S"] == "1") {?> btn-success <?php }?>">S</span>
				  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["D"] == "1") {?> btn-success <?php }?>">D</span>
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
			<?php if (!empty($_smarty_tpl->tpl_vars['viajesRecurrente']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viajesRecurrente']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
					<tr>
					  <td scope="row">
					   <?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() <> 0) {?>
						<input type="radio" onclick="seleccionado(this)" name="fecha_seleccionada" class="fecha_seleccionada" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->getFechaFrontEnd();?>
">
					  <?php }?>
					  <?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() == 0) {?>
					  <input type="radio" disabled name="fecha_seleccionada" class="fecha_seleccionada" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->getFechaFrontEnd();?>
">
						
					  <?php }?>
						
					  </td>
					  <td scope="row"><?php echo $_smarty_tpl->tpl_vars['v']->value->getFechaFrontEnd();?>
</td>
					  <td>
					  <?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() <> 0) {?>
						Quedan <?php echo $_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles();?>
 lugares.
					  <?php }?>
					  <?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() == 0) {?>
						No hay lugar.
					  <?php }?>
					  
					  
					  </td>
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php } else { ?>
				  <tr>
					<td colspan="3"> No hay datos</td>
				  </tr>
				<?php }?>

			  </tbody>
			</table>  
				
				</div>
							
			  </div>
			  
			   <div class="form-group row justify-content-md-center">
				<label for="telefono" class="col-form-label">Agregar una nueva fecha</label>
				<input onchange="seleccionadoString(this)" onblur="seleccionadoString(this)" onkeydown="seleccionadoString(this)" onkeypress="seleccionadoString(this)" type="text" class="form-control col-3 ml-3"    id="fecha_nueva" value="" maxlength="10"  >
			  </div>
			   
			  <?php if (!$_smarty_tpl->tpl_vars['esMiViaje']->value) {?>
			  <div class="form-group row justify-content-md-center">
				
			  
			  <a href="#" onclick="reservar()" class="btn btn-primary col-3">Reservar Viaje</a>
			  
			  
				
			  </div>
			  <?php }?>
			  <?php }?>
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() <> 1) {?>
			  
			  <?php if (!$_smarty_tpl->tpl_vars['esMiViaje']->value) {?>
			  <div class="form-group row justify-content-md-center">
			  		
			  <?php if (($_smarty_tpl->tpl_vars['estado']->value == 5 || $_smarty_tpl->tpl_vars['estado']->value == 2) && $_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() > 0) {?>
			  <a href="#" onclick="reservar()" class="btn btn-primary col-3">Reservar Viaje</a>
			  <?php }?>	
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() <= 0) {?>	  
				<a href="#"  class="btn disabled btn-primary col-3">No hay lugar</a>
			  <?php }?>
			  </div>
			  <?php }?>
			  <?php }?>
			<input type="hidden" id="fechaReal" name="fecha_nueva"> 
			<input type="hidden" id="idViaje" name="id_viaje_" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
"> 
			<input type="hidden" id="tipoViaje" name="tipo_viaje" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje();?>
"> 
			</form>
        </div>
      </div>
	  <?php echo '<script'; ?>
>
		$(document).ready(function(){
			<?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
			var mensaje =  new Array();
			mensaje[mensaje.length] = "<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
";
			mostrarAviso(mensaje);	
			<?php }?>
			
			
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
		 var estado = "<?php echo $_smarty_tpl->tpl_vars['estado']->value;?>
"
		 var tipoViaje = "<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje();?>
";	
		 var dias = new Array();
		 <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>
		   <?php $_smarty_tpl->_assignInScope('dias', $_smarty_tpl->tpl_vars['viaje']->value->getDias());?>
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value['D'] == '1') {?> true<?php } else { ?> false<?php }?>; 
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value["L"] == "1") {?> true <?php } else { ?> false <?php }?>;
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value["M"] == "1") {?> true <?php } else { ?> false <?php }?>;
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value["X"] == "1") {?> true <?php } else { ?> false <?php }?>;
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value["J"] == "1") {?> true <?php } else { ?> false <?php }?>;
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value["V"] == "1") {?> true <?php } else { ?> false <?php }?>;
		   dias[dias.length] = <?php if ($_smarty_tpl->tpl_vars['dias']->value["S"] == "1") {?> true <?php } else { ?> false <?php }?>;
		 <?php }?> 		
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
					<?php if (!empty($_smarty_tpl->tpl_vars['viajesRecurrente']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viajesRecurrente']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
					  <?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() == 0) {?>
						if($("#fecha_nueva").val() == "<?php echo $_smarty_tpl->tpl_vars['v']->value->getFechaFrontEnd();?>
"){
							mensaje[mensaje.length] = "El viaje en la fecha <?php echo $_smarty_tpl->tpl_vars['v']->value->getFechaFrontEnd();?>
 se encuentra completo, por favor seleccione otra Fecha .";			
						}
					  <?php }?>
				
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php }?>	
				
				
						
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
							$("#idForm").prop("action","/aventon/viaje/cancelarReserva/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
");
							$("#idForm").submit();
						});	
					
					}else{
						
					}
				});
	
          });
	  <?php echo '</script'; ?>
>
	
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
