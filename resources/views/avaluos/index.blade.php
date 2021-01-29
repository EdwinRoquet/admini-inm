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




    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-6 mt-3">
                      <div class="card">

                        <div class="card-header bg-white  border-transparent">
                            <h1 class="card-title">Avaluos</h1>
                            <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                 <i class="fas fa-minus"></i>
                             </button>
                           <button type="button" class="btn btn-tool" data-card-widget="remove">
                                 <i class="fas fa-times"></i>
                             </button>
                            </div>

                      </div>

                      <div class="card-body">

                      <form action="{{route('avaluo.store')}}" method="POST">
                          @csrf


                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="propiedad" class="custom-select" name="propiedad">
                               <option value=""> -Seleccione  propiedad- </option>
                               @foreach($propiedades as $key => $propiedad)
                                  <option {{ old('propiedad') == $propiedad->id ? 'selected': '' }} value="{{ $propiedad->id}}"> propiedad: {{ $propiedad->titulo}}</option>
                               @endforeach

                             </select>


                                 @error('propiedad')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                          </div>

                         <div class="form-group">
                             <label for="my-input"> Adjuntar plano</label>
                             <input id="my-input" class="form-control-file" type="file" name="ruta_plano">
                         </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-money-bill-wave"></i></span>
                              </div>
                              <input id="valor" placeholder="Importe Valor de Avaluo" class="form-control @error('valor') is-invalid @enderror" type="text" name="valor" value="{{old('valor')}}" >
                                   @error('valor')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-money-check-alt"></i></span>
                              </div>
                              <input id="expediente" placeholder="Expediente" class="form-control @error('expediente') is-invalid @enderror" type="text" name="expediente" value="{{old('expediente')}}" >
                                   @error('expediente')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-tint"></i></span>
                              </div>
                              <input id="status" placeholder="Estatus" class="form-control @error('status') is-invalid @enderror" type="text" name="status" value="{{old('status')}}" >
                                   @error('status')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>




                            <div class="form-group">
                                <label for="nota">Nota</label>
                             <textarea name="nota" class="form-control @error('nota') is-invalid @enderror" id="nota" rows="5" >{{old('nota')}}</textarea>
                                 @error('nota')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                           </div>



                            <input type="hidden" name="usuario" value="{{auth()->user()->id}}">

                            <input type="hidden" name="uuid" value="{{Str::uuid()->toString()}}" id="uuid">

                          <button class="btn btn-success text-center" type="submit">Guardar</button>

                      </form>



                     </div>
                    </div>
                    </div>


                    <div class="col-6 mt-3">

                        <div class="card">

                            <div class="card-header bg-white  border-transparent">
                                <h1 class="card-title">Perfil de usuario vendedor</h1>
                                <div class="card-tools">
                                 <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                     <i class="fas fa-minus"></i>
                                 </button>
                               <button type="button" class="btn btn-tool" data-card-widget="remove">
                                     <i class="fas fa-times"></i>
                                 </button>
                                </div>

                          </div>

                          <div class="form-group  p-2">
                            <label for="imagenes">Imagenes</label>
                            <div id="dropzone" class="dropzone "></div>
                          </div>

                         </div>
                        </div>
                    </div>

                  </div>

             <div class="col-12">
               <!-- Default box -->
               <div class="card ">
                  <div class="card-header bg-white border-transparent">
                      <h1 class="card-title">Registro de Avaluos</h1>
                  </div>
                 <div class="card-body">
                   <!--Tabla Usuario-->
                   <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                           <th> Titulo:</th>
                           <th> Nombre del dueño</th>
                           <th> Ver dueño & propiedad</th>
                           <th> Atendió</th>
                           <th> Expediente </th>
                           <th> Status:</th>
                           <th> Valor</th>
                           <th> Nota</th>
                           <th> Imagenes </th>

                        <th style="width: 40px">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($avaluoConImagenes as $key => $avaluo)
                        <tr>
                          <td>{{$key +1}}</td>

                           <td> {{ $avaluo->propiedades->titulo}} </td>
                           <td> {{ $avaluo->propiedades->dueño->nombre}} </td>
                           <td>
                           <a class="btn btn-primary" href="{{route('vendercasa.show', ['venderCasa' =>  $avaluo->propiedades->dueño->id])}}">Ver</a>
                           </td>
                           <td> {{ $avaluo->usuariofinal->name }} </td>
                           <td> {{ $avaluo->expediente}} </td>
                           <td> {{ $avaluo->status}} </td>
                           <td> {{ $avaluo->valor}} </td>

                          <td>

                            <div class="card " style="min-width: 200px">
                                <div class="card-header">
                                    <h5 class="card-title">Nota</h5>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                     </div>
                                </div>
                                <div class="card-body">
                                <p class="card-text">{{$avaluo->nota}}</p>
                                </div>

                                <div class="card-footer">
                                            {{-- <button class="btn btn-warning btneditarnota" id="btneditarnota" data-toggle="modal" data-target="#modalnota">Actualizar</button> --}}
                                            <input type="hidden" name="id-editar" id="id-editar" value="{{$avaluo->id}}">
                                </div>
                            </div>


                          </td>

                            <td>
                                <div class="row">
                                    @foreach($avaluo->imagenes as $imagen)
                                         <img src="/storage/{{$imagen->ruta_imagen}}" height="50" width="50" class="img-fluid m-1" alt="">

                                    @endforeach
                                </div>

                            </td>

                            <td>
                             <div class="btn-group" role="group" aria-label="Vertical button group">

                            <a class="btn btn-warning text-white " href="{{route('avaluo.edit',['avaluo' => $avaluo->id])}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>



                             <form action="{{route('avaluo.destroy' , ['avaluo' => $avaluo->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger  text-white " type="submit"><i class="fas fa-trash-alt"></i></button>
                             </form>

                              </div>
                            </td>

                        </tr>

                        @endforeach

                    </tbody>
                  </table>


                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
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


{{-- <script src="{{ asset('js/perfil_compra.js') }}" defer></script> --}}
@endsection
