<?php
/* Smarty version 3.1.32, created on 2018-05-27 01:15:47
  from 'C:\xampp\htdocs\aventon\webcontent\view\crearViaje.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b09eaa36acb41_60171748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd9d7bc99340e9cfcd6dea8ba24d5c7ba5c0f1cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\crearViaje.tpl',
      1 => 1527371799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b09eaa36acb41_60171748 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-8 my-4 mb-8 border">
			<form action="/aventon/viaje/guardar" method="post">
			  <h4 class="my-3 center">Crear Viaje</h4>
			  <div class="form-group">
				<input type="text" class="form-control" name="origen" id="origen"  placeholder="Origen">
			  </div>
			   <div class="form-group">
				<input type="text" class="form-control" name="destino" id="destino"  placeholder="Destino">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="fecha" id="fecha"  placeholder="Fecha">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="hora" id="hora"  placeholder="Hora">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="tiempo_estimado" id="tiempo_estimado"  placeholder="Duración estimada del viaje">
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
">
					<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getPatente();?>
 , <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getModelo();?>
, <?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getMarca();?>

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
			  <div class="form-group hidden">
				<label for="nombre" class="col col-form-label">Cantidad de pasajeros</label>
				<input type="text" class="form-control-plaintext col" readonly  id="cantPasajeros"  value="">
			  </div>  
			  <div class="form-group">		
				Puntual <input type="radio" class="form-control"  name="tipoViaje" id="tipoViaje" value="0" checked>
				Recurrente <input type="radio" class="form-control"  name="tipoViaje" id="tipoViaje"  value="1">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="costo" id="costo"  placeholder="Precio por Viaje">
			  </div>
			  <input type="submit" class="btn btn-primary" value="Guardar"> 

			</form>
			
        </div>
      </div>
	 <?php echo '<script'; ?>
>
		function actualizarCantidad(){
			
		}
	 <?php echo '</script'; ?>
>
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
