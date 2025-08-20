<!-- Topbar Start -->
<header class="app-topbar" id="header">
    <div class="page-container topbar-menu">
        <div class="d-flex align-items-center gap-2">

            <!-- Brand Logo -->
            <a href="<?php echo e(route('any', ['index'])); ?>" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="/images/logo.png" alt="logo"></span>
                    <span class="logo-sm"><img src="/images/logo-sm.png" alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="/images/logo-dark.png" alt="dark logo"></span>
                    <span class="logo-sm"><img src="/images/logo-sm.png" alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Menu Toggle Button -->
            <button class="sidenav-toggle-button px-2">
                <i class="ri-menu-5-line fs-24"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="ri-menu-5-line fs-24"></i>
            </button>

            <!-- Topbar Page Title -->

            <div class="topbar-item d-none d-md-flex px-2">
                <?php if(isset($topbarTitle)): ?>
                <div>
                    <h4 class="page-title fs-20 fw-semibold mb-0"><?php echo e($topbarTitle); ?></h4>
                </div>
                <?php else: ?>
                <div>
                    <h4 class="page-title fs-20 fw-semibold mb-0">Welcome!</h4>
                </div>
                <?php endif; ?>
            </div>


        </div>

        <div class="d-flex align-items-center gap-2">
            <!-- User Dropdown -->
            <div class="topbar-item nav-user">
                <div class="dropdown">
                   <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                        data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                            <img src="/images/users/avatar-1.jpg" width="32" class="rounded-circle me-lg-2 d-flex"
                                alt="user-image">
                            <span class="d-lg-flex flex-column gap-1 d-none">
                                <h5 class="my-0"><?php echo e(auth()->user()->name); ?></h5>
                            </span>
                            <i class="ri-arrow-down-s-line d-none d-lg-block align-middle ms-1"></i>
                        </a>

                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                       <a href="#" 
                            class="dropdown-item" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editUserModal<?php echo e(auth()->user()->id); ?>">
                            <i class="ri-account-circle-line me-1 fs-16 align-middle"></i>
                            <span class="align-middle">My Account</span>
                            </a>

                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="dropdown-item fw-semibold text-danger">
                            <i class="ri-logout-box-line me-1 fs-16 align-middle"></i>
                            <span class="align-middle">Sign Out</span>
                        </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Topbar End -->

<!-- Search Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-transparent">
            <form>
                <div class="card mb-1">
                    <div class="px-3 py-2 d-flex flex-row align-items-center" id="top-search">
                        <i class="ri-search-line fs-22"></i>
                        <input type="search" class="form-control border-0" id="search-modal-input"
                            placeholder="Search for actions, people,">
                        <button type="submit" class="btn p-0" data-bs-dismiss="modal" aria-label="Close">[esc]</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\Adminto-Laravel_v2.0\Adminto\resources\views/layouts/partials/topbar.blade.php ENDPATH**/ ?>