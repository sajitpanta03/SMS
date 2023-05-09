<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end" style="cursor: pointer;">
                <li class="nav-item d-flex align-items-center">
                    <div class="d-sm-inline b" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ session('user_name') ? session('user_name') : 'user' }}
                    </div>
                    
                    <div class="dropdown-menu dropdown-menu-right">
                        <a name="logout" id="logout" class="dropdown-item" href=" {{ route('logout') }}"
                            role="button">
                            logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
