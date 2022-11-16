<?php

session_start();
if (!isset($_SESSION['auth_id'])) {
    header('location:../opps.php');
}
require_once('../../db-connect.php');
$explode = explode('/', $_SERVER['PHP_SELF']);
$page_name = end($explode);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $tab_title ?></title>

    <!-- fontsasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="./../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="./../assets/plugins/pace/pace.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="./../assets/css/main.min.css" rel="stylesheet">
    <link href="./../assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="./../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./../assets/images/neptune.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <?php
                    $id = $_SESSION['auth_id'];
                    $users_query = "SELECT * FROM aouths WHERE id= $id";
                    $users_query_db = mysqli_query($db_connect, $users_query);
                    $user = mysqli_fetch_assoc($users_query_db);
              
                    foreach ($users_query_db as $user) : ?>

                        <a href="#">
                            <img src="../uploads/profile/<?= $user['profile_pic'] ?>">
                            <span class="activity-indicator"></span>
                            <span class="user-info-text"><?= $user['name'] ?><br><span class="user-state-info"><?= $user['email'] ?></span></span>
                        </a>

                    <?php
                    endforeach
                    ?>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="<?= ($page_name == 'index.php') ? 'active-page' : '' ?>">
                        <a href="./index.php"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= ($page_name == 'socail_links.php') ? 'active-page' : '' ?>">
                        <a href="./socail_links.php"><i class="material-icons-two-tone">link</i>Social Link</a>
                    </li>
                    <li class="<?= ($page_name == 'profile.php') ? 'active-page' : '' ?>">
                        <a href="./profile.php"><i class="material-icons-two-tone">face</i>Profile</a>
                    </li>

                    <li class="<?= ($page_name == 'service_add.php') || ($page_name == 'service_list.php') ? 'active-page' : '' ?> ">
                        <a href=""><i class="material-icons-two-tone">manage_accounts</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'service_add.php') ? 'active' : '' ?>" href="./service_add.php">Add Service</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'service_list.php') ? 'active' : '' ?>" href="./service_list.php">Service List</a>
                            </li>
                        </ul>
                        <li class="<?= ($page_name == 'about_add.php') || ($page_name == 'about_list.php') ? 'active-page' : '' ?> ">
                        <a href=""><i class="fa-solid fa-address-card"></i>About<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'about_add.php') ? 'active' : '' ?>" href="./about_add.php">Add About</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'about_list.php') ? 'active' : '' ?>" href="./about_list.php">About List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($page_name == 'testimonial_add.php') || ($page_name == 'testimonial_list.php') ? 'active-page' : '' ?> ">
                        <a href=""><i class="fa-solid fa-address-card"></i>Testimonial<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'testimonial_add.php') ? 'active' : '' ?>" href="./testimonial_add.php">Add Testimonial</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'testimonial_list.php') ? 'active' : '' ?>" href="./testimonial_list.php">Testimonial List</a>
                            </li>
                        </ul>
                    </li>    

                    <li class="<?= ($page_name == 'fact_add.php') || ($page_name == 'fact_list.php') ? 'active-page' : '' ?> ">
                        <a href=""><i class="fa fa-flag"></i>Facts Area<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'fact_add.php') ? 'active' : '' ?>" href="./fact_add.php">Add facts</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'fact_list.php') ? 'active' : '' ?>" href="./fact_list.php">Facts List</a>
                            </li>
                        </ul>
                    </li>
                    <li class="<?= ($page_name == './admins_massage.php') || ($page_name == './admins_massage.php') ? 'active-page' : '' ?> ">
                        <a href=""><i class="fa-solid fa-user"></i>Admins<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == './admins_massage.php') ? 'active' : '' ?>" href="./admins_massage.php">Admins Massages</a>
                            </li>

                        </ul>
                    </li>
                    <li class="<?= ($page_name == 'work_add.php') || ($page_name == 'work_list.php') ? 'active-page' : '' ?> ">
                        <a href=""><i class="fa fa-briefcase"></i>Works<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a class="<?= ($page_name == 'work_add.php') ? 'active' : '' ?>" href="./work_add.php">Add Works</a>
                            </li>
                            <li>
                                <a class="<?= ($page_name == 'work_list.php') ? 'active' : '' ?>" href="./work_list.php">Works List</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="addDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons">add</i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                        <li><a class="dropdown-item" href="#">New Workspace</a></li>
                                        <li><a class="dropdown-item" href="#">New Board</a></li>
                                        <li><a class="dropdown-item" href="#">Create Project</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown hidden-on-mobile">
                                    <a class="nav-link dropdown-toggle" href="#" id="exploreDropdownLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="material-icons-outlined">explore</i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-lg large-items-menu" aria-labelledby="exploreDropdownLink">
                                        <li>
                                            <h6 class="dropdown-header">Repositories</h6>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune iOS
                                                    <span class="badge badge-warning">1.0.2</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <h5 class="dropdown-item-title">
                                                    Neptune Android
                                                    <span class="badge badge-info">dev</span>
                                                    <span class="hidden-helper-text">switch<i class="material-icons">keyboard_arrow_right</i></span>
                                                </h5>
                                                <span class="dropdown-item-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</span>
                                            </a>
                                        </li>
                                        <li class="dropdown-btn-item d-grid">
                                            <button class="btn btn-primary">Create new repository</button>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn-success text-white" href="../../frontend/home.php" target="_blank">Visite Site</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link btn btn-danger text-white" href="../auth/logout.php">Logout</a>
                                </li>
                                <!--                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link active" href="#">Applications</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link active" href="#">Applications</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Reports</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="#">Projects</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link toggle-search" href="#"><i class="material-icons">search</i></a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown" data-bs-toggle="dropdown"><img src="./../assets/images/flags/us.png" alt=""></a>
                                        <ul class="dropdown-menu dropdown-menu-end language-dropdown" aria-labelledby="languageDropDown">
                                            <li><a class="dropdown-item" href="#"><img src="./../assets/images/flags/germany.png" alt="">German</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="./../assets/images/flags/italy.png" alt="">Italian</a></li>
                                            <li><a class="dropdown-item" href="#"><img src="./../assets/images/flags/china.png" alt="">Chinese</a></li>
                                        </ul>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" href="#" data-bs-toggle="dropdown">4</a>
                                    <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                        <h6 class="dropdown-header">Notifications</h6>
                                        <div class="notifications-dropdown-list">
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">campaign</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Donec tempus nisi sed erat vestibulum, eu suscipit ex laoreet</p>
                                                        <small>19:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">bolt</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text">Quisque ligula dui, tincidunt nec pharetra eu, fringilla quis mauris</p>
                                                        <small>18:00</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-success text-white">
                                                            <i class="material-icons-outlined">alternate_email</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Nulla id libero mattis justo euismod congue in et metus</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#">
                                                <di class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="./../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent sodales lobortis velit ac pellentesque</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </di  v>
                                            </a>
                                            <a href="#">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge">
                                                            <img src="./../assets/images/avatars/avatar.png" alt="">
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p>Praesent lacinia ante eget tristique mattis. Nam sollicitudin velit sit amet auctor porta</p>
                                                        <small>yesterday</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                   -->
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">