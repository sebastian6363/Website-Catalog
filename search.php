<?php

require_once("./koneksi.php");

$ngetik = $_GET["ngetik"];

$sql = "SELECT * FROM product
            WHERE 
        nama LIKE '%{$ngetik}%' 

";

$result = $connect->query($sql); 
while ($row = $result->fetch_assoc()){ 
  if (file_exists("assets/img/products/{$row['gambar']}")) {
    $row['gambar'] = "assets/img/products/{$row['gambar']}";
} else {
    $row['gambar'] = "image.jpg";
} 
  echo "
  <div class='prods'>
    <img src='{$row['gambar']}' alt='NoImage'>
    <div class='prods-description'>
        <div class='prods-name'>
            <h3>{$row['nama']}</h3>
        </div>
        <div class='prods-info'>
            <p>Size: <span>{$row['size']}</span></p>
        </div>
        <div class='action-button'>
            <a href='form-edit.php?id={$row['idBarang']}'><i class='bi bi-pencil-square'></i></a>
            <a href='#' id='{$row['idBarang']}' onclick='hapus({$row['idBarang']})'><i class='bi bi-trash3-fill'></i></a> 
        </div> 
    </div>
</div>
  ";
}

?>

<script>
          function hapus(idBarang) {
        if (confirm("Apakah anda yakin?")) {
            $.ajax({
                url: "service.php?action=delete",
                method: "POST",
                data: {
                    idBarang: idBarang
                },
                success: function(data) {
                    console.log("Data berhasil dihapus")
                    load();
                    function load(page) {
                      $.post('pagination.php', {page:page}, function(data) {
                          $('#data').html(data);
                      });
                  }
                }
            });
        }
    }  
</script>
