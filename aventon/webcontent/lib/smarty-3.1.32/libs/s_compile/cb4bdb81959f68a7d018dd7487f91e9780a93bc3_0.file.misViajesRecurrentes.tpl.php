<?php
/* Smarty version 3.1.32, created on 2018-06-27 00:58:17
  from 'C:\xampp\htdocs\aventon\webcontent\view\misViajesRecurrentes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b330b5950ebe4_14831789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb4bdb81959f68a7d018dd7487f91e9780a93bc3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\misViajesRecurrentes.tpl',
      1 => 1530071892,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b330b5950ebe4_14831789 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
		<form  id="myForm" action="" method="post">
		<input type="hidden" name="fecha_actual" id="fecha_actual">
			<h4>Mis viajes publicados</h4>
			<?php if (!empty($_smarty_tpl->tpl_vars['viajes']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viajes']->value, 'viaje');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['viaje']->value) {
?>
				<table class="table table-hover ">
				<thead>
				<tr>
				  <th scope="col" colspan="2"><a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>
 - <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>
</a></th> 	
				  <th scope="col" >Patente <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getVehiculo()->getPatente();?>
</th>
				  <th scope="col" >
					<a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">modificar</a>	
					<a href="/aventon/viajeRecurrente/preEliminar/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">eliminar</a>		
				  </th>
					
				</tr>
				<tr>
				  <td scope="col">Fecha</td>
				  <td scope="col">Estado</td>
				  <td scope="col">Cantidad de lugares</td>
				  <td scope="col">Acciones</td>
				</tr>
				</thead>
				<tbody>
				<?php if (!empty($_smarty_tpl->tpl_vars['viaje']->value->getViajesRecurrentes())) {?>
				  <?php $_smarty_tpl->_assignInScope('recurrentes', $_smarty_tpl->tpl_vars['viaje']->value->getViajesRecurrentes());?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recurrentes']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
									<tr>
					  <td><?php echo $_smarty_tpl->tpl_vars['v']->value->getFechaFrontEnd();?>
</td>
					  <td><?php if ($_smarty_tpl->tpl_vars['v']->value->isFinalizado()) {?>
							Finalizado
						  <?php }?>	
						  <?php if (!$_smarty_tpl->tpl_vars['v']->value->isFinalizado()) {?>
							Pendiente
						  <?php }?>	
					  </td>
					  <td>
						<?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() != 0) {?>
							Quedan <?php echo $_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles();?>
 lugares.
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['v']->value->getLugaresDisponibles() == 0) {?>
							Completo
						<?php }?>
					 </td>
					  <td>
						    <a href="#" onclick="listarPasajeros('<?php echo $_smarty_tpl->tpl_vars['v']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getFecha();?>
')">Listar viajeros</a>	
					  </td>
				</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>	
				<?php } else { ?>
				<tr>
					<td colspan="4">No hay datos</td>
				</tr>
	
				<?php }?>

				</tbody>
			   </table>
				
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			<?php } else { ?>
				<table class="table table-hover ">
				<thead>
				<tr>
				  <th scope="col" colspan="2">--- - ----</th> 	
				  <th scope="col" colspan="2">Patente ----</th>

				</tr>
				<tr>
				  <th scope="col">Fecha</th>
				  <th scope="col">Estado</th>
				  <th scope="col">Cantidad de lugares</th>
				  <th scope="col">Acciones</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td colspan="4">No hay datos</td>
				</tr>

				</tbody>
			   </table>
			<?php }?>
			</form>
		</div>
		
	  </div>
    <!-- /.row -->
    </div>
    <!-- /.container -->
	<form id="idForm" action="">
	</form>

	<?php echo '<script'; ?>
>
	$(document).ready(function(){
	<?php if (isset($_smarty_tpl->tpl_vars['preEliminar']->value)) {?>
		var mensaje =  new Array();	
		mensaje[mensaje.length] = "<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
";
		mostrarAvisoOpcion(mensaje,function(){
			
			window.location.href = '/aventon/viajeRecurrente/eliminar/<?php echo $_smarty_tpl->tpl_vars['preEliminar']->value;?>
';
		});	
	
	<?php } elseif (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
		 var mensaje =  new Array();	
		mensaje[0] = "<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
";
		if(mensaje[0])
			mostrarAviso(mensaje);	
	<?php }?>
	
		
		
	});
	function listarPasajeros(idviaje, fecha){
	  var action =  "/aventon/viajeRecurrente/verViajeros/" + idviaje;
	  $("#fecha_actual").val(fecha);
	  $("#myForm").prop("action", action);
	  $("#myForm").submit();
	}
	<?php echo '</script'; ?>
>

<?php }
}
