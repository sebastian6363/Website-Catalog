<?php 

require_once 'koneksi.php';
 $record_per_page = 8;  
 $page = '';  
 $output = '';    
 if(isset($_POST["page"]))  {  
    $page = $_POST["page"];   
 } 
 else  
 {  
    $page = 1;
 }    
 $start_from = ($page - 1)*$record_per_page; 
 $query = "SELECT * FROM product ORDER BY idBarang DESC LIMIT $start_from, $record_per_page";
 $result = mysqli_query($connect, $query);  
 while($row = mysqli_fetch_array($result)) { 
    if (file_exists("assets/img/products/{$row['gambar']}")) {
        $row['gambar'] = "assets/img/products/{$row['gambar']}";
    } else {
        $row['gambar'] = "image.jpg";
    } 
      $output .= '
      <div class="prods">
          <img src=' . $row["gambar"] . ' alt="NoImage">
          <div class="prods-description">
              <div class="prods-name">
                  <h3>' . $row["nama"] . '</h3>
              </div>
              <div class="prods-info">
                  <p>Size: <span>' . $row["size"] . '</span></p>
              </div>            
          </div>
          <div class="action-button">
              <a href="form-edit.php?id=' . $row["idBarang"] . '"><i class="bi bi-pencil-square"></i></a>
              <a href="#" id="' . $row["idBarang"] . '" onclick="hapus(' . $row["idBarang"] . ')"><i class="bi bi-trash3-fill"></i></a> 
          </div>  
      </div>
      '
      ;


 }  
 $output .= '<div class="pagination" align="center">';  
 $page_query = "SELECT * FROM product ORDER BY idBarang DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
 $output .= '</div>';  
 echo $output;  
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