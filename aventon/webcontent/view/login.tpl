 <!-- Page Content -->
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
	<script>
		$(document).ready(function(){
			{if isset($error)}
			var mensaje =  new Array();
			mensaje[mensaje.length] = "{$error}";
			mostrarAviso(mensaje);	
			{/if}
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
	</script>
	
    <!-- /.container -->