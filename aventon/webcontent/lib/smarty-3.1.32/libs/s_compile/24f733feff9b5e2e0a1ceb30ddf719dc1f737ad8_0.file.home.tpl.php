<?php
/* Smarty version 3.1.32, created on 2018-05-26 17:08:02
  from 'C:\xampp\htdocs\aventon\webcontent\view\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b09785298ff03_60080084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24f733feff9b5e2e0a1ceb30ddf719dc1f737ad8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\home.tpl',
      1 => 1527347278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b09785298ff03_60080084 (Smarty_Internal_Template $_smarty_tpl) {
?>    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
		<div  align="center">
			Origen : <input type="text" name="origen"/> 
			Destino: <input type="text" name="destino"/> 
			Fecha : <input type="text" name="fecha"/>
			<button class="btn btn-primary ">Buscar</button>
		</div>
		
		
      </header>

      <!-- Page Features -->
      <div class="row text-center">
		<?php if (!empty($_smarty_tpl->tpl_vars['viajes']->value)) {?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['viajes']->value, 'viaje');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['viaje']->value) {
?>
		<div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
			<div class="card-header">
			<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getUsuario()->getNombre();?>

			</div>
            <div class="card-body">
              <p class="card-text">
			  <h6>Origen :</h6> <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>

			  </p>
			  <p class="card-text">
			  <h6>Origen :</h6><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>

			  </p>
			  <p class="card-text">
			  <h6>Origen :</h6> <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getFecha();?>

			  </p>
			  <p class="card-text"><h6>Origen :</h6>
			  <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getHora();?>

			  </p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Ver Más</a>
            </div>
          </div>
        </div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		<?php }?>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
<?php }
}
