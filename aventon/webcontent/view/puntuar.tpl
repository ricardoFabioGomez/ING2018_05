 <!-- Page Content -->
    <div class="container" style="height:35em">
      <!-- Portfolio Item Row -->
	  	
      <div class="row justify-content-md-center">

        <div class="col-md-6 my-4 mb-8 border">
			<form  id="myForm" action="/aventon/viaje/guardar" method="post">
			  <h4 class="my-3 center">Crear Viaje</h4>
			    <div class="form-group">
				1<input type="radio" name="tipo_viaje" id="puntual" value="1" />
				2<input type="radio" name="tipo_viaje" id="puntual" value="2" />
				3<input type="radio" name="tipo_viaje" id="puntual" value="3" />
				4<input type="radio" name="tipo_viaje" id="puntual" value="4" />
				5<input type="radio" name="tipo_viaje" id="puntual" value="5" />
				
			  </div>
			  <div class="form-group">
				<!--input type="hidden" name="tipo_viaje" id="puntual" value="0" /-->
				<input type="text" class="form-control" name="origen" id="origen" value=""  placeholder="Comentario...">
			  </div>
			
			  <button class="btn btn-primary" type="button" onclick="validarCampos()"> 
				Guardar
			  </button>
			</form>
			
        </div>
      </div>
	 <script>
		$(document).ready(function(){});
			
	 </script>
      <!-- /.row -->
    </div>
    <!-- /.container -->