<?php 

require_once 'koneksi.php';

switch ($_GET['action']){
    case 'save':

        $nama           = $_POST['nama'];
        $merk           = $_POST['merk'];
        $idJenisBarang  = $_POST['idJenisBarang'];
        $size           = $_POST['size'];
        $gambar         = $_POST["gambar"];

        $query  = mysqli_query($connect, "INSERT INTO product (idJenisBarang, nama, merk, size, gambar)
                VALUES('$idJenisBarang', '$nama', '$merk', '$size', 'NULL')");
        if ($query){
            echo "Simpan data berhasil";
        }else{
            echo "Simpan data gagal: " . mysqli_error($connect);
        }
    break;

    case 'edit':

        $id             = $_POST['idBarang'];
        $nama           = $_POST['nama'];
        $merk           = $_POST['merk'];
        $idJenisBarang  = $_POST['idJenisBarang'];
        $size           = $_POST['size'];
        $gambar         = $_POST["gambar"];

        $query  = mysqli_query($connect, "UPDATE product SET nama = '$nama', merk = '$merk', idJenisBarang = '$idJenisBarang', size = '$size'
                                            WHERE idBarang = '$id'");
        if ($query){
            echo "Ubah data berhasil";
        }else{
            echo "Ubah data gagal: " . mysqli_error($connect);
        }
    break;

    case 'delete':
        $id = $_POST["idBarang"];
        $query = "DELETE FROM product WHERE idBarang = $id";
        
        $berhasil = mysqli_query($connect, $query);
        if ($berhasil) {
            echo "Data berhasil dihapus";
        } else{
            echo "Hapus data gagal: " . mysqli_error($connect);
        }
    break;
}

?>