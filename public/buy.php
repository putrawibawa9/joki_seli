<?php

require_once '../admins/classProduk.php';

$burger = new Produk\Burger;
$id_produk = $_GET['id_produk'];

if ($burger->minStock($id_produk)){
    echo "<script>
            alert('Buying Success');
            document.location.href = 'index.php';
      </script>";
}else{
  echo "  <script>
            alert('Buying Failed');
            document.location.href = 'index.php';
            </script>";
}


?>