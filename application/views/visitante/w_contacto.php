
<div class="container">
	<div class="row">
		<div class="col-md-6 col-sm-6" id="map">
		</div>

		<!-- Formulario de contacto -->
		<div class="col-md-6 col-sm-6">
			<h2>Formulario de contacto</h2>
			<p class="text-primary">Para ponerse en contacto puede ocupar los siguientes medios, Direccion Estrella fugaz 453 telefono 44444444 de 9 1 15hs. o deje sus datos en el formulario de contacto online las  24hs.</p>
				
				<form role="form" class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
					<div class="form-group">
						<label for="nombre">Nombre:</label>
						<input type="text" class="form-control" id="nombre"
						placeholder="nombre">
					</div>
					<div class="form-group has-success has-error">
						<label for="ejemplo_email_1">Email</label>
						<input type="email" class="form-control" id="ejemplo_email_1"
						placeholder="Introduce tu email">
					</div>
				
					<div class="form-group">
						<label for="text_area">Texto:</label>
						<textarea class="form-control" id="text_area"
						placeholder="Texto a contacto. 250 caracteres maximo" maxlength="250"rows="4"></textarea>
					</div>
					<div class="conteiner">
					<button type="submit" class="btn btn-default">Enviar</button> <button type="reset" class="btn btn-default">Borrar</button>
					</div>
				</form>
		</div>
	</div>
</div>

<script>
	         function initMap() {
		        var myLatLng = {lat: -27.499843, lng: -58.832235};

		        var map = new google.maps.Map(document.getElementById('map'), {
		          zoom: 15,
		          center: myLatLng
		        });

		        var marker = new google.maps.Marker({
		          position: myLatLng,
		          map: map,
		          title: 'Xtreme Soluciones'

		        });
		      }
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSnIVyEOBA1-AY7ELKnFOH3mg-obyN_8Q&callback=initMap"></script>