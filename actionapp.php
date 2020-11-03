<?php
    if(defined("passgrowth") == false){
        die("NOT ACCESABLE");
    }
    function connect_to_db()
    {
        $conn = mysqli_connect("localhost","root","","dbgrowth");
        if($conn == false)
        {
            echo mysqli_error($conn);
            die;
        }
        return $conn;
    }

    function query($sql){
        $conn = connect_to_db();
        return mysqli_query($conn, $sql);
    }

    //AUTHENTICATION
        function cekmail_akun($email){
            $sql = "SELECT * FROM tbakun WHERE email='$email'";
            return query($sql);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
        }
        function daftar_akun($email,$sandi){
            $nama = explode("@",$email);
            $sql = "INSERT INTO tbakun (email,pass,nama) values ('$email','$sandi','$nama[0]')";
            return query($sql); 
        }
        function daftardetail_akun($email,$role,$nama,$usia,$jk,$notelp){
            $sql = "UPDATE tbakun set status='1', role = '$role', nama = '$nama', usia = '$usia', jk = '$jk', kontak ='$notelp' where email = '$email'";
            return query($sql);
        }
        function masuk_akun($email,$pass){
            $sql = "SELECT * FROM tbakun WHERE email='$email' && pass='$pass'";
            return query($sql);
        }
        function data_akun($id){
            $sql = "SELECT * FROM tbakun WHERE idakun='$id'";
            return query($sql);   
        }
    //END AUTH

    //SEMUA petaniXpemodal
        function semua_kolaborasi($id){
            $sql = "SELECT * FROM tbkolaborasi WHERE idakun='$id'";
            return query($sql);  
        }
        function semua_mengikut($id){
            $sql = "SELECT * FROM tbfavorit WHERE idakun='$id' && kategori='1'";
            return query($sql);  
        }
    //END SEMUA petaniXpemodal

    //PEMODAL
        function semua_lahan1($id){
            $sql = "SELECT * FROM tblahan WHERE idakun='$id'";
            return query($sql);  
        }
        function list_lahan1($idakun,$mulai,$halaman){
            $sql = "SELECT * FROM tblahan LIMIT $mulai, $halaman";
            return query($sql);  
        }
        function semua_lahan($id){
            $sql = "SELECT * FROM tblahan WHERE idakun='$id'";
            return query($sql);  
        }
        function tambah_lahan($nama,$deskripsi,$l1,$l2,$l3,$alamat,$detail,$idakun){
            $sql = "INSERT INTO tblahan (nama,deskripsi,luasgarapan,lahantanamanpermanen,lahanpenggembalaan,alamat,detail,idakun) values ('$nama','$deskripsi','$l1','$l2','$l3','$alamat','$detail','$idakun')";
            return query($sql); 
        }
        function tambahfoto_lahan($foto,$idlahan){
            $sql = "UPDATE tblahan set foto='$foto' where idlahan = '$idlahan'";
            return query($sql);
        }
        function list_lahan($idakun,$mulai,$halaman){
            $sql = "SELECT * FROM tblahan WHERE idakun='$idakun' LIMIT $mulai, $halaman";
            return query($sql);  
        }
        function etcid_lahan($idakun){
            $sql = "SELECT * FROM tblahan WHERE idakun='$idakun' order by idlahan desc limit 1 ";
            return query($sql);  
        }
        function semua_modal($id){
            $sql = "SELECT * FROM tbmodal WHERE idakun='$id'";
            return query($sql);  
        }
        function tambah_modal($id,$jumlah){
            $sql = "INSERT INTO tbmodal (jumlah,idakun) values ('$jumlah','$id')";
            return query($sql); 
        }
    //END PEMODAL