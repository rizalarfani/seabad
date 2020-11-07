<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Kinerja Operator</title>
	<style type="text/css">
    table {
      border-collapse: collapse;
    }
    table thead tr th,
    table tbody tr td {
      font-size: 12px;
      padding: 5px;
    }

    thead {
      display: inline-block;
    }

  
	</style>
</head>
<body>
<?php 
  $bulan = array("Januari","Februari","Maret","April","Mei","Juni",
            "Juli","Agustus","September","Oktober","November","Desember");
            ?>
	<h4 style="text-align: center;">LAPORAN KINERJA OPERATOR</h4>
  <h4 style="text-align: center;">TAHUN <?php echo $tahun;?></h4>
	<table border="1" style="width: 100%;">
    <thead>
      <tr>
        <th rowspan="2" style="background-color:#444;color:#fff;" width="30px">NO</th>
        <th rowspan="2" style="background-color:#444;color:#fff;">NAMA OPERATOR</th>
        <th colspan="12" style="background-color:#444;color:#fff;text-align: center;">BULAN</th>
      </tr>
      <tr>
        <?php foreach($bulan as $bln) { ?>
          <th style="background-color:#444;color:#fff;" width="50px"><?php echo $bln; ?></th>
        <?php } ?>
      </tr>
    </thead>
     <tbody>
      <?php foreach($data_list as $dt){ ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $dt->operator;?></td>
        <td style="text-align:right"><?php echo $dt->bln1;?></td>
        <td style="text-align:right"><?php echo $dt->bln2;?></td>
        <td style="text-align:right"><?php echo $dt->bln3;?></td>
        <td style="text-align:right"><?php echo $dt->bln4;?></td>
        <td style="text-align:right"><?php echo $dt->bln5;?></td>
        <td style="text-align:right"> <?php echo $dt->bln6;?></td>
        <td style="text-align:right"><?php echo $dt->bln7;?></td>
        <td style="text-align:right"><?php echo $dt->bln8;?></td>
        <td style="text-align:right"><?php echo $dt->bln9;?></td>
        <td style="text-align:right"><?php echo $dt->bln10;?></td>
        <td style="text-align:right"><?php echo $dt->bln11;?></td>
        <td style="text-align:right"> <?php echo $dt->bln12?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  
</body>
</html>