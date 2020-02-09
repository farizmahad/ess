<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login_User';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user'] = 'Auth';
$route['user'] = 'Auth/index';
$route['user/create_user'] = 'Auth/create_user';
$route['user/create_group'] = 'Auth/create_group';
$route['beranda'] = 'Login_User';
$route['tambah-permintaan'] = 'Pengajuan/tambah_pengajuan';
$route['daftar-permintaan'] = 'Pengajuan/history_pengajuan';
$route['ubah-kata-sandi'] = 'Profile';
$route['logout'] = 'Auth/logout';
$route['halaman-utama'] = 'Dashboard';
$route['lupa-password'] = 'Login_User/lupa_password';
$route['struktur-organisasi'] = 'Profile/struktur_organisasi';
$route['daftar-persetujuan'] = 'Pengajuan/persetujuan';
$route['history-persetujuan'] = 'Pengajuan/history_persetujuan';

$route['edit-permintaan/(:num)'] = 'Pengajuan/edit_pengajuan/$1';
$route['cetak-pengajuan/(:num)'] = 'Pengajuan/cetak_pengajuan/$1';
$route['login'] = 'Login_User';
$route['lihat-akun'] = 'Profile/lihat_user';
$route['daftar-nota'] = 'Pengajuan/daftar_nota';



$route['ringkasan-profile/(:num)'] = 'Profile_Detail/ringkasan_profile/$1';
$route['detail-pekerjaan/(:num)'] = 'Profile_Detail/index/$1';
$route['tujuan-individu/(:num)'] = 'Profile_Detail/goal/$1';
$route['history-pegawai/(:num)'] = 'Profile_Detail/history_pegawai/$1';
$route['performance-competencies/(:num)'] = 'Profile_Detail/competencies/$1';
$route['development-items/(:num)'] = 'Profile_Detail/development_items/$1';
$route['feedback/(:num)'] = 'Profile_Detail/feedback/$1';
$route['personal-information/(:num)'] = 'Profile_Detail/personal_information/$1';


$route['pertanyaan-terima/(:num)'] = 'Profile_Detail/history_pertanyaan_diterima/$1';
$route['kirim-pertanyaan/(:num)'] = 'Feedback_Manager/kirim_pertanyaan/$1';
$route['tujuan-individu-tutup/(:num)'] = 'Profile_Detail/goal_close/$1';


$route['beranda'] = 'Dashboard/news_feed';
$route['komentar-news'] = 'Dashboard/detail_komentar';

$route['development-items-history/(:num)'] = 'Profile_Detail/development_items_history/$1';
$route['penerima-poin-pengembangan/(:num)'] = 'Profile_Detail/penerima_poin_pengembangan/$1';
$route['poin-pengembangan-selengkapnya/(:num)'] = 'Profile_Detail/development_items_history/$1';
$route['riwayat-kirim-saran/(:num)'] = 'Profile_Detail/riwayat_kirim_saran/$1';
$route['organisasi/(:num)'] = 'Profile_Detail/organisasi/$1';


/*HRD*/
$route['hrd-detail-pekerjaan'] = 'HRD/detail_pekerjaan_pegawai';
$route['user-barang-non-dagang'] = 'User_pengajuan';

$route['daftar-persetujuan-pr'] = 'User_pengajuan/persetujuan';



//////////////// baru
$route['tambah-permintaan-barang-non-dagang']              = 'User_pengajuan';

$route['daftar-permintaan-barang-non-dagang'] = 'User_pengajuan/daftar_permintaan_barang';
$route['daftar-permintaan-barang-non-dagang-revisi'] = 'User_pengajuan/daftar_permintaan_barang_revisi';
$route['daftar-permintaan-barang-non-dagang-ditolak'] = 'User_pengajuan/daftar_permintaan_barang_ditolak';

$route['pic-daftar-barang']        = 'User_pengajuan/pic_daftar_barang';
$route['daftar-purchase-request']        = 'User_pengajuan/list_pr';

$route['buat-purchase-request']        = 'User_pengajuan/buat_pr';
/*
$route['tambah-detail-purchase-request/(:num)'] = 'User_pengajuan/tambah_detail_pengajuan/$1';
*/

$route['tambah-detail-purchase-request/(:num)'] = 'User_pengajuan/tambah_detail_pengajuan/$1';
$route['daftar-permintaan-purchase-order'] = 'User_pengajuan/list_terima';