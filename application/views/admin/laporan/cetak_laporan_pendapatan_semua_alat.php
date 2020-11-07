<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Pendapatan Semua Alat</title>
	<style type="text/css">
	table {
		border-collapse: collapse;
	}
	table thead tr th,
	table tbody tr td {
    font-size: 12px;
		padding: 5px;
	}
	</style>
</head>
<body>
<?php 
  $bulan = array("Januari","Februari","Maret","April","Mei","Juni",
            "Juli","Agustus","September","Oktober","November","Desember");
   $total_bln1=0;$total_bln2=0;$total_bln3=0;$total_bln4=0;$total_bln5=0;$total_bln6=0;$total_bln7=0;$total_bln8=0;$total_bln9=0;$total_bln10=0;$total_bln11=0;$total_bln12=0;
   if(!$data_list==null){
      foreach ($data_list as $dt) {
        $total_bln1+=$dt->bln1;
        $total_bln2+=$dt->bln2;
        $total_bln3+=$dt->bln3;
        $total_bln4+=$dt->bln4;
        $total_bln5+=$dt->bln5;
        $total_bln6+=$dt->bln6;
        $total_bln7+=$dt->bln7;
        $total_bln8+=$dt->bln8;
        $total_bln9+=$dt->bln9;
        $total_bln10+=$dt->bln10;
        $total_bln11+=$dt->bln11;
        $total_bln12+=$dt->bln12;
      }
      
   }         

  ?>
	<h4 style="text-align: center;">LAPORAN PENDAPATAN SEMUA ALAT</h4>
  <h4 style="text-align: center;">TAHUN <?php echo $tahun;?></h4>
	<table border="1" style="width: 100%;">
    <thead>
      <tr>
        <th rowspan="2" style="background-color:#444;color:#fff;" width="30px">NO</th>
        <th rowspan="2" style="background-color:#444;color:#fff;">NAMA KENDARAAN</th>
        <th colspan="12" style="background-color:#444;color:#fff;">BULAN</th>
      </tr>
      <tr>
        <?php foreach($bulan as $bln) { ?>
          <th style="background-color:#444;color:#fff;text-align: center;" width="60px"><?php echo $bln; ?></th>
        <?php } ?>
      </tr>
    </thead>
     <tbody>
      <?php foreach($data_list as $dt){ ?>
      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $dt->nm_kendaraan.' '.$dt->jns_kendaraan;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln1;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln2;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln3;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln4;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln5;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln6;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln7;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln8;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln9;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln10;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln11;?></td>
        <td style="text-align:right">Rp <?php echo $dt->bln12?></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="2" style="text-align: center;"> Jumlah</td>
        <td style="text-align:right">Rp <?php echo $total_bln1?></td>
        <td style="text-align:right">Rp <?php echo $total_bln2?></td>
        <td style="text-align:right">Rp <?php echo $total_bln3?></td>
        <td style="text-align:right">Rp <?php echo $total_bln4?></td>
        <td style="text-align:right">Rp <?php echo $total_bln5?></td>
        <td style="text-align:right">Rp <?php echo $total_bln6?></td>
        <td style="text-align:right">Rp <?php echo $total_bln7?></td>
        <td style="text-align:right">Rp <?php echo $total_bln8?></td>
        <td style="text-align:right">Rp <?php echo $total_bln9?></td>
        <td style="text-align:right">Rp <?php echo $total_bln10?></td>
        <td style="text-align:right">Rp <?php echo $total_bln11?></td>
        <td style="text-align:right">Rp <?php echo $total_bln12?></td>
      </tr>
    </tbody>
  </table>
  
</body>
</html>