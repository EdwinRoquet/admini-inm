@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">




    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-12 col-md-4 mt-3">
                      <div class="card">

                        <div class="card-header bg-white  border-transparent">
                            <h1 class="card-title">Asesor de prospectos</h1>
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

                      <form action="{{route('asesor.store')}}" method="POST">
                          @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="perfil" class="custom-select" name="perfil">
                               <option value=""> -Seleccione el prospecto- </option>
                               @foreach($perfilventas as $key => $perfilventa)
                                  {{$perfilventa->vendedor->nombre}}
                                  <option {{ old('perfil') == $perfilventa->id ? 'selected': '' }} value="{{ $perfilventa->id}}"> perfil: {{ $perfilventa->vendedor->nombre}}</option>
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
                              <input id="pago_mensual" placeholder="Pago Mensual" class="form-control @error('pago_mensual') is-invalid @enderror" type="text" name="pago_mensual" value="{{old('pago_mensual')}}" >
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
                              <input id="monto" placeholder="Monto de Recuperación" class="form-control @error('monto') is-invalid @enderror" type="text" name="monto_de_recuperacion" value="{{old('monto_de_recuperacion')}}" >
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
                              <input id="predial" placeholder="Predial" class="form-control @error('predial') is-invalid @enderror" type="text" name="predial" value="{{old('predial')}}" >
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
                              <input id="deuda_agua" placeholder="Deuda del agua" class="form-control @error('deuda_agua') is-invalid @enderror" type="text" name="deuda_agua" value="{{old('deuda_agua')}}" >
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
                              <input id="deuda_luz" placeholder="Deuda del luz" class="form-control @error('deuda_luz') is-invalid @enderror" type="text" name="deuda_luz" value="{{old('deuda_luz')}}" >
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
                              <input id="otros" placeholder="Otros" class="form-control @error('otros') is-invalid @enderror" type="text" name="otros" value="{{old('otros')}}" >
                                   @error('otros')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>



                            <div class="form-group">
                                <label for="nota">Nota</label>
                             <textarea name="nota" class="form-control @error('otros') is-invalid @enderror" id="nota" rows="5" >{{old('nota')}}</textarea>
                                 @error('otros')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                           </div>

                            <input type="hidden" name="usuario" value="{{auth()->user()->id}}">

                          <button class="btn btn-success text-center" type="submit">Guardar</button>

                      </form>



                     </div>
                    </div>
                    </div>


                    <div class="col-12 col-md-8 mt-3">

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

                          <div class="card-body">

                            <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                       <th> Nombre del prospecto:</th>
                                       <th> Curp:</th>
                                       <th> Rfc</th>
                                       <th> Celular</th>
                                       <th> Telefono</th>
                                       <th> Deuda</th>
                                       <th> Nota</th>
                                       <th> Atendió</th>
                                       <th> Mas Detalles</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($perfilventas as $key => $perfilventa)
                                    <tr>
                                      <td>{{$key +1}}</td>
                                      <td>{{$perfilventa->vendedor->nombre}}</td>
                                      <td>{{$perfilventa->vendedor->imss }}</td>
                                      <td>{{$perfilventa->vendedor->rfc }}</td>
                                      <td>{{$perfilventa->vendedor->cel }}</td>
                                      <td>{{$perfilventa->vendedor->tel }}</td>
                                      <td>{{$perfilventa->deuda }}</td>
                                      <td>{{$perfilventa->nota }}</td>
                                      <td>{{$perfilventa->oficina->name }}</td>
                                      <td>

                                        <a href="{{route('vendercasa.show', ['venderCasa' => $perfilventa->id ])}}" class="btn btn-info">Ver</a>
                                      </td>

                                    @endforeach

                                </tbody>
                              </table>

                         </div>
                        </div>

                    </div>




                  </div>

                  </div>


    <div class="col-12">
      <!-- Default box -->
      <div class="card ">
         <div class="card-header bg-white border-transparent">
             <h1 class="card-title">Registro de Asesores</h1>
         </div>
        <div class="card-body">
          <!--Tabla Usuario-->

          <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                       <th> Nombre del cLiente:</th>
                       <th> Monto de recuperación </th>
                       <th> Pago Mensual:</th>
                       <th> Predial</th>
                       <th> Deuda agua </th>
                       <th> Deuda luz </th>
                       <th> Otros </th>
                       <th> Ver client:</th>
                       <th> Atendió</th>
                       <th> Nota:</th>

                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- pago_mes
                    de_predial
                    monto
                    de_agua
                    de_luz
                    nota
                    otros --}}
                    @foreach($asesores as $key => $asesor)
                    <tr>
                      <td>{{$key +1}}</td>
                      <td>{{$asesor->perfilprospecto->vendedor->nombre}}</td>
                      <td>{{$asesor->monto}}</td>
                      <td>{{$asesor->pago_mes}}</td>
                      <td>{{$asesor->de_predial }}</td>
                      <td>{{$asesor->de_agua }}</td>
                      <td>{{$asesor->de_luz }}</td>
                      <td>{{$asesor->otros }}</td>
                      <td> <a href="{{route('vendercasa.show', ['venderCasa' => $asesor->perfilprospecto->vendedor->id])}}" class="btn btn-block btn-outline-info btn-sm">Ver más</a></td>
                      <td>{{$asesor->usuario->name}}</td>
                      <td>

                        <div class="card " style="width: 200px">
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
                            <p class="card-text">{{$asesor->nota}}</p>
                            </div>

                            <div class="card-footer">
                                        <button class="btn btn-warning btneditarnota" id="btneditarnota" data-toggle="modal" data-target="#modalnota">Actualizar</button>
                                        <input type="hidden" name="id-editar" id="id-editar" value="{{$asesor->id}}">
                            </div>
                        </div>


                      </td>

                        <td>

                            <div class="btn-group" role="group" aria-label="Button group">

                                <a class="btn btn-warning text-white " href="{{route('asesor.edit', ['asesor' => $asesor->id ])}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{route('asesor.destroy', ['asesor' => $asesor->id ])}}" method="POST">
                                    @csrf
                                    @method('delete')
                                  <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
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

<script src="{{ asset('js/perfil_compra.js') }}" defer></script>
@endsection
