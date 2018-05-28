<?php
/* Smarty version 3.1.32, created on 2018-05-28 06:29:56
  from 'C:\xampp\htdocs\aventon\webcontent\view\modificarVehiculo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0b85c474e967_18913838',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45f6fc984899408ebaa5852a9b24c7f8985a4ec4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\modificarVehiculo.tpl',
      1 => 1527481769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0b85c474e967_18913838 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div align="center" class="col-6 my-4 mb-8 align-items-center border">
			
			
			<form id="myForm" action="/aventon/vehiculo/modificar" method="post">
				<div align="center">
				<h4 class="my-3 center">
					Modificar Vehiculo
					
			</h4>
			</div>
			   <div class="form-group row">
			    <label for="patente" class=" col-form-label col-4 ">* Patente</label>
				<input type="text" class="form-control col-4" readonly name="patente" id="patente" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getPatente();?>
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
				<select class="form-control col-4" name="cant_pasajeros" id="cant" >
					<option value="">Seleccione</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select>
			  </div>		
			  <input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getId();?>
">
			  <button class="btn btn-primary" type="button" onclick="validarCampos()">
				Modificar
			  </button>
			</form>
			
        </div>
      </div>
	 
      <!-- /.row -->
    </div>
    <!-- /.container -->
	

	<?php echo '<script'; ?>
>
		$(document).ready(function(){
			var cant = "<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->getCantPasajero();?>
";
			$("#cant").val(cant);
		});

		
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
