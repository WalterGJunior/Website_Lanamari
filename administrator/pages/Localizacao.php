<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!--<h2>Cursos</h2>-->
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
					
					<div class="about">
					
						<div class="row"> 
							<div class="col-md-12">
								<div class="about-logo">
                    <h3>Localização</h3>
                    <hr>  		<body onLoad="initialize(); searchAddress();" >

				<style>
					.ex{font-size:9px; color:#666; text-decoration:none;cursor:pointer}
					#didYouMean{padding:5px; font-family:Arial; font-size:12px; color:#333; text-decoration:none;cursor:pointer}
				</style>

				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript">
					var geocoder;
					var map;
					var markerAddress;
					function initialize() {
						geocoder = new google.maps.Geocoder();
						var latlng = new google.maps.LatLng(-23.5489433, -46.6388182);
						var myOptions = {
							zoom: 13,
							center: latlng,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}
						map = new google.maps.Map(document.getElementById("mapa"), myOptions);
					}


					function searchAddress() {
//Limpa marcas no mapa se tiver
if (markerAddress) markerAddress.setMap(null);
//Limpa conteúdo da div didYouMean
document.getElementById("didYouMean").innerHTML = "";
//Pego ao valor do input address
var address = document.getElementById("address").value;
geocoder.geocode( { 'address': address}, function(results, status) {

	if (status == google.maps.GeocoderStatus.OK) {
//Verifica se retorna mais de 1 resultado
if (results.length > 1) { 
	document.getElementById("didYouMean").innerHTML = "<b>Você quis dizer: </b>";
// Loop com os resultados / Você quis dize: 
for (var i=0; i<results.length; i++) {    
	typeZoom = results[i].types[0];
//Pega o valor do nivel de zoom
setZoomLevel = setZoom(typeZoom);				
//Escreve resultados
document.getElementById("didYouMean").innerHTML += "<br>"+(i+1)+": <a href=\"javascript:void(0);javascript:setAddressCenter("+results[i].geometry.location.lat()+","+results[i].geometry.location.lng()+",\'"+results[i].formatted_address+"\', "+setZoomLevel+");\">" + results[i].formatted_address + "</a>";
}

} else {
	typeZoom = results[0].types[0];
	setZoomLevel = setZoom(typeZoom);
	setAddressCenter(results[0].geometry.location.lat(),results[0].geometry.location.lng(),results[0].formatted_address,setZoomLevel);
}

} else {
//Endereço não encontrado
alert("Endereço não encontrado: " + status );
}

});

//Seta nivel de zoom dependendo do type ->  http://code.google.com/intl/sv-SE/apis/maps/documentation/geocoding/#Types
function setZoom(typeZoom){
	switch (typeZoom) {
		case "street_address": case "route": return 17; break;  
		case "country":  return 4; break; 
		case "political": return 5; break; 
		case "locality": return 12; break; 
		case "neighborhood": return 15; break; 
		default: return 10; break; 
	}	
}
}  

function setAddressCenter(lat,lng,formattedAddress, setZoomLevel  ){
//Limpa conteúdo da div didYouMean
document.getElementById("didYouMean").innerHTML = "";
//Update Input Address
document.getElementById("address").value = formattedAddress;
//Convert latitude e longitude para o formato de google
latlng = new google.maps.LatLng(lat, lng);
//Centraliza Mapa
map.setCenter(latlng);
//Seta o nivel de zoom
map.setZoom(setZoomLevel);
//Plota a marca no mapa
markerAddress = new google.maps.Marker({
	position: latlng, 	  
	map: map	  
});

// Mensagem do maptip
var infowindow = new google.maps.InfoWindow({ 
	content: formattedAddress
});

//Adiciona o evento click na marca
google.maps.event.addListener(markerAddress, 'click', function(){
	infowindow.open(map,markerAddress);
});		 

}
</script>



<form onsubmit="searchAddress(); return false;" >
	<fieldset>
		<table width='100%'>
			<tr>
				<td> <input type="text" class="form-control" value=" <? echo utf8_encode(@$tb_config['tx_endereco']); ?> <? echo utf8_encode(@$tb_config['tx_cidade']); ?>" id="address" /></td>
				<td style="padding-left:10px"><input type="submit" class="btn red btn" value="procurar"/></td>
			</tr>
		</table>  
		<br />
		<span class="ex"><font face='Arial' color=#666666>Exemplo:</font> </span>
		<span class="ex" onclick="javascript:document.getElementById('address').value= this.firstChild.data"><font face='Arial' color=#666666><? echo utf8_encode(@$tb_config['tx_cidade']); ?> <? echo utf8_encode(@$tb_config['tx_bairro']); ?></span>
		<span class="ex"> ou </span>
		<span class="ex" onclick="javascript:document.getElementById('address').value= this.firstChild.data"><font face='Arial' color=#666666><? echo utf8_encode(@$tb_config['tx_endereco']); ?>, <? echo utf8_encode(@$tb_config['tx_bairro']); ?></span>
		<div id="didYouMean"></div>
	</fieldset>
</form>
<p align="center"><div id="mapa" style="width:100%; height:400px;"></div></p>
</div>
							</div>
						</div>
						
						<hr>
						<br>
						
						
					</div>
									
				</div>
	</section>
