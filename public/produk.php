<?php
include_once "header.php";
require_once "../admins/classProduk.php";

$bntng = new Produk\Burger;
$produk = $bntng->readProduk();

$testimoni = new Produk\Burger;
$tstmonibagus = $testimoni->readTestimoniUser();
?>
<<div class="row">
  <div class="col-12 p-5">              
    <div class="row">
      <?php foreach($produk as $row): ?>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="../img/<?= htmlspecialchars($row['foto_proyek']) ?>" alt="" class="img-fluid"> 
            <h5 class="m-0 text-center mt-2"> <?= htmlspecialchars($row['nama_proyek']) ?></h5>
            <button class="btn btn-primary mt-2 detail" 
                data-foto_proyek="<?= htmlspecialchars($row['foto_proyek']) ?>"
                data-nama_proyek="<?= htmlspecialchars($row['nama_proyek']) ?>"
                data-lokasi_proyek="<?= htmlspecialchars($row['lokasi_proyek']) ?>"
                data-deskripsi_proyek="<?= htmlspecialchars($row['deskripsi_proyek']) ?>"
                data-tanggal_proyek="<?= htmlspecialchars($row['tanggal_proyek']) ?>"
                data-status_proyek="<?= htmlspecialchars($row['status_proyek']) ?>">View Details</button>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>


<!-- Modal -->

<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="projectModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="projectModalLabel">Project Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img id="modal-foto-proyek" src="" alt="" class="img-fluid">
        <h5 id="modal-nama-proyek" class="mt-3"></h5>
        <p id="modal-lokasi-proyek"></p>
        <p id="modal-deskripsi-proyek"></p>
        <p id="modal-tanggal-proyek"></p>
        <p id="modal-status-proyek"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h3>Foto Pelanggan Penandatanganan Perjanjian Pembangunan di PT Keanu Abimanyu Konstruks</h3>
        <p>Setelah meninjau beberapa kontraktor, klien menyatakan bahwa PT Keanu Abimanyu Konstruksi sangat responsif,
memiliki portofolio lapangan yang signifikan dengan referensi positif, serta menawarkan harga yang bersaing. Mereka
juga diakui memiliki tim yang profesional dan berdedikasi. Salah satu klien, seorang ibu yang bekerja sebagai pejabat di
Bank Indonesia, telah melakukan pertemuan dengan empat kontraktor. Dia merasa bahwa satu kontraktor memiliki
kurangnya kesesuaian komunikasi, satu lagi memberikan kesan yang kurang menyenangkan baginya, dan yang lainnya
menawarkan harga yang terlalu murah sehingga menimbulkan kecurigaannya. Oleh karena itu, dia memilih PT Keanu
Abimanyu Konstruksi sebagai pilihan akhirnya. Seorang klien dari Bogor, yang merupakan salah satu eksekutif di
perusahaan nasional, telah merekomendasikan PT Keanu Abimanyu Konstruksi setelah menyelesaikan pembangunan
rumahnya sendiri. Dia mengarahkan temannya untuk mempercayakan proyeknya kepada PT Keanu Abimanyu Konstruksi
berdasarkan pengalamannya yang memuaskan.</p>
      </div>
    </div>
    <div class="row">
      <?php foreach($tstmonibagus as $row): ?>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="../img/<?= htmlspecialchars($row['gambar']) ?>" alt="" class="img-fluid square-photo"> 
            <p class="m-0 text-center"> <?= htmlspecialchars($row['deskripsi']) ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function() {
    $('.detail').on('click', function() {
      var foto_proyek = $(this).data('foto_proyek');
      var nama_proyek = $(this).data('nama_proyek');
      var lokasi_proyek = $(this).data('lokasi_proyek');
      var deskripsi_proyek = $(this).data('deskripsi_proyek');
      var tanggal_proyek = $(this).data('tanggal_proyek');
      var status_proyek = $(this).data('status_proyek');

      $('#modal-foto-proyek').attr('src', '../img/' + foto_proyek);
      $('#modal-nama-proyek').text(nama_proyek);
      $('#modal-lokasi-proyek').text(lokasi_proyek);
      $('#modal-deskripsi-proyek').text(deskripsi_proyek);
      $('#modal-tanggal-proyek').text(tanggal_proyek);
      $('#modal-status-proyek').text(status_proyek);

      $('#projectModal').modal('show');
    });
  });
</script>

