<!-- Header -->
<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item">
                <a class="link-effect font-w700 mr-5" href="index.php">
                    <i class="si si-fire text-primary"></i>
                    <span class="font-size-xl text-dual-primary-dark">Gro</span><span class="font-size-xl text-primary">wth</span>
                </a>
                <?php if($_SESSION['logauthis']==true) {
                    switch($data_akun['role']){
                        case '1':
                            $role_akun = "Petani";
                        break;
                        case '2':
                            $role_akun = "Pemodal";
                        break;
                        default:
                            $role_akun = "Galat";
                        break;
                    }
                ?>
                    <span class="font-w700 font-size-xl text-dual-primary-dark">: <?php echo $role_akun ?></span>
                <?php }else{}?>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="content-header-section">
            <?php if($_SESSION['logauthis']==true) {
            ?>
            <ul class="nav-main-header">
                <?php
                $cb->build_nav(true, true);
                ?>
            </ul>
            <?php
            }else{?>
                <a class="ml-20 btn btn-alt-primary" href="auth-login">Masuk</a>
            <?php } ?>
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
<!-- END Header -->
