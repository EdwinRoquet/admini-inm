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
                          <h2 class="text-center">Datos del Vendedor</h2>
                          <div class="row">
                                 <!-- form - vendedor -->
                               <div class="col-md-6">


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







                               </div>
                                   <!-- form - propiedad -->
                               <div class="col-md-6">
                                       <div class="row  ">



                                         <div class="col-md-6">
                                        <div class="input-group  mb-3">
                                           <div class="input-group-prepend">
                                             <span class="input-group-text" id=""><i class="fas fa-hospital"></i></span>
                                           </div>
                                           <input id="imss" placeholder="nss" class="form-control @error("imss") is-invalid @enderror" type="text" name="imss" value="{{old("imss")}}" >
                                                @error("imss")
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                         </div>
                                         </div>


                                         <div class="col-md-6">
                                             <div class="input-group  mb-3">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text" id=""><i class="fas fa-id-card-alt"></i></span>
                                                </div>
                                                <input id="curp" placeholder="Curp o Credito" class="form-control @error("curp") is-invalid @enderror" type="text" name="curp" value="{{old("curp")}}" >
                                                     @error("curp")
                                                     <div class="invalid-feedback">
                                                         {{$message}}
                                                     </div>
                                                     @enderror
                                              </div>
                                         </div>
                               </div>



                                  <div class="form-group">
                                      <label for="">Nota</label>
                                      <textarea name="nota" id="" class="form-control" rows="10"></textarea>
                                    </div>
                                    <input type="hidden" name="uuid" value="{{Str::uuid()->toString()}}" id="uuid">
                                    <input type="hidden" name="id_prospectador" value="{{auth()->user()->id}}">
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




















