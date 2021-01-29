@extends('layouts.adminlte')

@section('styles')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
 <!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet" defer></script>
<!-- Esri Leaflet Geocoder -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" crossorigin="anonymous" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
 {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous"  /> --}}

@endsection

@section('content')
<div class="content-wrapper">
    <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <!-- card -->
                  <div class="card mt-3">
                    <!-- card-body -->
                       <div class="card-body">
                       <form action="{{route('vendercasa.store')}}" method="POST">
                          @csrf
                          <div class="row">
                                 <!-- form - vendedor -->
                               <div class="col-md-6">
                                 <h2 class="text-center">Datos del Vendedor</h2>

                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                                    </div>
                                    <input id="nombre" placeholder="Nombre Completo" class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" value="{{old('nombre')}}" >
                                         @error('nombre')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                  <label for="">Fecha de nacimiento</label>
                                  <div class="input-group  mb-3">
                                     <div class="input-group-prepend">
                                       <span class="input-group-text" id=""><i class="fas fa-calendar"></i></span>
                                     </div>
                                     <input id="fecha" placeholder="Fecha de Nacimiento" class="form-control @error("fecha") is-invalid @enderror" type="date" name="fecha" value="{{old("fecha")}}" >
                                          @error("fecha")
                                          <div class="invalid-feedback">
                                              {{$message}}
                                          </div>
                                          @enderror
                                   </div>

                                   <div class="input-group  mb-3">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text" id=""><i class="fas fa-globe-americas"></i></span>
                                        </div>
                                        <input id="nacionalidad" placeholder="Nacionalidad" class="form-control @error("nacionalidad") is-invalid @enderror" type="text" name="nacionalidad" value="{{old("nacionalidad")}}" >
                                        @error("nacionalidad")
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="formbuscador">Coloca la dirección del Establecimiento</label>
                                          <input type="text"
                                                 placeholder="Calle de la propiedad o casa"
                                                 id="formbuscador"
                                                 class="form-control">
                                                 <p class=" text-secondary mt-5 mb-3 text-center">El asistente colocará  una dirección estimada, mueve el Pin hacia el lugar correcto</p>
                                    </div>

                                    <div id="mapa"  style="width:100%;height:500px"></div>

                                    <input type="hidden" name="lat" id="lat" value="{{old('lat')}}">
                                    <input type="hidden" name="lng" id="lng" value="{{old('lng')}}">

                                     <div class="input-group  mt-3 mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id=""><i class="fas fa-road"></i></span>
                                        </div>
                                        <input id="direccion" placeholder="Calle, Numero" class="form-control @error("direccion") is-invalid @enderror" type="text" name="direccion" value="{{old("direccion")}}" >
                                             @error("direccion")
                                             <div class="invalid-feedback">
                                                 {{$message}}
                                             </div>
                                             @enderror
                                      </div>

                                   <div class="row">
                                         <div class="col-md-6">
                                             <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id=""><i class="fas fa-building"></i></span>
                                                </div>
                                                <input id="colonia" placeholder="Colonia" class="form-control @error("colonia") is-invalid @enderror" type="text" name="colonia" value="{{old("colonia")}}" >
                                                     @error("colonia")
                                                     <div class="invalid-feedback">
                                                         {{$message}}
                                                     </div>
                                                     @enderror
                                              </div>
                                         </div>
                                         <div class="col-md-6">
                                        <div class="input-group  mb-3">
                                           <div class="input-group-prepend">
                                             <span class="input-group-text" id=""><i class="fas fa-city"></i></span>
                                           </div>
                                           <input id="municipio" placeholder="Municipio" class="form-control @error("municipio") is-invalid @enderror" type="text" name="municipio" value="{{old("municipio")}}" >
                                                @error("municipio")
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                         </div>
                                         </div>
                                   </div>

                                   <div class="row">
                                         <div class="col-md-6">
                                             <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id=""><i class="fas fa-map"></i></span>
                                                </div>
                                                <input id="estado" placeholder="Estado" class="form-control @error("estado") is-invalid @enderror" type="text" name="estado" value="{{old("estado")}}" >
                                                     @error("estado")
                                                     <div class="invalid-feedback">
                                                         {{$message}}
                                                     </div>
                                                     @enderror
                                              </div>
                                         </div>


                                         <div class="col-md-6">
                                        <div class="input-group  mb-3">
                                           <div class="input-group-prepend">
                                             <span class="input-group-text" id=""><i class="fas fa-hospital"></i></span>
                                           </div>
                                           <input id="imss" placeholder="Numero de seguro social (nss)" class="form-control @error("imss") is-invalid @enderror" type="text" name="imss" value="{{old("imss")}}" >
                                                @error("imss")
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                         </div>
                                         </div>
                                   </div>
                                   <div class="row">
                                         <div class="col-md-6">
                                             <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id=""><i class="fas fa-id-card-alt"></i></span>
                                                </div>
                                                <input id="curp" placeholder="Curp" class="form-control @error("curp") is-invalid @enderror" type="text" name="curp" value="{{old("curp")}}" >
                                                     @error("curp")
                                                     <div class="invalid-feedback">
                                                         {{$message}}
                                                     </div>
                                                     @enderror
                                              </div>
                                         </div>
                                         <div class="col-md-6">
                                        <div class="input-group  mb-3">
                                           <div class="input-group-prepend">
                                             <span class="input-group-text" id=""><i class="fas fa-id-card"></i></span>
                                           </div>
                                           <input id="rfc" placeholder="Rfc" class="form-control @error("rfc") is-invalid @enderror" type="text" name="rfc" value="{{old("rfc")}}" >
                                                @error("rfc")
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                         </div>
                                         </div>
                                   </div>

                                   <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                         <span class="input-group-text" id=""><i class="fas fa-hand-holding-usd"></i></span>
                                       </div>

                                        <select id="operacion" class="custom-select @error('operacion') is-invalid @enderror" name="operacion">
                                          <option value=""> -Seleccione tipo de operación- </option>

                                          @foreach($operaciones as $operacion)
                                        <option {{ old('operacion') == $operacion->id ? 'selected': '' }} value="{{$operacion->id}}">{{$operacion->nombre}} </option>
                                          @endforeach

                                        </select>

                                            @error('operacion')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                     </div>

                                     <div class="row">
                                       <div class="col-md-6">
                                           <div class="input-group  mb-3">
                                              <div class="input-group-prepend">
                                                <span class="input-group-text" id=""><i class="fas fa-phone"></i></span>
                                              </div>
                                              <input id="tel" placeholder="Num Telefono" class="form-control @error("tel") is-invalid @enderror" type="text" name="tel" value="{{old("tel")}}" >
                                                   @error("tel")
                                                   <div class="invalid-feedback">
                                                       {{$message}}
                                                   </div>
                                                   @enderror
                                            </div>
                                       </div>
                                       <div class="col-md-6">
                                      <div class="input-group  mb-3">
                                         <div class="input-group-prepend">
                                           <span class="input-group-text" id=""><i class="fas fa-mobile-alt"></i></span>
                                         </div>
                                         <input id="cel" placeholder="Num celular" class="form-control @error("cel") is-invalid @enderror" type="text" name="cel" value="{{old("cel")}}" >
                                              @error("cel")
                                              <div class="invalid-feedback">
                                                  {{$message}}
                                              </div>
                                              @enderror
                                       </div>
                                       </div>
                                 </div>


                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                       <span class="input-group-text" id=""><i class="fas fa-at"></i></span>
                                     </div>
                                     <input id="email" placeholder="Su email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email')}}" >
                                          @error('email')
                                          <div class="invalid-feedback">
                                              {{$message}}
                                          </div>
                                          @enderror
                                   </div>

                                   <input type="hidden" name="id_prospectador" value="{{auth()->user()->id}}">

                                   <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-file-invoice"></i></span>
                                    </div>
                                    <input id="predial" placeholder="Cuenta con Predial" class="form-control @error('predial') is-invalid @enderror" type="text" name="predial" value="{{old('predial')}}" >
                                         @error('predial')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                   <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-file-invoice-dollar"></i></span>
                                    </div>
                                    <input id="agua" placeholder="Contrato de agua" class="form-control @error('agua') is-invalid @enderror" type="text" name="agua" value="{{old('agua')}}" >
                                         @error('agua')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                   <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-file-invoice-dollar"></i></span>
                                    </div>
                                    <input id="luz" placeholder="Contrato de luz" class="form-control @error('luz') is-invalid @enderror" type="text" name="luz" value="{{old('luz')}}" >
                                         @error('luz')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>


                               </div>
                                   <!-- form - propiedad -->
                               <div class="col-md-6">

                                <h2 class="text-center">Datos de la propiedad</h2>

                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-home"></i></span>
                                    </div>
                                    <input id="titulo" placeholder="Titulo de la casa" class="form-control @error('titulo') is-invalid @enderror" type="text" name="titulo" value="{{old('titulo')}}" >
                                         @error('titulo')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-bed"></i></span>
                                    </div>
                                    <input id="recamaras" placeholder="Cuantas recamaras" class="form-control @error('recamaras') is-invalid @enderror" type="text" name="recamaras" value="{{old('recamaras')}}" >
                                         @error('recamaras')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-toilet"></i></span>
                                    </div>
                                    <input id="baños" placeholder="Cuantos baños" class="form-control @error('baños') is-invalid @enderror" type="text" name="baños" value="{{old('baños')}}" >
                                         @error('baños')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-parking"></i></span>
                                    </div>
                                    <input id="estacionamiento" placeholder="Cuantos estacionamientos" class="form-control @error('estacionamiento') is-invalid @enderror" type="text" name="estacionamiento" value="{{old('estacionamiento')}}" >
                                         @error('estacionamiento')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>



                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-hard-hat"></i></span>
                                    </div>
                                    <input id="estructura" placeholder="Estructura de construción" class="form-control @error('estructura') is-invalid @enderror" type="text" name="estructura" value="{{old('estructura')}}" >
                                         @error('estructura')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>



                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-ruler"></i></span>
                                    </div>
                                    <input id="metros_terreno" placeholder="Metros terreno" class="form-control @error('metros_terreno') is-invalid @enderror" type="text" name="metros_terreno" value="{{old('metros_terreno')}}" >
                                         @error('metros_terreno')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                <div class="input-group  mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-ruler-combined"></i></span>
                                    </div>
                                    <input id="metros_construccion" placeholder="Metros Contrucción" class="form-control @error('metros_construccion') is-invalid @enderror" type="text" name="metros_construccion" value="{{old('metros_construccion')}}" >
                                         @error('metros_construccion')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                  <input type="hidden" name="uuid" value="{{Str::uuid()->toString()}}" id="uuid">

                                  <div class="form-group">
                                      <label for="">Nota</label>
                                      <textarea name="nota" id="" class="form-control" rows="10"></textarea>
                                    </div>

                                    <div class="form-group p-4 mt-5">
                                        <label for="imagenes">Imagenes</label>
                                        <div id="dropzone" class="dropzone "></div>
                                    </div>


                               </div>
                                 <!-- card-body -->
                                </div>
                                <button class="btn btn-primary" type="submit">Guardar Datos</button>
                        </form>
                       </div>
                    <!-- /.card-body -->
                   </div>
            <!-- /.card -->
                </div>
              </div>
            </div>
      </section>
    <!-- /.content -->
  </div>



@endsection

@section('scripts')
 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin="anonymous" ></script>
 <script src="https://unpkg.com/esri-leaflet" defer></script>
 <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous" defer></script>

@endsection




















