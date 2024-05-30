<?php
include_once "header.php";
require_once "../admins/classProduk.php";

$bntng = new Produk\Burger;
$produk = $bntng->readProduk();

$testimoni = new Produk\Burger;
$tstmonibagus = $testimoni->readTestimoniUser();
?>
<div class="row">
    <div class="col-12 p-5">              
        <div class="row">
            <?php foreach($produk as $row): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="../img/<?= htmlspecialchars($row['foto_proyek']) ?>" alt="" class="img-fluid"> 
                        <h5 class="m-0 text-center mt-2"> <?= htmlspecialchars($row['nama_proyek']) ?></h5>
                        <p class="m-0 text-center"> <?= htmlspecialchars($row['lokasi_proyek']) ?></p>
                        <p class="m-0 text-center"> <?= htmlspecialchars($row['deskripsi_proyek']) ?></p>
                        <p class="m-0 text-center"> <?= htmlspecialchars($row['tanggal_proyek']) ?></p>
                        <p class="m-0 text-center"> <?= htmlspecialchars($row['status_proyek']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Burger Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="modal-foto_proyek" class="img-fluid" alt="Project Photo">
                <h3 class="text-center mt-2" id="modal-nama_proyek"></h3>
                <div class="text-center mt-2">Lokasi: <span id="modal-lokasi_proyek"></span></div>
                <div class="text-center mt-2"><em id="modal-deskripsi_proyek"></em></div>
                <div class="text-center mt-2">Tanggal: <span id="modal-tanggal_proyek"></span></div>
                <div class="text-center mt-2">Status: <span id="modal-status_proyek"></span></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

   <div class="container">
      <div class="row">
        <div class="col-12 p-3 bg-white">
          <h3>Testimoni</h3>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center">Number</th>
                    <th class="text-center">Testimoni</th>
                  </tr>
            </thead>
            <tbody>
              <?php $i=1?>
              <?php foreach($tstmonibagus as $row):?>
                <tr>
                  <td><?=$i++ ?></td>
                  <td ><?=$row['deskripsi']?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
        </table>
        <div>
          
          </div>
    </div>
  </div>
</div>

    <form action="handle_feedback.php" method="post">
        <label for="feedback_input">Feedback:</label>
        <input type="text" id="feedback_input" name="deskripsi">
        <input type="submit" value="Submit">
    </form>


<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.detail').click(function() {
        $('#modal-foto_proyek').attr('src', '../img/' + $(this).data('foto_proyek'));
        $('#modal-nama_proyek').html($(this).data('nama_proyek'));
        $('#modal-lokasi_proyek').html($(this).data('lokasi_proyek'));
        $('#modal-deskripsi_proyek').html('<em>' + $(this).data('deskripsi_proyek') + '</em>');
        $('#modal-tanggal_proyek').html($(this).data('tanggal_proyek'));
        $('#modal-status_proyek').html($(this).data('status_proyek'));
        $('#modalDetail').modal('show');
    });
  });
</script>
