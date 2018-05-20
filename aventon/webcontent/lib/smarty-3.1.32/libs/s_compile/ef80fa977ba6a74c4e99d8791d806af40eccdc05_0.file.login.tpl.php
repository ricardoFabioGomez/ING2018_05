<?php
/* Smarty version 3.1.32, created on 2018-05-20 05:51:53
  from 'C:\xampp\htdocs\aventon\webcontent\view\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b00f0d9cc12b5_22985903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef80fa977ba6a74c4e99d8791d806af40eccdc05' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\login.tpl',
      1 => 1526788033,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b00f0d9cc12b5_22985903 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row ">

        <div class="col-md-8 my-4 mb-8">
          <img class="img-fluid" src="http://placehold.it/750x500" alt="">
        </div>

        <div class="col-md-4 mb-8">
		<form action="./authentication/login" method="post">
		  <h3 class="my-3">Ingresar</h3>
          <ul>
            <li>usuario  : <input type="text" name="user_name" /></li>
            <li>password : <input type="text" name="user_name" /></li>
            <li><input type="submit" value="enviar"></li>
          </ul>
		</form>

        </div>

      </div>
	
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
