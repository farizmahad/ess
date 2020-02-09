<?php
ini_set("pcre.backtrack_limit", "100000000");
ini_set('max_execution_time', 2000);
set_time_limit(2000);

error_reporting(0);

?>
<!--<style type="text/css">
	h1{
  font-family: sans-serif;
}
 
table {
  font-family: Times New Roman, Times, sans-serif;
  font-size: 1em;
  color: #666;
  text-shadow: 0px 0px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
}
 
table th {
  padding: 15px 35px;
  border-left:0px solid #e0e0e0;
  border-bottom: 0px solid #e0e0e0;
  background: #ededed;
}
 
table th:first-child{  
  border-left:none;  
}
 
table tr {
  text-align: center;
  padding-left: 10px;
}
 
table td:first-child {
  text-align: left;
  padding-left: 10px;
  border-left: 0;
}
 
table td {
  padding: 5px 35px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}
 
table tr:last-child td {
  border-bottom: 0;
}
 
table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
 
table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
 
table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}
</style>
-->


<html>
<head>
	<style>
		.table-custom {
			font-size : 14px;
			border-collapse : collapse;
			width : 100%;
		}
	</style>
</head>
<body>
	<h1 align="center">DAFTAR SO</h1>
	<!--
	<table class = "table-custom" border="1">
		
			<tr>
				<td width="50%" style="text-align: center;"><strong>Lokasi</strong></td>
				<td width="50%" style="text-align: center;">
					<?php if($lokasi){
                             echo $lokasi;
					}
					?>
				</td>
			</tr>
			<tr>
				<td width="50%" style="text-align: center;"><strong>Tanggal</strong></td>
				<td width="50%" style="text-align: center;">
					<?php if($tanggal){
						echo date('d F Y', strtotime($tanggal));
					} ?>
				</td>
			</tr>
			<tr>
				<td width="50%" style="text-align: center;"><strong>Pelaksana</strong></td>
				<td width="50%" style="text-align: center;">
					<?php if($pelaksana){
                        echo $pelaksana;
					}
					?>
				</td>
			</tr>
			<tr>
				<td width="50%" style="text-align: center;"><strong>No. Handphone</strong></td>
				<td width="50%" style="text-align: center;">
					<?php if($no_handphone){
                       echo $no_handphone;
					}
					?>
				</td>
			</tr>
		
	</table>
-->
	<hr>
   
<form method="GET" action="<?php echo base_url(); ?>Export/export_excel_post">
     <select name="outlet">
     	<option value="m_barang_jakarta">Bursa Sajadah Jakarta</option>
     	<option value="m_barang_ho">Head Office</option>
     	<option value="m_barang_bekasi">Bursa Sajadah Bekasi</option>
     	<option value="m_barang_bogor">Bursa Sajadah Bogor</option>
     	<option value="m_barang_bsd">Bursa Sajadah BSD</option>
     	<option value="m_barang_cibubur">Bursa Sajadah Cibubur</option>
     	<option value="m_barang_citarum">Bursa Sajadah Citarum</option>
     	<option value="m_barang_inhoftank">Bursa Sajadah Inhoftank</option>
     	<option value="m_barang_malang">Bursa Sajadah Malang</option>
     	<option value="m_barang_mtc">Bursa Sajadah MTC</option>
     	<option value="m_barang_pdp">Bursa Sajadah Pondok Pinang</option>
     	<option value="m_barang_serang">Bursa Sajadah Serang</option>
     	<option value="m_barang_surabaya">Bursa Sajadah Surabaya</option>
     	<option value="m_barang_uber">Bursa Sajadah Ujung Berung</option>
     </select>
    <button type="submit">Cetak Excel</button>
</form>
    <br>
	<table class = "table-custom" border="1">
		<!--
		<tr>
			<td colspan="7"><strong>Dept. </strong><strong> <?php echo $row->dept; ?></strong></td>
		</tr>
	-->
		<tr>
			<td style="text-align: center;"><strong>No</strong></td>
			<td style="text-align: center;"><strong>Item</strong></td>
			<td><strong>SKU</strong></td>
			<td style="text-align: center;"><strong>Stock Moka</strong></td>
			<td style="text-align: center;"><strong>Stock Gudang</strong></td>
			<td style="text-align: center;"><strong>Stock Area</strong></td>
			<td style="text-align: center;"><strong>Stock Lain</strong></td>

			<td style="text-align: center;"><strong>Stock Real</strong></td>
			<td><strong>Selisih</strong></td>
			<td width="10%"><strong>Catatan</strong></td>
			<td width="10%"><strong>Status</strong></td>
		</tr>
            <?php
             $count_stok_moka=0;
             $count_stok_real=0;
             $count_selisih=0;
             $no=1;
             foreach($barang as $dow):
             	
            ?>

		<tr>
			<td align="center">
				<?php echo $no++; ?>
			</td>
			<td>
              <?php echo $dow->name; ?>
			</td>
			
			<td>
              <?php echo $dow->sku; ?>
			</td>

			<td align="center">
			<?php $count_stok_moka += $dow->stok_moka;?>
              <?php echo $dow->stok_moka; ?>
			</td>
			<td align="center">
				<?php if($dow->stok_gudang) { ?>
				<?php  echo $dow->stok_gudang; ?>
			<?php } ?>
			</td>
			<td align="center">
				<?php if($dow->stok_area) { ?>
				<?php  echo $dow->stok_area; ?>
			<?php } ?>
			</td>
			<td align="center">
				<?php if($dow->stok_area) { ?>
				<?php  echo $dow->stok_lain; ?>
			<?php } ?>
			</td>
			<td align="center">
			  <?php $count_stok_real +=$dow->stok_real; ?>
              <?php echo $dow->stok_real; ?>
			</td>
			<td align="center">
			  <?php 
                 $selisih=$dow->stok_moka-$dow->stok_real;

                 $count_selisih +=$selisih;
			  ?>
              <?php echo $selisih; ?>
			</td>
			<td>
				<?php echo $dow->catatan; ?>
			</td>
			<td>
				 
				<?php if($dow->status_so=="0" || $dow->status_so==0){ ?>
                     Belum SO
				<?php }else{ ?>
                      Sudah SO
				<?php } ?>
			
				
			</td>
			
		

		</tr>
	
		
		<?php endforeach; ?>
		<tr>
			<td colspan="3" align="center"><strong>Subtotal</strong></td>
			<td align="center">
				<strong><?php echo $count_stok_moka; ?></strong>
			</td>
			<td align="center">
				<strong><?php echo $count_stok_real; ?></strong>
			</td>
			<td align="center">
				<strong><?php echo $count_selisih; ?></strong>
			</td>
			<td></td>
			<td></td>
			
			

		</tr>
	
	</table>
	<br>

	<!--
	<table class = "table-custom">
			
			<tr>
				<td colspan="6"> <strong> Tanggal : </strong></td>
			</tr>
			<tr>
				<td colspan = "2" width="50%" style="text-align: center;"><strong>Pelaksana,</strong></td>
				<td colspan = "2" width="50%" style="text-align: center;"><strong>Kepala Cabang,</strong></td>
				<td colspan = "2" width="50%" style="text-align: center;"><strong>Final Approval,</strong></td>
			</tr>
			<tr>
				<td colspan = "2"  height="70px" style="text-align: center;"><strong></strong></td>
				<td colspan = "2"  height="70px" style="text-align: center;"><strong></strong></td>
				<td colspan = "2"  height="70px" style="text-align: center;"><strong></strong></td>
			</tr>
			
			<tr>
				<td colspan = "2" width="50%" style="text-align: center;"><strong>(.............)</strong></td>
				<td colspan = "2" width="50%" style="text-align: center;"><strong>(.............)</strong></td>
				<td colspan = "2" width="50%" style="text-align: center;"><strong>(.............)</strong></td>
			</tr>
	</table>
-->
</body>
</html>