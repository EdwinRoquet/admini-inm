
@extends('layouts.adminlte')

@section('styles')

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


                       <a href="{{route('venta.index')}}" class="btn btn-info" >Regresar</a>

                       <form action="{{route('venta.update',['venta' => $venta->id ])}}" method="POST">
                          @csrf
                          @method('PUT')

                          <div class="row">
                                 <!-- form - vendedor -->
                               <div class="col-md-6">
                                 <h2 class="text-center">Datos del Vendedor</h2>

                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                                    </div>

                                     <select id="propiedad" class="custom-select" name="propiedad">
                                       <option value=""> -Seleccione  propiedad- </option>
                                       @foreach($propiedades as $key => $propiedad)
                                          <option {{ $venta->id_propiedad  == $propiedad->id ? 'selected': '' }} value="{{ $propiedad->id}}"> propiedad: {{ $propiedad->titulo}}</option>
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
                                          <option {{ $venta->id_perfil == $perfile->id ? 'selected': '' }} value="{{ $perfile->id}}"> perfile: {{ $perfile->cliente->nombre}}</option>
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
                                          <option selected value="{{$venta->t_credito}}"> {{$venta->t_credito}} </option>
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
                                      <input id="clave" placeholder="Clave Interbancaria" class="form-control @error('clave') is-invalid @enderror" type="text" name="clave" value="{{$venta->clave_inter}}" >
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
                                      <input id="nombre_empresa" placeholder="Nombre de la empresa" class="form-control @error('nombre_empresa') is-invalid @enderror" type="text" name="nombre_empresa" value="{{$venta->nombre_empresa}}" >
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
                                      <input id="tel_empresa" placeholder="Telefono de la empresa" class="form-control @error('tel_empresa') is-invalid @enderror" type="text" name="tel_empresa" value="{{$venta->tel_empresa}}" >
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
                                      <input id="reg_patronal" placeholder="Registro patronal" class="form-control @error('reg_patronal') is-invalid @enderror" type="text" name="reg_patronal" value="{{$venta->reg_patronal}}" >
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
                                      <input id="extension" placeholder="Extension" class="form-control @error('extension') is-invalid @enderror" type="text" name="extension" value="{{$venta->extension}}" >
                                           @error('extension')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>

                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-object-ungroup"></i></span>
                                      </div>
                                      <input id="taller" placeholder="Taller" class="form-control @error('taller') is-invalid @enderror" type="text" name="taller" value="{{$venta->taller}}" >
                                           @error('taller')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>



                                    <div class="form-group">
                                        <label for="nota">Nota</label>
                                     <textarea name="nota" class="form-control @error('nota') is-invalid @enderror" id="nota" rows="5" >{{$venta->nota}}</textarea>
                                         @error('nota')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                   </div>

                                    <div class="form-group">
                                        <label for="referenciauno">Referencia Uno</label>
                                     <textarea name="referenciauno" class="form-control @error('referenciauno') is-invalid @enderror" id="referenciauno" rows="5" >{{$venta->refer_uno}}</textarea>
                                         @error('referenciauno')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                   </div>

                                    <div class="form-group">
                                        <label for="referenciados">Referencia Dos</label>
                                     <textarea name="referenciados" class="form-control @error('referenciados') is-invalid @enderror" id="referenciados" rows="5" >{{$venta->refer_dos}}</textarea>
                                         @error('referenciados')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                   </div>
                                    <div class="form-group">
                                        <label for="referenciatres">Referencia Tres</label>
                                     <textarea name="referenciatres" class="form-control @error('referenciatres') is-invalid @enderror" id="referenciatres" rows="5" >{{$venta->refer_tres}}</textarea>
                                         @error('referenciatres')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                   </div>

                                   <input type="hidden" name="uuid" value="{{$venta->uuid}}" id="uuid">
                                   <input type="hidden" name="usuario" value="{{$venta->id_usuario}}" id="uuid">


                               </div>
                                   <!-- form - propiedad -->
                               <div class="col-md-6">

                                <h2 class="text-center">Datos de la propiedad</h2>

                                    <div class="form-group p-4 mt-5">
                                        <label for="imagenes">Imagenes</label>
                                        <div id="dropzone" class="dropzone "></div>

                                        @if(count($imagenes) > 0)
                                        @foreach($imagenes as $imagen)
                                            <input class="galeria" type="hidden" value="{{$imagen->ruta_imagen}}">
                                        @endforeach
                                    @endif
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous" defer></script>

@endsection

