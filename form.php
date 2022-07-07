<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Add Data</title>
    
    <link rel="stylesheet" href="assets/dist/css/style.css">
</head>
<body>
    <section class="content">
        <div class="form-content">
            <div class="form-title">
                <h1>Add data product</h1>
                <p>Silahkan add data produk anda dengan benar!</p>
            </div>
            <form class="form" id="formAdd" enctype="multipart/form-data">
                <div class="form-element">
                    <label for="nama" class="form-label">Nama Product</label>
                    <input type="text" name="nama" id="nama" class="form-control" required autocomplete="off" placeholder="Masukkan nama product. . .">
                </div>
                <div class="form-element">
                    <label for="merk" class="form-label">Merk Product</label>
                    <input type="text" name="merk" id="merk" class="form-control" required autocomplete="off" placeholder="Masukkan merk product. . .">
                </div>
                <div class="form-element">
                    <label for="idJenisBarang" class="form-label">Jenis Product</label>
                    <select name="idJenisBarang" id="idJenisBarang" class="form-select" required>
                        <option value="" disabled selected>Pilih jenis</option>
                    </select>
                </div>
                <div class="form-element">
                    <label for="size" class="form-label">Size Product</label>
                    <input type="text" name="size" id="size" class="form-control" required autocomplete="off" placeholder="Masukkan size product. . .">
                </div>
                <div class="form-element">
                    <label for="gambar" class="form-label">Gambar Product</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                </div>
                <div class="buttons">
                    <button type="submit" class="btn-submit">Submit</button>
                    <a href="menuProduct.php"><button type="button" class="btn-submit">Decline</button></a>
                </div>
            </form>
        </div>
    </section>

    <script src="assets/dist/js/jquery-3.6.0.min.js" ></script>

    <script>
        $(document).ready(function(){
            $.get("jenisBarang.php", function (response) {
                $.each(response, function (key, value){
                    $("#idJenisBarang").append("<option value='" + value.idJenisBarang + "'>" + value.namaJenis + "</option>");
                });
            });
            $("#formAdd").submit(function (event) {
            event.preventDefault();
            $.ajax({
                    url: 'service.php?action=save',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log("Data berhasil disimpan");
                        alert("Simpan data berhasil") 
                        window.location = "menuProduct.php";
                    }
                });
            });
        });
    </script>
    
</body>
</html>
