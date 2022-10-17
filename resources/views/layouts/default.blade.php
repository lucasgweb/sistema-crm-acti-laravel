<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>ACTI</title>
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
            crossorigin="anonymous"></script>
    <script data-search-pseudo-elements defer
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    @livewireStyles
</head>
<body class="nav-fixed">
<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
     id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
            data-feather="menu"></i></button>
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="index.html">ACTI</a>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
               href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false"><img class="img-fluid" src="{{asset('img/avatar.jpg')}}"/></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{asset('img/avatar.jpg')}}"/>
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                        <div
                            class="dropdown-user-details-email">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#!">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Account
                </a>
                <a class="dropdown-item" href="{{route('logout')}}">
                    <button class="btn p-0 " type="submit"><i data-feather="log-out" class="me-2"></i>Salir</button>
                </a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <!-- Sidenav Heading (Addons)-->
                    <div class="sidenav-menu-heading">Menu</div>
                    <!-- Sidenav Link (Tables)-->
                    <a class="nav-link" href="{{route('users.index')}}">
                        <div class="nav-link-icon"><i class="bi bi-person-badge-fill"></i></div>
                        Usuarios
                    </a>
                    <a class="nav-link" href="{{route('students.index')}}">
                        <div class="nav-link-icon"><i class="bi bi-people-fill"></i></div>
                        Alumnos
                    </a>
                    <a class="nav-link" href="{{route('teachers.index')}}">
                        <div class="nav-link-icon"><i class="bi bi-people-fill"></i></div>
                        Profesores
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                       data-bs-target="#collapseCategorizacion" aria-expanded="false"
                       aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="bi bi-stack"></i></div>
                        Categorización
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCategorizacion" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('categories.index')}}">Categorías</a>
                            <a class="nav-link" href="{{route('types.index')}}">Tipos</a>
                            <a class="nav-link" href="{{route('modalities.index')}}">Modalidades</a>
                        </nav>
                    </div>
                    <div class="sidenav-menu-heading">CLASIFICACIÓN</div>
                    <!-- Sidenav Accordion (Dashboard)-->
                    <a class="nav-link" href="tables.html">
                        <div class="nav-link-icon"><i class="bi bi-grid-1x2-fill"></i></div>
                        Promociones
                    </a>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                       data-bs-target="#collapseSales" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></i></div>
                        Ventas
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseSales" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="dashboard-2.html">Ventas</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                       data-bs-target="#collapseEnrollment" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></i></div>
                        Matrículas
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseEnrollment" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('courses.index')}}">Curso</a>
                            <a class="nav-link" href="{{route('semesters.index')}}">Semestre</a>
                            <a class="nav-link" href="{{route('groups.index')}}">Grupo</a>
                            <a class="nav-link" href="{{route('registers.index')}}">Matrícula</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                       data-bs-target="#collapseTreasury" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></i></div>
                        Tesorería
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseTreasury" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="dashboard-2.html">Pagos</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                       data-bs-target="#collapseCrm" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></i></div>
                        CRM
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseCrm" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{route('leads.index')}}">Leads</a>
                            <a class="nav-link" href="dashboard-2.html">Mis Leads</a>
                            <a class="nav-link" href="dashboard-2.html">Leads Inactivos</a>
                            <a class="nav-link" href="dashboard-2.html">Importar Leads</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                       data-bs-target="#collapseReports" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i class="bi bi-arrow-up-right-circle-fill"></i></i></div>
                        Reportes
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseReports" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="dashboard-2.html">Reporte de Leads</a>
                            <a class="nav-link" href="dashboard-2.html">Reporte de Leads por Vendedor</a>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Sidenav Footer-->
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Conectado como:</div>
                    <div class="sidenav-footer-title">{{Auth::user()->name}}</div>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        <footer class="footer-admin mt-auto footer-light">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; lucasweb.me 2021</div>
                    <div class="col-md-6 text-md-end small">
                        <p>Creado con ❤️ by LucasWeb</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@stack('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>
</html>

