<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend_boxed/config.php'; ?>
<?php
$cb->l_header_fixed = true;
$cb->l_header_style = 'glass';
?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>
<?php
    if(isset($_POST['btn_cari'])){
        $mw = base64_encode($_POST['1']."_".$_POST['2']."_".$_POST['3']);
        $ide = base64_encode($_POST['carii']);
        $token = md5("cariangrowth");
        $tok = md5($ide+$token);
        echo "<script type='text/javascript'>
                window.location.replace('pencarian?id=$ide&&token=$tok&&m=$mw'); 
             </script>";
    }
?>
<!-- Header Section -->
<div class="bg-image" style="background-image: url('<?php echo $cb->assets_folder; ?>/media/photos/picture2.jpg');">
    <div class="bg-white-op-90  ">
        <div class="content content-full content-top">
            <h4 class="py-50 text-center">
                <span class="text-muted typewrite" data-period="2000" data-type='[ "Hai, Kami Growth...", "Bergabung bersama kami...", "Untuk membangun bangsa..." ,"Bersama Growth membangun Bangsa" ]'>
                    <span class="wrap"></span>
                </span>
            </h4>
        </div>
    </div>
</div>
<!-- END Header Section -->

<!-- Page Content -->
<div class="content content-full">
    <div class="row gutters-tiny">
        <div class="col-6 col-md-6 col-xl-6">
            <a class="block block-rounded block-bordered block-link-pop text-center" href="list_lahan">
                <div class="block-content">
                    <p class="mt-5">
                        <i class="fa fa-map-marker fa-4x text-success"></i>
                    </p>
                    <p class="font-w600 text-success">Lahan</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-6 col-xl-6">
            <a class="block block-rounded block-bordered block-link-pop text-center" href="list_modal">
                <div class="block-content">
                    <p class="mt-5">
                        <i class="fa fa-briefcase fa-4x text-primary"></i>
                    </p>
                    <p class="font-w600 text-primary">Modal</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-12 col-xl-12">
            <a class="block block-rounded block-transparent bg-gd-dusk block-link-pop text-center" href="#" data-toggle="modal" data-target="#modal-search">
                <div class="block-content">
                    <p class="font-w600 text-white"><i class="fa fa-search mr-2"></i>Mulai Mencari</p>
                </div>
            </a>
        </div>
    </div>
    <?php if($_SESSION['logauthis']==true){ 
            if($data_akun['role']==1){

            }elseif($data_akun['role']==2){ 
    ?>
        <!-- Konten Pemodal -->
            <div class="content-heading">
                Statistik <small class="d-none d-sm-inline">Pemodal!</small>
            </div>
            <div class="row gutters-tiny push">
                <!-- Modal -->
                <?php
                    $proses_modal = semua_modal($data_akun['idakun']);
                    $num_modal = mysqli_num_rows($proses_modal);
                ?>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-elegance" href="data_modal">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-briefcase text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?php echo $num_modal ?>" data-before="Rp ">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Modal Keluar</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Modal -->

                <!-- Lahan -->
                <?php
                    $proses_lahan = semua_lahan($data_akun['idakun']);
                    $num_lahan = mysqli_num_rows($proses_lahan);
                ?>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-dusk" href="data_lahan">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-map-marker text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?php echo $num_lahan ?>">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Semua Lahan</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Lahan -->

                <!-- Mengikuti -->
                <?php
                    $proses_mengikut = semua_lahan($data_akun['idakun']);
                    $num_mengikuti = mysqli_num_rows($proses_mengikut);
                ?>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-sea" href="data_insight">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-users text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?php echo $num_mengikuti ?>">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Mengikuti</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Mengikuti -->

                <!-- Transaksi -->
                <?php
                    $proses_transaksi = semua_kolaborasi($data_akun['idakun']);
                    $num_transaksi = mysqli_num_rows($proses_transaksi);
                ?>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-aqua" href="data_transaksi">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-area-chart text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white" data-toggle="countTo" data-to="<?php echo $num_transaksi ?>">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Semua Transaksi</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Transaksi -->
            </div>
        <!-- END Konten Pemodal -->
    <?php } } ?>
</div>
<!-- END Page Content -->

<!-- Modal Search -->
    <div class="modal fade" id="modal-search" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideup" role="document">
            <form class="js-validation-auth px-30" action="" method="post">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <h1 class="h3 font-w700 text-center mt-5 mb-5">Butuh Sesuatu?</h1>
                            <h2 class="h5 font-w400 text-muted mb-0"></h2>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material floating">
                                        <input type="text" class="form-control" name="carii">
                                        <label for="login-username">kami akan membantu kamu untuk menemukannya</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters items-push text-center">
                                <div class="col-4">
                                    <label class="css-control css-control-success css-checkbox">
                                        <input type="checkbox" class="css-control-input" value="1" checked="" name="1">
                                        <span class="css-control-indicator"></span> Lahan
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="css-control css-control-primary css-checkbox">
                                        <input type="checkbox" class="css-control-input" value="2" checked="" name="2">
                                        <span class="css-control-indicator"></span> Modal
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label class="css-control css-control-info css-checkbox">
                                        <input type="checkbox" class="css-control-input" value="3" checked="" name="3">
                                        <span class="css-control-indicator"></span> Akun
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="width:100%;" class="btn btn-outline-success mr-5 mb-5" name="btn_cari">
                            <i class="fa fa-search mr-10"></i> Mulai Mencari
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- END Modal Search -->

<?php $cb->get_js('js/runningtext.min.js'); ?>

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>