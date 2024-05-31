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
        <h3>Tambah Testimoni</h3>

        <form action="tambahTestimoni.php"  method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Testimoni</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Foto Kontrak</label>
                <input type="file" name="foto" class="form-control" required>
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