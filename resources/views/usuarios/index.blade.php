@extends('layouts.adminlte')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Administrar Usuario </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Administrador Usuarios</li>
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
          <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#agregarUsuario">
              Agregar usuario
          </button>

          <!--Tabla Usuario-->


          <table  id="table"class="table table-bordered table-striped dt-responsive tablas" width="100%">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th style="width: 40px">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                        @foreach($usuarios as $key => $usuario )
                        <tr>

                        <td>{{$key + 1}}</td>
                            <td>{{$usuario->name}}</td>
                            <td>{{$usuario->email}}</td>
                            <td>@foreach($usuario->roles as $role)
                                   {{ $role->description}}
                            @endforeach
                        </td>

                            <td>
                              <div class="btn-group" role="group" aria-label="Vertical button group">
                                 {{-- <button type="button" class="btn btn-warning text-white " data-toggle="modal" data-target="#editarUsuario">
                                     <i class="fas fa-pencil-alt"></i>
                                 </button> --}}

                                <form action="{{route('usuario.destroy', $usuario->id ) }}" method="POST">
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
    </section>
    <!-- /.content -->
  </div>






  <!-- Modal Agregar Usuario -->
  <div class="modal" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar  Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="{{route('usuario.store')}}" method="POST">
        <div class="modal-body">
            @csrf
               <div class="input-group  mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                  </div>
                  <input id="name" placeholder="Su nombre" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" >
                       @error('name')
                       <div class="invalid-feedback">
                           {{$message}}
                       </div>
                       @enderror
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
                    <span class="input-group-text" id=""><i class="fas fa-users"></i></span>
                  </div>

                   <select id="perfil" class="custom-select" name="rol">
                       <option value=""> -Seleccione un rol </option>
                       @foreach($roles as $role)
                   <option value="{{$role->name}}"> {{$role->description}} </option>
                       @endforeach

                   </select>


                       @error('perfil')
                       <div class="invalid-feedback">
                           {{$message}}
                       </div>
                       @enderror
                </div>



                <label for="password">{{ __('Password') }}</label>
                <div class="input-group  mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                   </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>

                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div class="input-group  mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id=""><i class="fas fa-user"></i></span>
                    </div>
                   <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Editar Usuario -->
  <div class="modal" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>



@endsection
