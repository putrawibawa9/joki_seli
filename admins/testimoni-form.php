<?php 
    require_once '../admin/header.php';
    require_once 'classProduk.php';
?>

<?php
$id_testimoni = $_GET['id_testimoni'];


$data = new Produk\Burger;

$result= $data->viewEach('testimoni','id_testimoni',$id_testimoni);

// var_dump($result);
// exit;
if(isset($_POST['submit'])){

    $edit = new Produk\Burger;
    $result = $edit->editTestimoni($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'testimoni.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'testimoni-form.php';
        </script>
    ";

    }

}

?>
<div class="container">
  <div class="row">
    <div class="col-12 p-3 bg-white">
        <h3>Edit Testimoni</h3>


        <form method="post" enctype="multipart/form-data">

        <input type="hidden" name="id_testimoni" value="<?= $id_testimoni?>">
        <input type="hidden" name="gambarLama" value="<?= $result['gambar'];?>">
            <div class="mb-3">
                <label class="form-label">Testimoni</label>
                <input required type="text" name="deskripsi" class="form-control" value="<?= $result['deskripsi']?>">
            </div>
            <img src="../img/<?= $result['gambar'] ?>" width="100px" height="100px">
            <div class="mb-3">
                <label for="gambar" class="form-label"> Burger Picture</label>
                <input type="file" name="foto" class="form-control" required>
            </div>
            <a href="testimoni.php" class="btn btn-success" >Back</a>
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
