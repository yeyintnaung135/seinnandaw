<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/backend/home')}}" class="brand-link">
        <img src="{{url('images/favicon.webp')}}" alt="SeinNanDaw" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">SeinNanDaw</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline d-none">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Banners
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('backend/banners/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('backend/banners/add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                          Users
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{url('backend/customers/list')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>List</p>
                          </a>
                      </li>

                  </ul>

                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                          Admins
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{url('backend/admin/list')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>List</p>
                          </a>
                      </li>

                  </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('backend/categories/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('backend/categories/add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('backend/products/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('backend/products/add')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{url('backend/products/trash')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Trash</p>
                          </a>
                        </li>

                    </ul>

                </li>
                
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                          Locations Address
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{url('backend/locations/list')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>List</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{url('backend/locations/add')}}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Add New</p>
                          </a>
                      </li>

                  </ul>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Payment
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('backend/payments/list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a  onclick="logout()" class="nav-link">
                        <i class="nav-icon fa fa-power-off "></i>
                        <p>LOGOUT</p>
                    </a>
                    <form id="logout-form" action="{{ url('adminlogout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>

function logout () {
  $(function () {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-danger ml-2',
            cancelButton: 'btn btn-info'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You Are About to Logout.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
    })
});
}
</script>
