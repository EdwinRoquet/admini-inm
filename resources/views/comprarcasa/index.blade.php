@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Prospectos para comprar casa </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrador Prospectos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">

      <!-- Default box -->
      <div class="card">

        <div class="card-body">
          <!-- Button Agregar Modal Usuario-->
          <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#agregarUsuario">
              Agregar prospecto
          </button>

          <!--Tabla Usuario-->

            <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre </th>
                    <th>Fecha de Nacimiento </th>
                    <th>Direccion </th>
                    <th>Nacionalidad </th>
                    <th>Colonia </th>
                    <th>Municipio </th>
                    <th>Estado </th>
                    <th>Imss </th>
                    <th>Curp </th>
                    <th>Rfc </th>
                    <th>Operacion </th>
                    <th>Rel </th>
                    <th>Cel </th>
                    <th>Email </th>
                    <th>Metodo de pago </th>

                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($comprarcasas as $key => $comprarcasa)

                    <tr>
                    <td>{{ $key + 1}}</td>
                    <td> {{ $comprarcasa->nombre }}</td>
                    <td> {{ $comprarcasa->fec_nacimiento }}</td>
                    <td> {{ $comprarcasa->direccion }}</td>
                    <td> {{ $comprarcasa->nacionalidad }}</td>
                    <td> {{ $comprarcasa->colonia }}</td>
                    <td> {{ $comprarcasa->municipio }}</td>
                    <td> {{ $comprarcasa->estado }}</td>
                    <td> {{ $comprarcasa->imss }}</td>
                    <td> {{ $comprarcasa->curp }}</td>
                    <td> {{ $comprarcasa->rfc }}</td>
                    <td> {{ $comprarcasa->operaciones->nombre  }}</td>
                    <td> {{ $comprarcasa->tel }}</td>
                    <td> {{ $comprarcasa->cel }}</td>
                    <td> {{ $comprarcasa->email }}</td>
                    <td> {{$comprarcasa->metodo->nombre}}</td>

                        <td>
                          <div class="btn-group" role="group" aria-label="Vertical button group">
                             <a class="btn btn-warning text-white " href="{{route('comprarcasa.edit', ['comprarCasa' => $comprarcasa->id])}}">
                                 <i class="fas fa-pencil-alt"></i>
                             </a>

                             <form action="{{route('comprarcasa.destroy', $comprarcasa->id ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger  text-white" type="submit"><i class="fas fa-trash-alt"></i></button>
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
              </div>
            </div>
    </section>
    <!-- /.content -->
  </div>






  <!-- Modal Agregar Usuario -->
  <div class="modal" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar  Prospecto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
    <form action="{{route('comprarcasa.store')}}" method="POST">
        @csrf
        <div class="modal-body">

               <div class="input-group  mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                  </div>
                  <input id="nombre" placeholder="Nombre Completo" class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" value="{{old('nombre')}}" >
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
                  <input id="fecha" placeholder="Fec" class="form-control @error("fecha") is-invalid @enderror" type="date" name="fecha" value="{{old("fecha")}}" >
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
                             <input id="direccion" placeholder="Calle, Numero Y Codigo Postal" class="form-control @error("direccion") is-invalid @enderror" type="text" name="direccion" value="{{old("direccion")}}" >
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
                        <input id="nacionalidad" placeholder="Nacionalidad" class="form-control @error("nacionalidad") is-invalid @enderror" type="text" name="nacionalidad" value="{{old("nacionalidad")}}" >
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
                             <input id="colonia" placeholder="Colonia" class="form-control @error("colonia") is-invalid @enderror" type="text" name="colonia" value="{{old("colonia")}}" >
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
                        <input id="municipio" placeholder="Municipio" class="form-control @error("municipio") is-invalid @enderror" type="text" name="municipio" value="{{old("municipio")}}" >
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
                             <input id="estado" placeholder="Estado" class="form-control @error("estado") is-invalid @enderror" type="text" name="estado" value="{{old("estado")}}" >
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
                        <input id="imss" placeholder="Numero de seguro social (nss)" class="form-control @error("imss") is-invalid @enderror" type="text" name="imss" value="{{old("imss")}}" >
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
                             <input id="curp" placeholder="Curp" class="form-control @error("curp") is-invalid @enderror" type="text" name="curp" value="{{old("curp")}}" >
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
                        <input id="rfc" placeholder="Rfc" class="form-control @error("rfc") is-invalid @enderror" type="text" name="rfc" value="{{old("rfc")}}" >
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
                     <option {{ old('operacion') == $operacion->id ? 'selected': '' }} value="{{$operacion->id}}">{{$operacion->nombre}} </option>
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
                           <input id="tel" placeholder="Num Telefono" class="form-control @error("tel") is-invalid @enderror" type="text" name="tel" value="{{old("tel")}}" >
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
                      <input id="cel" placeholder="Num celular" class="form-control @error("cel") is-invalid @enderror" type="text" name="cel" value="{{old("cel")}}" >
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
                  <input id="email" placeholder="Su email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{old('email')}}" >
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
                       <option {{ old('metodo') == $metodo->id ? 'selected': '' }} value="{{$metodo->id}}">{{$metodo->nombre}} </option>
                         @endforeach
                     </select>


                         @error('metodo')
                         <div class="invalid-feedback">
                             {{$message}}
                         </div>
                         @enderror
                  </div>

                <input type="hidden" name="id_prospectador" value="{{auth()->user()->id}}">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
      </div>
    </div>
  </div>

@endsection
