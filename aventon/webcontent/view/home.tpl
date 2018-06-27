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
			<h6>{$viaje->getUsuario()->getNombre()}</h6>
			Reputación: <br>
			
			</div>
            <div class="card-body">
              <p class="card-text">
			  <span>Origen :</span> <span>{$viaje->getOrigen()}</span>
			  </p>
			  <p class="card-text">
			  <span>Destino :</span><span>{$viaje->getDestino()}</span>
			  </p>
			  {if $viaje->getTipoViaje() != "1"}
				<p class="card-text">
			  <span>Fecha :</span><span> {$viaje->getFechaFrontEnd()}</span>
			  </p>
			  <p class="card-text">
			  <span>Hora de salida :</span>
			  <span>{$viaje->getHora()}</span>
			  </p>
			  <p class="card-text">
				{if $viaje->getLugaresDisponibles() == 0}
				  <span>Completo </span>
				{/if}
				{if $viaje->getLugaresDisponibles() != 0}
				  <span>Quedan {$viaje->getLugaresDisponibles()} lugares.</span>
				{/if}				
			  </p>
			  {/if}
			  {if $viaje->getTipoViaje() == "1"}
			  <p class="card-text">
			  <span>Viaje Recurrente</span>
			  </p>
			  <p class="card-text">
			  <span>Hora de salida :</span>
			  <span>{$viaje->getHora()}</span>
			  </p>
			  <p class="row card-text">
			  {$dias = $viaje->getDias()}
			  <span class="col-md-1 border {if $dias['L'] == '1'} btn-success {/if} "> L</span>
			  <span class="col-md-1 border{if $dias["M"] == "1"} btn-success {/if} ">M</span>
			  <span class="col-md-1 border{if $dias["X"] == "1"} btn-success {/if}">X</span>
			  <span class="col-md-1 border{if $dias["J"] == "1"} btn-success {/if}">J</span>
			  <span class="col-md-1 border{if $dias["V"] == "1"} btn-success {/if}">V</span>
			  <span class="col-md-1 border{if $dias["S"] == "1"} btn-success {/if}">S</span>
			  <span class="col-md-1 border{if $dias["D"] == "1"} btn-success {/if}">D</span>
			  </p>
			  {/if}
            </div>
            <div class="card-footer">
              <a href="/aventon/viaje/verViaje/{$viaje->getId()}" class="btn btn-primary">Ver Más</a>
            </div>
          </div>
        </div>
		{/foreach}
		{/if}
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
