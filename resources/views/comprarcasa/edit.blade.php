
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

                <form action="{{route('comprarcasa.update', ['comprarCasa'=> $comprarCasa->id])}}" method="POST">
                @csrf
                @method('PUT')

               <div class="input-group  mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                </div>
                <input id="nombre" placeholder="Nombre Completo" class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" value="{{$comprarCasa->nombre}}" >
                     @error('nombre')
                     <div class="invalid-feedback">
                         {{$message}}
                     </div>
                     @enderror
              </div>

              <label for="">Fecha de nacimiento</label>
             <div class="input-group  mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id=""><i class="fas fa-calendar-week"></i></span>
                </div>
                <input id="fecha" placeholder="Fec" class="form-control @error("fecha") is-invalid @enderror" type="date" name="fecha" value="{{$comprarCasa->fec_nacimiento}}" >
                     @error("fecha")
                     <div class="invalid-feedback">
                         {{$message}}
                     </div>
                     @enderror
              </div>



                        <div class="input-group  mb-3">
                           <div class="input-group-prepend">
                             <span class="input-group-text" id=""><i class="fas fa-road"></i></span>
                           </div>
                           <input id="direccion" placeholder="Calle, Numero Y Codigo Postal" class="form-control @error("direccion") is-invalid @enderror" type="text" name="direccion" value="{{$comprarCasa->direccion}}" >
                                @error("direccion")
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                         </div>


                   <div class="input-group  mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id=""><i class="fas fa-globe-americas"></i></span>
                      </div>
                      <input id="nacionalidad" placeholder="Nacionalidad" class="form-control @error("nacionalidad") is-invalid @enderror" type="text" name="nacionalidad" value="{{$comprarCasa->nacionalidad}}" >
                           @error("nacionalidad")
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
                           <input id="colonia" placeholder="Colonia" class="form-control @error("colonia") is-invalid @enderror" type="text" name="colonia" value="{{$comprarCasa->colonia}}" >
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
                      <input id="municipio" placeholder="Municipio" class="form-control @error("municipio") is-invalid @enderror" type="text" name="municipio" value="{{$comprarCasa->municipio}}" >
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
                           <input id="estado" placeholder="Estado" class="form-control @error("estado") is-invalid @enderror" type="text" name="estado" value="{{$comprarCasa->estado}}" >
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
                      <input id="imss" placeholder="Numero de seguro social (nss)" class="form-control @error("imss") is-invalid @enderror" type="text" name="imss" value="{{$comprarCasa->imss}}" >
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
                           <input id="curp" placeholder="Curp" class="form-control @error("curp") is-invalid @enderror" type="text" name="curp" value="{{$comprarCasa->curp}}" >
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
                      <input id="rfc" placeholder="Rfc" class="form-control @error("rfc") is-invalid @enderror" type="text" name="rfc" value="{{$comprarCasa->rfc}}" >
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
                    <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                  </div>

                   <select id="operacion" class="custom-select" name="operacion">
                     <option value=""> -Seleccione tipo de operación- </option>

                     @foreach($operaciones as $operacion)
                   <option {{ $comprarCasa->id_operacion == $operacion->id ? 'selected': '' }} value="{{$operacion->id}}">{{$operacion->nombre}} </option>
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
                         <input id="tel" placeholder="Num Telefono" class="form-control @error("tel") is-invalid @enderror" type="text" name="tel" value="{{$comprarCasa->tel}}" >
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
                    <input id="cel" placeholder="Num celular" class="form-control @error("cel") is-invalid @enderror" type="text" name="cel" value="{{$comprarCasa->cel}}" >
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
                <input id="email" placeholder="Su email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{$comprarCasa->email}}" >
                     @error('email')
                     <div class="invalid-feedback">
                         {{$message}}
                     </div>
                     @enderror
              </div>

              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-hand-holding-usd"></i></span>
                  </div>

              <select id="metodo" class="custom-select" name="metodo" value="{{old("metodo")}}" >
                     <option value=""> -Metodo de pago- </option>
                     @foreach($metodos as $metodo)
                     <option {{ $comprarCasa->id_metodo == $metodo->id ? 'selected': '' }} value="{{$metodo->id}}">{{$metodo->nombre}} </option>
                       @endforeach
                   </select>


                       @error('metodo')
                       <div class="invalid-feedback">
                           {{$message}}
                       </div>
                       @enderror
                </div>

              <input type="hidden" name="id_prospectador" value="{{$comprarCasa->id_prospectador}}">

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












