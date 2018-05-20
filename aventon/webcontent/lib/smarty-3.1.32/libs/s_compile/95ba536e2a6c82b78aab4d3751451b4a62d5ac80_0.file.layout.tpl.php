<?php
/* Smarty version 3.1.32, created on 2018-05-20 07:23:53
  from 'C:\xampp\htdocs\aventon\webcontent\view\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b010669021718_29702615',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95ba536e2a6c82b78aab4d3751451b4a62d5ac80' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\layout.tpl',
      1 => 1526793564,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b010669021718_29702615 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/aventon/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/aventon/css/heroic-features.css" rel="stylesheet">

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
              <a class="nav-link" href="./">Viajes
                <span class="sr-only">(current)</span>
              </a>
            </li>
			<?php if (!$_smarty_tpl->tpl_vars['isSessionActive']->value) {?>
            <li class="nav-item">
              <a class="nav-link" href="/aventon/authentication">Login</a>
            </li>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['isSessionActive']->value) {?>
			 <li class="nav-item">
              <a class="nav-link" href="/aventon/authentication/logout">Logout</a>
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
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <?php echo '<script'; ?>
 src="./js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

  </body>

</html>
<?php }
}
