<?php
/* Smarty version 3.1.32, created on 2018-05-28 06:38:34
  from 'C:\xampp\htdocs\aventon\webcontent\view\misViajes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0b87ca2e8115_04053312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1864f1ae783eee4b0ecfbeae227aa0111324dd46' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\misViajes.tpl',
      1 => 1527482311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0b87ca2e8115_04053312 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4">
		<div class="col-6">
			<h4>Mis viajes publicados</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
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
					  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>
</th>
					  <td><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>
</td>
					  <td><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getFecha();?>
</td>
					  <td>
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
	 <div class="row justify-content-md-center mb-12">
		<div class="col-6">
			<h4>Mis viajes pendientes/suscripto</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Origen</th>
				  <th scope="col">Destino</th>
				  <th scope="col">Fecha</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>

				  <tr>
					<td colspan="4"> No hay datos</td>
				  </tr>
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
