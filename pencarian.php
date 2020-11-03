<?php require 'inc/_global/config.php'; ?>
<?php require 'inc/backend_boxed/config.php'; ?>
<?php
$cb->l_header_fixed = true;
$cb->l_header_style = 'glass';
?>
<?php require 'inc/_global/views/head_start.php'; ?>
<?php require 'inc/_global/views/head_end.php'; ?>
<?php require 'inc/_global/views/page_start.php'; ?>

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
    <!-- Files Filtering -->
    <h2 class="content-heading">Hasil Pencarian : <small><?php echo base64_decode($_GET['id']) ?></small></h2>

    <!-- Content Filtering (.js-filter class is initialized in Helpers.contentFilter()) -->
    <!-- You can set the animation duration through data-speed="speed_in_ms" -->
    <div class="js-filter" data-speed="400">
        <div class="p-10 bg-white push">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#" data-category-link="all">
                        <i class="fa fa-fw fa-folder-open-o mr-5"></i> Semua
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category-link="lahan">
                        <i class="fa fa-fw fa-map-marker mr-5"></i> Lahan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category-link="modal">
                        <i class="fa fa-fw fa-briefcase mr-5"></i> Modal
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-category-link="akun">
                        <i class="fa fa-fw fa-user mr-5"></i> Akun
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3" data-category="lahan">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full text-center">
                        <div class="item item-circle bg-warning-light text-warning mx-auto my-20">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="font-size-lg">The Martian.epub</div>
                        <div class="font-size-sm text-muted">~ 7 hrs | 426 pages</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3" data-category="modal">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full text-center">
                        <div class="item item-circle bg-info-light text-info mx-auto my-20">
                            <i class="fa fa-image"></i>
                        </div>
                        <div class="font-size-lg">DSC00018.jpg</div>
                        <div class="font-size-sm text-muted">12 mp | 3 mb</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3" data-category="akun">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full text-center">
                        <div class="item item-circle bg-success-light text-success mx-auto my-20">
                            <i class="fa fa-music"></i>
                        </div>
                        <div class="font-size-lg">Intro.mp3</div>
                        <div class="font-size-sm text-muted">2 min | 384 kbps</div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-xl-3" data-category="movies">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full text-center">
                        <div class="item item-circle bg-danger-light text-danger mx-auto my-20">
                            <i class="fa fa-film"></i>
                        </div>
                        <div class="font-size-lg">Iron Man 3.mov</div>
                        <div class="font-size-sm text-muted">124 min | 1080p</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- END Files Filtering -->
</div>
<!-- END Page Content -->

<?php $cb->get_js('js/runningtext.min.js'); ?>

<?php require 'inc/_global/views/page_end.php'; ?>
<?php require 'inc/_global/views/footer_start.php'; ?>

<!-- Page JS Helpers (Content Filtering helper) -->
<script>jQuery(function(){ Codebase.helpers('content-filter'); });</script>


<?php require 'inc/_global/views/footer_end.php'; ?>