<?php 
    require_once '../admin/header.php';
    require_once 'classProduk.php';

    $result = new Produk\Burger;
    $data = $result->readTwoTable();

//check whether the button has been click or not
if(isset($_POST['submit'])){
    $add = new Produk\Burger;

    $result =$add->addProduk($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'produk.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'produk-tambah.php';
        </script>
    ";

    }

}
?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Tambah Proyek</h3>


        <form method="post" enctype="multipart/form-data">


            <div class="mb-3">
                <label class="form-label">Nama Proyek</label>
                <input type="text" name="nama_proyek" class="form-control" required>
            </div>


            <label class="form-label">Lokasi Proyek</label>
            <div class="mb-3">
            <textarea class="form-control" name="lokasi_proyek" rows="3"   required></textarea>
            </div>


            <div class="mb-3">
                <label for="gambar" class="form-label">Foto Proyek</label>
                <input type="file" name="foto_proyek" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi Proyek</label>
             <textarea class="form-control" name="deskripsi_proyek" rows="3"   required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Proyek</label>
                <input type="date" name="tanggal_proyek" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status Proyek</label>
                <input type="text" name="status_proyek" class="form-control" required>
            </div>

            <a href="produk.php" class="btn btn-success" >Kembali</a>
            <button type="submit" class="btn btn-primary" name="submit" >Simpan</button>
        </form>
    </div>
  </div>
</div>


<?php require_once '../admin/footer.php';?>


<script type="text/javascript">
  $('.nav-link').removeClass('active');
  $('.menu-binatang').addClass('active');
</script>