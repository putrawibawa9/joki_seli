<?php

require_once 'classProduk.php';

$burger = new Produk\Burger;
$id_testimoni = $_GET['id_testimoni'];

if ($burger->delete($id_testimoni, 'id_testimoni', 'testimoni')){
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