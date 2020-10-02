 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../bower_components/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Demo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../bower_components/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
<!--          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           @can('client-list')
           
          <li class="nav-item">
            <a class="nav-link" href="{{ route('client.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Client 
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          
         
          @endcan
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('userassign.reassign') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage User Re-Assign
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          @can('user-dashboard')
           <li class="nav-item">
            <a class="nav-link" href="{{ route('userdashboard.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage User Dashboard
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          @endcan
          @can('clientdashboard-show')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clientdashboard.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Client Dashboard
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          @endcan
           @can('clientdashboard-show')
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clientdashboard.generateentry') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage generate Entry
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          @endcan
        </ul>-->
        @can('super-admin')
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Page</p>
                </a>
              </li>
            </ul>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Users
            <span class="right badge badge-danger">New</span></a>
           
          </li>
           <li class="nav-item">
            <a class="nav-link" href="{{ route('client.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Client 
            <span class="right badge badge-danger">New</span></a>
           
          </li>
 <!--          <li class="nav-item">
            <a class="nav-link" href="{{ route('roles.index') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage roles
            <span class="right badge badge-danger">New</span></a>
           
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('billing.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Billing
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('module.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Module
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('field.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Fields
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('software.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Software
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('userdashboard.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage User Dashboard
            <span class="right badge badge-danger">New</span></a>
           
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{ route('userassign.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage User assignment's 
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clientdashboard.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Client Dashboard
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('clientdashboard.generateentry') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage generate Entry
            <span class="right badge badge-danger">New</span></a>
           
          </li>
<!--          <li class="nav-item">
            <a class="nav-link" href="{{ route('patient.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage patient
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('medician.show') }}">
              
            <i class="nav-icon fas fa-th"></i> 
            Manage Medician
            <span class="right badge badge-danger">New</span></a>
           
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('producttest') }}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                      product
                      <span class="right badge badge-danger">view</span>
                  </p>
              </a>
          </li>-->
        </ul>
          @endcan
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>