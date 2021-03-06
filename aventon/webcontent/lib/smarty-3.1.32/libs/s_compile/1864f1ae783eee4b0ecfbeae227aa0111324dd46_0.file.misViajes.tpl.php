<?php
/* Smarty version 3.1.32, created on 2018-06-23 15:21:39
  from 'C:\xampp\htdocs\aventon\webcontent\view\misViajes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2e8fb3303ae6_68059529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1864f1ae783eee4b0ecfbeae227aa0111324dd46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\misViajes.tpl',
      1 => 1529778089,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2e8fb3303ae6_68059529 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
			<h4>Mis viajes publicados</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Patente</th> 	
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Estado</th>
				  <th scope="col">Cantidad de lugares</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
			<?php if (!empty($_smarty_tpl->tpl_vars['viajes']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viajes']->value, 'viaje');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['viaje']->value) {
?>
					<tr>
					  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getVehiculo()->getPatente();?>
</th>
					  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>
</th>
					  <td><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getFechaFrontEnd();?>
</td>
					  <td><?php if ($_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
							Finalizado
						  <?php }?>	
						  <?php if (!$_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
							Pendiente
						  <?php }?>	
					  </td>
					  <td>
						<?php if ($_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() != 0) {?>
							Quedan <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles();?>
 lugares.
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() == 0) {?>
							Completo
						<?php }?>
					 </td>
					  <td>
						  <?php if (!$_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
						  <a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">modificar</a>	<br>
						  <a href="/aventon/viaje/preEliminar/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">eliminar</a>	<br>
						  <a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">Ver detalle</a>

						  <br>
						 
						  <?php }?>
						    <a href="/aventon/viaje/verViajeros/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">Listar viajeros</a>	
					  </td>
					  
					</tr>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php } else { ?>
				  <tr>
					<td colspan="4"> No hay datos</td>
				  </tr>
				<?php }?>

			  </tbody>
			</table>
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
		mensaje[mensaje.length] = "El viaje que intenta eliminar tiene viajeros aceptados. Si continua con la operación será penalizado.";
		mostrarAvisoOpcion(mensaje,function(){
			
			window.location.href = '/aventon/viaje/eliminar/<?php echo $_smarty_tpl->tpl_vars['preEliminar']->value;?>
';
		});	
	<?php }?>	
		
	});
	
	<?php echo '</script'; ?>
>

<?php }
}
