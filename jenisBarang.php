<?php 

require_once 'koneksi.php';

// Get language from Database
$query  = "SELECT * FROM jenisbarang ORDER BY namaJenis";
$sql    = $connect->query($query);

$data   = [];
while ($row = $sql->fetch_assoc()){
    array_push($data, $row);
}

header("Content-Type: application/json");
echo json_encode($data);

?>