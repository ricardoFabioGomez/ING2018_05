<?php
/* Smarty version 3.1.32, created on 2018-06-27 01:46:40
  from 'C:\xampp\htdocs\aventon\webcontent\view\realizarPago.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b3316b06e7973_95313426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba8a0b5c46800175e88aef7135760a5a1e23b927' => 
    array (
      0 => 'C:\\xampp\\htdocs\\aventon\\webcontent\\view\\realizarPago.tpl',
      1 => 1530074790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b3316b06e7973_95313426 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- Page Content -->
 <style>
	​
 </style>
    <div class="container">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-8 my-4 mb-8 border">
			<form id="myForm" action="/aventon/pago/guardar" method="post">
			 <input type="hidden" id="fechaReal" name="fecha_nueva" value="<?php echo $_smarty_tpl->tpl_vars['fechaNueva']->value;?>
"> 
			<input type="hidden" id="idViaje" name="id_viaje_" value="<?php echo $_smarty_tpl->tpl_vars['idViaje']->value;?>
"> 
			<input type="hidden" id="tipoViaje" name="tipo_viaje" value="<?php echo $_smarty_tpl->tpl_vars['tipoViaje']->value;?>
"> 	
			  <h4 class="my-3 center">Realizar Pago</h4>
			  <div class="form-group">
				<label for="dni" class="col col-form-label">Email</label>
				<input type="text" class="form-control" name="user" id="email"  >
			  </div>
			  <div class="form-group"> 
				<label for="dni" class="col col-form-label">Nombre del Titular</label>
				<input type="text" class="form-control" name="user" id="nombre"  >
			  </div>
			  <div class="form-group"> 
				<label for="dni" class="col col-form-label">Dni del titular</label>
				<input type="text" class="form-control" name="user" id="titular"  >
			  </div>
			  <div class="form-group"> 
				<label for="dni" class="col col-form-label">Número de tarjeta</label>
				<input type="text" class="form-control" name="user" id="tarjeta"  >
			  </div>
			  <div class="form-group"> 
				<label for="dni" class="col col-form-label">Código de seguridad</label>
				<input type="text" class="form-control" name="user" id="codigo" maxlength="3" >
			  </div>
			  <div class="form-group"> 
				<label for="dni" class="col col-form-label">Fecha de Vencimiento</label>
				<select name="ddlccmonth" id="ddlccmonth" onchange="this.sumo.reload();" class="selectbox SumoUnder" required="" autocomplete="cc-exp-month" tabindex="-1">
					<option value="">-</option>
					<option value="01">01</option>
					<option value="02">02</option>
					<option value="03">03</option>
					<option value="04">04</option>
					<option value="05">05</option>
					<option value="06">06</option>
					<option value="07">07</option>
					<option value="08">08</option>
					<option value="09">09</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>

				</select>
				<select name="ddlccyear" id="ddlccyear" onchange="this.sumo.reload();" class="selectbox SumoUnder" required="" autocomplete="cc-exp-year" tabindex="-1">
					<option value="">-</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
					<option value="2031">2031</option>
					<option value="2032">2032</option>
					<option value="2033">2033</option>
					<option value="2034">2034</option>
					<option value="2035">2035</option>
					<option value="2036">2036</option>
					<option value="2037">2037</option>
					<option value="2038">2038</option>

				</select>
			  </div>
			  <div class="form-group"> 
				<label for="dni" class="col col-form-label">Medio de pago</label>
				<select name="ddlcardtype" id="ddlcardtype" onchange="this.sumo.reload();" class="selectbox SumoUnder" required="" autocomplete="cc-type" tabindex="-1">
					<option value="">Por favor seleccione uno</option>
					<option value="Visa">Visa</option>
					<option value="Amex">Amex</option>
					<option value="MasterCard">MasterCard</option>
					<option value="Naranja">Naranja</option>
					<option value="Cencosud">Cencosud</option>
					<option value="Diners">Diners</option>
					<option value="Cabal">Cabal</option>

				</select>
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
			<?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
				var mensaje =  new Array();
				mensaje[mensaje.length] = "<?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
";
				mostrarAviso(mensaje);
			<?php }?>
		});	
	  var tipo = "<?php echo $_smarty_tpl->tpl_vars['tipoViaje']->value;?>
";
	  var id = "<?php echo $_smarty_tpl->tpl_vars['idViaje']->value;?>
";
	  	
		function validarCampos(){
			var mensaje =  new Array();
			       
			var campos =  [{"name":"email","descripcion":"Correo electronico"},
						   {"name":"nombre","descripcion":"Nombre"}, 
						   //{"password_revalidate":""}, 
						   {"name":"titular","descripcion":"Titular"}, 
						   {"name":"tarjeta","descripcion":"Tarjeta"}, 
						   {"name":"codigo","descripcion":"Codigo"}, 
						   {"name":"ddlccmonth","descripcion":"mes hasta"}, 
						   {"name":"ddlccyear","descripcion":"año hasta"}, 
						   {"name":"ddlcardtype","descripcion":"tipo de tarjeta"}]
			//valido los campos requeridos
			$.each(campos, function(key, value){
				if(!$("#"+value.name).val()){
					mensaje[mensaje.length] = "El campo "+value.descripcion+" es requerido.";
				}
			});
		
			//valido el email
			  
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

			if($("#email").val() && !re.test($("#email").val())){
				mensaje[mensaje.length] = "El formato del email es incorrecto.";	
			}
			//mock
			
			if($("#codigo").val() == "456"){
				$("#myForm").prop("action","/aventon/pago/error");	
				$("#myForm").submit();
				return true;
			}
			
			if(mensaje.length > 0){
				mostrarAviso(mensaje);	
				return false;
			}
			else{
				
				if(tipo == "1"){
					$("#myForm").prop("action","/aventon/viajeRecurrente/reservar/" + id);	
				}else{
				   $("#myForm").prop("action","/aventon/viaje/reservar/" + id);	
				}
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
