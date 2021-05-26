<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="IndoUi – Bootstrap 4 Admin Dashboard HTML Template" name="description">
        <meta content="Spruko Technologies Private Limited" name="author">
        <meta name="keywords" content="admin, admin dashboard template, admin panel template, admin template, best bootstrap admin template, bootstrap 4 admin template, bootstrap 4 dashboard template, bootstrap admin template, bootstrap dashboard template, html admin template, html5 dashboard template, html5 admin template, modern admin template, simple admin template, template admin bootstrap 4"/>

        <!-- Favicon -->
        <link rel="icon" href="<?= base_url() ?>assets/images/brand/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/brand/favicon.ico" />

        <!-- Title -->
        <title><?=TITLE_?></title>

        <!--Bootstrap css-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css">
        <?php
        if (isset($array_css)):
            foreach ($array_css as $css):
                ?>
                <link rel="stylesheet" href="<?= base_url() ?>assets/<?= $css ?>">
                <?php
            endforeach;
        endif;
        ?>
        <!--Style css -->
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/css/dark-style.css" rel="stylesheet" />
        <link href="<?= base_url() ?>assets/css/skin-modes.css" rel="stylesheet">
        
        <!-- Sidemenu css -->
        <link href="<?= base_url() ?>assets/css/sidemenu.css" rel="stylesheet" />
        <!--Daterangepicker css-->
        <link href="<?= base_url() ?>assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

        <!-- Rightsidebar css -->
        <link href="<?= base_url() ?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

        <!-- Morris  Charts css-->
        <link href="<?= base_url() ?>assets/plugins/morris/morris.css" rel="stylesheet" />

        <!---Icons css-->
        <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet" />
        
                <!-- Jquery js-->
        <script src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?= base_url() ?>assets/js/function.js"></script>
    </head>

    <body class="app sidebar-mini rtl">

        <!--Global-Loader-->
        <div id="global-loader">
            <img src="<?= base_url() ?>assets/images/loader.svg" alt="loader">
        </div>

        <div class="page">
            <div class="page-main">

                <!--app-header-->
                <div class="app-header header d-flex navbar-collapse">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a class="header-brand" href="<?=  base_url()?>">
                                <img src="<?= base_url() ?>assets/images/brand/logo.png" class="header-brand-img main-logo" alt="IndoUi logo">
                                <img src="<?= base_url() ?>assets/images/brand/logo-light.png" class="header-brand-img dark-main-logo" alt="IndoUi logo">
                                <img src="<?= base_url() ?>assets/images/brand/icon-light.png" class="header-brand-img dark-icon-logo" alt="IndoUi logo">
                                <img src="<?= base_url() ?>assets/images/brand/icon.png" class="header-brand-img icon-logo" alt="IndoUi logo">
                            </a><!-- logo-->
                            <div class="app-sidebar__toggle" data-toggle="sidebar">
                                <a class="open-toggle"  href="#"><i class="fe fe-align-left"></i></a>
                                <a class="close-toggle"  href="#"><i class="fe fe-x"></i></a>
                            </div>
                            <div class="d-none dropdown d-md-flex header-settings">
                                <a class="nav-link icon" data-toggle="dropdown">
                                    <i class="fe fe-grid mr-2"></i><span class="lay-outstyle mt-1">Settings</span>
                                    <span class="pulse2 bg-warning" aria-hidden="true"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">Option 1</a>
                                    <a class="dropdown-item" href="#">Option 2</a>
                                    <a class="dropdown-item" href="#">Option 3</a>
                                    <a class="dropdown-item" href="#">Option 4</a>
                                    <a class="dropdown-item" href="#">Option 5</a>
                                </div>
                            </div>
                            <div class="d-flex order-lg-2 ml-auto header-right">
                                <div class="d-md-flex header-search" id="bs-example-navbar-collapse-1">
                                    <form class="navbar-form" role="search">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <span class="input-group-btn">
                                                <button type="reset" class="btn btn-default">
                                                    <i class="fe fe-x"></i>
                                                </button>
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fe fe-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div><!-- Search -->
                                <div class="d-md-flex">
                                    <a href="#" class="nav-link icon full-screen-link">
                                        <i class="fe fe-minimize fullscreen-button"></i>
                                    </a>
                                </div>
                                <div class="dropdown d-md-flex header-message">
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <i class="fe fe-bell"></i>
                                        <span class="nav-unread badge badge-danger badge-pill">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item text-center" href="#">Notifications</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item d-flex pb-4" href="#">
                                            <span class="avatar mr-3 br-3 align-self-center avatar-md cover-image bg-primary-transparent text-primary"><i class="fe fe-mail"></i></span>
                                            <div>
                                                <span class="font-weight-bold"> Commented on your post </span>
                                                <div class="small text-muted d-flex">
                                                    3 hours ago
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex pb-4" href="#">
                                            <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-secondary-transparent text-secondary"><i class="fe fe-download"></i>
                                            </span>
                                            <div>
                                                <span class="font-weight-bold"> New file has been Uploaded </span>
                                                <div class="small text-muted d-flex">
                                                    5 hour ago
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex pb-4" href="#">
                                            <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-warning-transparent text-warning"><i class="fe fe-user"></i>
                                            </span>
                                            <div>
                                                <span class="font-weight-bold"> User account has Updated</span>
                                                <div class="small text-muted d-flex">
                                                    20 mins ago
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item d-flex pb-4" href="#">
                                            <span class="avatar avatar-md br-3 mr-3 align-self-center cover-image bg-info-transparent text-info"><i class="fe fe-shopping-cart"></i>
                                            </span>
                                            <div>
                                                <span class="font-weight-bold"> New Order Recevied</span>
                                                <div class="small text-muted d-flex">
                                                    1 hour ago

                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <div class="text-center dropdown-btn pb-3">
                                            <div class="btn-list">
                                                <a href="#" class="btn btn-primary btn-sm"><i class="fe fe-plus mr-1"></i>Add New</a>
                                                <a href="#" class=" btn btn-secondary btn-sm"><i class="fe fe-eye mr-1"></i>View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Navbar -->
                                <div class="dropdown header-profile">
                                    <a class="nav-link pr-0 leading-none d-flex pt-1" data-toggle="dropdown" href="#">
                                        <span class="avatar avatar-md brround cover-image" data-image-src="<?= base_url("assets/images/users/" . $this->session->Avatar) ?>"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <div class="drop-heading">
                                            <div class="text-center">
                                                <h5 class="text-dark mb-1"><?= $this->session->NameUser ?></h5>
                                                <small class="text-muted"><?= $this->session->Rol ?></small>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider m-0"></div>
                                        <a class="dropdown-item" href="#"><i class="dropdown-icon fe fe-user"></i>Profile</a>
                                        <a class="dropdown-item" href="<?= base_url() ?>Logout"><i class="dropdown-icon fe fe-power"></i> Log Out</a>
                                        <div class="dropdown-divider"></div>
                                        <div class="text-center dropdown-btn pb-3">
                                            <div class="btn-list">
                                                <a href="#" class="btn btn-icon btn-facebook btn-sm"><i class="icon icon-social-facebook"></i></a>
                                                <a href="#" class="btn btn-icon btn-twitter btn-sm"><i class="icon icon-social-twitter"></i></a>
                                                <a href="#" class="btn btn-icon btn-instagram btn-sm"><i class="icon icon-social-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--app-header end-->

                <!-- Sidebar menu-->
                <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
                <aside class="app-sidebar toggle-sidebar">
                    <?= $menu ?>
                    
<!--                    <ul class="side-menu toggle-menu">
                        <li><h3>Main</h3></li>
                        <li class="slide">
                            <a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon fe fe-airplay"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a class="slide-item"  href="index.html"><span>Analytics Dashboard</span></a></li>
                                <li><a class="slide-item" href="index2.html"><span>E-Commerce Dashboard</span></a></li>
                                <li><a class="slide-item" href="index3.html"><span>Sales Dashboard</span></a></li>
                                <li><a class="slide-item" href="index4.html"><span>IT Dashboard</span></a></li>
                                <li><a class="slide-item" href="index5.html"><span>Logistics Dashboard</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="side-menu__item" href="widgets.html"><i class="side-menu__icon fe fe-codepen"></i><span class="side-menu__label">Widgets</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-file-text"></i><span class="side-menu__label">Forms</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="form-elements.html" class="slide-item"> Form Elements</a></li>
                                <li><a href="form-wizard.html" class="slide-item"> Form Wizard</a></li>
                                <li><a href="wysiwyag.html" class="slide-item"> Form Editor</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-bar-chart-2"></i><span class="side-menu__label">Charts</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="chart-chartist.html" class="slide-item">Chartist Charts</a></li>
                                <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                                <li><a href="chart-js.html" class="slide-item"> Charts js</a></li>
                                <li><a href="chart-peity.html" class="slide-item"> Pie Charts</a></li>
                                <li><a href="chart-echart.html" class="slide-item"> Echart Charts</a></li>
                                <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                                <li><a href="chart-nvd3.html" class="slide-item"> Nvd3 Charts</a></li>
                                <li><a href="chart-dygraph.html" class="slide-item">Dygraph Charts</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layout"></i><span class="side-menu__label">Tables</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="tables.html" class="slide-item">Default table</a></li>
                                <li><a href="datatable.html" class="slide-item"> Data Tables</a></li>
                            </ul>
                        </li>
                        <li><h3>Components</h3></li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-box"></i><span class="side-menu__label">Elements</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="alerts.html" class="slide-item"> Alerts</a></li>
                                <li><a href="buttons.html" class="slide-item"> Buttons</a></li>
                                <li><a href="colors.html" class="slide-item"> Colors</a></li>
                                <li><a href="cards.html" class="slide-item"> Cards design</a></li>
                                <li><a href="cards-image.html" class="slide-item"> Image  Cards design</a></li>
                                <li><a href="avatars.html" class="slide-item"> Avatars</a></li>
                                <li><a href="dropdown.html" class="slide-item">Dropdowns</a></li>
                                <li><a href="thumbnails.html" class="slide-item"> Thumbnails</a></li>
                                <li><a href="mediaobject.html" class="slide-item"> Media Object</a></li>
                                <li><a href="list.html" class="slide-item"> List</a></li>
                                <li><a href="tags.html" class="slide-item"> Tags</a></li>
                                <li><a href="pagination.html" class="slide-item"> Pagination</a></li>
                                <li><a href="navigation.html" class="slide-item"> Navigation</a></li>
                                <li><a href="typography.html" class="slide-item"> Typography</a></li>
                                <li><a href="breadcrumbs.html" class="slide-item"> Breadcrumbs</a></li>
                                <li><a href="badge.html" class="slide-item"> Badges</a></li>
                                <li><a href="jumbotron.html" class="slide-item"> Jumbotron</a></li>
                                <li><a href="panels.html" class="slide-item"> Panels</a></li>
                                <li><a href="modal.html" class="slide-item"> Modal</a></li>
                                <li><a href="tooltipandpopover.html" class="slide-item"> Tooltip and popover</a></li>
                                <li><a href="progress.html" class="slide-item"> Progress</a></li>
                                <li><a href="carousel.html" class="slide-item"> Carousels</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-calendar"></i><span class="side-menu__label">Calendar</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="calendar.html" class="slide-item">Default calendar</a></li>
                                <li><a href="calendar2.html" class="slide-item">Full calendar</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-layers"></i><span class="side-menu__label">Advanced UI</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="chat.html" class="slide-item"> Default Chat</a></li>
                                <li><a href="notify.html" class="slide-item"> Notifications</a></li>
                                <li><a href="sweetalert.html" class="slide-item"> Sweet alerts</a></li>
                                <li><a href="rangeslider.html" class="slide-item"> Range slider</a></li>
                                <li><a href="scroll.html" class="slide-item"> Content Scroll bar</a></li>
                                <li><a href="counters.html" class="slide-item">Counters</a></li>
                                <li><a href="loaders.html" class="slide-item"> Loaders</a></li>
                                <li><a href="time-line.html" class="slide-item"> Time Line</a></li>
                                <li><a href="rating.html" class="slide-item"> Rating</a></li>
                                <li><a href="accordion.html" class="slide-item"> Accordions</a></li>
                                <li><a href="tabs.html" class="slide-item"> Tabs</a></li>
                                <li><a href="footers.html" class="slide-item">Footers</a></li>
                                <li><a href="crypto-currencies.html" class="slide-item"> Crypto-currencies</a></li>
                                <li><a href="users-list.html" class="slide-item"> User List</a></li>
                                <li><a href="search.html" class="slide-item"> Search page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="side-menu__item" href="maps.html"><i class="side-menu__icon fe fe-map-pin"></i><span class="side-menu__label">Maps</span></a>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-compass"></i><span class="side-menu__label">Icons</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="icons.html" class="slide-item"> Font Awesome</a></li>
                                <li><a href="icons2.html" class="slide-item"> Material Design Icons</a></li>
                                <li><a href="icons3.html" class="slide-item"> Simple Line Icons</a></li>
                                <li><a href="icons4.html" class="slide-item"> Feather Icons</a></li>
                                <li><a href="icons5.html" class="slide-item"> Ionic Icons</a></li>
                                <li><a href="icons6.html" class="slide-item"> Flag Icons</a></li>
                                <li><a href="icons7.html" class="slide-item"> pe7 Icons</a></li>
                                <li><a href="icons8.html" class="slide-item"> Themify Icons</a></li>
                                <li><a href="icons9.html" class="slide-item">Typicons Icons</a></li>
                                <li><a href="icons10.html" class="slide-item">Weather Icons</a></li>
                            </ul>
                        </li>
                        <li><h3>Pages</h3></li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="profile.html" class="slide-item"> Profile</a></li>
                                <li><a href="editprofile.html" class="slide-item"> Edit Profile</a></li>
                                <li><a href="email.html" class="slide-item"> Email</a></li>
                                <li><a href="emailservices.html" class="slide-item"> Email Inbox</a></li>
                                <li><a href="gallery.html" class="slide-item"> Gallery</a></li>
                                <li><a href="about.html" class="slide-item"> About Company</a></li>
                                <li><a href="services.html" class="slide-item"> Services</a></li>
                                <li><a href="faq.html" class="slide-item"> FAQS</a></li>
                                <li><a href="terms.html" class="slide-item"> Terms and Conditions</a></li>
                                <li><a href="empty.html" class="slide-item"> Empty Page</a></li>
                                <li><a href="construction.html" class="slide-item"> Under Construction</a></li>
                                <li><a href="blog.html" class="slide-item"> Blog</a></li>
                                <li><a href="invoice.html" class="slide-item"> Invoice</a></li>
                                <li><a href="pricing.html" class="slide-item"> Pricing Tables</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-shopping-cart"></i><span class="side-menu__label">E-Commerce</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="product.html" class="slide-item"> Products</a></li>
                                <li><a href="product-details.html" class="slide-item">Product Details</a></li>
                                <li><a href="cart.html" class="slide-item"> Shopping Cart</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-unlock"></i><span class="side-menu__label">Custom</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="login.html" class="slide-item"> Login</a></li>
                                <li><a href="register.html" class="slide-item"> Register</a></li>
                                <li><a href="forgot-password.html" class="slide-item"> Forgot Password</a></li>
                                <li><a href="lockscreen.html" class="slide-item"> Lock screen</a></li>
                            </ul>
                        </li>
                        <li class="slide">
                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-alert-triangle"></i><span class="side-menu__label">Error Pages</span><i class="angle fa fa-angle-right"></i></a>
                            <ul class="slide-menu">
                                <li><a href="400.html" class="slide-item"> 400 Error</a></li>
                                <li><a href="401.html" class="slide-item"> 401 Error</a></li>
                                <li><a href="403.html" class="slide-item"> 403 Error</a></li>
                                <li><a href="404.html" class="slide-item"> 404 Error</a></li>
                                <li><a href="500.html" class="slide-item"> 500 Error</a></li>
                                <li><a href="503.html" class="slide-item"> 503 Error</a></li>
                            </ul>
                        </li>
                    </ul>-->
                    
                    
                    
                </aside>
                <!--sidemenu end-->
