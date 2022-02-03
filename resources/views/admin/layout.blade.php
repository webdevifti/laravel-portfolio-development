<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

          

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Banners Section</span>
                </a>
                <div id="collapseOne" class="collapse {{ (request()->is('banners') || request()->is('banners/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('banners/create')) ? 'active':'' }}" href="{{ route('banners.create') }}">Add Banner</a>
                        <a class="collapse-item {{ (request()->is('banners')) ? 'active':'' }}" href="{{ route('banners.index') }}">View All</a>
                    </div>
                </div>
            </li>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="far fa-fw fa-address-card"></i>
                    <span>About Section</span>
                </a>
                <div id="collapseTwo" class="collapse {{ (request()->is('about') || request()->is('about/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('about/create')) ? 'active':'' }}" href="{{ route('about.create') }}">Add About Content</a>
                        <a class="collapse-item {{ (request()->is('about')) ? 'active':'' }}" href="{{ route('about.index') }}">View About Content</a>
                    </div>
                </div>
            </li>
             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user-graduate"></i>
                    <span>Education Section</span>
                </a>
                <div id="collapseEight" class="collapse {{ (request()->is('educations') || request()->is('education/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('education/create')) ? 'active':'' }}" href="{{ route('education.create') }}">Add Education</a>
                        <a class="collapse-item {{ (request()->is('educations')) ? 'active':'' }}" href="{{ route('education.index') }}">View Education</a>
                    </div>
                </div>
            </li>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fab fa-fw fa-servicestack"></i>
                    <span>Services Section</span>
                </a>
                <div id="collapseFive" class="collapse {{ (request()->is('services') || request()->is('service/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('service/create')) ? 'active':'' }}" href="{{ route('service.create') }}">Add Service</a>
                        <a class="collapse-item {{ (request()->is('services')) ? 'active':'' }}" href="{{ route('service.index') }}">View Services</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-project-diagram"></i>
                    <span>Portfolio Section</span>
                </a>
                <div id="collapseThree" class="collapse {{ (request()->is('portfolioes') || request()->is('portfolio/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('portfolio/create')) ? 'active':'' }}" href="{{ route('portfolio.create') }}">Add Portfolio Content</a>
                        <a class="collapse-item {{ (request()->is('portfolioes')) ? 'active':'' }}" href="{{ route('portfolio.index') }}">View Portfolio Content</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-smile-wink"></i>
                    <span>Fun Facts</span>
                </a>
                <div id="collapseNine" class="collapse {{ (request()->is('funfacts') || request()->is('funfact/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('funfact/create')) ? 'active':'' }}" href="{{ route('funfact.create') }}">Add Funfact</a>
                        <a class="collapse-item {{ (request()->is('funfacts')) ? 'active':'' }}" href="{{ route('funfact.index') }}">View Fun Fact</a>
                    </div>
                </div>
            </li>

             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-comment-dots"></i>
                    <span>Testimonial Section</span>
                </a>
                <div id="collapseFour" class="collapse {{ (request()->is('testimonials') || request()->is('testimonial/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('testimonial/create')) ? 'active':'' }}" href="{{ route('testimonial.create') }}">Add Testimonial</a>
                        <a class="collapse-item {{ (request()->is('testimonials')) ? 'active':'' }}" href="{{ route('testimonial.index') }}">View Testimonials</a>
                    </div>
                </div>
            </li>

           
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-copyright"></i>
                    <span>Brand Section</span>
                </a>
                <div id="collapseSix" class="collapse {{ (request()->is('brands') || request()->is('brand/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('brand/create')) ? 'active':'' }}" href="{{ route('brand.create') }}">Add Brand</a>
                        <a class="collapse-item {{ (request()->is('brands')) ? 'active':'' }}" href="{{ route('brand.index') }}">View Brands</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-share-alt"></i>
                    <span>Social Links</span>
                </a>
                <div id="collapseSeven" class="collapse {{ (request()->is('social-links') || request()->is('social/create')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ (request()->is('social/create')) ? 'active':'' }}" href="{{ route('social.create') }}">Add Social</a>
                        <a class="collapse-item {{ (request()->is('socials')) ? 'active':'' }}" href="{{ route('social.index') }}">View Social Links</a>
                    </div>
                </div>
            </li>

           

           
            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li> --}}

            
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                   
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                       
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('admin_assets/users/'.Auth::user()->user_photo ) }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('MainContainer')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        Logout
                    </a>    
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $('.icons').click(function(){
            $(this).addClass('bg-danger text-white');
            var icon_class = $(this).text();
            $('#icon_input').attr('value',icon_class);
        })
       
    </script>
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin_assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin_assets/js/demo/datatables-demo.js') }}"></script>
    
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

   
</body>

</html>