<?php
// Mysqli info databse
$db = "upj";
$host = "localhost";
$db_user = "root";
$db_password = "";

// koneksi ke database
$link = mysqli_connect($host, $db_user, $db_password, $db);

$json["error"] = false;
$json["errmsg"] = "";
$json["data"] = [];

$sql = "SELECT * FROM tb_mahasiswa ORDER BY nim ASC";
$res = mysqli_query($link, $sql);
$numrows = mysqli_num_rows($res);
if ($numrows > 0) {
    //cek jika ada data apapun
    $namelist = [];

    while ($array = mysqli_fetch_assoc($res)) {
        array_push($json["data"], $array);
        // menampilkan data json
    }
} else {
    $json["error"] = true;
    $json["errmsg"] = "Tidak ada data";
}
mysqli_close($link);
header('Content-Type:application/json');

echo json_encode($json);
