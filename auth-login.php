<?php require 'inc/_global/config.php'; 
    if($_SESSION['logauthis'] == true){
        header('Location: index');
    }
?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<?php
    
    if($_SESSION['detailed']==true && isset($_SESSION['malls'])){
        $_SESSION['email'] = $_SESSION['malls'];
        $_SESSION['logauthis'] = true;
        unset($_SESSION['detailed']);
        unset($_SESSION['malls']);
        $pesantitle = "Selamat Datang";
        $pesantype = "success";
        $pesanredirect = "window.location.replace('index');";
        require_once("actionpesan.php");
        echo $pesan;
    }
    if(isset($_POST['btn_masuk'])){
        $proses_login = masuk_akun($_POST['email'],md5($_POST['sandi']));
        $num_log = mysqli_num_rows($proses_login);
        if($num_log>0){
            $row_log = mysqli_fetch_array($proses_login);
            if($row_log['status']==2){
                $pesantitle = "Akun anda ditangguhkan";
                $pesantype = "warning";
                $pesanredirect = "window.location.replace('auth-login');";
                require_once("actionpesan.php");
                echo $pesan;
            }elseif($row_log['status']==0){
                $pesantitle = "Lengkapi profil akun kamu";
                $_SESSION['identity'] = $row_log['idakun'];
                $pesantype = "warning";
                $mail = base64_encode($_POST['email']);
                $token = base64_encode(md5("growthauthentication"));
                $pesanredirect = "window.location.replace('auth-detail?token=$token&&auth=$mail');"; 
                require_once("actionpesan.php");
                echo $pesan;
            }elseif($row_log['status']==1){
                $_SESSION['identity'] = $row_log['idakun'];
                $_SESSION['logauthis'] = true;
                $_SESSION['email'] = base64_encode($_POST['email']);
                $pesantitle = "Selamat Datang";
                $pesantype = "success";
                $pesanredirect = "window.location.replace('index');";
                require_once("actionpesan.php");
                echo $pesan;
            }else{
                $pesantitle = "Error Status";
                $pesantype = "error";
                $pesanredirect = "window.location.replace('auth-login');";
                require_once("actionpesan.php");
                echo $pesan;
            }
        }else{
            session_destroy();
            $pesantitle = "Email atau Kata sandi salah";
            $pesantype = "error";
            $pesanredirect = "window.location.replace('auth-login');";
            require_once("actionpesan.php");
            echo $pesan;
        }
    }
?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/picture3.jpg');">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w600 text-white">
                    Get Inspired and Create.
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; <span class="js-year-copy"></span>
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10">
                    <a class="link-effect font-w700" href="index">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-dual-primary-dark">Gro</span><span class="font-size-xl text-primary">wth</span>
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Selamat Datang</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Masuk untuk menjelajah lebih jauh</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <form class="js-validation-auth px-30" action="" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" id="login-username" name="email">
                                <label for="login-username">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="password" class="form-control" id="login-password" name="sandi">
                                <label for="login-password">Kata Sandi</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary" name="btn_masuk">
                            <i class="si si-login mr-10"></i> Masuk
                        </button>
                        <div class="mt-30">
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="auth-register">
                                <i class="fa fa-plus mr-5"></i> Buat Akun
                            </a>
                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_reminder2.php">
                                <i class="fa fa-warning mr-5"></i> Lupa Kata Sandi
                            </a>
                        </div>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>