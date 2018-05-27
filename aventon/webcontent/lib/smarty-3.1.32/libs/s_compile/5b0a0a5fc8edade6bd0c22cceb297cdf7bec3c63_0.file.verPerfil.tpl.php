<?php
/* Smarty version 3.1.32, created on 2018-05-27 04:50:44
  from 'C:\xampp\htdocs\aventon\webcontent\view\verPerfil.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b0a1d042138d2_56990288',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5b0a0a5fc8edade6bd0c22cceb297cdf7bec3c63' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\verPerfil.tpl',
      1 => 1527389440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0a1d042138d2_56990288 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">
		<div class="col-6		my-4 mb-8 border h50">
			algo
		</div>
        <div class="col-6		my-4 mb-8 border">
			
			<form action="/aventon/registracion/guardar" method="post">
			  <div class="row">
				<div class="col text-center">
				<h4 class="my-3 center">
					Mis datos 
					<button class="btn btn-primary">
						<span class="oi oi-pencil"></span>
					</button>
				</h4>
				</div>
				</div>
			   <div class="form-group row">
			    <label for="nombre" class="col col-form-label">Nombre</label>
				<input type="text" class="form-control-plaintext col" readonly name="nombre" id="nombre"  value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getNombre();?>
">
			  </div>
			  <div class="form-group row">
				<label for="apellido" class="col col-form-label">Apellido</label>
				<input type="text" class="form-control-plaintext col" readonly name="apellido" id="apellido" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getApellido();?>
"  >
			  </div>
			  <div class="form-group row">
				<label for="fecha_naci" class="col col-form-label">Fecha de Nacimiento</label>
				<input type="text" class="form-control-plaintext col" readonly  name="fecha_naci" id="fecha_naci" value="<?php echo $_smarty_tpl->tpl_vars['fechaNaci']->value;?>
" >
			  </div>
			  <div class="form-group row">
				<label for="dni" class="col col-form-label">Dni</label>
				<input type="text" class="form-control-plaintext col" readonly name="dni" id="dni"value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getDni();?>
" >
			  </div>
			  <div class="form-group row">
				<label for="telefono" class="col col-form-label">Telefóno</label>
				<input type="text" class="form-control-plaintext col" readonly  name="telefono" id="telefono" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getTelefono();?>
"  >
			  </div>
			  <div class="form-group row" >
				<label for="direccion" class="col col-form-label">Dirección</label>
				<input type="text" class="form-control-plaintext col" readonly name="direccion" id="direccion" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getDireccion();?>
">
			  </div>
			  <div class="form-group row">
				<label for="depto" class="col col-form-label">Depto</label>
				<input type="text" class="form-control-plaintext col" readonly  name="depto" id="depto" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getDepto();?>
" >
			  </div>
			  <div class="form-group row">
				<label for="email" class="col col-form-label">Correo electronico</label>
				<input type="text" class="form-control-plaintext col" readonly  name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['USER']->value->getEmail();?>
" >
			  </div>
			  
			  
			</form>
			
        </div>
      </div>
	  <?php echo '<script'; ?>
>
		 $(function () {
           //     $('#dateFechaNaci').datetimepicker();
            });
	  <?php echo '</script'; ?>
>
	
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
