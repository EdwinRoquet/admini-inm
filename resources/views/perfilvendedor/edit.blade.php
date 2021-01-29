
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

                       <a href="{{route('perfilventa.index')}}" class="btn btn-info">Regresar</a>

                          <form action="{{route('perfilventa.update', ['perfilVendedor' => $perfilVendedor->id ])}}" method="POST">
                            @csrf
                            @method('PUT')

                            <legend class="text-center">Editar un perfil vendedor</legend>


                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                                </div>

                                 <select id="cliente" class="custom-select" name="cliente">
                                   <option value=""> -Seleccione el prospecto- </option>

                                   @foreach($vendedorcasas  as $vendedorcasa)
                                 <option {{ $perfilVendedor->id_vendedor == $vendedorcasa->id ? 'selected': '' }} value="{{ $vendedorcasa->id}}"> Cliente: {{ $vendedorcasa->nombre}}</option>
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
                                    <span class="input-group-text" id=""><i class="fas fa-dollar-sign"></i></span>
                                  </div>
                                <input id="deuda" placeholder="Deuda " class="form-control @error('deuda') is-invalid @enderror" type="text" name="deuda" value="{{$perfilVendedor->deuda}}" >
                                       @error('deuda')
                                       <div class="invalid-feedback">
                                           {{$message}}
                                       </div>
                                       @enderror
                                </div>



                                <div class="form-group">
                                    <label for="nota">Nota</label>
                                    <textarea name="nota" class="form-control" id="nota" rows="5" >{{$perfilVendedor->nota}}</textarea>
                                </div>

                                <input type="hidden" name="admin" value="{{$perfilVendedor->id_admin}}">


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












