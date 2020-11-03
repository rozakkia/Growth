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
    if(base64_encode(md5("growthauthentication"))==$_GET['token'] && isset($_GET['auth'])){
        $mail = base64_decode($_GET['auth']);
        $cekmail = cekmail_akun($mail);
        $data = mysqli_fetch_assoc($cekmail);
        $numcek = mysqli_num_rows($cekmail);
        if($numcek>0 && $data['status']==0 ){
             if(isset($_POST['btn_simpan'])){
                 $simpandetail = daftardetail_akun($mail,$_POST['rrole'],$_POST['nama'],$_POST['usia'],$_POST['jk'],$_POST['telp']);
                 if($simpandetail){
                    $_SESSION['detailed'] = true;
                    $_SESSION['malls'] = $_GET['auth'];
                    $pesantitle = "Tersimpan";
                    $pesantype = "success";
                    $pesanredirect = "window.location.replace('auth-login');"; 
                    require_once("actionpesan.php");
                    echo $pesan;
                }else{
                    $pesantitle = "Gagal";
                    $pesantype = "error";
                    $pesanredirect = "window.location.replace('auth-login');";
                    require_once("actionpesan.php");
                    echo $pesan;
                }
             }           
        }else{
            $pesantitle = "Kesalahan Email";
            $pesantype = "error";
            $pesanredirect = "window.location.replace('auth-login');";
            require_once("actionpesan.php");
            echo $pesan;
        }   
    }else{
        $pesantitle = "Kesalahan";
        $pesantype = "error";
        $pesanredirect = "window.location.replace('auth-login');";
        require_once("actionpesan.php");
        echo $pesan;
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
                    <h1 class="h3 font-w700 mt-30 mb-10">Lengkapi Profil Kamu</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">Email : <?php echo $mail ?>
                    </h2>
                </div>
                <!-- END Header -->
                <div class="js-wizard-validation-material block">
                    <div class="block-content block-content-sm">
                        <div class="progress" data-wizard="progress" style="height: 8px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 34.3333%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="active" href="#wizard-validation-material-step1" data-toggle="tab"></a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#wizard-validation-material-step2" data-toggle="tab"></a>
                        </li>
                        <li class="nav-item">
                            <a class="" href="#wizard-validation-material-step3" data-toggle="tab"></a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form class="js-wizard-validation-material-form" action="" method="post">
                        <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-validation-material-step1" role="tabpanel">
                                <div class="row">
                                    <div class="col-6">
                                        <a class="block block-link-pop text-center">
                                            <div class="block-content">
                                                <label class="css-control css-control-lg css-control-primary css-radio">
                                                    <p class="mt-5">
                                                        <i class="fa fa-pied-piper-alt fa-4x text-success"></i>
                                                    </p>
                                                    <p class="font-w600">Petani</p>
                                                    <input type="radio" class="css-control-input" name="rrole" value="1">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="block block-link-pop text-center">
                                            <div class="block-content">
                                                <label class="css-control css-control-lg css-control-primary css-radio">
                                                    <p class="mt-5">
                                                        <i class="fa fa-slideshare fa-4x text-info"></i>
                                                    </p>
                                                    <p class="font-w600">Pemodal</p>
                                                    <input type="radio" class="css-control-input" name="rrole" value="2">
                                                    <span class="css-control-indicator"></span>
                                                </label>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 1 -->

                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-validation-material-step2" role="tabpanel">
                                <div class="form-group">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-text" name="nama" placeholder="Masukkan nama lengkap kamu">
                                        <label for="material-text">Nama</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-material input-group">
                                        <input type="number" class="form-control" id="material-addon-text" name="usia" placeholder="Masukkan usia kamu">
                                        <label for="material-addon-text">Usia</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">tahun</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-material">
                                        <label for="material-text">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-12">
                                            <label class="css-control css-control-lg css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" name="jk" value="1">
                                                <span class="css-control-indicator"></span> Laki-laki
                                            </label>
                                            <label class="css-control css-control-lg css-control-primary css-radio">
                                                <input type="radio" class="css-control-input" name="jk" value="2">
                                                <span class="css-control-indicator"></span> Perempuan
                                            </label>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-material">
                                        <input type="number" class="form-control" id="material-text" name="telp" placeholder="e.g : 62####...">
                                        <label for="material-text">No. Telepon</label>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 2 -->

                            <!-- Step 3 -->
                            <div class="tab-pane" id="wizard-validation-material-step3" role="tabpanel">
                                
                                <h2 class="h5 font-w700 mb-0 text-success"><i class="fa fa-check-square-o"></i> Profil Lengkap
                                <h2 class="h6 font-w400 text-muted">kamu dapat merubah profile di pengaturan akun
                            </div>
                            <!-- END Step 3 -->
                        </div>
                        <!-- END Steps Content -->

                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light">
                            <div class="row">
                                <div class="col-6">
                                    <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-5"></i> Kembali
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                        Lanjut <i class="fa fa-angle-right ml-5"></i>
                                    </button>
                                    <button type="submit" class="btn btn-alt-success d-none" name="btn_simpan" data-wizard="finish">
                                        <i class="fa fa-check mr-5"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
                    </form>
                    <!-- END Form -->
                </div>
                <!-- END Sign In Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js'); ?>
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('js/plugins/jquery-validation/additional-methods.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/be_forms_wizard.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>