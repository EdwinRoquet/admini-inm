<aside class="main-sidebar sidebar-dark-primary  elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      {{-- <img src=""
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Inmobiliaria</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                <a href="{{ route('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Inicio
                    {{-- <i class="right fas fa-angle-left"></i> --}}
                  </p>
                </a>
              </li>




        @if(Auth::user()->hasRole('prospectador'))

        <li class="nav-header">PROSPECTADOR</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
              <p>
                Prospectos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('comprarcasa.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Comprador</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('vendercasa.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Vendedor</p>
                </a>
              </li>

            </ul>
          </li>
          @endif

         @if(Auth::user()->hasRole('oficina'))

         <li class="nav-header">OFICINA</li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
              <p>
                Perfiles
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('seguimiento.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfil de comprador</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="{{route('perfilventa.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfil de vendedor</p>
                </a>
              </li>

            </ul>
          </li>

         @endif



          @if(Auth::user()->hasRole('vendedor'))


          <li class="nav-header">VENDEDOR</li>


        <li class="nav-item has-treeview">
            <a href="{{route('propiedad.index')}}" class="nav-link">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                  Propiedades
                </p>
              </a>
        </li>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
          </div>

        <li class="nav-item has-treeview">
            <a href="{{route('venta.index')}}" class="nav-link">
            <i class="fas fa-file-invoice-dollar nav-icon"></i>
              <p>
                Vendedor
              </p>
            </a>
          </li>

         <li class="nav-item has-treeview">
           <a href="{{route('asesor.index')}}" class="nav-link">
            <i class="fas fa-file-invoice-dollar nav-icon"></i>
              <p>
                Asesor
              </p>
            </a>
          </li>

        <li class="nav-item has-treeview">
        <a href="{{route('avaluo.index')}}" class="nav-link">
            <i class="fas fa-file-invoice-dollar nav-icon"></i>
              <p>
                Avaluos
              </p>
            </a>
          </li>

        <li class="nav-item has-treeview">
            <a href="{{route('propiedad.index')}}" class="nav-link">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                  Propiedades
                </p>
              </a>
        </li>

          @endif


          @if(Auth::user()->hasRole('admin'))

          <li class="nav-header">ADMINISTRADOR</li>

          <li class="nav-item">
            <a href="{{ route('usuario.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Usuarios
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{route('propiedad.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>
                      Propiedades
                    </p>
                  </a>
            </li>


        <li class="nav-header">PROSPECTADOR</li>



            <li class="nav-item">
                <a href="{{route('admin.comprarcasa.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Comprador</p>
                  </a>
                </li>

            <li class="nav-item">
                <a href="{{route('admin.vendercasa.index')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Vendedor</p>
                  </a>
            </li>


          <li class="nav-header">PERFILES</li>

          <li class="nav-item">
            <a href="{{ route('admmin.seguimiento.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Perfiles del Comprador
                </p>
              </a>
            </li>

          <li class="nav-item">
            <a href="{{ route('admin.perfilventa.index') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Perfiles del Vendedor
                </p>
              </a>
            </li>



            <li class="nav-header">VENDEDOR</li>

              <br>

            <li class="nav-item has-treeview">
                <a href="{{route('admin.avaluo.index')}}" class="nav-link">
                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                      <p>
                        Avaluos
                      </p>
                </a>
            </li>

            <li class="nav-item has-treeview">
                <a href="{{route('admin.venta.index')}}" class="nav-link">
                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>
                    Vendedor
                  </p>
                </a>
              </li>

             <li class="nav-item has-treeview">
               <a href="{{route('admin.asesor.index')}}" class="nav-link">
                <i class="fas fa-file-invoice-dollar nav-icon"></i>
                  <p>
                    Asesor
                  </p>
                </a>
              </li>

          @endif


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
