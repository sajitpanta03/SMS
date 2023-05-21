<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="dashboard.php">
            <span class="ms-1 font-weight-bold text-white">SMS</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ session('active') == 'dashboard' ? 'active' : null }}" href="/">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ session('active') == 'user' ? 'active' : null }}" href="{{ route('users.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ session('active') == 'student' ? 'active' : null }}" href="{{ route('students.index') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">school</i>
                    </div>
                    <span class="nav-link-text ms-1">Students</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('/')}}/subjects">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">book</i>
                    </div>
                    <span class="nav-link-text ms-1">Subjects</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('/')}}/teachers">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_outline</i>
                    </div>
                    <span class="nav-link-text ms-1">Teacher</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('/')}}/mark">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">description</i>
                    </div>
                    <span class="nav-link-text ms-1">Mark</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
