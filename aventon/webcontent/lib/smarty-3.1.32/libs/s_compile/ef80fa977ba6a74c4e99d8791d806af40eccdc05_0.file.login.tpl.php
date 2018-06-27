<?php
/* Smarty version 3.1.32, created on 2018-06-16 18:43:26
  from 'C:\xampp\htdocs\aventon\webcontent\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b253e2e2e6763_80588669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef80fa977ba6a74c4e99d8791d806af40eccdc05' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\login.tpl',
      1 => 1529167399,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b253e2e2e6763_80588669 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row ">

        <div class="col-md-8 my-4 mb-8">
          <img class="img-fluid" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-4 my-4 mb-8 border " >			
			<div class="col-md-10 my-4 mb-8" >
				<form id="myForm" action="./authentication/login" method="post">
				  <h4 class="my-3 center">Iniciar sesión</h4>
				  <div class="form-group">
					<input type="text" class="form-control" name="user_name" id="userId"  placeholder="Ingrese su usuario">
				  </div>
				  <div class="form-group">
					<input type="password" class="form-control"  name="user_pass" id="passwordId"  placeholder="Ingrese su contraseña">
				  </div>
				  <button type="button" onclick="validarCampos()"class="btn btn-primary">Login</button> <a href="#"> ¿Olvidó su contraseña?</a>
				  <div class="form-group">
					<p class="text-secondary my-4 mb-8">¿Eres nuevo? <a href="/aventon/registracion">Registrese</a></p> 
				  </div>
				  
				</form>
			</div>		
        </div>

      </div>
	
      <!-- /.row -->
	  
    </div>
	<?php echo '<script'; ?>
>
		$(document).ready(function(){
			<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
			var mensaje =  new Array();
			mensaje[mensaje.length] = "<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
";
			mostrarAviso(mensaje);	
			<?php }?>
		});
		function validarCampos(){
			var mensaje =  new Array();
			
			if(!$("#userId").val()){
				mensaje[mensaje.length] = "El usuario es requerido";
			}
			if(!$("#passwordId").val()){
				mensaje[mensaje.length] = "El password es requerido";
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
	
    <!-- /.container --><?php }
}
