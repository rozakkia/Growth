<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend_boxed/config.php'; ?>
<?php
$cb->l_header_fixed = true;
$cb->l_header_style = 'glass';
?>
<?php require 'inc/_global/views/head_start.php'; ?>
<!-- Page JS Plugins CSS -->
<?php $cb->get_css('js/plugins/datatables/dataTables.bootstrap4.css'); ?>

<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

<?php
    if(isset($_POST['btn_tambahmodal'])){
        $proses_tambahmodal = tambah_modal($data_akun['idakun'],$_POST['jumlahmodal']);
        if($proses_tambahmodal){
            $pesantitle = "Modal Ditambahkan";
            $pesantype = "success"; 
            $pesanredirect = "window.location.replace('data_lahan');"; 
            require_once("actionpesan.php");
            echo $pesan;
        }else{
            $pesantitle = "Gagal";
            $pesantype = "error";
            $pesanredirect = "window.location.replace('data_lahan');";
            require_once("actionpesan.php");
            echo $pesan;
        }
    }
?>

<!-- Page Content -->
<div class="content content-full">
    <div class="my-50 text-center">
        <h2 class="font-w700 text-black mb-10">
            <i class="fa fa-briefcase text-muted mr-5"></i> Modal Saya
        </h2>
        <h3 class="h5 text-muted mb-0">
            <a class="link-effect" href="#" data-toggle="modal" data-target="#modal-tambahmodal">
                <i class="fa fa-plus"></i>
                Tambah baru
            </a>
        </h3>
    </div>
    <!-- Dynamic Table Full -->
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Data Modal</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                            <th class="text-center" style="width: 15%;">Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 1; $i < 21; $i++) { ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="font-w600"><?php $cb->get_name(); ?></td>
                            <td class="d-none d-sm-table-cell">customer<?php echo $i; ?>@example.com</td>
                            <td class="d-none d-sm-table-cell">
                                <?php $cb->get_tag(); ?>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Customer">
                                    <i class="fa fa-user"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    <!-- END Dynamic Table Full -->
</div>
<!-- END Page Content -->

<!-- Modal tambahmobal -->
    <div class="modal fade" id="modal-tambahmodal" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideup" role="document">
            <form class="js-validation-lahan px-30" action="" method="post">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <h1 class="h3 font-w700 text-center mt-5 mb-5">Modal Baru</h1>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material">
                                        <input type="number" class="form-control" id="material-text" name="jumlahmodal" placeholder="Masukkan jumlah modal">
                                        <label for="material-text">Jumlah Modal</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="width:100%;" class="btn btn-alt-success mr-5 mb-5" name="btn_tambahmodal">
                            <i class="fa fa-save mr-10"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- END Modal tambahmodal -->

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>
<?php $cb->get_js('js/plugins/datatables/jquery.dataTables.min.js'); ?>
<?php $cb->get_js('js/plugins/datatables/dataTables.bootstrap4.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>
<?php $cb->get_js('js/pages/be_tables_datatables.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>