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
           <a href="formTambahTestimoni.php" class="btn btn-primary  mb-3">Add</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Number</th>
                    <th class="text-center">Testimoni</th>
                    <th class="text-center">Gambar Kontrak</th>
                    <th class="text-center">Aksi</th>
                  </tr>
            </thead>
            <tbody>
              <?php $i=1?>
              <?php foreach($burger as $row):?>
                <tr>
                  <td><?=$i++ ?></td>
                  <td ><?=$row['deskripsi']?></td>
                  <td class="text-center"><img src="../img/<?=$row['gambar']?>" alt="" style="width: 100px;"></td>
                  <td>
                    <a  href="testimoni-form.php?id_testimoni=<?=$row['id_testimoni'];?>" class="btn btn-warning btn-sm ">Edit</a>
                    <a href="testimoni-delete.php?id_testimoni=<?=$row['id_testimoni'];?>" class="btn btn-danger btn-sm " onclick="return confirm('yakin?');">Delete</a>
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
 
