@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-4 mt-3">
                      <div class="card">

                        <div class="card-header bg-white  border-transparent">
                            <h1 class="card-title">Perfil </h1>
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

                      <form action="{{route('seguimiento.store')}}" method="POST">
                          @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="cliente" class="custom-select" name="cliente">
                               <option value=""> -Seleccione el cliente- </option>

                               @foreach($compradorescasas as $compradorescasa)
                             <option {{ old('cliente') == $compradorescasa->id ? 'selected': '' }} value="{{ $compradorescasa->id}}"> Cliente: {{ $compradorescasa->nombre}}</option>
                               @endforeach

                             </select>


                                 @error('cliente')
                                 <div class="invalid-feedback">
                                     {{$message}}
                                 </div>
                                 @enderror
                          </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-money-check-alt"></i></span>
                              </div>
                              <input id="capacidad_compra" placeholder="Capacidad de Compra" class="form-control @error('capacidad_compraEditar') is-invalid @enderror" type="text" name="capacidad_compraEditar" value="{{old('capacidad_compra')}}" >
                                   @error('capacidad_compra')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-file-invoice-dollar"></i></span>
                              </div>
                              <input id="descuento" placeholder="Descuento Mensual" class="form-control @error('descuento') is-invalid @enderror" type="text" name="descuento" value="{{old('descuento')}}" >
                                   @error('descuento')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                           <div class="input-group  mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id=""><i class="fas fa-hand-holding-usd"></i></span>
                              </div>
                              <input id="reembolso" placeholder="Reembolso" class="form-control @error('reembolso') is-invalid @enderror" type="text" name="reembolso" value="{{old('reembolso')}}" >
                                   @error('reembolso')
                                   <div class="invalid-feedback">
                                       {{$message}}
                                   </div>
                                   @enderror
                            </div>

                            <div class="form-group">
                                <label for="nota">Nota</label>
                                <textarea name="nota" class="form-control" id="nota" rows="5" ></textarea>
                            </div>

                            <input type="hidden" name="admin" value="{{auth()->user()->id}}">

                          <button class="btn btn-success text-center" type="submit">Guardar</button>

                      </form>



                     </div>
                    </div>
                    </div>


                    <div class="col-8 mt-3">

                        <div class="card">

                            <div class="card-header bg-white  border-transparent">
                                <h1 class="card-title"> Usuario comprador</h1>
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

                            <table id="table" class="table table-responsive table-bordered table-striped">
                                <thead>
                                  <tr>
                                    <th style="width: 10px">#</th>
                                       <th> Nombre del prospecto:</th>
                                       <th> Curp:</th>
                                       <th> Rfc</th>
                                       <th> Celular</th>
                                       <th> Telefono</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($compradorescasas as $key => $compradorescasa)
                                    <tr>
                                      <td>{{$key +1}}</td>
                                      <td>{{$compradorescasa->nombre}}</td>
                                      <td>{{$compradorescasa->curp}}</td>
                                      <td>{{$compradorescasa->rfc}}</td>
                                      <td>{{$compradorescasa->cel}}</td>
                                      <td>{{$compradorescasa->tel}}</td>

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
             <h1 class="card-title">Registro de perfiles de compra</h1>
         </div>
        <div class="card-body">
          <!--Tabla Usuario-->

          <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                       <th> Nombre del cLiente:</th>
                       <th> Nss:</th>
                       <th> Ver cliente:</th>
                       <th> Atendió</th>
                       <th> Capacidad de Compra</th>
                       <th> Descuento Mensual</th>
                       <th> Reembolso </th>
                       <th> Nota:</th>

                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($seguimientos as $key => $seguimiento)
                    <tr>
                      <td>{{$key +1}}</td>
                      <td>{{$seguimiento->cliente->nombre}}</td>
                      <td>{{$seguimiento->cliente->imss}}</td>
                      <td> <a href="{{route('comprarcasa.show', ['comprarCasa' => $seguimiento->cliente->id])}}" class="btn btn-block btn-outline-info btn-sm">Ver más</a></td>
                      <td>{{$seguimiento->oficina->name}}</td>
                      <td> <span class="badge badge-warning">$ {{$seguimiento->capacidad_compra}}</span></td>
                      <td><span class="badge badge-danger">$ {{$seguimiento->des_mensual}}</span> </td>
                      <td> <span class="badge badge-success ">$ {{$seguimiento->reembolso}}</span></td>
                      <td >

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
                            <p class="card-text">{{$seguimiento->nota}}</p>
                            </div>

                            <div class="card-footer">
                                        <button class="btn btn-warning btneditarnota" id="btneditarnota" data-toggle="modal" data-target="#modalnota">Actualizar</button>
                                        <input type="hidden" name="id-editar" id="id-editar" value="{{$seguimiento->id}}">
                            </div>
                        </div>


                      </td>

                        <td>
                          <div class="btn-group" role="group" aria-label="Vertical button group">
                          <a href="{{route('seguimiento.edit', ['seguimiento' => $seguimiento->id ])}}" class="btn btn-warning text-white " >
                                 <i class="fas fa-pencil-alt"></i>
                             </a>
                            <form action="{{route('seguimiento.destroy', ['seguimiento' => $seguimiento->id])}}" method="POST">
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



  <!-- Modal -->
  <div class="modal fade" id="modalnota" tabindex="-1" role="dialog" aria-labelledby="modalnotaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalnotaLabel">Actualizar Nota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
    <form action="{{route('nota.update')}}" method="POST">
        @method('put')
            @csrf
        <div class="modal-body">
                <input type="hidden" name="clienteEditar"  id="clienteEditar">
                <input type="hidden" name="adminEditar"  id="adminEditar">
                <input type="hidden" name="capacidad_compraEditar"  id="capacidad_compraEditar" >
                <input type="hidden" name="descuentoEditar"  id="descuentoEditar">
                <input type="hidden" name="reembolsoEditar"  id="reembolsoEditar">
                <input type="hidden" name="id"  id="idEditar">

                <div class="form-group">
                    <label for="nota">Nota</label>
                    <textarea name="notaEditar" class="form-control" id="notaEditar" rows="5" ></textarea>
                </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary guardarNota" id="guardarNota">Guardar</button>
        </div>
      </form>
      </div>
    </div>
  </div>




@endsection

@section('scripts')

<script src="{{ asset('js/perfil_compra.js') }}" defer></script>
@endsection
