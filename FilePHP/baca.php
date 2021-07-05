<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maskapai</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initialscale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="jumbotron text-center">
    <h2><b>DAFTAR MASKAPAI</b></h2>
</div>

<div class="table-responsive col-sm-10 col-sm-offset-1">
<?php
    $maskapai = array("Maskapai RS", "Maskapai CH", "Maskapai MS");
    $file = array("maskapaiRS.xml", "maskapaiCH.xml", "maskapaiMS.xml");
        for ($i=0; $i < 3; $i++) { 
            if (file_exists($file[$i]))
        {
            
            $data = simplexml_load_file($file[$i]);
          
    ?>
<table class="table table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Depart</th>
                    <th>Arrive</th>
                    <th>Price</th>
                </tr>
            </thead>
        <tbody>

<?php
    echo"<center><h3><b>$maskapai[$i]</b></h3></center>";
foreach ($data->flight as $hasil)
{

    $id = $hasil->id;
    $from = $hasil->dari;
    $to = $hasil->ke;
    $depart = $hasil->depart;
    $arrive = $hasil->arrive;
    $price = $hasil->price;
?>

                <tr>
                    <td><?=$id?></td>
                    <td><?=$from?></td>
                    <td><?=$to?></td>
                    <td><?=$depart?></td>
                    <td><?=$arrive?></td>
                    <td><?=$price?></td>
                </tr>
                <?php
                }
            }
            else {
            echo "File ".$file[$i]." Tidak Ditemukan";
            }
        }
    ?>

        </tbody>
</div>
</html>