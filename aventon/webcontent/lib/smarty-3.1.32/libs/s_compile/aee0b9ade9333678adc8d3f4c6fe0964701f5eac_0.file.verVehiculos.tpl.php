<?php
/* Smarty version 3.1.32, created on 2018-05-24 21:32:45
  from 'C:\xampp\htdocs\aventon\webcontent\view\verVehiculos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b07135d7b7b17_36038746',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aee0b9ade9333678adc8d3f4c6fe0964701f5eac' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\verVehiculos.tpl',
      1 => 1527190362,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b07135d7b7b17_36038746 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div align="center" class="col-6 my-4 mb-8 align-items-center border">
			
			
			<form action="/aventon/vehiculo/guardar" method="post">
				<div align="center">
				<h4 class="my-3 center">
					Crear Vehiculo
					
			</h4>
			</div>
			   <div class="form-group row">
			    <label for="patente" class=" col-form-label col-6 ">Patente</label>
				<input type="text" class="form-control col-4" name="patente" id="patente"  >
				
			  </div>
			   <div class="form-group row">
			    <label for="modelo" class=" col-form-label col-6">Modelo</label>
				<input type="text" class="form-control col-4" name="modelo" id="modelo"  >
			  </div>
			  <div class="form-group row">
			    <label for="marcar" class=" col-form-label col-6">Marca</label>
				<input type="text" class="form-control col-4" name="marca" id="marca"  >
			  </div>
			  <div class="form-group row">
				<label for="modelo" class=" col-form-label col-6">Pasajeros</label>
				<input type="text" class="form-control col-4" name="cant_pasajeros" id="cant"  >
			  </div>		
			  
			  <input type="submit" class="btn btn-primary" value="Guardar"> 

			</form>
			
        </div>
      </div>
	  <div class="row justify-content-md-center">
		<div class="col-6">
			<table class="table table-hover ">
			  <thead>
				<tr>
				  <th scope="col">patente</th>
				  <th scope="col">modelo</th>
				  <th scope="col">marca</th>
				  <th scope="col">pasajeros</th>
				  <th scope="col">Acciones</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <th scope="row">1</th>
				  <td>Mark</td>
				  <td>Otto</td>
				  <td>4</td>
				  <td><a href="#">eliminar</a></td>
				</tr>

			  </tbody>
			</table>
		</div>
		
	  </div>
	  
      <!-- /.row -->
    </div>
    <!-- /.container --><?php }
}
