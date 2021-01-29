
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
                       <a href="{{route('seguimiento.index')}}" class="btn btn-info">Regresar</a>
                          <form action="{{route('nota.update')}}" method="POST">
                            @csrf
                            @method('PUT')

                            <legend class="text-center">Editar un perfil comprador</legend>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                                </div>

                                 <select id="cliente" class="custom-select" name="clienteEditar">
                                   <option value=""> -Seleccione el cliente- </option>

                                   @foreach($compradorescasas as $compradorescasa)
                                 <option {{ $seguimiento->id_cliente == $compradorescasa->id ? 'selected': '' }} value="{{ $compradorescasa->id}}"> Cliente: {{ $compradorescasa->nombre}}</option>
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
                                  <input id="capacidad_compraEditar" placeholder="Capacidad de Compra" class="form-control @error('capacidad_compraEditar') is-invalid @enderror" type="text" name="capacidad_compraEditar" value="{{$seguimiento->capacidad_compra}}" >
                                       @error('capacidad_compraEditar')
                                       <div class="invalid-feedback">
                                           {{$message}}
                                       </div>
                                       @enderror
                                </div>

                               <div class="input-group  mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-file-invoice-dollar"></i></span>
                                  </div>
                                  <input id="descuento" placeholder="Descuento Mensual" class="form-control @error('descuentoEditar') is-invalid @enderror" type="text" name="descuentoEditar" value="{{$seguimiento->des_mensual}}" >
                                       @error('descuentoEditar')
                                       <div class="invalid-feedback">
                                           {{$message}}
                                       </div>
                                       @enderror
                                </div>

                               <div class="input-group  mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id=""><i class="fas fa-hand-holding-usd"></i></span>
                                  </div>
                                  <input id="reembolsoEditar" placeholder="reembolsoEditar" class="form-control @error('reembolsoEditar') is-invalid @enderror" type="text" name="reembolsoEditar" value="{{$seguimiento->reembolso}}" >
                                       @error('reembolsoEditar')
                                       <div class="invalid-feedback">
                                           {{$message}}
                                       </div>
                                       @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nota">Nota</label>
                                    <textarea name="notaEditar" class="form-control" id="nota" rows="5" >{{$seguimiento->nota}}</textarea>
                                </div>

                                <input type="hidden" name="adminEditar" value="{{auth()->user()->id}}">

                                <input type="hidden" name="id"  value="{{$seguimiento->id}}" id="idEditar">

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












