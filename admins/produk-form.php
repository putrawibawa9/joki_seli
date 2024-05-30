<?php 
    require_once '../admin/header.php';
    require_once 'classProduk.php';
    require_once 'classCategory.php';
?>

<?php
$id_proyek = $_GET['id_proyek'];


$data = new Produk\Burger;
$semuakategori = new Category\Kategori;

$kategori = $semuakategori->readKategori();
$result= $data->readTwoTablepart2($id_proyek);

// var_dump($result);
// exit;
if(isset($_POST['submit'])){

    $edit = new Produk\Burger;
    $result = $edit->editProduk($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'produk.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'produk-form.php';
        </script>
    ";

    }

}

?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Burger</h3>


        <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_proyek" value="<?= $id_proyek?>">
        <input type="hidden" name="gambarLama" value="<?= $result['foto_proyek'];?>">


            <div class="mb-3">
                <label class="form-label">Nama Proyek</label>
                <input required type="text" name="nama_proyek" class="form-control" value="<?= $result['nama_proyek']?>">
            </div>
            
            
            <div class="mb-3">
                <label class="form-label">Lokasi Proyek</label>
            <textarea class="form-control" name="lokasi_proyek" rows="3" placeholder="Keterangan Binatang"  required><?= $result['lokasi_proyek']?></textarea>
            </div>
            <img src="../img/<?= $result['foto_proyek'] ?>" width="100px" height="100px">
            <div class="mb-3">
                <label for="gambar" class="form-label"> Burger Picture</label>
                <input type="file" name="foto_proyek" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Proyek</label>
                <input required type="text" name="deskripsi_proyek" class="form-control" value="<?= $result['deskripsi_proyek']?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Proyek</label>
                <input required type="date" name="tanggal_proyek" class="form-control" value="<?= $result['tanggal_proyek']?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Status Proyek</label>
                <input required type="text" name="status_proyek" class="form-control" value="<?= $result['status_proyek']?>">
            </div>

            <a href="produk.php" class="btn btn-success" >Back</a>
            <button type="submit" class="btn btn-primary" name="submit" >Save</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../admin/footer.php';?>

<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>
