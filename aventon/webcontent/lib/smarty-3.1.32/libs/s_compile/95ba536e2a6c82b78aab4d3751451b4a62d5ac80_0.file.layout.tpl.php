<?php
/* Smarty version 3.1.32, created on 2018-05-22 19:14:18
  from 'C:\xampp\htdocs\aventon\webcontent\view\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b044fead57a46_72654103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95ba536e2a6c82b78aab4d3751451b4a62d5ac80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\layout.tpl',
      1 => 1527009252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b044fead57a46_72654103 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/aventon/webcontent/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/aventon/webcontent/css/heroic-features.css" rel="stylesheet">
	<link href="/aventon/webcontent/css/date/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<link href="/aventon/webcontent/css/date/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet">
	
	 <!-- Bootstrap core JavaScript -->
    <?php echo '<script'; ?>
 src="/aventon/webcontent/js/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/aventon/webcontent/js/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/aventon/webcontent/js/es-us.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/aventon/webcontent/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/aventon/webcontent/js/bootstrap-datetimepicker.min.js"><?php echo '</script'; ?>
>
	
  </head>

  <body>
      <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
		<a class="navbar-brand" href="#">
		
		<!--<img src="./img/Logo.jpg">-->
		Aventon
		</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/aventon/">Inicio</a>
            </li>
			<?php if (!$_smarty_tpl->tpl_vars['isSessionActive']->value) {?>
            <li class="nav-item">
              <a class="nav-link" href="/aventon/authentication">Login</a>
            </li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['isSessionActive']->value) {?>
			<li class="nav-item">
              <a class="nav-link" href="*">Crear Viaje</a>
            </li>
			<li class="nav-item dropdown">	
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  <?php if (isset($_smarty_tpl->tpl_vars['USER']->value)) {?>
					<?php echo $_smarty_tpl->tpl_vars['USER']->value->getNombre();?>
 <?php echo $_smarty_tpl->tpl_vars['USER']->value->getApellido();?>

				  <?php }?>
				  
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Ver mi perfil</a>
				  <a class="dropdown-item" href="#">Ver mis Viajes</a>
				  <a class="dropdown-item" href="#">Ver mis Vehiculos</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="/aventon/authentication/logout">Salir</a>
				</div>
			  </li>
			<?php }?>
          </ul>
        </div>
      </div>
    </nav>
	
	<?php echo $_smarty_tpl->tpl_vars['__content']->value;?>


    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Aventon.com 2018</p>
      </div>
      <!-- /.container -->
    </footer>

   

  </body>

</html>
<?php }
}
