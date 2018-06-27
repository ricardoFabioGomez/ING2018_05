<?php
/* Smarty version 3.1.32, created on 2018-06-26 00:24:25
  from 'C:\xampp\htdocs\aventon\webcontent\view\puntuar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b31b1e9ab70e7_90668077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fd6e8551b13d34d27073e0b88425fdb050a2f57' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\puntuar.tpl',
      1 => 1529983460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b31b1e9ab70e7_90668077 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-6 my-4 mb-8 border">
			<form  id="myForm" action="/aventon/viaje/guardar" method="post">
			  <h4 class="my-3 center">Crear Viaje</h4>
			    <div class="form-group">
				1<input type="radio" name="tipo_viaje" id="puntual" value="1" />
				2<input type="radio" name="tipo_viaje" id="puntual" value="2" />
				3<input type="radio" name="tipo_viaje" id="puntual" value="3" />
				4<input type="radio" name="tipo_viaje" id="puntual" value="4" />
				5<input type="radio" name="tipo_viaje" id="puntual" value="5" />
				
			  </div>
			  <div class="form-group">
				<!--input type="hidden" name="tipo_viaje" id="puntual" value="0" /-->
				<input type="text" class="form-control" name="origen" id="origen" value=""  placeholder="Comentario...">
			  </div>
			
			  <button class="btn btn-primary" type="button" onclick="validarCampos()"> 
				Guardar
			  </button>
			</form>
			
        </div>
      </div>
	 <?php echo '<script'; ?>
>
		$(document).ready(function(){});
			
	 <?php echo '</script'; ?>
>
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
