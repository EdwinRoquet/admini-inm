@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Datos Prospectos </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Prospectos</a></li>
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
                  <div class="callout callout-info">
                              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Información más detalla del prospecto.
                  <small class="float-right">Fecha:  {{$comprarCasa->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                    <strong>{{$comprarCasa->nombre}}</strong><br>
                    Nacionalidad: {{ $comprarCasa->nacionalidad }}<br>
                    Estado: {{ $comprarCasa->estado }}<br>
                    Municipio: {{ $comprarCasa->municipio }}<br>
                    Ciudad: {{ $comprarCasa->colonia }}<br>
                    Dirección: {{ $comprarCasa->direccion }}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong>Metodo & tipo de operación</strong><br>
                    Tipo de operación:{{ $comprarCasa->operaciones->nombre  }}<br>
                    Metodo: {{$comprarCasa->metodo->nombre}}<br>
                    Telefono: {{ $comprarCasa->tel }}<br>
                    Celular: {{  $comprarCasa->cel }}<br>
                    Email:   {{  $comprarCasa->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                <b>Fecha de naicimiento: {{$comprarCasa->fec_nacimiento}}</b><br>
                  <br>
                <b>Numero Seguro Social:</b> {{$comprarCasa->imss}}<br>
                  <b>CURP:</b> {{$comprarCasa->imss}}<br>
                  <b>RFC:</b>  {{$comprarCasa->curp}}
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
