<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aventon - Grupo35</title>

    <!-- Bootstrap core CSS -->
    <link href="/aventon/webcontent/css/bootstrap.min.css" rel="stylesheet">
	<link href="/aventon/webcontent/css/jquery-ui.css" rel="stylesheet">


    <!-- Custom styles for this template -->
	<link href="/aventon/webcontent/css/heroic-features.css" rel="stylesheet">
	<link href="/aventon/webcontent/css/open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
	
	 <!-- Bootstrap core JavaScript -->
    <script src="/aventon/webcontent/js/jquery.min.js"></script>
	<script src="/aventon/webcontent/js/jquery-ui.js"></script>
	<script src="/aventon/webcontent/js/bootstrap.bundle.min.js"></script>
	<script>
		function mostrarAviso(mensajes, onCloseHandler){
			$("#mensajeModal").children().remove();
			$.each(mensajes,function(key, value){
				$("#mensajeModal").append("<p>" + value + "</p>");	
			})
			
		
			$("#myModal").modal();
			$('#myModal').on('hide.bs.modal', function (e) {
				  // do something…
				  if(onCloseHandler){
					onCloseHandler();
				}
			})
			
		}
		function mostrarAvisoOpcion(mensajes, onSucessHandler, onClosehandler){
			$("#mensajeModal2").children().remove();
			$.each(mensajes,function(key, value){
				$("#mensajeModal2").append("<p>" + value + "</p>");	
			})
			
		
			$("#myModalOpcion").modal();
			$('#myModalOpcion').on('hide.bs.modal', function (e) {
				  // do something…
				  if(onClosehandler){
					onClosehandler();
				}
			});
			$('#aceptar').on('click', function (e) {
				  // do something…
				  if(onSucessHandler){
					onSucessHandler();
				}
			});
			
		}
		
	</script>
	<style>
		.footer {
  position: relative;
  margin-top: -150px; /* negative value of footer height */
  height: 150px;
  clear:both;
  padding-top:20px;
}
	</style>	
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
			{if ! $isSessionActive }
            <li class="nav-item">
              <a class="nav-link" href="/aventon/authentication">Login <span class="oi oi-account-login"></span></a>
            </li>
			{/if}
			{if  $isSessionActive }
			<li class="nav-item">
              <a class="nav-link" href="/aventon/viaje">Crear Viaje</a>
            </li>
			<li class="nav-item dropdown">	
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  {if isset($USER) }
					{$USER->getNombre()} {$USER->getApellido()}
				  {/if}
				  
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="/aventon/verPerfil">Ver mi perfil</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="/aventon/vehiculo/nuevo">Crear Vehiculo</a>
				  <a class="dropdown-item" href="/aventon/vehiculo/listar">Ver mis Vehiculos</a>
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="/aventon/viaje/listarViajes">Ver mis Viajes puntuales</a>
				  <a class="dropdown-item" href="/aventon/viajeRecurrente/listarViajes">Ver mis Viajes recurrentes</a>
				  <a class="dropdown-item" href="/aventon/viaje/listarViajesRealizados">Ver mis sucripciones a viajes</a>
				  
				  <div class="dropdown-divider"></div>
				  <a class="dropdown-item" href="/aventon/authentication/logout">Salir</a>
				</div>
			  </li>
			{/if}
          </ul>
        </div>
      </div>
    </nav>
	
	{$__content}

    <footer class=" py-5 mb-1 bg-dark">
     	<!-- Modal -->
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Notificacion</h4>
				</div>
				<div class="modal-body" id="mensajeModal">
				  
				</div>
				<div class="modal-footer">
				  <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>
			  
			</div>
		</div>	
		  <div class="modal fade" id="myModalOpcion" role="dialog">
			<div class="modal-dialog">
			
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Notificacion</h4>
				</div>
				<div class="modal-body" id="mensajeModal2">
				  
				</div>
				<div class="modal-footer">
				  <button id="aceptar" type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button> 	
				  <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			  </div>
			  
			</div>
		</div>
    <!-- Footer -->
	    

    </footer>

   

  </body>

</html>
