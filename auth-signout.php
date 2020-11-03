<?php
session_start();
session_destroy();
echo "
<script type='text/javascript'>
setTimeout(function () {  
    swal({
        title: 'Berhasil Keluar',
        type: 'success',
        timer: 1500,
        showConfirmButton: false
    });  
},10); 
window.setTimeout(function(){ 
    window.location.replace('index');
} ,1500); 
</script>
";  