<?php
/* Smarty version 3.1.32, created on 2018-06-25 23:45:56
  from 'C:\xampp\htdocs\aventon\webcontent\view\misViajesRealizados.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b31a8e4b57361_66825252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd802079d2f0be2ff1a55902d20b83cabb83cbf03' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\misViajesRealizados.tpl',
      1 => 1529981151,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b31a8e4b57361_66825252 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	<div class="row justify-content-md-center" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
			<h4>Mis viajes pendientes/suscripto</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Patente</th>	
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Estado</th>
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
							  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getAceptado() == 0) {?>
								Esperando Aprobación.
							  <?php }?>   		
							  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getAceptado() == 1) {?>
								Aceptado.
							  <?php }?>  
							  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getAceptado() == 2) {?>
								Rechazado.
							  <?php }?> 
						  <?php }?>	
					  </td>
					  <td>
						  <?php if (!$_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
						  <a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">Ver detalle</a>
						  
						  <?php }?>
						  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
						   <a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
">Puntuar Conductor</a>
						  
						  <?php }?>
						
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
	

	<?php echo '<script'; ?>
>
	<?php echo '</script'; ?>
>

<?php }
}
