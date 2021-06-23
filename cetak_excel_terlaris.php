<?php
include "config/connection.php";
include "library/controller.php";

 
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Penjualan Terbanyak.xls");
?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>cetak excel</title>
</head>
<body>
<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	</style>
  <table>
    <thead>
        <tr>
            <th>NO</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Jumlah Terjual</th>
          </tr>
    </thead>
    <tbody>
        <?php 
            
            $no = 0;
            $sql = "SELECT DISTINCT id_buku from penjualan ";
            $jalan = mysqli_query($con, $sql);
            
              
              // if ($jalan == "") {
              //     echo "<tr><td colspan='4'>No Record</td></tr>";
              
              // } else{

              // foreach($jalan as $r){
              //     $no++
              // $query=mysqli_fetch_assoc($jalan);
              while ($r = mysqli_fetch_assoc($jalan)){
              $query = "SELECT * ,sum(jumlah_beli) AS jumlah_beli from penjualan INNER JOIN buku using(id_buku) WHERE id_buku = '$r[id_buku]' ";
              $data = mysqli_fetch_assoc(mysqli_query($con,$query));
              // $total_jual = mysqli_fetch_array(mysqli_query($con,"SELECT sum(jumlah_beli) AS jumlah_beli FROM penjualan WHERE id_buku = '$r[id_buku]' "));
              $no++;
          ?>
          <tr>
              <td><?=  $no ?></td>
              <td><?=  $data['id_buku'] ?></td>
              <td><?=  $data['judul'] ?></td>
              <td><?=  $data['jumlah_beli'] ?></td>
          </tr>
          <?php } ?>
    </tbody>
    <tfoo>
    <tr>
            <th>NO</th>
            <th>Id Buku</th>
            <th>Judul Buku</th>
            <th>Jumlah Terjual</th>
          </tr>
      </tr>
    </tfoot>

  </table>
</body>
</html>