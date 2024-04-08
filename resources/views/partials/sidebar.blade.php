<!-- LOGO -->
<a href="index.html" class="logo text-center logo-light">
    <span class="logo-lg">
        <img src="assets/images/logo.png" alt="" height="16">
    </span>
    <span class="logo-sm">
        <img src="assets/images/logo_sm.png" alt="" height="16">
    </span>
</a>

<!-- LOGO -->
<a href="index.html" class="logo text-center logo-dark">
    <span class="logo-lg">
        <img src="assets/images/logo-dark.png" alt="" height="16">
    </span>
    <span class="logo-sm">
        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
    </span>
</a>

<div class="h-100" id="leftside-menu-container" data-simplebar="">

    <!--- Sidemenu -->
    <ul class="side-nav">

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span class="badge bg-success float-end">4</span>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Apps</li>

        <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
                <i class="mdi mdi-format-list-bulleted"></i>
                <span> Tareas </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Administracion</li>

        <li class="side-nav-item">
            <a href="{{route('teams.index')}}" class="side-nav-link">
                <i class="mdi mdi-account-group"></i>
                <span> Cuadrillas </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('types.index')}}" class="side-nav-link">
                <i class="mdi mdi-leaf"></i>
                <span> Especies </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{route('services.index')}}" class="side-nav-link">
                <i class="mdi mdi-hammer-screwdriver"></i>
                <span> Servicios </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="apps-chat.html" class="side-nav-link">
                <i class="mdi mdi-account-lock"></i>
                <span> Usuarios </span>
            </a>
        </li>

    </ul>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->