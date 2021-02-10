@extends('layouts.adminlte')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css\lightbox.css')}}">
 @endsection


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Administrar Propiedades </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrador Propiedad</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">

        <div class="card-body">
          <!-- Button Agregar Modal Usuario-->

          <!--Tabla Usuario-->

            {{-- <table class="table table-bordered table-responsive responsive mt-3"> --}}
            <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Titulo</th>
                    <th>Recamaras</th>
                    <th>Baños</th>
                    <th>Estacionamiento</th>
                    <th>Nota</th>
                    <th>Estructura de construccion</th>
                    <th>Metros de construccion</th>
                    <th>Tamaño del terrno</th>
                    <th style="width: 400px">Imagenes</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- {{$propiedadConImagenes}} --}}
                    @foreach($propiedadConImagenes as $key => $propiedad)
                             <td>{{$key + 1}} </td>
                             <td>{{$propiedad->titulo}} </td>
                             <td>{{$propiedad->recamaras}} </td>
                             <td>{{$propiedad->baños}} </td>
                             <td>{{$propiedad->estacionamiento}} </td>
                             <td>{{$propiedad->nota           }} </td>
                             <td>{{$propiedad->estructura_cons}} </td>
                             <td>{{$propiedad->m_terreno}} </td>
                             <td>{{$propiedad->m_construccion}} </td>
                             <td>
                                <div class="row">
                                    @foreach($propiedad->imagenes as $key => $imagen)

                                         <a href="storage/{{$imagen->ruta_imagen}}" data-lightbox="image-1" data-title="Propiedad:{{$propiedad->titulo}}">
                                            <img class="img-thumbnail"  src="storage/{{$imagen->ruta_imagen}}" width="100px" alt="">
                                          </a>
                                          <a download="propiedad:{{$propiedad->titulo}}" href="{{asset("storage/$imagen->ruta_imagen")}}">Descargar</a>

                                    @endforeach
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
    </section>
    <!-- /.content -->
  </div>





@endsection
