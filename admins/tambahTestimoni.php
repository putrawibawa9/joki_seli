<?php

require_once 'classProduk.php';

$burger = new Produk\Burger;
$id_testimoni = $_GET['id_testimoni'];

if ($burger->tambahTestimoni($id_testimoni)){
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