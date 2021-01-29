@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Panel de datos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">


        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                  <h3>{{$prospectoComprador}}</h3>
                  <p>Prospectos comparadores</p>

                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$propesctoVendedor}}</h3>
                    <p> Prospectos vendedores</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-navy ">
                  <div class="inner">
                    <h3>{{$propiedades}}</h3>
                    <p> Propiedades</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-red  ">
                  <div class="inner">
                    <h3>{{$perfilVenta}}</h3>

                    <p>Perfil Venta</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-green  ">
                  <div class="inner">
                    <h3>{{$perfilCompra}}</h3>
                    <p>Perfil Compra</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-teal  ">
                  <div class="inner">
                    <h3>{{$ventas}}</h3>
                    <p>Ventas</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-orange  ">
                  <div class="inner">
                    <h3>{{$asesor}}</h3>
                    <p>Asesor</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gradient-indigo ">
                  <div class="inner">
                    <h3>{{$avaluos}}</h3>
                    <p>Avaluos</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
        </div>



    </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
