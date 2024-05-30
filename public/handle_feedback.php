<?php

if ($_POST) {
    require_once '../admins/classProduk.php';
   $add = new Produk\Burger;

    $result =$add->addTestimoni($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'produk.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'produk-tambah.php';
        </script>
    ";

    }
}
?>