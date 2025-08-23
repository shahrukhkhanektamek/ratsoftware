<?php ($get_user_user = Helpers::get_user()); ?>
   <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="" >
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="" >
                        </span>
                    </a>
                    <a href="<?php echo e(url('/')); ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="">
                        </span>
                        <span class="logo-lg">
                            <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="" >
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?php echo e(Helpers::image_check($get_user_user->image,'user.png')); ?>" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text"><?php echo e(Helpers::get_user()->name); ?></span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                    <?php if(Helpers::get_user()->role==1): ?>
                                    Founder
                                    <?php endif; ?>
                                    <?php if(Helpers::get_user()->role==3): ?>
                                    Sub Admin
                                    <?php endif; ?>
                                </span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome <?php echo e(Helpers::get_user()->name); ?>!</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(route('admin-change-password.index')); ?>"><i class="mdi mdi-eye text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Change Password </span></a>
                        <a class="dropdown-item logout" ><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="<?php echo e(url('/')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="" >
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="" >
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="<?php echo e(url('/')); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="" >
                    </span>
                    <span class="logo-lg">
                        <img src="<?php echo e(url('public')); ?>/assetsadmin/images/logo.png" alt="">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            
            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(route('dashboard')); ?>">
                                <i class="ri-dashboard-line"></i> <span data-key="t-dashboards">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(route('user.list')); ?>?type=1">
                                <i class="ri-file-user-line"></i> <span data-key="t-dashboards">Client Master</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(route('user.list')); ?>?type=2">
                                <i class="ri-file-user-line"></i> <span data-key="t-dashboards">Vendor Master</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(route('item.list')); ?>">
                                <i class="ri-file-user-line"></i> <span data-key="t-dashboards">Work Type Master</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="<?php echo e(route('user.list')); ?>">
                                <i class="ri-file-user-line"></i> <span data-key="t-dashboards">Item Master</span>
                            </a>
                        </li>

                        
                        

                        


                        

                        

                        
                        <li class="nav-item">
                            <a href="#sidebarSetting" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarSetting" data-key="t-projects">
                                <i class=" ri-settings-2-line"></i>Setting
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarSetting">
                                <ul class="nav nav-sm flex-column">
                                    
                                    <!-- <li class="nav-item">
                                        <a class="nav-link menu-link" href="<?php echo e(route('payment-setting.list')); ?>">
                                            <i class=" ri-file-copy-line"></i> <span data-key="t-dashboards">Payment</span>
                                        </a>
                                    </li> -->

                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="<?php echo e(route('setting.emails')); ?>">
                                            <i class=" ri-file-copy-line"></i> <span data-key="t-dashboards">Emails</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="<?php echo e(route('setting.payoutpin')); ?>">
                                            <i class=" ri-file-copy-line"></i> <span data-key="t-dashboards">Payout Pin</span>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link menu-link" href="<?php echo e(route('setting.plan')); ?>">
                                            <i class=" ri-file-copy-line"></i> <span data-key="t-dashboards">Plan Set</span>
                                        </a>
                                    </li>
                                    
                                    <!-- <li class="nav-item">
                                        <a class="nav-link menu-link" href="<?php echo e(route('setting.gst')); ?>">
                                            <i class=" ri-file-copy-line"></i> <span data-key="t-dashboards">GST</span>
                                        </a>
                                    </li> -->
                                    
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End --><?php /**PATH C:\xamp\htdocs\projects\ratsoftware\resources\views/admin/headers/header.blade.php ENDPATH**/ ?>