<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin Dashboard</title>

    <!-- theme meta -->
    <meta name="theme-name" content="mono" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/material/css/materialdesignicons.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/simplebar/simplebar.css')); ?>" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo e(asset('assets/plugins/nprogress/nprogress.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')); ?>"
        rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/plugins/toaster/toastr.min.css')); ?>" rel="stylesheet" />
    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" />
    <!-- FAVICON -->
    <link href="<?php echo e(asset('assets/images/favicon.png')); ?>" rel="shortcut icon" />
    <script src="<?php echo e(asset('assets/plugins/nprogress/nprogress.js')); ?>"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>


</head>

<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>

    <div class="wrapper">

        
        <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
                <!-- Aplication Brand -->
                <div class="app-brand">
                    <a href="/index.html">
                        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Mono">
                        <span class="brand-name">Angels</span>
                    </a>
                </div>
                <!-- begin sidebar scrollbar -->
                <div class="sidebar-left" data-simplebar style="height: 100%;">
                    <!-- sidebar menu -->
                    <ul class="nav sidebar-inner" id="sidebar-menu">
                        <li class="<?php echo e(request()->routeIs('dashboard.home') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="index.html">
                                <i class="mdi mdi-briefcase-account-outline"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="section-title">
                            Tables
                        </li>

                        <li class="<?php echo e(request()->routeIs('dashboard.user') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="<?php echo e(route('dashboard.user')); ?>">
                                <i class="mdi mdi-account-group"></i>
                                <span class="nav-text">Users</span>
                            </a>
                        </li>

                        <li class="<?php echo e(request()->routeIs('dashboard.user_details') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="<?php echo e(route('dashboard.user_details')); ?>">
                                <i class="mdi mdi-account-card-details"></i>
                                <span class="nav-text">User Details</span>
                            </a>
                        </li>

                        <li class="<?php echo e(request()->routeIs('dashboard.service') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="<?php echo e(route('dashboard.service')); ?>">
                                <i class="mdi mdi-briefcase-check"></i>
                                <span class="nav-text">Services</span>
                            </a>
                        </li>

                        <li class="<?php echo e(request()->routeIs('dashboard.vendor') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="<?php echo e(route('dashboard.vendor')); ?>">
                                <i class="mdi mdi-human-greeting"></i>
                                <span class="nav-text">Vendors</span>
                            </a>
                        </li>

                        <li class="<?php echo e(request()->routeIs('dashboard.booking') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="calendar.html">
                                <i class="mdi mdi-calendar-check"></i>
                                <span class="nav-text">User Bookings</span>
                            </a>
                        </li>


                        <li class="<?php echo e(request()->routeIs('dashboard.wishlist') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="calendar.html">
                                <i class="mdi mdi-heart"></i>
                                <span class="nav-text">User Wishlist</span>
                            </a>
                        </li>

                        <li class="<?php echo e(request()->routeIs('dashboard.contacts') ? 'active' : ''); ?>">
                            <a class="sidenav-item-link" href="<?php echo e(route('dashboard.contacts')); ?>">
                                <i class="mdi mdi-phone"></i>
                                <span class="nav-text">Contact Us</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </aside>

        
        <div class="page-wrapper">
            <!-- Header -->
            <header class="main-header" id="header">
                <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
                    <!-- Sidebar toggle button -->
                    <button id="sidebar-toggler" class="sidebar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                    </button>

                    <span class="page-title">dashboard</span>

                    <div class="navbar-right ">
                        <ul class="nav navbar-nav">
                            <!-- Offcanvas -->
                            <li class="custom-dropdown">
                                <button class="notify-toggler custom-dropdown-toggler">
                                    <i class="mdi mdi-bell-outline icon"></i>
                                    <span class="badge badge-xs rounded-circle">21</span>
                                </button>
                                <div class="dropdown-notify">

                                    <header>
                                        <div class="nav nav-underline" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="all-tabs" data-toggle="tab"
                                                href="#all" role="tab" aria-controls="nav-home"
                                                aria-selected="true">All (5)</a>
                                            <a class="nav-item nav-link" id="message-tab" data-toggle="tab"
                                                href="#message" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Msgs (4)</a>
                                            <a class="nav-item nav-link" id="other-tab" data-toggle="tab"
                                                href="#other" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Others (3)</a>
                                        </div>
                                    </header>

                                    <div class="" data-simplebar style="height: 325px;">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade show active" id="all" role="tabpanel"
                                                aria-labelledby="all-tabs">

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult
                                                                behaviour he of. On disposal of as landlord horrible.
                                                                Afraid at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at
                                                                highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your
                                                                contact.</span>
                                                            <div class="buttons">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#"
                                                                    class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on
                                                                at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="message" role="tabpanel"
                                                aria-labelledby="message-tab">

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-01.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Selena Wagner</span>
                                                            <span class="discribe">Lorem ipsum dolor sit amet,
                                                                consectetur adipisicing elit.</span>
                                                            <span class="time">
                                                                <time>15 min ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-03.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Sagge Hudson</span>
                                                            <span class="discribe">On disposal of as landlord Afraid at
                                                                highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm bg-warning-10 p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-02.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">John Doe</span>
                                                            <span class="discribe">Extremity sweetness difficult
                                                                behaviour he of. On disposal of as landlord horrible.
                                                                Afraid
                                                                at highly months do things on at.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper">
                                                        <a href="user-profile.html">
                                                            <img src="images/user/user-sm-04.jpg" alt="User Image">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Albrecht Straub</span>
                                                            <span class="discribe"> Beatae quia natus assumenda
                                                                laboriosam, nisi perferendis aliquid consectetur
                                                                expedita non tenetur.</span>
                                                            <span class="time">
                                                                <time>Just now</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="other" role="tabpanel"
                                                aria-labelledby="contact-tab">

                                                <div class="media media-sm p-4 bg-light mb-0">
                                                    <div class="media-sm-wrapper bg-primary">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-calendar-check-outline"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">New event added</span>
                                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                                            <span class="time">
                                                                <time>10 min ago...</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info-dark">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-account-multiple-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Add request</span>
                                                            <span class="discribe">Add Dany Jones as your
                                                                contact.</span>
                                                            <div class="buttons">
                                                                <a href="#"
                                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                                <a href="#"
                                                                    class="btn btn-sm shadow-none">delete</a>
                                                            </div>
                                                            <span class="time">
                                                                <time>6 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="media media-sm p-4 mb-0">
                                                    <div class="media-sm-wrapper bg-info">
                                                        <a href="user-profile.html">
                                                            <i class="mdi mdi-playlist-check"></i>
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <a href="user-profile.html">
                                                            <span class="title mb-0">Task complete</span>
                                                            <span class="discribe">Afraid at highly months do things on
                                                                at.</span>
                                                            <span class="time">
                                                                <time>1 hrs ago</time>...
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <footer class="border-top dropdown-notify-footer">
                                        <div class="d-flex justify-content-between align-items-center py-2 px-4">
                                            <span>Last updated 3 min ago</span>
                                            <a id="refress-button" href="javascript:"
                                                class="btn mdi mdi-cached btn-refress"></a>
                                        </div>
                                    </footer>
                                </div>
                            </li>
                            <!-- User Account -->
                            <li class="dropdown user-menu">
                                <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <img src="<?php echo e(asset('assets/images/user/user-xs-01.jpg')); ?>"
                                        class="user-image rounded-circle" alt="User Image" />
                                    
                                    <span class="d-none d-lg-inline-block">John Doe</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-link-item" href="user-profile.html">
                                            <i class="mdi mdi-account-outline"></i>
                                            <span class="nav-text">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-link-item" href="user-account-settings.html">
                                            <i class="mdi mdi-settings"></i>
                                            <span class="nav-text">Account Setting</span>
                                        </a>
                                    </li>

                                    <li class="dropdown-footer">
                                        <form method="POST" action="<?php echo e(route('logout')); ?>" id="logout-form">
                                            <?php echo csrf_field(); ?>
                                            <a href="#" class="dropdown-link-item"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="mdi mdi-logout"></i> Log Out
                                            </a>
                                        </form>
                                    </li>
                                    
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>


            </header>

            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>

            </div>

            <!-- Footer -->
            <footer class="footer mt-auto">
                <div class="copyright bg-white">
                    <p>
                        &copy; <span id="copy-year"></span> Copyright Angels Dashboard by <a class="text-primary"
                            href="http://www.iamabdus.com/" target="_blank">Sara</a>.
                    </p>
                </div>
                <script>
                    var d = new Date();
                    var year = d.getFullYear();
                    document.getElementById("copy-year").innerHTML = year;
                </script>
            </footer>
        </div>
    </div>


    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/simplebar/simplebar.min.js')); ?>"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

    <script src="<?php echo e(asset('assets/plugins/apexcharts/apexcharts.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/daterangepicker/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('input[name="dateRange"]').daterangepicker({
                autoUpdateInput: false,
                singleDatePicker: true,
                locale: {
                    cancelLabel: 'Clear'
                }
            });
            jQuery('input[name="dateRange"]').on('apply.daterangepicker', function(ev, picker) {
                jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
            });
            jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function(ev, picker) {
                jQuery(this).val('');
            });
        });
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="<?php echo e(asset('assets/plugins/toaster/toastr.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/mono.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/chart.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/map.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\wamp64\www\laravel\laravel_tasks\masterpiece-dashboard\resources\views/dashboard/layouts/navbar.blade.php ENDPATH**/ ?>