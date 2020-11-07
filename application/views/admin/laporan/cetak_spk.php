<!DOCTYPE html>
<html>
<head>
	<title>Surat Perintah Tugas</title>
	<style type="text/css">
  body{
    font-family: "Times New Roman", Times, serif;
    max-width: 100%;
  }
  p{
    font-size: 14px;
  }
	.text-center{
    text-align:center;
  }
  h4,h5{
    margin-bottom:5px;
    margin-top:5px;
  }
  #header hr{
    background-color:#000;
  }

  #perihal{
    margin:auto;
    margin-top:35px;
    width:50%;
  }
  #perihal .nomor{
    margin-left:170px;
  }
  #perihal p{
    margin-top:3px;
    margin-bottom:3px;
  }
  #isi{
    margin-top:35px;
    width:100%;
  }
  #isi .paragraf{
    text-indent: 50px;
  }
  
  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }

  table {
    border-collapse: collapse;
    border : none;
  }
  table thead tr th,
  table tbody tr td {
    font-size: 12px;
    padding: 0px;
  }
  td p{
  	margin-top: 0px;
  	margin-bottom: 0px;
  }
  .text-justify{
    text-align: justify;
  }
	</style>
</head>
<body>
  <?php 
  	date_default_timezone_set('Asia/Jakarta');
    //Array Hari
    $array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
    $hari = $array_hari[date('N')];

    //Format Tanggal
    $tanggal = date ('j');

    //Array Bulan
    $array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
    $bulan = $array_bulan[date('n')];

    //Format Tahun
    $tahun = date('Y');

    $date   = explode('-', $data_list->tgl_awal_sewa);
    $thn    = $date[0];
    $bln  = $date[1];
    $hari   = $date[2];
    $tgl_awal = $hari.' - '.$bln.' - '.$thn;

    $date1   = explode('-', $data_list->tgl_akhir_sewa);
    $thn1    = $date1[0];
    $bln1  = $date1[1];
    $hari1   = $date1[2];
    $tgl_akhir = $hari1.' - '.$bln1.' - '.$thn1;

    $image_tegal = "data:image/png;base64,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";
  ?>
  <div id="header">
    <table style="width:100%;">
      <tr>
        <td valign="top" style="width:20%;text-align:right;">
          <img alt="Logo Pemkot Tegal" style="width:100px;height:100px;" src="<?php echo $image_tegal;?>">
        </td>
        <td valign="top" style="width:80%;">
          <h3 class="text-center">PEMERINTAH KOTA TEGAL</h3>
          <h3 class="text-center">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</h3>
          <h4 class="text-center">Jl. Proklamasi Nomor 11 Tegal</h4>
          <h4 class="text-center">Telp./Fax. (0283) 356353 Tegal - 52111</h4>
        </td>
      </tr>
    </table>
    
    <hr size="4" />
  </div>

  <div id="perihal">
    <p class="text-center"><u>SURAT PERINTAH TUGAS</u></p>
    <p class="nomor">Nomor:</p>
  </div>

  <div id="isi">
    <table style="width:100%;">
    	<tr>
    		<td style="text-align:left;width:10%;">
    			<p>Dasar</p>
    		</td>
    		<td style="text-align:center;width:5%;">
    			<p> : </p>
    		</td>
    		<td style="text-align:left;width:85%;">
    			<p>Kontrak Sewa Alat Berat Milik Pemerintah Kota Tegal</p>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:left;width:10%;">
    		<td style="text-align:left;width:5%;"></td>
    		<td style="text-align:left;width:85%;">
    			<p>Nomor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/SP-AL/VII/<?php echo $tahun;?></p>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:left;width:10%;"></td>
    		<td style="text-align:left;width:5%;"></td>
    		<td style="text-align:left;width:85%;">
    			<p>Tanggal : <?php echo $tanggal.' '.$bulan.' '.$tahun;?></p>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:left;width:10%;"></td>
    		<td style="text-align:left;width:5%;"></td>
    		<td style="text-align:left;width:85%;">
    			<p>Maka Kepala Dinas Pekerjaan Umum dan Penataan Ruang Kota Tegal : </p>
    		</td>
    	</tr>
    </table>
    <h4 style="margin-top:10px;" class="text-center">MEMERINTAHKAN</h4>
    <table style="width:100%;">
	    <tr>
	    	<td style="text-align:left;width:10%;">Kepada </td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:10%;">Nama</td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:70%;">
				<p><?php echo $data_list->operator;?></p>
			</td>
		</tr>
		<tr>
	    	<td style="text-align:left;width:10%;"></td>
			<td style="text-align:left;width:5%;"></td>
			<td style="text-align:left;width:10%;">NIP</td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:70%;">
				<p> - </p>
			</td>
		</tr>
		<tr>
	    	<td style="text-align:left;width:10%;"></td>
			<td style="text-align:left;width:5%;"></td>
			<td style="text-align:left;width:10%;">Jabatan</td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:70%;">
				<p>Staf Dinas Pekerjaan Umum dan Penataan Ruang</p>
			</td>
		</tr>
    </table>
    <table style="width:100%;">
    	<tr>
			<td style="text-align:left;width:10%;">Untuk</td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:85%;">
				<p class="text-justify">Melaksanakan operasional alat berat berupa <?php echo $data_list->nm_kendaraan.' '.$data_list->jns_kendaraan;?> tanggal <?php echo $tgl_awal;?> s/d  <?php echo $tgl_akhir;?>.</p>
			</td>
    	</tr>
    </table>
    <table style="width:100%;">
    	<tr>
			<td style="text-align:left;width:10%;"></td>
			<td style="text-align:left;width:5%;"></td>
			<td style="text-align:left;width:10%;">Pada</td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:70%;">
				<p><?php echo $data_list->nm_penyewa;?></p>
			</td>
    	</tr>
    	<tr>
			<td style="text-align:left;width:10%;"></td>
			<td style="text-align:left;width:5%;"></td>
			<td style="text-align:left;width:10%;">Pekerjaan</td>
			<td style="text-align:left;width:5%;"> : </td>
			<td style="text-align:left;width:70%;">
				<p><?php echo $data_list->jns_pekerjaan;?></p>
			</td>
    	</tr>
    	<tr>
			<td style="text-align:left;width:10%;"></td>
			<td style="text-align:left;width:5%;"></td>
			<td valign="top" style="text-align:left;width:10%;">Keterangan</td>
			<td valign="top" style="text-align:left;width:5%;"> : </td>
			<td class="text-justify" valign="top" style="text-align:left;width:70%;">
				<p>a.	Melaksanakan operasional alat berat dan perlengkapannya.<br />
					b.	Melakukan pemeliharaan alat berat.<br />
					c.	Melakukan perhitungan hari pelaksanaan sewa serta melakukan pengecekan mesin dan penarikan secara sepihak bila masa sewa telah selesai atau pemakaian alat tidak sesuai kontrak.</p>
			</td>
    	</tr>
    </table>
  </div>
  <br />

  <div class="penutup">
    <table style="width:100%;">
    	<tr>
    		<td style="width:50%"></td>
    		<td style="width:50%">
    			<p>Dikeluarkan di : Tegal</p>
    			<p><u>Pada Tanggal : <?php echo $tanggal.' '.$bulan.' '.$tahun;?></u></p>
    		</td>
    	</tr>
    	<tr>
    		<td style="width:50%"></td>
    		<td style="width:50%">
    		<br />
    			<p class="text-center" style="margin-bottom:130px;">a.n. KEPALA DINAS PEKERJAAN UMUM<br />
    			KOTA TEGAL<br />
				SEKRETARIS<br />
				u.b.<br />
				Kepala Sub Bagian Umum dan Kepegawaian
				</p>

				<p class="text-center"><u>EVA PAULINA BR N, ST. MM</u><br />
				Penata<br />
				NIP. 19810924 200604 2 011
				</p>
    		</td>
    	</tr>
    </table>
  </div>
  
</body>
</html>