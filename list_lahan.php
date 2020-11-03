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
            <i class="fa fa-map-marker text-muted mr-5"></i> Semua Lahan
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
            $result = semua_lahan1($data_akun['idakun']);
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman);     
            $proses_list = list_lahan1($data_akun['idakun'],$mulai,$halaman);
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




<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Plugins -->
<?php $cb->get_js('js/plugins/jquery-validation/jquery.validate.min.js'); ?>

<!-- Page JS Code -->
<?php $cb->get_js('js/pages/op_auth_signin.min.js'); ?>

<?php require 'inc/_global/views/footer_end.php'; ?>