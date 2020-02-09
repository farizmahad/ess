<?php defined('BASEPATH') OR die('No direct script access allowed');

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          
         $this->load->model('Mpdf_model');
         $this->db2 = $this->load->database('database2', TRUE);
         /*
          $this->load->model('Usulan_model');
          */
          
     }

     /*
     public function export_proposal_reses()
     {
          $pilihan=$this->input->get('pilihan');
          $parameter=$this->input->get('parameter');
          $proposal=$this->Master_model->select_reses_belum_isi_bidang($pilihan,$parameter);
          $count_proposal =count($proposal);
           
          $pilihan_kapital=strtoupper($pilihan);
          $parameter_kapital=strtoupper($parameter);

          $spreadsheet = new Spreadsheet;
          $spreadsheet->getActiveSheet(0)->mergeCells('A1:N1');

          if($pilihan=="" && $parameter==""){
           $spreadsheet->getActiveSheet(0)->mergeCells('A2:N2')->setCellValue('A2', 'SEMUA DATA');
          }else{
            $spreadsheet->getActiveSheet(0)->mergeCells('A2:N2')->setCellValue('A2', 'DATA DENGAN FILTER '.$pilihan_kapital.' '.$parameter_kapital);
          }
          $spreadsheet->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('B')->setWidth(25);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('C')->setWidth(18);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('D')->setWidth(30);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('E')->setWidth(28);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('F')->setWidth(10);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('G')->setWidth(25);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('H')->setWidth(30);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('I')->setWidth(25);
           $spreadsheet->getActiveSheet(0)->getColumnDimension('J')->setWidth(25);
           $spreadsheet->getActiveSheet(0)->getColumnDimension('K')->setWidth(25);
            $spreadsheet->getActiveSheet(0)->getColumnDimension('L')->setWidth(25);
             $spreadsheet->getActiveSheet(0)->getColumnDimension('M')->setWidth(25);
                   $spreadsheet->getActiveSheet(0)->getColumnDimension('N')->setWidth(30);

          $spreadsheet->getActiveSheet(0)->mergeCells('A3:A4')->setCellValue('A3', 'NO');
          $spreadsheet->getActiveSheet(0)->mergeCells('B3:B4');
          $spreadsheet->getActiveSheet(0)->mergeCells('C3:C4');
          $spreadsheet->getActiveSheet(0)->mergeCells('D3:D4');
          $spreadsheet->getActiveSheet(0)->mergeCells('E3:E4');
          $spreadsheet->getActiveSheet(0)->mergeCells('F3:F4');
          $spreadsheet->getActiveSheet(0)->mergeCells('G3:G4');
          $spreadsheet->getActiveSheet(0)->mergeCells('H3:H4');
           $spreadsheet->getActiveSheet(0)->mergeCells('I3:M3');
           $spreadsheet->getActiveSheet(0)->mergeCells('N3:N4');

          /*
          $spreadsheet->getActiveSheet(0)->mergeCells('H3:H4');
          $spreadsheet->getActiveSheet(0)->mergeCells('I3:L3');
          */

          /*
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1','JADWAL KEGIATAN RESES  DPRD KOTA CIMAHI')
                      ->setCellValue('B3', 'Nama Anggota DPRD')
                      ->setCellValue('C3', 'Fraksi')
                      ->setCellValue('D3', 'Dapil / Kecamatan')
                      ->setCellValue('E3', 'Hari Tanggal')
                      ->setCellValue('F3', 'Tempat')
                      ->setCellValue('G3', 'Waktu (WIB)')
                      ->setCellValue('H3', 'Jumlah Konsituen')
                      ->setCellValue('I3', 'Kebutuhan Fasilitas')
                      ->setCellValue('I4', 'Snack')
                      ->setCellValue('J4', 'Kursi')
                      ->setCellValue('K4', 'Spanduk')
                      ->setCellValue('L4', 'Tenda')
                      ->setCellValue('M4', 'Sound')
                      ->setCellValue('N3', 'Pendamping')

                      ;
        
          $kolom = 5;
          $nomor = 1;

          if($count_proposal>0){
          foreach($proposal as $pengguna) {
               $tanggal=date('Y-m-d');
               $hari=$this->namahari($tanggal);
               $tgl=date('d F Y', strtotime($pengguna->tanggal));
                
               if($pengguna->tenda){
                   $tenda=$pengguna->tenda;
               }else{
                   $tenda="-";
               }

               if($pengguna->spanduk){
                   $spanduk=$pengguna->spanduk;
               }else{
                   $spanduk="-";
               }

               if($pengguna->sound_system){
                  $sound_system=$pengguna->sound_system;
               }else{
                   $sound_system="-";
               }
               
               
               $id_pendamping=$pengguna->id_pendamping;
               if($id_pendamping ==0){
                  $nama="-";
               }else{
                 $users=$this->Usulan_model->tampil_users($id_pendamping);
                                       foreach($users as $us){
                                           $nama=$us->nama;
                                           $nip=$us->nip;
                                           $jabatan=$us->jabatan;
                                           
                                       }
               }
               $namaAnggota=$pengguna->first_name.$pengguna->last_name.$pengguna->gelar;
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $namaAnggota)
                           ->setCellValue('C' . $kolom, $pengguna->fraksi)
                           ->setCellValue('D' . $kolom, $pengguna->daerah_pemilihan)
                           ->setCellValue('E' . $kolom, $hari.'/'.$tgl)
                           ->setCellValue('F' . $kolom, $pengguna->tempat)
                           ->setCellValue('G' . $kolom, $pengguna->waktu)
                           ->setCellValue('H' . $kolom, $pengguna->jumlah_konsituen)
                            ->setCellValue('I' . $kolom, $pengguna->snack)
                             ->setCellValue('J' . $kolom, $pengguna->kursi)
                              ->setCellValue('K' . $kolom, $spanduk)
                              ->setCellValue('L' . $kolom, $tenda)
                               ->setCellValue('M' . $kolom, $sound_system)
                                ->setCellValue('N' . $kolom, $nama)
                               

                           

                           ;
                         

               $kolom++;
               $nomor++;

          }
        }else{
                        
                        $spreadsheet->getActiveSheet(0)->mergeCells('A5:L5')->setCellValue('A5', 'Tidak ada data!');

            $styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],

    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
            $spreadsheet->getActiveSheet(0)->getStyle('A5:L5')->applyFromArray($styleArray);
         }
            
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],
];

$styleArray2 = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];

$styleArray3 = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];

$styleArray4 = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];



           $tes=$kolom-1;
           $spreadsheet->getActiveSheet(0)->getStyle('A3:N'.$tes)->applyFromArray($styleArray);
           $spreadsheet->getActiveSheet(0)->getStyle('A1')->applyFromArray($styleArray2);
           $spreadsheet->getActiveSheet(0)->getStyle('A2')->applyFromArray($styleArray2);
           $spreadsheet->getActiveSheet(0)->getStyle('A4:N4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('A3:A4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('B3:B4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('C3:C4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('D3:D4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('E3:E4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('F3:F4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('G3:G4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('H3:H4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('I3:I4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('J3:J4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('K3:K4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('N3:N4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('A3:A'.$tes)->applyFromArray($styleArray4);

           $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
           $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

           $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="RekapitulasiProposal.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
     }



     public function export_reses()
     {
          $pilihan=$this->input->get('pilihan');
          $parameter=$this->input->get('parameter');
          $proposal=$this->Master_model->select_reses_sudah($pilihan,$parameter);
          $count_proposal =count($proposal);
           
          $pilihan_kapital=strtoupper($pilihan);
          $parameter_kapital=strtoupper($parameter);

          $spreadsheet = new Spreadsheet;
          $spreadsheet->getActiveSheet(0)->mergeCells('A1:L1');

          if($pilihan=="" && $parameter==""){
           $spreadsheet->getActiveSheet(0)->mergeCells('A2:L2')->setCellValue('A2', 'SEMUA DATA');
          }else{
            $spreadsheet->getActiveSheet(0)->mergeCells('A2:L2')->setCellValue('A2', 'DATA DENGAN FILTER '.$pilihan_kapital.' '.$parameter_kapital);
          }
          $spreadsheet->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('B')->setWidth(25);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('C')->setWidth(18);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('D')->setWidth(30);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('E')->setWidth(28);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('F')->setWidth(10);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('G')->setWidth(25);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('H')->setWidth(30);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('I')->setWidth(25);
           $spreadsheet->getActiveSheet(0)->getColumnDimension('J')->setWidth(25);
           $spreadsheet->getActiveSheet(0)->getColumnDimension('K')->setWidth(25);
            $spreadsheet->getActiveSheet(0)->getColumnDimension('L')->setWidth(25);
          $spreadsheet->getActiveSheet(0)->mergeCells('A3:A4')->setCellValue('A3', 'NO');
          $spreadsheet->getActiveSheet(0)->mergeCells('B3:B4');
          $spreadsheet->getActiveSheet(0)->mergeCells('C3:C4');
          $spreadsheet->getActiveSheet(0)->mergeCells('D3:D4');
          $spreadsheet->getActiveSheet(0)->mergeCells('E3:E4');
          $spreadsheet->getActiveSheet(0)->mergeCells('F3:F4');
          $spreadsheet->getActiveSheet(0)->mergeCells('G3:G4');
          $spreadsheet->getActiveSheet(0)->mergeCells('H3:H4');
          $spreadsheet->getActiveSheet(0)->mergeCells('I3:L3');
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1','HASIL RESES ANGGOTA DPRD')
                      ->setCellValue('B3', 'NAMA ANGGOTA DPR')
                      ->setCellValue('C3', 'FRAKSI')
                      ->setCellValue('D3', 'DAPIL')
                      ->setCellValue('E3', 'HARI/TGL')
                      ->setCellValue('F3', 'TEMPAT')
                      ->setCellValue('G3', 'NAMA')
                      ->setCellValue('H3', 'ALAMAT')
                      ->setCellValue('I3', 'ASPIRASI')
                      ->setCellValue('I4', 'BIDANG PEMERINTAHAN')
                      ->setCellValue('J4', 'BIDANG EKONOMI KEUANGAN')
                      ->setCellValue('K4', 'BIDANG PEMBANGUNAN')
                      ->setCellValue('L4', 'BIDANG KESEJAHTERAAN RAKYAT')
                      ;
        
          $kolom = 5;
          $nomor = 1;

          if($count_proposal>0){
          foreach($proposal as $pengguna) {
               $tanggal=date('Y-m-d');
               $hari=$this->namahari($tanggal);
               $tgl=date('d F Y', strtotime($pengguna->tanggal));
               
               if($pengguna->bidang=="Bidang Pemerintahan"){
                   $cell="I";
               }elseif($pengguna->bidang=="Bidang Ekonomi Keuangan"){
                   $cell="J";
               }elseif($pengguna->bidang=="Bidang Pembangunan"){
                   $cell="K";
               }elseif($pengguna->bidang=="Bidang Kesejahteraan Rakyat"){
                   $cell="L";
               }
                
               $namaAnggota=$pengguna->first_name.$pengguna->last_name.$pengguna->gelar;
               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $namaAnggota)
                           ->setCellValue('C' . $kolom, $pengguna->fraksi)
                           ->setCellValue('D' . $kolom, $pengguna->daerah_pemilihan)
                           ->setCellValue('E' . $kolom, $hari.'/'.$tgl)
                           ->setCellValue('F' . $kolom, $pengguna->tempat)
                           ->setCellValue('G' . $kolom, $pengguna->nama)
                           ->setCellValue('H' . $kolom, $pengguna->alamat)
                          
                           ->setCellValue($cell . $kolom, $pengguna->kesimpulan)

                           ;
                         

               $kolom++;
               $nomor++;

          }
        }else{
                        
                        $spreadsheet->getActiveSheet(0)->mergeCells('A5:L5')->setCellValue('A5', 'Tidak ada data!');

            $styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],

    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
            $spreadsheet->getActiveSheet(0)->getStyle('A5:L5')->applyFromArray($styleArray);
         }
            
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],
];

$styleArray2 = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];

$styleArray3 = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];

$styleArray4 = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];



           $tes=$kolom-1;
           $spreadsheet->getActiveSheet(0)->getStyle('A3:L'.$tes)->applyFromArray($styleArray);
           $spreadsheet->getActiveSheet(0)->getStyle('A1')->applyFromArray($styleArray2);
           $spreadsheet->getActiveSheet(0)->getStyle('A2')->applyFromArray($styleArray2);
           $spreadsheet->getActiveSheet(0)->getStyle('A4:L4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('A3:A4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('B3:B4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('C3:C4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('D3:D4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('E3:E4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('F3:F4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('G3:G4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('H3:H4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('I3:I4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('J3:J4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('K3:K4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('L3:L4')->applyFromArray($styleArray3);
           $spreadsheet->getActiveSheet(0)->getStyle('A3:A'.$tes)->applyFromArray($styleArray4);

           $spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');
           $spreadsheet->getDefaultStyle()->getFont()->setSize(12);

           $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="RekapitulasiReses.xlsx"');
	  header('Cache-Control: max-age=0');

	  $writer->save('php://output');
     }

       function namahari($tanggal){
    //fungsi mencari namahari
    //format $tgl YYYY-MM-DD
    //harviacode.com
    $tgl=substr($tanggal,8,2);
    $bln=substr($tanggal,5,2);
    $thn=substr($tanggal,0,4);
    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
    switch($info){
        case '0': return "Minggu"; break;
        case '1': return "Senin"; break;
        case '2': return "Selasa"; break;
        case '3': return "Rabu"; break;
        case '4': return "Kamis"; break;
        case '5': return "Jumat"; break;
        case '6': return "Sabtu"; break;
    };
    }

*/

   function tes(){
     $outlet="m_barang_jakarta";
   
     $data['barang']=$this->Mpdf_model->select_barang_ho($outlet);
     $data['departemen']=$this->Mpdf_model->select_departemen_ho($outlet);
    $this->load->view('tes',$data);

   }
   
   function export_excel_post(){
    error_reporting(0);
  /*
      $lokasi              = $this->post('lokasi');
      $tanggal             = date('Y-m-d');
      $pelaksana              = $this->post('pelaksana');
      $no_handphone             = $this->input->get->('no_handphone');
      
      */
      $outlet               = $this->input->get('outlet');
      if($outlet){
        $parameter=$outlet;
      }else{
        $parameter="m_barang_jakarta";
      }

      if($parameter=="m_barang_jakarta"){
        $nama_toko="BURSA SAJADAH JAKARTA";
      }elseif($parameter=="m_barang_ho"){
        $nama_toko="HEAD OFFICE";
      }elseif($parameter=="m_barang_bekasi"){
        $nama_toko="BURSA SAJADAH BEKASI";
      }elseif($parameter=="m_barang_bogor"){
        $nama_toko="BURSA SAJADAH BOGOR";
      }elseif($parameter=="m_barang_bsd"){
        $nama_toko="BURSA SAJADAH BSD TANGERANG";
      }elseif($parameter=="m_barang_cibubur"){
        $nama_toko="BURSA SAJADAH CIBUBUR";
      }elseif($parameter=="m_barang_citarum"){
        $nama_toko="BURSA SAJADAH CITARUM";
      }elseif($parameter=="m_barang_inhoftank"){
        $nama_toko="BURSA SAJADAH INHOFTANK";
      }elseif($parameter=="m_barang_malang"){
         $nama_toko="BURSA SAJADAH MALANG";
      }elseif($parameter=="m_barang_mtc"){
        $nama_toko="BURSA SAJADAH MTC";
      }elseif($parameter=="m_barang_pdp"){
        $nama_toko="BURSA SAJADAH PONDOK PINANG";

      }elseif($parameter=="m_barang_serang"){
        $nama_toko="BURSA SAJADAH SERANG";
      }elseif($parameter=="m_barang_surabaya"){
       $nama_toko="BURSA SAJADAH SURABAYA";
      }elseif($parameter=="m_barang_uber"){
       $nama_toko="BURSA SAJADAH UJUNG BERUNG";
      }else{
        $nama_toko="Lainnya";
      }
      $departemen=$this->Mpdf_model->select_barang_ho($parameter);    

          $spreadsheet = new Spreadsheet;
          $spreadsheet->getActiveSheet(0)->mergeCells('A1:M1')->setCellValue('A1', 'DAFTAR PRODUK STOCK OPNAME '.$nama_toko);

           $spreadsheet->getActiveSheet(0)->getColumnDimension('A')->setWidth(5);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('B')->setWidth(25);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('C')->setWidth(30);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('D')->setWidth(18);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('E')->setWidth(12);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('F')->setWidth(12);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('G')->setWidth(12);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('H')->setWidth(12);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('I')->setWidth(12);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('J')->setWidth(12);
           $spreadsheet->getActiveSheet(0)->getColumnDimension('K')->setWidth(15);



          $spreadsheet->getActiveSheet(0)->getColumnDimension('L')->setWidth(20);
          $spreadsheet->getActiveSheet(0)->getColumnDimension('M')->setWidth(20);
           $spreadsheet->getActiveSheet(0)->getColumnDimension('N')->setWidth(15);
          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A3', 'No')
                      ->setCellValue('B3', 'SKU')
                      ->setCellValue('C3', 'Item')
                      ->setCellValue('D3', 'Price')
                      ->setCellValue('E3', 'Stock Moka')
                      ->setCellValue('F3', 'Stock Gudang')
                      ->setCellValue('G3', 'Stock Area')
                      ->setCellValue('H3', 'Stock Lain')


                      ->setCellValue('I3', 'Stock Real')
                      
                      ->setCellValue('J3', 'Selisih')
                      ->setCellValue('K3', 'Value Selisih')
                      ->setCellValue('L3', 'Pengawas HO')

                      ->setCellValue('M3', 'Dept')
                      ->setCellValue('N3', 'Catatan')
                      ->setCellValue('O3', 'Status SO')

                      ;
          $kolom = 4;
          $nomor = 1;

          foreach($departemen as $row) {
          $selisih=$row->stok_real-$row->stok_moka;

          $value_selisih=$selisih * $row->price;
          if($row->status_so==0){
            $parameter="Belum SO";
          }else{
            $parameter="Sudah SO";
          }


               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A'.$kolom , $nomor)
                           ->setCellValue('B'.$kolom , $row->sku)
                           ->setCellValue('C'.$kolom , $row->name)
                            ->setCellValue('D'.$kolom , $row->price)
                            ->setCellValue('E'.$kolom , $row->stok_moka)
                            ->setCellValue('F'.$kolom , $row->stok_gudang)
                            ->setCellValue('G'.$kolom , $row->stok_area)
                            ->setCellValue('H'.$kolom , $row->stok_lain)

                            ->setCellValue('I'.$kolom , $row->stok_real)
                            ->setCellValue('J'.$kolom , $selisih)
                            ->setCellValue('K'.$kolom , $value_selisih)

                            ->setCellValue('L'.$kolom , $row->stok_revisi)
                            ->setCellValue('M'.$kolom , $row->dept)
                            ->setCellValue('N'.$kolom , $row->catatan)
                            ->setCellValue('O'.$kolom , $parameter)

                           ;
               $kolom++;
               $nomor++;

          }
           
           $styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '00000000'],
        ],
    ],
];

$styleArray2 = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];

$styleArray3 = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
$styleArray4 = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];

           $tes=$kolom-1;
           $spreadsheet->getActiveSheet(0)->getStyle('A3:O'.$tes)->applyFromArray($styleArray);
/*
           $spreadsheet->getActiveSheet()->getStyle('B4:B'.$tes)->
  setFormatCode(\PhpOffice\PhpSpreadsheet\Calculation\MathTrig::ROUNDDOWN);
*/

           $spreadsheet->getActiveSheet(0)->getStyle('A1')->applyFromArray($styleArray2);
           $spreadsheet->getActiveSheet(0)->getStyle('A3:O3')->applyFromArray($styleArray3);
            $spreadsheet->getActiveSheet(0)->getStyle('A3:A'.$tes)->applyFromArray($styleArray4);
              $spreadsheet->getActiveSheet(0)->getStyle('E3:E'.$tes)->applyFromArray($styleArray4);
               $spreadsheet->getActiveSheet(0)->getStyle('F3:F'.$tes)->applyFromArray($styleArray4);
               $spreadsheet->getActiveSheet(0)->getStyle('G3:G'.$tes)->applyFromArray($styleArray4);

               $spreadsheet->getActiveSheet(0)->getStyle('H3:H'.$tes)->applyFromArray($styleArray4);
               $spreadsheet->getActiveSheet(0)->getStyle('I3:I'.$tes)->applyFromArray($styleArray4);
               $spreadsheet->getActiveSheet(0)->getStyle('J3:J'.$tes)->applyFromArray($styleArray4);
                $spreadsheet->getActiveSheet(0)->getStyle('K3:K'.$tes)->applyFromArray($styleArray4);


          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Daftar_Stock_Opname'.$nama_toko.'.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');


     

   }
    
}