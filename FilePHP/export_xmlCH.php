<?php
    include "koneksiCH.php";
    header('Content-Type: text/xml');
        $query = "SELECT flight.id_flight AS id, flight.dari AS dari, flight.ke AS ke, flight_time.depart AS depart, flight_time.arrive AS arrive, flight_time.price AS price FROM flight INNER JOIN flight_time ON flight.id_flight=flight_time.id_flight";
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