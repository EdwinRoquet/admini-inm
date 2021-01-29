
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


                       <a href="{{route('avaluo.index')}}" class="btn btn-info" >Regresar</a>

                       <form action="{{route('avaluo.update',['avaluo' => $avaluo->id ])}}" method="POST">
                          @csrf
                          @method('PUT')

                          <div class="row">
                                 <!-- form - vendedor -->
                               <div class="col-md-6">
                                 <h2 class="text-center">Editar datos de un Avaluo</h2>


                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="propiedad" class="custom-select" name="propiedad">
                               <option value=""> -Seleccione  propiedad- </option>
                               @foreach($propiedades as $key => $propiedad)
                                  <option {{ $avaluo->id_propiedad  == $propiedad->id ? 'selected': '' }} value="{{ $propiedad->id}}"> propiedad: {{ $propiedad->titulo}}</option>
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
                              <input id="valor" placeholder="Importe Valor de Avaluo" class="form-control @error('valor') is-invalid @enderror" type="text" name="valor" value="{{$avaluo->valor}}" >
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
                              <input id="expediente" placeholder="Expediente" class="form-control @error('expediente') is-invalid @enderror" type="text" name="expediente" value="{{$avaluo->expediente}}" >
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
                              <input id="status" placeholder="Estatus" class="form-control @error('status') is-invalid @enderror" type="text" name="status" value="{{$avaluo->status}}" >
                                   @error('status')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>




                            <div class="form-group">
                                <label for="nota">Nota</label>
                             <textarea name="nota" class="form-control @error('nota') is-invalid @enderror" id="nota" rows="5" >{{$avaluo->nota}}</textarea>
                                 @error('nota')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                           </div>



                            <input type="hidden" name="usuario" value="{{$avaluo->id_usuario}}">

                            <input type="hidden" name="uuid" value="{{$avaluo->uuid}}" id="uuid">

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

