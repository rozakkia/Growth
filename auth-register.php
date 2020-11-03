<?php require 'inc/_global/config.php'; 
    if($_SESSION['logauthis'] == true){
        header('Location: index');
    }
?>
<?php require 'inc/_global/views/head_start.php'; ?>
<!-- Page JS Plugins CSS -->
<?php $cb->get_css('js/plugins/slick/slick.css'); ?>
<?php $cb->get_css('js/plugins/slick/slick-theme.css'); ?>
<?php $cb->get_css('js/plugins/ion-rangeslider/css/ion.rangeSlider.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<?php
    if(isset($_POST['btn_daftar'])){
        $cekmail = cekmail_akun($_POST['email']);
        $numcek = mysqli_num_rows($cekmail);
        if($numcek>0){
            $pesantitle = "Email Sudah Terdaftar";
            $pesantype = "warning";
            $pesanredirect = "window.location.replace('auth-register');";
            require_once("actionpesan.php");
            echo $pesan;
        }else{
            $proses = daftar_akun($_POST['email'],md5($_POST['sandi']));
            if($proses){
                $pesantitle = "Pendaftaran Berhasil";
                $pesantype = "success";           
                $mail = base64_encode($_POST['email']);
                $token = base64_encode(md5("growthauthentication"));
                $pesanredirect = "window.location.replace('auth-detail?token=$token&&auth=$mail');"; 
                require_once("actionpesan.php");
                echo $pesan;
            }else{
                $pesantitle = "Pendaftaran Gagal";
                $pesantype = "error";
                $pesanredirect = "window.location.replace('auth-register');";
                require_once("actionpesan.php");
                echo $pesan;
            }
        }
        
    }
?>

<!-- Page Content -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/picture1.png');">
    <div class="row mx-0 bg-black-op">
        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
            <div class="p-30 invisible" data-toggle="appear">
                <p class="font-size-h3 font-w700 text-white">
                    Para Petani Menunggu Dukungan Anda
                </p>
                <p style="margin-top:-7%;" class="font-size-h5 font-w200 text-white">
                    Bergabung bersama Growth Membangun Bangsa
                </p>
                <p class="font-italic text-white-op">
                    Copyright &copy; <span class="js-year-copy"></span>
                </p>
            </div>
        </div>
        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
            <div class="content content-full">
                <!-- Header -->
                <div class="px-30 py-10 push">
                    <a class="link-effect font-w700" href="index.php">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-dual-primary-dark">Gro</span><span class="font-size-xl text-primary">wth</span>
                    </a>
                    <h1 class="h3 font-w700 mt-30 mb-10">Daftar Sekarang</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Sudah Memiliki Akun? 
                        <a class="link-effect text-primary mr-10 mb-5 d-inline-block" href="auth-login">
                            Masuk
                        </a>
                    </h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-auth px-30" action="" method="post">
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material input-group">
                                <input type="text" class="form-control" id="email" name="email" oninput="checkmail()" placeholder="e.g. eventku@mail.com">
                                <label for="material-addon-icon">Email</label>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="checking">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="js-pw-strength2-container" class="form-group row">
                        <div class="col-md-12">
                            <div class="form-material">
                                <input type="password" class="js-pw-strength2 form-control" id="sandi" name="sandi" placeholder="Rumit dan Mudah Diingat">
                                <label for="example-pw-strength2">Kata Sandi</label>
                            </div>
                            <div class="js-pw-strength2-progress pw-strength-progress mt-5"></div>
                            <p style="margin-bottom:-1%;" class="js-pw-strength2-feedback form-text"></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <div class="form-material">
                                <input type="password" class="form-control" id="material-text" name="konfirmasi" placeholder="Konfirmasi kata sandi kamu">
                                <label for="material-text">Konfirmasi Kata Sandi</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row push">
                        <div class="col-sm-12 push">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                <label class="custom-control-label" for="signup-terms">I agree to 
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#" data-toggle="modal" data-target="#modal-terms">Terms &amp; Conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" style="width:100%;" class="btn btn-sm btn-hero btn-alt-primary" name="btn_daftar">
                            <i class="si si-rocket mr-10"></i> Mulai
                        </button>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Terms &amp; Conditions</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <?php $cb->get_text('medium', 3); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-alt-success" data-dismiss="modal">
                    <i class="fa fa-check"></i> Perfect
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Page -->
<?php $cb->get_js('js/pages/be_forms_plugins.min.js'); ?>   
<?php $cb->get_js('js/form-validasi.js'); ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>
<?php $cb->get_js('js/plugins/pwstrength-bootstrap/pwstrength-bootstrap.min.js'); ?>
<?php $cb->get_js('js/plugins/jquery-auto-complete/jquery.auto-complete.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>

<script type='text/javascript'>
        var email = "";
        var checkmail = function(){
            var email = $("#email").val();
            $('#checking').html("");
            if(email!=""){
                    $('#checking').html("<i class='si si-refresh'></i>");
                    $.ajax({
                    url: "proses.php",
                    type: 'GET',
                    data: {email : email},
                    success: function(data) {  
                        $('#checking').html("");
                        if(data=="Available"){
                            $('#checking').html('<i class="si si-check text-success"></i>');
                        }else{
                            $('#checking').html('<i class="si si-close text-danger" title="Sudah Mendaftar? Masuk Yuk"></i>');
                        }
                },
                    error: function(e) {
                            $('#checking').html('<p class="bg-danger">There was an error</p>');
                    }
                });

            }
        }
    </script>

<?php require 'inc/_global/views/footer_end.php'; ?>