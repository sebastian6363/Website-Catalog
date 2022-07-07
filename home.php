<?php 

require_once 'koneksi.php';

$query = mysqli_query($connect, "SELECT * FROM product ORDER BY nama LIMIT 0, 3");
while ($row = mysqli_fetch_array($query)) {
?>

<div class="prods">
    <img src="assets/img/products/<?php echo $row['gambar']; ?>" alt="NoImage">
    <div class="prods-description">
        <div class="prods-name">
            <h3><?php echo $row['nama']; ?></h3>
        </div>
        <div class="prods-info">
            <p>Size: <span><?php echo $row['size']; ?></span></p>
        </div>
    </div>
</div>

<?php } ?>