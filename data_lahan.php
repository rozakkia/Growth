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
    $alamat = $_POST['detail']."_".$_POST['desa']."_".$_POST['kec']."_".$_POST['kab']."_".$_POST['prov'];
    if(isset($_POST['btn_tambahlahan'])){
        $ekstensi_diperbolehkan = array('jpeg','png','jpg');
        $foto = $_FILES['foto']['name'];
        $x = explode('.', $foto);
        $ekstensi = strtolower(end($x));
        $ukuran     = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 10440700){
                $proses_tambahlahan = tambah_lahan($_POST['nama'],$_POST['deskripsi'],$_POST['2'],$_POST['3'],$_POST['4'],$alamat,$_POST['1'],$data_akun['idakun']);
                if($proses_tambahlahan){
                    $proses_datalahan = etcid_lahan($data_akun['idakun']);
                    $data_lahan = mysqli_fetch_assoc($proses_datalahan);
                    $namafoto = $data_akun['idakun']."".$data_lahan['idlahan'].".".$ekstensi;
                    move_uploaded_file($file_tmp, 'foto/lahan/'.$namafoto);
                    $proses_tambahfotolahan = tambahfoto_lahan($namafoto,$data_lahan['idlahan']);
                    $pesantitle = "Lahan Ditambahkan";
                    $pesantype = "success"; 
                    $pesanredirect = "window.location.replace('data_lahan');"; 
                    require_once("actionpesan.php");
                    echo $pesan;
                }else{
                    echo 
                    $pesantitle = "Gagal";
                    $pesantype = "error";
                    $pesanredirect = "window.location.replace('data_lahan');";
                    require_once("actionpesan.php");
                    echo $pesan;
                }
            }else{
                $pesantitle = "Foto Terlalu Besar";
                $pesantype = "error"; 
                $pesanredirect = "window.location.replace('data_lahan');"; 
                require_once("actionpesan.php");
                echo $pesan;
            }
        }else{
            $pesantitle = "Bukan File Foto";
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
            <i class="fa fa-map-marker text-muted mr-5"></i> Lahan Saya
        </h2>
        <h3 class="h5 text-muted mb-0">
            <a class="link-effect" href="#" data-toggle="modal" data-target="#modal-tambahlahan">
                <i class="fa fa-plus"></i>
                Tambah baru
            </a>
        </h3>
    </div>
    <div class="row">
        <?php
            $halaman = 10;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            $result = semua_lahan($data_akun['idakun']);
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman);     
            $proses_list = list_lahan($data_akun['idakun'],$mulai,$halaman);
            $no =$mulai+1;
            while ($list_lahan = mysqli_fetch_assoc($proses_list)) {
            $alamat = explode("_",$list_lahan['alamat']);
            if($list_lahan['status']==0){
                $ribboninfo = "success";
                $ribbonbox = "Tersedia";
            }else{
                $ribboninfo = "warning";
                $ribbonbox = "Tidak Tersedia";
            }
        ?>

                <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
                    <!-- Lahan -->
                    <div class="block block-rounded">
                        <div class="block-content p-0 overflow-hidden">
                            <a class="img-link" href="#">
                                <img class="img-fluid rounded-top" src="foto/lahan/<?php echo $list_lahan['foto'] ?>" alt="">
                            </a>
                        </div>
                        <div class="block-content block-content-full ribbon ribbon-<?php echo $ribboninfo ?>">
                            <div class="ribbon-box"><?php echo $ribbonbox ?></div>
                            <h4 class="font-size-h5 mb-10"><?php echo $list_lahan['nama'] ?></h4>
                            <p class="text-muted mb-0">
                                <i class="si si-pointer mr-5"></i> <?php echo $alamat['0'].", Desa ".$alamat['1'].", Kec.".$alamat['2']." " ?><b><?php echo $alamat['3'].", ".$alamat['4'] ?></b>
                            </p>
                        </div>
                    </div>
                    <!-- END Lahan -->
                </div>
            
            <?php 
            }
            ?>
    </div>
    <div class="">
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

        <?php } ?>

    </div>
</div>
<!-- END Page Content -->

<!-- Modal tambahlahan -->
    <div class="modal fade" id="modal-tambahlahan" tabindex="-1" role="dialog" aria-labelledby="modal-slideup" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideup" role="document">
            <form class="js-validation-lahan px-30" action="" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-content">
                            <h1 class="h3 font-w700 text-center mt-5 mb-5">Lahan Baru</h1>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-text" name="nama" placeholder="Masukkan nama Lahan">
                                        <label for="material-text">Nama Lahan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material">
                                        <textarea class="form-control" id="material-textarea-small" name="deskripsi" rows="3" placeholder="Masukkan deskripsi yang menarik"></textarea>
                                        <label for="material-textarea-small">Deskripsi Singkat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row push">
                                <label class="col-12">Foto Lahan</label>
                                <div class="col-12">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input js-custom-file-input-enabled" id="example-file-input-custom" name="foto" data-toggle="custom-file-input">
                                        <label class="custom-file-label" for="example-file-input-custom">Pilih foto</label>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-black text-center mb-0">Alamat Lahan</h6>
                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-text" name="detail" placeholder="Nama Jalan/RT/RW/Dusun">
                                        <label for="material-text">Detail</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-gridf" name="desa" >
                                        <label for="material-gridf">Desa</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-gridl" name="kec" >
                                        <label for="material-gridl">Kecamatan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row push">
                                <div class="col-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-gridf" name="kab" >
                                        <label for="material-gridf">Kabupaten</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-material">
                                        <input type="text" class="form-control" id="material-gridl" name="prov">
                                        <label for="material-gridl">Provinsi</label>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-black text-center mb-0">Detail Lahan</h6>
                            <div class="form-group row">
                                <div class="col-6 mt-10">
                                    <div class="form-material">
                                        <label class="css-control css-control-success css-checkbox">
                                            <input type="checkbox" class="css-control-input" value="1" checked="" name="1">
                                            <span class="css-control-indicator"></span> Saluran Irigasi
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-material input-group">
                                        <input type="number" class="form-control" id="material-addon-icon" name="2">
                                        <label for="material-addon-icon">Luas Garapan</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                M^2
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-material input-group">
                                        <input type="number" class="form-control" id="material-addon-icon" name="3">
                                        <label for="material-addon-icon">Lahan Tanaman Permanen</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                M^2
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-material input-group">
                                        <input type="number" class="form-control" id="material-addon-icon" name="4">
                                        <label for="material-addon-icon">Lahan Penggembalaan</label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                M^2
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" style="width:100%;" class="btn btn-alt-success mr-5 mb-5" name="btn_tambahlahan">
                            <i class="fa fa-save mr-10"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- END Modal tambahlahan -->


<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>