<?php

// echo '<pre>';
// print_r($_SESSION);
// die;
?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none b"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;">
                        session check here
                    </span>

                    
                        <div class="dropdown-menu dropdown-menu-right">
                            <a name="profile" id="profile" class="dropdown-item" href="#" role="button">Profile</a>
                            <a name="logout" id="logout" class="dropdown-item" href="http://localhost/php/OOP/student-management-system/loginController/logout.php" role="button">logout</a>
                        </div>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a name="logout" id="login" class="dropdown-item" href="http://localhost/php/OOP/student-management-system/pages/login.php">
                                <span class="nav-link-text ms-1">login</span>
                            </a>
                        </div>





                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->