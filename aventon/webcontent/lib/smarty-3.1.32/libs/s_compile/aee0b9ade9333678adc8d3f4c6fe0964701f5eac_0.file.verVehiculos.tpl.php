<?php
/* Smarty version 3.1.32, created on 2018-06-17 15:32:14
  from 'C:\xampp\htdocs\aventon\webcontent\view\verVehiculos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b26a92e213812_07298927',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aee0b9ade9333678adc8d3f4c6fe0964701f5eac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\verVehiculos.tpl',
      1 => 1529260312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b26a92e213812_07298927 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container" >
      <!-- Portfolio Item Row -->
					  
	  <div class="row justify-content-md-center" style="height:35em">
		<div class="col-6" style="overflow: auto; height: 30em">
			<h4 class="my-3 center">Mis Vehiculos</h4>	
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
				<?php if (!empty($_smarty_tpl->tpl_vars['vehiculos']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['vehiculos']->value, 'vehiculo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['vehiculo']->value) {
?>
					<tr>
					  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getPatente();?>
</th>
					  <td><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getModelo();?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getMarca();?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getCantPasajero();?>
</td>
					  <td><a href="/aventon/vehiculo/verVehiculo/<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getId();?>
">Modificar</a><br>
						<a href="/aventon/vehiculo/eliminar/<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getId();?>
">eliminar</a>
					  </td>
					  
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php } else { ?>
				  <tr>
					<td colspan="5"> No hay datos</td>
				  </tr>
				<?php }?>

			  
				

			  </tbody>
			</table>
			
		</div>
		
		
		
	  </div>
	  <div class="row justify-content-md-center" >
			<div class="col-6">
		<?php if (isset($_smarty_tpl->tpl_vars['volver']->value)) {?>
			<a class="btn btn-primary"  href="/aventon/vehiculo/nuevo">Volver al alta de vehiculo.</a>
			<?php }?>
		</div>
		</div>
	  
      <!-- /.row -->
    </div>
    <!-- /.container -->
	

	<?php echo '<script'; ?>
>
		$(document).ready(function(){
			<?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
				var mensaje =  new Array();
				mensaje[mensaje.length] = "<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
";
				mostrarAviso(mensaje);
			<?php }?>
		});
		
	<?php echo '</script'; ?>
>

<?php }
}
