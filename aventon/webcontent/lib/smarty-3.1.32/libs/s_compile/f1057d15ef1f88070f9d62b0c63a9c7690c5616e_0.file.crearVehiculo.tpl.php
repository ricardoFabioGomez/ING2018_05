<?php
/* Smarty version 3.1.32, created on 2018-06-16 22:30:04
  from 'C:\xampp\htdocs\aventon\webcontent\view\crearVehiculo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b25734c51bf87_30240003',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1057d15ef1f88070f9d62b0c63a9c7690c5616e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\crearVehiculo.tpl',
      1 => 1529180712,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25734c51bf87_30240003 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-6 my-4 mb-8 border">
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
	  <?php echo '<script'; ?>
>
		$(document).ready(function(){
			  <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
				var mensaje =  new Array();
				mensaje[mensaje.length] = "La patente ya esta registrada en el sistema.";
				mostrarAviso(mensaje);	
			<?php }?>
			 <?php if (isset($_smarty_tpl->tpl_vars['OK']->value)) {?>
				var mensaje =  new Array();
				mensaje[mensaje.length] = "Se ha guardado correctamente.";
				mostrarAviso(mensaje, function(){
					$("#myForm").prop("action","/aventon/vehiculo/listarPorGuardar" );
					$("#myForm").submit();
				});	
			<?php }?>
			 
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
      <!-- /.row -->
    </div>
    <!-- /.container --> 
	
<?php }
}
