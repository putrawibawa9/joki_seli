<?php

require_once 'classProduk.php';

$burger = new Produk\Burger;
$data = $_POST;
if ($burger->tambahTestimoni($data)){
    echo "<script>
            alert('data berhasil ditambah');
            document.location.href = 'testimoni.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal ditambah');
            document.location.href = 'testimoni.php';
            </script>";
}


?>