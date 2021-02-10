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
            <h1> Datos de la casa </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Vendedor de la casa / Propiedad</li>
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
                  <div class="callout callout-info">
                              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Información de la casa.
                  <small class="float-right">Fecha:  {{$venderCasa->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>DATOS DEL DUEÑO DE LA CASA </strong><br>
                    Nombre: {{$venderCasa->nombre}}<br>
                    Nacionalidad: {{ $venderCasa->nacionalidad }}<br>
                    Estado: {{ $venderCasa->estado }}<br>
                    Municipio: {{ $venderCasa->municipio }}<br>
                    Ciudad: {{ $venderCasa->colonia }}<br>
                    Dirección: {{ $venderCasa->direccion }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong>Metodo & tipo de operación</strong><br>
                    Tipo de operación:{{ $venderCasa->operaciones->nombre  }}<br>
                    {{-- Metodo: {{$venderCasa->metodo->nombre}}<br> --}}
                    Telefono: {{ $venderCasa->tel }}<br>
                    Celular: {{  $venderCasa->cel }}<br>
                    Email:   {{  $venderCasa->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <b>Fecha de naicimiento: {{$venderCasa->fec_nacimiento}}</b><br>
                  <br>
                <b>Numero Seguro Social:</b> {{$venderCasa->imss}}<br>
                  <b>NSS:</b> {{$venderCasa->imss}}<br>
                  <b>CURP:</b>  {{$venderCasa->curp}} <br>
                  <b>LUZ:</b>  {{$venderCasa->c_luz}} <br>
                  <b>AGUA:</b>  {{$venderCasa->c_agua}} <br>
                  <b>PREDIAL: </b>  {{$venderCasa->predial}} <br>
                </div>
                <!-- /.col -->
              </div>

              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>DATOS DE LA PROPIEDAD</strong><br>
                    @foreach($venderCasa->propiedades  as $key => $propiedad)
                         RECAMARAS: {{ $propiedad->recamaras }}<br>
                         BAÑOS: {{ $propiedad->recamaras }}<br>
                         ESTACIONAMIENTO: {{ $propiedad->recamaras }}<br>
                         ESTRUCTURA: {{ $propiedad->recamaras }}<br>
                         TAMAÑO DEL TERRNO: {{ $propiedad->m_terreno }}<br>
                         METROS DE CONSTRUCCION: {{ $propiedad->m_construccion }}<br>
                         NOTA: {{ $propiedad->nota }}<br>


                  </address>
                </div>
                @endforeach
                <!-- /.col -->
                <div class="col-sm-8 invoice-col">
                    <div class="row">
                        @foreach($imagenes as $key => $imagen)
                             <div class="col-md-2">
                                <a href="{{asset("storage/$imagen->ruta_imagen")}}" data-lightbox="image-1" data-title="Propiedad:{{$propiedad->titulo}}">
                                    <img class="img-thumbnail"  src="{{asset("storage/$imagen->ruta_imagen")}}" width="100px" alt="">
                                  </a>
                                  <a download="propiedad:{{$propiedad->titulo}}" href="{{asset("storage/$imagen->ruta_imagen")}}">Descargar</a>
                             </div>
                        @endforeach
                     </div>
                </div>
                <!-- /.col -->
              </div>







              <!-- /.row -->
                  </div>
                </div>
              </div>
            </div>
    </section>
    <!-- /.content -->
  </div>




@endsection
