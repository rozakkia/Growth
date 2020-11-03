<?php 
if(defined("passgrowth") == false){
    die("ERROR");
}
$pesan ="<script type='text/javascript'>
            setTimeout(function () {  
            swal.fire({
                title: '$pesantitle',
                type: '$pesantype',
                timer: 2500,
                showConfirmButton: false
            });
            },10); 
            window.setTimeout(function(){ 
                $pesanredirect
            } ,2500);   
            </script>
        ";