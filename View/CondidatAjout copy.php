

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/login2/Public/header.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Back-office - Gestion des Utilisateurs</title>
</head>

<body>
    <header>


        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand me-auto" href="">Logo</a>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">

                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="#">Job
                                    Listings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="#">Forum</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="#">Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mx-lg-2" href="#">Customer Support </a>
                            </li>

                        </ul>
                    </div>
                </div>


            </div>

        </nav>
    </header>

    <nav class="sidebar dashboard close">
        <header>
            <div class="image_text"><span>
                    <img src="/login2/Public/images/logo.png" alt="logo">
                </span>

                <div class="text header_text">
                    <span class="name">Napoleon</span>
                    <span class="Role">Admin</span>

                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>
        <div class="menu_bar">
            <div class="menu">
                <li class="search_box">
                    <i class="bx bx-search icons"></i>
                    <input type="text" placeholder="Search...">
                </li>
                <ul class="menu_link">
                    <li class="nav_link">
                        <a href="#">
                            <i class="bx bx-home-alt icons"></i>
                            <span class="text nav_text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav_link">
                        <a href="#">
                            <i class="bx bx-bar-chart-alt-2 icons"></i>
                            <span class="text nav_text">Revenue</span>
                        </a>
                    </li>
                    <li class="nav_link">
                        <a href="#">
                            <i class="bx bx-bell icons"></i>
                            <span class="text nav_text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav_link">
                        <a href="#">
                            <i class="bx bx-pie-chart-alt icons"></i>
                            <span class="text nav_text">Analytics</span>
                        </a>
                    </li>
                    <li class="nav_link">
                        <a href="#">
                            <i class="bx bx-heart icons"></i>
                            <span class="text nav_text">Like</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom_content">
                <li class="">
                    <a href="#">
                        <i class="bx bx-log-out icons"></i>
                        <span class="text nav_text">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <div class="moon_sun">
                        <i class="bx bx-moon icons moon"></i>
                        <i class="bx bx-sun icons sun"></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>
                    <div class="toggle_switch">
                        <span class="switch"></span>
                    </div>

                </li>
            </div>
        </div>
    </nav>


    <div class="container dashboard">
        <h1 class="TableText">Gestion des Utilisateurs</h1>
        <div class="input-group mb-3">
            <input id="live_search" type="text" name="search" value="" class="form-control"
                placeholder="Search for users">
        </div>

        <a href="adduser.php" class="dark-blue-button">Add User</a>

            
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>



    <script src="script.js"></script>
</body>

</html>