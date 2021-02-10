@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Prospectos para vender casa </h1>
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
        <a href="{{route('vendercasa.create')}}" class="btn btn-success mb-4"> Agregar Prospecto</a>

          <!--Tabla Usuario-->

          <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre del prospectador </th>
                    <th>Nombre del prospectado </th>
                    <th>Fecha de Nacimiento </th>
                    <th>Imss </th>
                    <th>Curp o Credito </th>
                    <th>Tel </th>
                    <th>Cel </th>
                    <th>Direccion </th>
                    <th>Nacionalidad </th>
                    <th>Colonia </th>
                    <th>Municipio </th>
                    <th>Estado </th>
                    <th>Rfc </th>
                    <th>Operacion </th>
                    <th>Email </th>
                    <th>Predial </th>
                    <th>Luz </th>
                    <th>Agua </th>
                    <th>Propiedad </th>
                    <th>Nota </th>



                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($vendercasas as $key => $vendercasa)

                    <tr>
                    <td>{{ $key + 1}}</td>
                    <td>{{ $vendercasa->prospectador->name }} </td>
                    <td>{{ $vendercasa->nombre}} </td>
                    <td>{{ $vendercasa->fec_nacimiento}} </td>
                    <td>{{ $vendercasa->imss}} </td>
                    <td>{{ $vendercasa->curp}} </td>
                    <td>{{ $vendercasa->tel}} </td>
                    <td>{{ $vendercasa->cel}} </td>
                    <td>{{ $vendercasa->direccion}} </td>
                    <td>{{ $vendercasa->nacionalidad}} </td>
                    <td>{{ $vendercasa->colonia}} </td>
                    <td>{{ $vendercasa->municipio}} </td>
                    <td>{{ $vendercasa->estado}} </td>
                    <td>{{ $vendercasa->rfc}} </td>
                    <td>{{ $vendercasa->operaciones->nombre}} </td>
                    <td>{{ $vendercasa->email}} </td>
                    <td>{{ $vendercasa->predial}} </td>
                    <td>{{ $vendercasa->c_agua}} </td>
                    <td>{{ $vendercasa->c_luz}} </td>

                    <td>

                    <a href="{{route('vendercasa.show', ['venderCasa' => $vendercasa->id])}}" class="btn btn-info">Ver</a>
                    </td>
                    <td>{{ $vendercasa->nota}} </td>

                        <td>
                          <div class="btn-group" role="group" aria-label="Vertical button group">
                          <a class="btn btn-warning text-white " href="{{route('vendercasa.edit', ['venderCasa' =>$vendercasa->id ])}}">
                                 <i class="fas fa-pencil-alt"></i>
                              </a>

                             <form action={{route('vendercasa.destroy', ['venderCasa' => $vendercasa->id])}} method="POST">
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

@endsection
