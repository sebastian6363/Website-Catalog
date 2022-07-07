<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAB N CO | Home</title>

    <!-- Style Web -->
    <link rel="stylesheet" href="assets/dist/css/style.css">

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
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="menuProduct.php">Product</a></li>
            <li><a href="tentangKami.php">Tentang Kami</a></li>
        </ul>
        <div class="btn">
            <button class="button button-reg">Registrasi</button>
            <button class="button button-masuk">Masuk</button>
        </div>
    </nav>

    <section class="content">
        <img class="banner" src="assets/img/design/SAB N CO.png" alt="">
    </section>

    <section class="content product">
        <div class="title-product">
            <h1>Our Product</h1>
            <p>Find your own styles on our store!</p>
        </div>
        <div class="content-product" id="data">
        </div>
        <a href="menuProduct.php"><button class="button-selengkapnya">Selengkapnya</button></a>
    </section>

    <script src="assets/dist/js/jquery-3.6.0.min.js" ></script>

    <script>
        $(document).ready(function() {
            loadData();
        });
        function loadData(){
            $.get('home.php', function(response){
                $('#data').html(response);
            });
        }
    </script>
</body>
</html>