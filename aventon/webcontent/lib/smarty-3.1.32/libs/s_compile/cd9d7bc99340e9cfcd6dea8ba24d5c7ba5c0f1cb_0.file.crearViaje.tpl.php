<?php
/* Smarty version 3.1.32, created on 2018-06-24 12:52:09
  from 'C:\xampp\htdocs\aventon\webcontent\view\crearViaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2fbe29da6ff2_81278957',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd9d7bc99340e9cfcd6dea8ba24d5c7ba5c0f1cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\crearViaje.tpl',
      1 => 1529855525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2fbe29da6ff2_81278957 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-6 my-4 mb-8 border">
			<form  id="myForm" action="/aventon/viaje/guardar" method="post">
			  <h4 class="my-3 center">Crear Viaje</h4>
			  <div class="form-group">
				<!--input type="hidden" name="tipo_viaje" id="puntual" value="0" /-->
				<input type="text" class="form-control" name="origen" id="origen" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>
"  placeholder="Origen">
			  </div>
			   <div class="form-group">
				<input type="text" class="form-control" name="destino" id="destino" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>
"  placeholder="Destino">
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
				<input type="text" class="form-control col-3 ml-3" name="fecha" id="fecha" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getFecha();?>
"  placeholder="Fecha">
				<input type="text" class="form-control col-2 ml-2" name="hora" id="hora" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getHora();?>
" placeholder="HH:mm" maxlength="5" >
				<input type="text" class="form-control col-2 ml-2" name="tiempo_estimado" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getTiempoEstimado();?>
" id="tiempo_estimado"  placeholder="Duración estimada del viaje">
				<input type="text" class="form-control col-3 ml-2" name="costo" id="costo" value="<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getCosto();?>
" placeholder="Precio por Viaje">
			  </div>
			  <div class="form-group">
				<select class="form-control" name="id_vehiculo" id="idVehiculo" >
					<?php if (!empty($_smarty_tpl->tpl_vars['vehiculos']->value)) {?>
					<option value="">Seleccione un vehiculo</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vehiculos']->value, 'vehiculo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vehiculo']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getId();?>
" 
					<?php if ($_smarty_tpl->tpl_vars['viaje']->value->getIdVehiculo() == $_smarty_tpl->tpl_vars['vehiculo']->value->getId()) {?>
					selected
					<?php }?>>
					<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getPatente();?>
 , <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getModelo();?>
, <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getMarca();?>
, <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getCantPasajero();?>
 personas
					</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php } else { ?>
					<option value="">No hay vehiculos </option>
					<?php }?>					
				</select>
				
			  </div>
			  <button class="btn btn-primary" type="button" onclick="validarCampos()"> 
				Guardar
			  </button>
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
			<?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>
				$("#recurrente").trigger("click");
			<?php }?>
		});
		
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
			
	 <?php echo '</script'; ?>
>
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
