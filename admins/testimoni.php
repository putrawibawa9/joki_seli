<?php
require_once 'classProduk.php'; 
require_once '../admin/header.php'; 


$hasil = new Produk\Burger;
$burger = $hasil->readTestimoni();

// var_dump($burger);
// exit;
?>
  
    
    <div class="container">
      <div class="row">
        <div class="col-12 p-3 bg-white">
          <h3>Testimoni</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Number</th>
                    <th class="text-center">Testimoni</th>
                    <th class="text-center">Tambahkan ke profil</th>
                    <th class="text-center">Status</th>
                  </tr>
            </thead>
            <tbody>
              <?php $i=1?>
              <?php foreach($burger as $row):?>
                <tr>
                  <td><?=$i++ ?></td>
                  <td ><?=$row['deskripsi']?></td>
                  <td><a href="tambahTestimoni.php?id_testimoni=<?=$row['id_testimoni']?>" class="btn btn-primary btn-sm " onclick="return confirm('yakin?');">Tambah</a>
                    <a href="hapusTestimoni.php?id_testimoni=<?=$row['id_testimoni']?>" class="btn btn-danger btn-sm " onclick="return confirm('yakin?');">Delete</a>
                </td>
                  <td><?php 
                  if($row['isDisplay'] == 1){
                    echo "Sudah ditambahkan";
                  }else{
                    echo "Belum ditambahkan";
                  }
                  ?></td>
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
 
