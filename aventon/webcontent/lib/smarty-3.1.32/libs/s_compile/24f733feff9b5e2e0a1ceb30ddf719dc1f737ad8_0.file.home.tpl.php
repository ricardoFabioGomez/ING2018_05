<?php
/* Smarty version 3.1.32, created on 2018-06-24 17:10:19
  from 'C:\xampp\htdocs\aventon\webcontent\view\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b2ffaabf29cd5_54886243',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24f733feff9b5e2e0a1ceb30ddf719dc1f737ad8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\home.tpl',
      1 => 1529871014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b2ffaabf29cd5_54886243 (Smarty_Internal_Template $_smarty_tpl) {
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
			<h6><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getUsuario()->getNombre();?>
</h6>
			Reputación: <br>
			
			</div>
            <div class="card-body">
              <p class="card-text">
			  <span>Origen :</span> <span><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getOrigen();?>
</span>
			  </p>
			  <p class="card-text">
			  <span>Destino :</span><span><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getDestino();?>
</span>
			  </p>
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() != "1") {?>
				<p class="card-text">
			  <span>Fecha :</span><span> <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getFechaFrontEnd();?>
</span>
			  </p>
			  <p class="card-text">
			  <span>Hora de salida :</span>
			  <span><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getHora();?>
</span>
			  </p>
			  <p class="card-text">
				<?php if ($_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() == 0) {?>
				  <span>Completo </span>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles() != 0) {?>
				  <span>Quedan <?php echo $_smarty_tpl->tpl_vars['viaje']->value->getLugaresDisponibles();?>
 lugares.</span>
				<?php }?>				
			  </p>
			  <?php }?>
			  <?php if ($_smarty_tpl->tpl_vars['viaje']->value->getTipoViaje() == "1") {?>
			  <p class="card-text">
			  <span>Viaje Recurrente</span>
			  </p>
			  <p class="card-text">
			  <span>Hora de salida :</span>
			  <span><?php echo $_smarty_tpl->tpl_vars['viaje']->value->getHora();?>
</span>
			  </p>
			  <p class="row card-text">
			  <?php $_smarty_tpl->_assignInScope('dias', $_smarty_tpl->tpl_vars['viaje']->value->getDias());?>
			  <span class="col-md-1 border <?php if ($_smarty_tpl->tpl_vars['dias']->value['L'] == '1') {?> btn-success <?php }?> "> L</span>
			  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["M"] == "1") {?> btn-success <?php }?> ">M</span>
			  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["X"] == "1") {?> btn-success <?php }?>">X</span>
			  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["J"] == "1") {?> btn-success <?php }?>">J</span>
			  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["V"] == "1") {?> btn-success <?php }?>">V</span>
			  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["S"] == "1") {?> btn-success <?php }?>">S</span>
			  <span class="col-md-1 border<?php if ($_smarty_tpl->tpl_vars['dias']->value["D"] == "1") {?> btn-success <?php }?>">D</span>
			  </p>
			  <?php }?>
            </div>
            <div class="card-footer">
              <a href="/aventon/viaje/verViaje/<?php echo $_smarty_tpl->tpl_vars['viaje']->value->getId();?>
" class="btn btn-primary">Ver Más</a>
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
