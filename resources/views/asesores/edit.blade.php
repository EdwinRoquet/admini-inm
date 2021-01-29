
@extends('layouts.adminlte')


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
                       <a href="{{route('asesor.index')}}"  class="btn btn-info" >Regresar</a>

                            <form action="{{route('asesor.update', ['asesor'=> $asesor->id])}}" method="POST">
                                 @csrf
                                 @method('PUT')
                                       <legend class="text-center">Editar un Asesorado</legend>

                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                                    </div>

                                     <select id="perfil" class="custom-select" name="perfil">
                                       <option value=""> -Seleccione el prospecto- </option>
                                       @foreach($perfilventas as $key => $perfilventa)
                                          {{$perfilventa->vendedor->nombre}}
                                          <option {{ $asesor->id_perfil   == $perfilventa->id ? 'selected': '' }} value="{{ $perfilventa->id}}"> perfil: {{ $perfilventa->vendedor->nombre}}</option>
                                       @endforeach

                                     </select>


                                         @error('perfil')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                  </div>

                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-dollar-sign"></i></span>
                                      </div>
                                      <input id="pago_mensual" placeholder="Pago Mensual" class="form-control @error('pago_mensual') is-invalid @enderror" type="text" name="pago_mensual" value="{{$asesor->pago_mes }}" >
                                           @error('pago_mensual')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>

                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-money-bill-wave"></i></span>
                                      </div>
                                      <input id="monto" placeholder="Monto de Recuperación" class="form-control @error('monto') is-invalid @enderror" type="text" name="monto_de_recuperacion" value="{{$asesor->monto}}" >
                                           @error('monto_de_recuperacion')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>

                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-money-check-alt"></i></span>
                                      </div>
                                      <input id="predial" placeholder="Predial" class="form-control @error('predial') is-invalid @enderror" type="text" name="predial" value="{{$asesor->de_predial}}" >
                                           @error('predial')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>

                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-tint"></i></span>
                                      </div>
                                      <input id="deuda_agua" placeholder="Deuda del agua" class="form-control @error('deuda_agua') is-invalid @enderror" type="text" name="deuda_agua" value="{{$asesor->de_agua}}" >
                                           @error('deuda_agua')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>
                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-lightbulb"></i></span>
                                      </div>
                                      <input id="deuda_luz" placeholder="Deuda del luz" class="form-control @error('deuda_luz') is-invalid @enderror" type="text" name="deuda_luz" value="{{$asesor->de_luz}}" >
                                           @error('deuda_luz')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>
                                   <div class="input-group  mb-3">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id=""><i class="fas fa-object-ungroup"></i></span>
                                      </div>
                                      <input id="otros" placeholder="Otros" class="form-control @error('otros') is-invalid @enderror" type="text" name="otros" value="{{$asesor->otros}}" >
                                           @error('otros')
                                           <div class="invalid-feedback">
                                               {{$message}}
                                           </div>
                                           @enderror
                                    </div>



                                    <div class="form-group">
                                        <label for="nota">Nota</label>
                                     <textarea name="nota" class="form-control @error('otros') is-invalid @enderror" id="nota" rows="5" >{{$asesor->nota}}</textarea>
                                         @error('otros')
                                         <div class="invalid-feedback">
                                             {{$message}}
                                         </div>
                                         @enderror
                                   </div>

                                    <input type="hidden" name="usuario" value="{{$asesor->id_usuario}}">

                                <button class="btn btn-success" type="submit">Guardar Cambios</button>
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












