<?php
    include "koneksiRS.php";

    header('Content-Type: text/xml');

        $query = "SELECT id_penerbangan AS id, dari, ke, jam_berangkat AS depart, jam_tiba AS arrive, harga AS price FROM tabel_penerbangan";
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