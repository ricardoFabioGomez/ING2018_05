    <!-- Page Content -->
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
		{if !empty($viajes)}
		{foreach from=$viajes item=viaje}
		<div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
			<div class="card-header">
			{$viaje->getUsuario()->getNombre()}
			</div>
            <div class="card-body">
              <p class="card-text">
			  <h6>Origen :</h6> {$viaje->getOrigen()}
			  </p>
			  <p class="card-text">
			  <h6>Origen :</h6>{$viaje->getDestino()}
			  </p>
			  <p class="card-text">
			  <h6>Origen :</h6> {$viaje->getFecha()}
			  </p>
			  <p class="card-text"><h6>Origen :</h6>
			  {$viaje->getHora()}
			  </p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Ver Más</a>
            </div>
          </div>
        </div>
		{/foreach}
		{/if}
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
