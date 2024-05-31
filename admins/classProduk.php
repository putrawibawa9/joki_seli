<?php
namespace Produk{
    use Connection\Connect;
    require_once "../construct.php";
    

class Burger extends Connect{
    
    public function readProduk(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM proyek";  
        $result = $conn->query($query);
        $burger = $result->fetchAll();
        return $burger;
        }
    public function readTestimoni(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM testimoni";  
        $result = $conn->query($query);
        $burger = $result->fetchAll();
        return $burger;
        }
    public function readTestimoniUser(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM testimoni";  
        $result = $conn->query($query);
        $burger = $result->fetchAll();
        return $burger;
        }

        function minStock( $id_produk ){
        $conn = $this->getConnection();
        $query    = "UPDATE produk SET stok_produk = stok_produk - 1 WHERE id_produk = '$id_produk'";
        $result = $conn->exec($query);
        return $result;
    }


    public function readTwoTable(){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk";
        $resultBin = $conn->query($queryBin);


        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetchAll();
            $dataBin = $resultBin->fetchAll();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
        }
    }
    public function readTwoTablepart2($id_proyek){
        $conn = $this->getConnection();
        $queryBin = "SELECT * FROM proyek WHERE id_proyek= $id_proyek";
        $resultBin = $conn->query($queryBin);
        if($resultBin){
            $dataBin = $resultBin->fetch();
            return $dataBin;
        }else{
            return false;
        }
    }

    public function readTwoTablepart3($id_kategori){
        $conn = $this->getConnection();
        $queryKat = "SELECT nama_kategori FROM kategori WHERE id_kategori = $id_kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE kategori.id_kategori = $id_kategori";
        $resultBin = $conn->query($queryBin);

        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetch();
            $dataBin = $resultBin->fetchall();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
    }
}

    public function addProduk($data){
        // var_dump($data);
        // exit;
        $conn = $this->getConnection();
        $nama_proyek = $data['nama_proyek'];
        $lokasi_proyek = $data['lokasi_proyek'];
        $deskripsi_proyek = $data['deskripsi_proyek'];
        $tanggal_proyek = $data['tanggal_proyek'];
        $status_proyek = $data['status_proyek'];
        $foto_proyek = $this->uploadGambar();
        if (!$foto_proyek) {
            return false;
        }

        $query = "INSERT INTO proyek (nama_proyek, lokasi_proyek, foto_proyek, deskripsi_proyek, tanggal_proyek, status_proyek) 
          VALUES (?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(1,$nama_proyek);
        $stmt->bindParam(2,$lokasi_proyek);
        $stmt->bindParam(3,$foto_proyek);
        $stmt->bindParam(4,$deskripsi_proyek);
        $stmt->bindParam(5,$tanggal_proyek);
        $stmt->bindParam(6,$status_proyek);
        $stmt->execute();
        return true;
    }


    public function tambahTestimoni($data){
        $conn = $this->getConnection();
        $deskripsi = $data['deskripsi'];
        $foto = $this->uploadGambar();
        if (!$foto) {
            return false;
        }

        $query = "INSERT INTO testimoni (deskripsi, gambar) 
          VALUES (?, ?)";
    
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$deskripsi);
        $stmt->bindParam(2,$foto);
        $stmt->execute();
        return true;
    }

        public function addTestimoni($data){
        $conn = $this->getConnection();
        $deskripsi = $data['deskripsi'];
        $query = "INSERT INTO testimoni (deskripsi) 
          VALUES (?)";
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(1,$deskripsi);
        $stmt->execute();
        return true;
    }

    public function editProduk($data){

        $conn = $this->getConnection();
        $nama_proyek = $data['nama_proyek'];
        $lokasi_proyek = $data['lokasi_proyek'];
        $id_proyek = $data['id_proyek'];
        $gambarLama = $data['gambarLama'];
        $deskripsi_proyek = $data['deskripsi_proyek'];
        $tanggal_proyek = $data['tanggal_proyek'];
        $status_proyek = $data['status_proyek'];

          //check whether user pick a new image or not
        if($_FILES['foto_proyek']['error']===4){
            $foto_proyek = $gambarLama;
        }else{
            $foto_proyek = $this->uploadGambar();
        }

        $query = "UPDATE proyek SET
        nama_proyek = ?,
        lokasi_proyek = ?,
        foto_proyek = ?,
        deskripsi_proyek = ?,
        tanggal_proyek = ?,
        status_proyek = ?
        WHERE id_proyek = ?
        ";
             $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$nama_proyek);
                $stmt->bindParam(2,$lokasi_proyek);
                $stmt->bindParam(3,$foto_proyek);
                $stmt->bindParam(4,$deskripsi_proyek);
                $stmt->bindParam(5,$tanggal_proyek);
                $stmt->bindParam(6,$status_proyek);
                $stmt->bindParam(7,$id_proyek);
                $stmt->execute();
                return true;
    }
    public function editTestimoni($data){

        $conn = $this->getConnection();
        $id_testimoni = $data['id_testimoni'];
        $deskripsi = $data['deskripsi'];
        $gambarLama = $data['gambarLama'];
          //check whether user pick a new image or not
        if($_FILES['foto']['error']===4){
            $foto = $gambarLama;
        }else{
            $foto = $this->uploadGambar();
        }

        $query = "UPDATE testimoni SET
        deskripsi = ?,
        gambar = ?
        WHERE id_testimoni = ?
        ";
             $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$deskripsi);
                $stmt->bindParam(2,$foto);
                $stmt->bindParam(3,$id_testimoni);
                $stmt->execute();
                return true;
    }

        public function viewEach($table, $field, $id_kategori){
        $conn = $this->getConnection();
        $query = "SELECT * FROM $table WHERE $field= $id_kategori";
        $result = $conn->query($query);
        $kategori = $result->fetch();
        return $kategori;
    }
    


    public function uploadGambar(){
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile =  $_FILES['foto']['size'];
        $error =  $_FILES['foto']['error'];  
        $tmp =  $_FILES['foto']['tmp_name'];  
      
        //cek apakah user sudah menambah gambar
      
        if($error ===4){
          echo "<script>
              alert ('Silahkan pilih gambar');
                </script>";
                return false;
        }
      
        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid =['jpg','jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile); 
        $ekstensiGambar = strtolower(end($ekstensiGambar)); 
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
          echo "<script>
              alert ('format gambar salah!');
                </script>";
                return false;
        }
      
        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000){
          echo "<script>
              alert ('Ukuran terlalu besar');
                </script>";
        }
      
        //generate nama file random
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
      
      
        //lolos semua hasil cek, lalu dijalankan
        move_uploaded_file($tmp, '../img/'.$namaFileBaru);
      
        return $namaFileBaru;
    }


    public function deleteProduk($id_proyek){
        $conn = $this->getConnection();
        $query = "DELETE FROM proyek WHERE id_proyek = $id_proyek";
        $result = $conn->exec($query);
        return $result;
}

    public function delete($id, $field, $table){
        $conn = $this->getConnection();
        $query = "DELETE FROM $table WHERE $field = $id";
        $result = $conn->exec($query);
        return $result;
}


    public function hapusTestimoni($id_testimoni){
        $conn = $this->getConnection();
        $query = "UPDATE testimoni
                        SET isDisplay = 0
                        WHERE id_testimoni = $id_testimoni;";
        $result = $conn->exec($query);
        return $result;
}

    public function viewEachCategory($id_kategori){
        $conn = $this->getConnection();
        $query = "SELECT * FROM kategori WHERE id_kategori= $id_kategori";
        $result = $conn->query($query);
        $kategori = $result->fetch();
        return $kategori;
    }

    public function editKategori($nama_kategori,$id_kategori){
        $conn = $this->getConnection();
        $query = "UPDATE kategori SET
        nama_kategori = ?
        WHERE id_kategori = ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$nama_kategori);
         $stmt->bindParam(2,$id_kategori);

          //check the progress
    if ($stmt->execute()) {
        echo "
            <script>
            alert('Data berhasil diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data gagal diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    }
    }

}
}
?>