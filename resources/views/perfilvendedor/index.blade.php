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

                      <form action="{{route('perfilventa.store')}}" method="POST">
                          @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                            </div>

                             <select id="cliente" class="custom-select" name="cliente">
                               <option value=""> -Seleccione el prospecto- </option>

                               @foreach($vendedorcasas  as $vendedorcasa)
                             <option {{ old('cliente') == $vendedorcasa->id ? 'selected': '' }} value="{{ $vendedorcasa->id}}"> Cliente: {{ $vendedorcasa->nombre}}</option>
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
                              <input id="deuda" placeholder="Deuda " class="form-control @error('deuda') is-invalid @enderror" type="text" name="deuda" value="{{old('deuda')}}" >
                                   @error('deuda')
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
                                       <th> Curp o Credito</th>
                                       <th> Fecha de nacimiento</th>
                                       <th> Celular</th>
                                       <th> Telefono</th>
                                       <th> Mas Detalles</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($vendedorcasas  as $key => $vendedorcasa)
                                    <tr>
                                      <td>{{$key +1}}</td>
                                      <td>{{$vendedorcasa->nombre}}</td>
                                      <td>{{$vendedorcasa->curp  }}</td>
                                      <td>{{$vendedorcasa->fec_nacimiento   }}</td>
                                      <td>{{$vendedorcasa->cel   }}</td>
                                      <td>{{$vendedorcasa->tel   }}</td>
                                      <td>

                                        <a href="{{route('vendercasa.show', ['venderCasa' => $vendedorcasa->id])}}" class="btn btn-info">Ver</a>
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
             <h1 class="card-title">Registro de perfiles vendedor</h1>
         </div>
        <div class="card-body">
          <!--Tabla Usuario-->

          <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                       <th> Nombre del cLiente:</th>
                       <th> Nss:</th>
                       <th> Telefono</th>
                       <th> Celular</th>
                       <th> Deuda </th>
                       <th> Ver cliente:</th>
                       <th> Atendió</th>
                       <th> Nota:</th>

                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($perfilVendedores as $key => $perfilVendedor)
                    <tr>
                      <td>{{$key +1}}</td>
                      <td>{{$perfilVendedor->vendedor->nombre}}</td>
                      <td>{{$perfilVendedor->vendedor->imss}}</td>
                      <td>{{$perfilVendedor->vendedor->tel  }}</td>
                      <td>{{$perfilVendedor->vendedor->cel  }}</td>
                      <td><span class="badge badge-danger">$ {{$perfilVendedor->deuda}}</span> </td>
                      <td> <a href="{{route('vendercasa.show', ['venderCasa' => $perfilVendedor->vendedor->id])}}" class="btn btn-block btn-outline-info btn-sm">Ver más</a></td>
                      <td>{{$perfilVendedor->oficina->name}}</td>
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
                            <p class="card-text">{{$perfilVendedor->nota}}</p>
                            </div>

                            <div class="card-footer">
                                <a type="button" class="btn btn-warning text-white" href="{{route('perfilventa.edit', ['perfilVendedor' => $perfilVendedor->id ])}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                        <input type="hidden" name="id-editar" id="id-editar" value="{{$perfilVendedor->id}}">
                            </div>
                        </div>


                      </td>

                        <td>
                          <div class="btn-group" role="group" aria-label="Vertical button group">
                             <a type="button" class="btn btn-warning text-white" href="{{route('perfilventa.edit',['perfilVendedor' => $perfilVendedor->id ])}}">
                                 <i class="fas fa-pencil-alt"></i>
                             </a>

                            <form action="{{route('perfilventa.destroy',['perfilVendedor' => $perfilVendedor->id ])}}" method="POST">
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

