<?php
/* Smarty version 3.1.32, created on 2018-05-27 01:14:23
  from 'C:\xampp\htdocs\aventon\webcontent\view\verVehiculos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b09ea4fccbf60_27657793',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aee0b9ade9333678adc8d3f4c6fe0964701f5eac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\verVehiculos.tpl',
      1 => 1527376451,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b09ea4fccbf60_27657793 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div align="center" class="col-6 my-4 mb-8 align-items-center border">
			
			
			<form id="myForm" action="/aventon/vehiculo/guardar" method="post">
				<div align="center">
				<h4 class="my-3 center">
					Crear Vehiculo
					
			</h4>
			</div>
			   <div class="form-group row">
			    <label for="patente" class=" col-form-label col-4 ">* Patente</label>
				<input type="text" class="form-control col-4" name="patente" id="patente" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getPatente();?>
" >(Ej. ABC123)
				
			  </div>
			   <div class="form-group row">
			    <label for="modelo" class=" col-form-label col-4">* Modelo</label>
				<input type="text" class="form-control col-4" name="modelo" id="modelo"  value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getModelo();?>
">
			  </div>
			  <div class="form-group row">
			    <label for="marcar" class=" col-form-label col-4">* Marca</label>
				<input type="text" class="form-control col-4" name="marca" id="marca" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getMarca();?>
" >
			  </div>
			  <div class="form-group row">
				<label for="cant" class=" col-form-label col-4">* Pasajeros</label>
				<select class="form-control col-4" name="cant_pasajeros" id="cant" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getCantPasajero();?>
">
					<option value="">Seleccione</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			  </div>		
			  
			  <button class="btn btn-primary" type="button" onclick="validarCampos()">
				Guardar
			  </button>
			</form>
			
        </div>
      </div>
	  <div class="row justify-content-md-center">
		<div class="col-6">
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
					  <td><a href="/aventon/vehiculo/eliminar/<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getId();?>
">eliminar</a></td>
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
	  
      <!-- /.row -->
    </div>
    <!-- /.container -->
	

	<?php echo '<script'; ?>
>
		function validarCampos(){
			var mensaje =  new Array();
			   
			if(!$("#patente").val()){
				mensaje[mensaje.length] = "La patente es requerida";
			}
			else if(!/^[A-Z]{3}\d{3}$/.test($("#patente").val())){
				mensaje[mensaje.length] = "La patente tiene un formato invalido";
			}
			if(!$("#modelo").val()){
				mensaje[mensaje.length] = "El modelo es requerido";
			}
			if(!$("#marca").val()){
				mensaje[mensaje.length] = "La marca es requerida";
			}
			if(!$("#cant").val()){
				mensaje[mensaje.length] = "La cantidad es requerida";
			}
			if(mensaje.length > 0){
				mostrarAviso(mensaje);	
				return false;
			}
			else{
				$("#myForm").submit();
				return true;
			}
			
		}
	<?php echo '</script'; ?>
>

<?php }
}
