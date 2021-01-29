// when the docs use an import:
// import
import { OpenStreetMapProvider } from 'leaflet-geosearch';
// setup
const provider = new OpenStreetMapProvider();

 document.addEventListener('DOMContentLoaded', ()=>{
    if(document.querySelector('#mapa')){

        const lat = document.querySelector('#lat').value === '' ? 18.1378 : document.querySelector('#lat').value;
        const lng = document.querySelector('#lng').value === '' ? -94.4353 : document.querySelector('#lng').value;

        const mapa = L.map('mapa').setView([lat, lng], 16);

        //Eliminar los pines previos
        let markers = new L.FeatureGroup().addTo(mapa);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng],{
          draggable:true,
          autoPan:true,
        }).addTo(mapa);
        //asignar el contenedor
        markers.addLayer(marker);
        //Geocode Service
        const geocodeService = L.esri.Geocoding.geocodeService();

        //Buscador de direcciones
         const buscador = document.querySelector('#formbuscador');
         buscador.addEventListener('blur', buscarDireccion);

            moverPin(marker);

            function moverPin(marker){
            //Detectar movimiento del marker
              marker.on('moveend', function(e){
                  marker = e.target;
                  const posicion = marker.getLatLng();

                  //Centrar automaticamente
                  mapa.panTo( new L.LatLng( posicion.lat , posicion.lng));

                  //Reverse Geocoding, cuando el usuario reubica el ping
                  geocodeService.reverse().latlng(posicion, 16).run(function(error, resultado){
                       console.log(resultado.address);
                       marker.bindPopup(resultado.address.LongLabel);
                       marker.openPopup();
                       //Lenar  los valores en el DOM
                       llenarinputs(resultado)
                  });

              });
            }

            function buscarDireccion(e)  {
                if (e.target.value.length > 1) {
                    //   console.log(provider);
                      provider.search({query: e.target.value })
                           .then( resultado => {
                               console.log(resultado);
                                if (resultado) {
                                    // console.log(resultado[0].bounds[0]);
                                    //Limpiar todos los pines previos
                                    markers.clearLayers();
                                    //Reverse Geocoding
                                    geocodeService.reverse().latlng(resultado[0].bounds[0], 16).run(function(error, resultado){
                                     // Lenar los inputs
                                     llenarinputs(resultado);
                                         console.log(resultado);
                                     //Centrar el mapa
                                     mapa.setView(resultado.latlng);
                                     //Agregar el Pin
                                     marker = new L.marker(resultado.latlng,{
                                        draggable:true,
                                        autoPan:true,
                                      }).addTo(mapa);

                                      //asignar el contenedor
                                      markers.addLayer(marker);

                                     //Mover el pin
                                      moverPin(marker);
                                   });

                                }
                              })
                            //   .catch(error =>{
                            //    console.log(error);
                            // });
            }
            }

            function llenarinputs(resultado){
                document.querySelector('#direccion').value = resultado.address.Address || '';
                document.querySelector('#colonia').value = resultado.address.Neighborhood || '';
                document.querySelector('#lat').value = resultado.latlng.lat || '';
                document.querySelector('#lng').value = resultado.latlng.lng || '';
            }


    }
 });
