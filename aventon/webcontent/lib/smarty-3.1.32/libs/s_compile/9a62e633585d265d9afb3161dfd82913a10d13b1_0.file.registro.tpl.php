<?php
/* Smarty version 3.1.32, created on 2018-06-16 20:14:10
  from 'C:\xampp\htdocs\aventon\webcontent\view\registro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b25537225b4f5_61504038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a62e633585d265d9afb3161dfd82913a10d13b1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\registro.tpl',
      1 => 1529172830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b25537225b4f5_61504038 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
 <style>
	​
 </style>
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-8 my-4 mb-8 border">
			<form id="myForm" action="/aventon/registracion/guardar" method="post">
			  <h4 class="my-3 center">Registrese</h4>
			  <div class="form-group">
				<input type="text" class="form-control" name="user" id="userId"  placeholder="* Usuario" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getUser();?>
">
			  </div>
			  <div class="form-group">
				<input type="password" class="form-control"  name="password" id="passwordId"  placeholder="* Contraseña" value="">
			  </div>
			  <div class="form-group">
				<input type="password" class="form-control"  name="password_revalidate" id="password_revalidate"  placeholder="* Re-ingrese su contraseña" value="">
			  </div>
			   <div class="form-group">
				<input type="text" class="form-control" name="nombre" id="nombre"  placeholder="* Nombre" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getNombre();?>
">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="apellido" id="apellido"  placeholder="* Apellido" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getApellido();?>
">
			  </div>
			  <div class="form-group">
			  	<input type="text" class="form-control" autocomplete="off" name="fecha_naci" id="fecha_naci"  placeholder="* Fecha de nacimiento" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getFechaNaci();?>
">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="dni" id="dni"  placeholder="* Número de documento" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getDni();?>
">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control"  name="telefono" id="telefono"  placeholder="* Telefono" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getTelefono();?>
">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" name="direccion" id="direccion"  placeholder="* Dirección" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getDireccion();?>
">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control"   name="depto" id="depto"  placeholder="Nro. Depto" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getDepto();?>
">
			  </div>
			  <div class="form-group">
				<input type="email" class="form-control"  name="email" id="email"  placeholder="* Correo electronico" value="<?php echo $_smarty_tpl->tpl_vars['USER_FORM']->value->getEmail();?>
">
			  </div>
			  
			  <button type="button" class="btn btn-primary" onclick="validarCampos()">Guardar</button>
			</form>
			
        </div>
      </div>
	
	  <?php echo '<script'; ?>
>
		$(document).ready(function(){
			 $("#fecha_naci").datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
		maxDate:"-17Y",
		dateFormat:"dd/mm/yy",
        onClose: function(dateText, inst) { 
            //var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            //var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            //$(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
			//$().datepicker({ minDate:null, maxDate: "0D", dateFormat:"dd/mm/yy"});	
			<?php if (isset($_smarty_tpl->tpl_vars['IS_Error']->value)) {?>
				var mensaje =  new Array();
				mensaje[mensaje.length] = "El nombre de usuario o el email ya existen.";
				mostrarAviso(mensaje);
			<?php }?>
		});	
		
	  	
		function validarCampos(){
			var mensaje =  new Array();
			var campos =  [{"name":"userId","descripcion":"Usuario"},
						   {"name":"passwordId","descripcion":"Password"}, 
						   //{"password_revalidate":""}, 
						   {"name":"nombre","descripcion":"Nombre"}, 
						   {"name":"apellido","descripcion":"Apellido"}, 
						   {"name":"fecha_naci","descripcion":"Fecha de nacimiento"}, 
						   {"name":"dni","descripcion":"Número de documento"}, 
						   {"name":"telefono","descripcion":"Telefóno"}, 
						   {"name":"direccion","descripcion":"Dirección"}, 
						   {"name":"email","descripcion":"Correo electronico"}]
			//valido los campos requeridos
			$.each(campos, function(key, value){
				if(!$("#"+value.name).val()){
					mensaje[mensaje.length] = "El campo "+value.descripcion+" es requerido.";
				}
			});
			//valido el campo de password
			if($("#passwordId").val() != $("#password_revalidate").val()){
				mensaje[mensaje.length] = "El password no coincide con su validación";	
			}
			//valido el campo fecha_naci
			if($("#fecha_naci").val()){
				var rexDate = /^(?:(?:(?:0?[1-9]|1\d|2[0-8])[/](?:0?[1-9]|1[0-2])|(?:29|30)[/](?:0?[13-9]|1[0-2])|31[/](?:0?[13578]|1[02]))[/](?:0{2,3}[1-9]|0{1,2}[1-9]\d|0?[1-9]\d{2}|[1-9]\d{3})|29[/]0?2[/](?:\d{1,2}(?:0[48]|[2468][048]|[13579][26])|(?:0?[48]|[13579][26]|[2468][048])00))$/;
				if(! rexDate.test($("#fecha_naci").val())){
					mensaje[mensaje.length] = "El formato de la fecha es incorrecta";	
				}
				else{
					var dateString = $("#fecha_naci").val().split("/");
					var date = new Date(dateString[2], dateString[1] - 1, dateString[0]);
					var hoy = new Date();
					hoy.setFullYear(hoy.getFullYear() - 17);
					if(date > hoy){
						mensaje[mensaje.length] = "La fecha de nacimiento es incorrecta, el usuario debe ser mayor de edad.";	
					}	
				}
			}
			//valido el email
			  
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			if($("#email").val() && !re.test($("#email").val())){
				mensaje[mensaje.length] = "El formato del email es incorrecto.";	
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
    <!-- /.container --><?php }
}
