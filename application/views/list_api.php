 <h3 align="center">LIST API STOCK OPNAME</h3>
 <table border="1" width="100%" style="border-collapse: collapse;">
 	
 	<tr>
 	<td style="text-align: center;"><strong>No</strong></td>
        <td style="text-align: center;"><strong>Data</strong></td>
 	<td style="text-align: center;"><strong>Method</strong></td>
 	<td style="text-align: center;"><strong>URL</strong></td>
 	<td style="text-align: center;"><strong>Parameter</strong></td>
 	<td style="text-align: center;"><strong>Catatan</strong></td>
    </tr>
    <tr>
    	<td style="text-align: center;">1</td>
        <td>Kontak</td>
    	<td style="text-align: center;">GET</td>
    	<td>http://portal.aartijaya.com/Api/kontak</td>
    	<td>
    		<ul>
    			<li>
    				id
    			</li>
                <li>
                    outlet
                </li>
    		</ul>
    	</td>
        <td>
            
        </td>

    </tr>

    <tr>
        <td style="text-align: center;">2</td>
        <td>Data Barang</td>
        <td style="text-align: center;">GET</td>
        <td>http://portal.aartijaya.com/Api/data_barang</td>
        <td>
            <ul>
                <li>
                    id_barang
                </li>
                <li>
                    status
                </li>
                <li>
                    dept
                </li>
                <li>
                    outlet
                </li>
            </ul>
        </td>
        <td>
            
        </td>

    </tr>
    <tr>
        <td style="text-align: center;">3</td>
        <td>Cari Barang</td>
        <td style="text-align: center;">GET</td>
        <td>http://portal.aartijaya.com/Api/cari_barang</td>
        <td>
            <ul>
                <li>
                    keyword
                </li>
                <li>
                    status
                </li>
                <li>
                    dept
                </li>
                <li>
                    outlet
                </li>
            </ul>
        </td>
        <td>
            
        </td>

    </tr>

     <tr>
        <td style="text-align: center;">4</td>
        <td>Updata Data Barang</td>
        <td style="text-align: center;">GET</td>
        <td>http://portal.aartijaya.com/Api/update_data</td>
        <td>
            <ul>
                <li>
                    sku
                </li>
                <li>
                   stok_moka
                </li>
                <li>
                stok_real
                </li>
                <li>
                    outlet
                </li>
            </ul>
        </td>
        <td>
            
        </td>

    </tr>

    <tr>
        <td style="text-align: center;">5</td>
        <td>Index Post</td>
        <td style="text-align: center;">POST</td>
        <td>http://portal.aartijaya.com/Api/index</td>
        <td>
            <ul>
                <li>
                    sku
                </li>
                <li>
                   stok_moka
                </li>
                <li>
                stok_real
                </li>
                <li>
                    outlet
                </li>
            </ul>
        </td>
        <td>
            
        </td>

    </tr>

     <tr>
        <td style="text-align: center;">6</td>
        <td>Transaksi</td>
        <td style="text-align: center;">GET</td>
        <td>http://portal.aartijaya.com/Api/transaksi</td>
        <td>
            <ul>
                <li>
                    sku
                </li>
                <li>
                    oultet
                </li>
                
            </ul>
        </td>
        <td>
            
        </td>

    </tr>
 <tr>
        <td style="text-align: center;">7</td>
        <td>Transaksi</td>
        <td style="text-align: center;">POST</td>
        <td>http://portal.aartijaya.com/Api/transaksi2</td>
        <td>
            <ul>
                <li>
                    id
                </li>
                 <li>
                    nama
                </li>
                <li>
                    nomor
                </li>
                <li>
                    outlet
                </li>
                
                
            </ul>
        </td>
        <td>
            
        </td>

    </tr>

    <tr>
        <td style="text-align: center;">8</td>
        <td>Kirim Laporan</td>
        <td style="text-align: center;">POST</td>
        <td>http://portal.aartijaya.com/Api/aksi_kirim</td>
        <td>
            <ul>
                <li>
                    email
                </li>
                <li>
                    lokasi
                </li>
                <li>
                    pelaksana
                </li>
                <li>
                    no_handphone
                </li>
                <li>
                    outlet
                </li>
                <li>
                    dept
                </li>
                 
                
                
            </ul>
        </td>
        <td>
            
        </td>

    </tr>

      <tr>
        <td style="text-align: center;">9</td>
        <td>Unduh Laporan Excel</td>
        <td style="text-align: center;">POST</td>
        <td>http://portal.aartijaya.com/Api/export_excel</td>
        <td>
            <ul>
                
                <li>
                    outlet
                </li>
                 
                
                
            </ul>
        </td>
        <td>
            
        </td>

    </tr>





 </table>

