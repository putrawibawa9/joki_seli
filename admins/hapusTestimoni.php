<?php

require_once 'classProduk.php';

$burger = new Produk\Burger;
$id_testimoni = $_GET['id_testimoni'];

if ($burger->hapusTestimoni($id_testimoni)){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'testimoni.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'testimoni.php';
            </script>";
}


?>