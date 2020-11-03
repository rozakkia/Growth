<?php
// **************************************************************************************************
// INCLUDED VIEWS
// **************************************************************************************************

$cb->inc_side_overlay           = false;
$cb->inc_sidebar                = 'inc/backend_boxed/views/inc_sidebar.php';
$cb->inc_header                 = 'inc/backend_boxed/views/inc_header.php';
$cb->inc_footer                 = 'inc/backend_boxed/views/inc_footer.php';


// **************************************************************************************************
// SIDEBAR
// **************************************************************************************************

$cb->l_sidebar_visible_desktop  = false;
$cb->l_sidebar_inverse          = true;


// **************************************************************************************************
// HEADER
// **************************************************************************************************

$cb->l_header_fixed             = true;
$cb->l_header_style             = 'inverse';


// **************************************************************************************************
// MAIN MENU
// **************************************************************************************************

    $cb->main_nav = array(
        array(
            'name'  => $data_akun['nama'],
            'sub'   => array(
                array(
                    'name'  => 'Profil Saya',
                    'icon'  => 'si si-user',
                    'url'   => ''
                ),
                array(
                    'name'  => 'Favorit',
                    'icon'  => 'si si-heart',
                    'url'   => ''
                ),
                array(
                    'name'  => 'Riwayat',
                    'icon'  => 'si si-clock',
                    'url'   => ''
                ),
                array(
                    'name'  => 'Keluar',
                    'icon'  => 'si si-logout',
                    'url'   => 'auth-signout'
                ),
            )
        )
    );

