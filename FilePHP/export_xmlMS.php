<?php
    include "koneksiMS.php";
    header('Content-Type: text/xml');
        $query = "SELECT jadwal.kode_penerbangan AS id, penerbangan.dari AS dari, penerbangan.ke AS ke, jadwal.berangkat AS depart, jadwal.tiba AS arrive, jadwal.harga AS price FROM jadwal INNER JOIN penerbangan ON jadwal.kode_penerbangan=penerbangan.kode_penerbangan";
        $hasil = mysqli_query($con, $query);
        $jumField = mysqli_num_fields($hasil);
    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<info>";
    while ($data = mysqli_fetch_array($hasil))
    {
        echo "<flight>";
        for ($i=0; $i<=$jumField-1; $i++)
        {
            $namaField = mysqli_fetch_field_direct($hasil, $i)->name;
        echo "<".$namaField.">".$data[$namaField]."</".$namaField.">";
        }
    echo "</flight>";
    }
echo "</info>";
?>