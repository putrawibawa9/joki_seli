<?php

require_once 'classProduk.php';

$burger = new Produk\Burger;
$id_proyek = $_GET['id_proyek'];

if ($burger->deleteProduk($id_proyek)){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'produk.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'produk.php';
            </script>";
}


?>