<?php
$koneksi = mysqli_connect("localhost", "root", "", "movie");

function hasil_query($kode)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $kode);
    $data = [];

    while ($res = mysqli_fetch_assoc($result)) {
        $data[] = $res;
    }
    return $data;
}
?>