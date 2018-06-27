<?php
/* Smarty version 3.1.32, created on 2018-06-27 01:34:02
  from 'C:\xampp\htdocs\aventon\webcontent\view\listarViajeros.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3313bab763d6_11052308',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef4e5674b7e855e4ef51e868b84dd28cf7057ad8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\listarViajeros.tpl',
      1 => 1530074036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3313bab763d6_11052308 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container-fluid" >
      <!-- Portfolio Item Row -->
	  <div class="row justify-content-md-center mb-3 mt-4" style="height:35em">
		<div class="col-8" style="overflow: auto; height: 30em">
			<h4>Listar Viajeros</h4>
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">Nombre</th>
				  <th scope="col">Apellido</th>
				  <th scope="col">Estado</th>
				  <th scope="col">Reputación</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
			<?php if (!empty($_smarty_tpl->tpl_vars['viajeros']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viajeros']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
					<tr>
					  <th scope="row"><?php echo $_smarty_tpl->tpl_vars['v']->value->getNombre();?>
</th>
					  <td><?php echo $_smarty_tpl->tpl_vars['v']->value->getApellido();?>
</td>
					  <td>
					  <?php if ($_smarty_tpl->tpl_vars['v']->value->getEstado() == "0") {?>
						 Esperando confirmación.
					 <?php }?>
					 <?php if ($_smarty_tpl->tpl_vars['v']->value->getEstado() == "1") {?>
						Aprobado.
					 <?php }?>
					 <?php if ($_smarty_tpl->tpl_vars['v']->value->getEstado() == "3") {?>
						Realizo Pago, es Espera de verificación.
					 <?php }?>
					  
					  </td>
					  <td><?php echo $_smarty_tpl->tpl_vars['v']->value->getCalificacion();?>
</td>
					  <td>
						
						  <?php if (!$_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
							  
							 <?php if (($_smarty_tpl->tpl_vars['v']->value->getEstado() == "0" || $_smarty_tpl->tpl_vars['v']->value->getEstado() == 0) && $_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() > 0) {?>
								 <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>
									<a href="/aventon/viajeRecurrente/aceptaViajero/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value->getIdViajero();?>
">Aceptar</a><br>
								 <?php } else { ?>
									<a href="/aventon/viaje/aceptaViajero/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
/<?php echo $_smarty_tpl->tpl_vars['v']->value->getUserId();?>
">Aceptar</a><br>
								 <?php }?>
								
							 <?php }?>
							 <?php if ($_smarty_tpl->tpl_vars['v']->value->getEstado() != "3") {?>
							 <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>
								<a href="#" onclick="rechazarRecurrente('<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getIdViajero();?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value->getEstado();?>
')">Rechazar</a>	
							
							 <?php } else { ?>
								<a href="#" onclick="rechazar('<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value->getUserId();?>
', '<?php echo $_smarty_tpl->tpl_vars['v']->value->getEstado();?>
')">Rechazar</a>	
							 <?php }?>
							
							<?php }?>
						  <?php }?>
						  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->isFinalizado()) {?>
							<?php if (($_smarty_tpl->tpl_vars['v']->value->getEstado() == "1" || $_smarty_tpl->tpl_vars['v']->value->getEstado() == 1)) {?>
								 <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == 1) {?>
									<a href="/aventon/puntuar/">Puntuar viajero</a><br>
								 <?php } else { ?>
									<a href="/aventon/puntuar/">Puntuar viajero</a><br>
								 <?php }?>
								
							 <?php }?>	
							
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
	<form id="idForm" action="" method="POST">
		<input type="hidden" name="penalty" id="penalty">
	</form> 
	<?php echo '<script'; ?>
>
		function rechazar(idViaje, idUsuario, estado){
			if(estado == "1"){
				var mensaje =  new Array();	
				mensaje[mensaje.length] = "El viajero que quiere rechazar ya fue aceptado, si continua será penalizado.";
				mostrarAvisoOpcion(mensaje,function(){
				$("#penalty").val("true");	
				$("#idForm").prop("action", "/aventon/viaje/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();	
				});	
			}else{
				$("#idForm").prop("action", "/aventon/viaje/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();	
			}
		}
		function rechazarRecurrente(idViaje, idUsuario, estado){
			if(estado == "1"){
				var mensaje =  new Array();	
				mensaje[mensaje.length] = "El viajero que quiere rechazar ya fue aceptado, si continua será penalizado.";
				mostrarAvisoOpcion(mensaje,function(){
				$("#penalty").val("true");	
				$("#idForm").prop("action", "/aventon/viajeRecurrente/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();
				});	
			}else{
				$("#idForm").prop("action", "/aventon/viajeRecurrente/rechazarViajero/"+idViaje+"/"+idUsuario);
				$("#idForm").submit();
			}
			
		}
	<?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
>
	<?php echo '</script'; ?>
>

<?php }
}
