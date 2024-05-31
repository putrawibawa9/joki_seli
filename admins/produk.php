<?php
require_once 'classProduk.php'; 
require_once '../admin/header.php'; 


$hasil = new Produk\Burger;
$burger = $hasil->readProduk();

// var_dump($burger);
// exit;
?>
  
    
    <div class="container">
      <div class="row">
        <div class="col-12 p-3 bg-white">
          <h3>Produk</h3>
          <a href="produk-tambah.php" class="btn btn-primary  mb-3">Add</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Number</th>
                    <th class="text-center">Nama Proyek</th>
                    <th class="text-center">Lokasi Proyek</th>
                    <th class="text-center">Foto Proyek</th>
                    <th class="text-center">Deskripsi Proyek</th>
                    <th class="text-center">Tanggal Proyek</th>
                    <th class="text-center">Status Proyek</th>
                       <th class="text-center">Aksi</th>
                  </tr>
            </thead>
            <tbody>
              <?php $i=1?>
              <?php foreach($burger as $row):?>
                <tr>
                  <td><?=$i++ ?></td>
                  <td ><?=$row['nama_proyek']?></td>
                  <td ><?=$row['lokasi_proyek']?></td>
                  <td class="text-center" > <img src="../img/<?=$row['foto_proyek']?>" width="100px"></td>
                  <td ><?=$row['deskripsi_proyek']?></td>
                  <td ><?=$row['tanggal_proyek']?></td>
                  <td ><?=$row['status_proyek']?></td>
                   <td>
                    <a  href="produk-form.php?id_proyek=<?=$row['id_proyek'];?>" class="btn btn-warning btn-sm ">Edit</a>
                    <a href="produk-delete.php?id_proyek=<?=$row['id_proyek'];?>" class="btn btn-danger btn-sm " onclick="return confirm('yakin?');">Delete</a>
                   </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
        </table>
        <div>
          
          </div>
    </div>
  </div>
</div>



<?php require_once '../admin/footer.php';?>

<?php require_once '../admin/footer.php';?>
<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>
 
