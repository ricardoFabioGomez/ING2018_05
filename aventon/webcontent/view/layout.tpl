<!DOCTYPE html>
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
    <script src="/aventon/webcontent/js/jquery.min.js"></script>
	<script src="/aventon/webcontent/js/moment.min.js"></script>
    <script src="/aventon/webcontent/js/es-us.js"></script>
	<script src="/aventon/webcontent/js/bootstrap.bundle.min.js"></script>
	<script src="/aventon/webcontent/js/bootstrap-datetimepicker.min.js"></script>
	
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
              <a class="nav-link" href="/aventon/authentication">Login</a>
            </li>
			{/if}
			{if  $isSessionActive }
			<li class="nav-item">
              <a class="nav-link" href="*">Crear Viaje</a>
            </li>
			<li class="nav-item dropdown">	
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  {if isset($USER) }
					{$USER->getNombre()} {$USER->getApellido()}
				  {/if}
				  
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <a class="dropdown-item" href="#">Ver mi perfil</a>
				  <a class="dropdown-item" href="#">Ver mis Viajes</a>
				  <a class="dropdown-item" href="#">Ver mis Vehiculos</a>
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

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Aventon.com 2018</p>
      </div>
      <!-- /.container -->
    </footer>

   

  </body>

</html>
