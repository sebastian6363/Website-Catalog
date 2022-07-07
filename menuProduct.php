<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAB N CO | Product</title>

    <!-- Style Web -->
    <link rel="stylesheet" href="assets/dist/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">  

</head>
<body>
    <nav class="menu">
        <div class="brand">
            <a href="index.php">
                <h4>SAB N CO</h4>
                <p>Fashion Designer Collection</p>
            </a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a class="active" href="menuProduct.php">Product</a></li>
            <li><a href="tentangKami.php">Tentang Kami</a></li>
        </ul>
        <div class="btn">
            <button class="button button-reg">Registrasi</button>
            <button class="button button-masuk">Masuk</button>
        </div>
    </nav>

    <section class="content-info">
        <div class="info">
            <h1>Our Products are 100% Legal</h1>
            <p>if u want to buy our product, please sign in first. <br> *masih dalam pengembangan</p>
        </div>
    </section>

    <section class="content product">
        <div class="title-product pencarian">
            <input type="search" name="namaProduk" id="namaProduk" placeholder="Search your product here!" class="form-control">
            <select name="sortProduct" id="sortProduct" class="form-select">
                <option value="ORDER BY idBarang ASC" selected>Sort by / Filter by</option>
                <option value="ORDER BY nama ASC" >A - Z</option>
                <option value="ORDER BY nama DESC">Z - A</option>
                <option value="" disabled></option>
                <option value="" disabled>Filter by</option>
            </select>
            <a href="form.php" class="btn-tambah">Tambah data</a>
        </div>

        <div class="content-product" id="data">
        </div>
    </section> 

    <script src="assets/dist/js/jquery-3.6.0.min.js" ></script>
    <script src="sort-search.js"></script>

    <script>

    $(document).ready(function () {
        $.get("jenisBarang.php", function (response) {
            $.each(response, function (key, value){
                $("#sortProduct").append("<option value='WHERE idJenisBarang = " + value.idJenisBarang + "'>" + value.namaJenis + "</option>");
            });
        });
        load();
        function load(page) {
            $.post('pagination.php', {page:page}, function(data) {
                $('#data').html(data);
            });
        }
        $(document).on('click', '.pagination_link', function(){
            var page = $(this).attr('id');
            load(page);
        });      
    });

    </script>
</body>
</html>