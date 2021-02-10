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
                  <div class="col-12 col-md-6 mt-3">
                      <div class="card">

                        <div class="card-header bg-white  border-transparent">
                            <h1 class="card-title">Vendedores</h1>
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

                      <form action="{{route('venta.store')}}" method="POST">
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


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="perfil" class="custom-select" name="perfil">
                               <option value=""> -Seleccione el Perfil comprador </option>
                               @foreach($perfiles as $key => $perfile)
                                  <option {{ old('perfil') == $perfile->id ? 'selected': '' }} value="{{ $perfile->id}}"> perfile: {{ $perfile->cliente->nombre}}</option>
                               @endforeach

                             </select>


                                 @error('perfil')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                          </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="credito" class="custom-select" name="credito">
                               <option value=""> -Seleccione el tipo de credito- </option>
                                  <option value="NINGUNO"> NINGUNO </option>
                                  <option value="INDIVIDUAL"> INDIVIDUAL </option>
                                  <option value="CONYUGAL"> CONYUGAL </option>
                                  <option value="FAMILIAR"> FAMILIAR </option>
                                  <option value="CORRESIDENCIA"> CORRESIDENCIA</option>

                             </select>


                                 @error('credito')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                          </div>


                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              <input id="clave" placeholder="Clave Interbancaria" class="form-control @error('clave') is-invalid @enderror" type="text" name="clave" value="{{old('clave')}}" >
                                   @error('clave')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-dollar-sign"></i></span>
                              </div>
                              <input id="nombre_empresa" placeholder="Nombre de la empresa" class="form-control @error('nombre_empresa') is-invalid @enderror" type="text" name="nombre_empresa" value="{{old('nombre_empresa')}}" >
                                   @error('nombre_empresa')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-money-bill-wave"></i></span>
                              </div>
                              <input id="tel_empresa" placeholder="Telefono de la empresa" class="form-control @error('tel_empresa') is-invalid @enderror" type="text" name="tel_empresa" value="{{old('tel_empresa')}}" >
                                   @error('tel_empresa')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-money-check-alt"></i></span>
                              </div>
                              <input id="reg_patronal" placeholder="Registro patronal" class="form-control @error('reg_patronal') is-invalid @enderror" type="text" name="reg_patronal" value="{{old('reg_patronal')}}" >
                                   @error('reg_patronal')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-tint"></i></span>
                              </div>
                              <input id="extension" placeholder="Extension" class="form-control @error('extension') is-invalid @enderror" type="text" name="extension" value="{{old('extension')}}" >
                                   @error('extension')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>
                            <input type="hidden" name="uuid" value="{{Str::uuid()->toString()}}" id="uuid">
                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-object-ungroup"></i></span>
                              </div>
                              <input id="taller" placeholder="Taller" class="form-control @error('taller') is-invalid @enderror" type="text" name="taller" value="{{old('taller')}}" >
                                   @error('taller')
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

                            <div class="form-group">
                                <label for="referenciauno">Referencia Uno</label>
                             <textarea name="referenciauno" class="form-control @error('referenciauno') is-invalid @enderror" id="referenciauno" rows="5" >{{old('referenciauno')}}</textarea>
                                 @error('referenciauno')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                           </div>

                            <div class="form-group">
                                <label for="referenciados">Referencia Dos</label>
                             <textarea name="referenciados" class="form-control @error('referenciados') is-invalid @enderror" id="referenciados" rows="5" >{{old('referenciados')}}</textarea>
                                 @error('referenciados')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                           </div>
                            <div class="form-group">
                                <label for="referenciatres">Referencia Tres</label>
                             <textarea name="referenciatres" class="form-control @error('referenciatres') is-invalid @enderror" id="referenciatres" rows="5" >{{old('referenciatres')}}</textarea>
                                 @error('referenciatres')
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


                    <div class="col-12 col-md-6 mt-3">

                        <div class="card">

                            <div class="card-header bg-white  border-transparent">
                                <h1 class="card-title">Imagenes:</h1>
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

                            <div class="form-group ">
                                <label for="imagenes">Imagenes</label>
                                <div id="dropzone" class="dropzone "></div>
                            </div>

                         </div>
                        </div>

                    </div>




                  </div>

                  </div>


    <div class="col-12">
      <!-- Default box -->
      <div class="card ">
         <div class="card-header bg-white border-transparent">
             <h1 class="card-title">ventas</h1>
         </div>
        <div class="card-body">
          <!--Tabla Usuario-->

          <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                       <th> Nombre del comprador:</th>
                       <th> Nss Comprador</th>
                       <th> TIpo de Credito</th>
                       <th> Ver comprador </th>
                       <th> Propiedad:</th>
                       <th> Dueño de la propiedad</th>
                       <th> Ver propiedad y dueño</th>
                       <th> Nombre de la empresa </th>
                       <th> Telefono de la empresa </th>
                       <th> Registro patronal </th>
                       <th> Extension  </th>
                       <th> Clave interbancaria:</th>
                       <th> Taller</th>
                       <th> Referencia uno</th>
                       <th> Referencia dos</th>
                       <th> Referencia tres</th>
                       <th> Nota:</th>
                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $key => $venta)
                    <tr>
                      <td>{{$key +1}}</td>
                      <td>{{$venta->perfiles->cliente->nombre}}</td>
                      <td>{{$venta->perfiles->cliente->imss}}</td>
                      <td>{{$venta->t_credito}}</td>
                      <td><a href="" class="btn btn-info">Ver</a></td>
                      <td>{{$venta->propiedades->titulo}}</td>
                      <td>{{$venta->propiedades->dueño->nombre}}</td>
                      <td><a href="" class="btn btn-info">Ver</a></td>
                       <td> {{ $venta->nombre_empresa}} </td>
                       <td> {{ $venta->tel_empresa}} </td>
                       <td> {{ $venta->reg_patronal}} </td>
                       <td> {{ $venta->extension}} </td>
                       <td> {{ $venta->clave_inter}} </td>
                       <td> {{ $venta->taller}} </td>
                       <td> {{ $venta->refer_uno}} </td>
                       <td> {{ $venta->refer_dos}} </td>
                       <td> {{ $venta->refer_tres}} </td>

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
                            <p class="card-text">{{$venta->nota}}</p>
                            </div>

                            <div class="card-footer">
                                        <button class="btn btn-warning btneditarnota" id="btneditarnota" data-toggle="modal" data-target="#modalnota">Actualizar</button>
                                        <input type="hidden" name="id-editar" id="id-editar" value="{{$venta->id}}">
                            </div>
                        </div>


                      </td>

                        <td>
                         <div class="btn-group" role="group" aria-label="Vertical button group">

                        <a class="btn btn-warning text-white " href="{{route('venta.edit',['venta' => $venta->id])}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>



                         <form action="{{route('venta.destroy' , ['venta' => $venta->id])}}" method="POST">
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
