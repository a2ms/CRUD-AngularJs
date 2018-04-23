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

//--------------------------------WEB URL------------------------------------------

$route['default_controller'] = 'Login_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Login,logout
$route['login']='Login_Controller';
$route['loginaction']='Login_Controller/login_action';
$route['logoutaction']='Login_Controller/logout';

//Dasboard
$route['dashboard']='Main_Controller';

//Panti Asuhan
$route['panti_terverifikasi']='Admin_Panti_Asuhan/panti_asuhan_terverifikasi';
$route['panti_belum_terverifikasi']='Admin_Panti_Asuhan/panti_asuhan_belum_terverifikasi';
$route['tambah_panti']='Admin_Panti_Asuhan/tambah_panti_form';
$route['insert_panti']='Admin_Panti_Asuhan/insert_action';
$route['detail_panti/read/(:num)']='Admin_Panti_Asuhan/read_more/$1';
$route['panti/update/(:num)']='Admin_Panti_Asuhan/update/$1';
$route['panti/updateaction']='Admin_Panti_Asuhan/update_action';
$route['getid_panti']['GET']='Admin_Panti_Asuhan/GetIdPanti';
$route['delete_panti']['GET']='Admin_Panti_Asuhan/hapus';
$route['updateverifikasi']['POST']='Admin_Panti_Asuhan/UpdateVerifikasi';
$route['search_panti_s']='Admin_Panti_Asuhan/cari';
$route['search_panti_b']='Admin_Panti_Asuhan/caris';


//Donatur
$route['donatur']='Admin_Donatur/donatur';
$route['insert_donatur']='Admin_Donatur/insert_action';
$route['delete']['GET']='Admin_Donatur/hapus';
$route['getid']['GET']='Admin_Donatur/GetIdDonatur';
$route['updatedonatur']['POST']='Admin_Donatur/UpdateDonatur';
$route['search_donatur']='Admin_Donatur/cari';


//Berita
$route['berita']='Admin_Berita/berita';
$route['insert_berita']='Admin_Berita/insert_action';
$route['updateberita']['POST']='Admin_Berita/UpdateBerita';
$route['getid_berita']['GET']='Admin_Berita/GetIdBerita';
$route['delete_berita']['GET']='Admin_Berita/hapus';
$route['search_berita']='Admin_Berita/cari';

//Kegiatan
$route['permintaan_kegiatan']='Admin_Kegiatan/permintaan_kegiatan';
$route['detail_kegiatan/read/(:num)']='Admin_Kegiatan/read_more/$1';
$route['kegiatan/update/(:num)']='Admin_Kegiatan/update/$1';
$route['kegiatan/updateaction']='Admin_Kegiatan/update_action';
$route['getid_kegiatan']['GET']='Admin_Kegiatan/GetIdKegiatan';
$route['delete_kegiatan']['GET']='Admin_Kegiatan/hapus';
$route['updatekegiatan']['POST']='Admin_Kegiatan/UpdateKegiatan';
$route['updatetolak']['POST']='Admin_Kegiatan/UpdateTolak';
$route['updatesetuju']['POST']='Admin_Kegiatan/UpdateDisetujui';
$route['updatemenunggu']['POST']='Admin_Kegiatan/UpdateMenunggu';
$route['search_kegiatan']='Admin_Kegiatan/cari';

//donasi
$route['donasi']='Admin_Donasi/donasi_dana';
$route['getid_dana']['GET']='Admin_Donasi/GetIdDana';
$route['delete_dana']['GET']='Admin_Donasi/hapusDana';
$route['getid_barang']['GET']='Admin_Donasi/GetIdBarang';
$route['delete_barang']['GET']='Admin_Donasi/hapusBarang';
$route['detail_donasi/read/(:num)']='Admin_Donasi/read_more/$1';
$route['barang/updateaction']='Admin_Donasi/update_action';
$route['updatebarang']['POST']='Admin_Donasi/UpdateBarang';
$route['updatebtolak']['POST']='Admin_Donasi/UpdateTolak';
$route['updatebsetuju']['POST']='Admin_Donasi/UpdateDisetujui';
$route['updatebmenunggu']['POST']='Admin_Donasi/UpdateMenunggu';
$route['search_donasi']='Admin_Donasi/cari';
$route['search_donasi_d']='Admin_Donasi/caris';

//--------------------------------END WEB URL------------------------------------------












//--------------------------------ANDROID URL------------------------------------------

$route['Login_Android']['POST'] = 'PenggunaController/Login';
$route['Register_Donatur']['POST'] = 'PenggunaController/Register';

$route['Berita_Android']['GET'] = 'BeritaController/getBerita_All';
$route['Panti_Asuhan_Android']['GET'] = 'PantiController/getListPantiAll';
$route['Berita_By_Id']['GET'] = 'BeritaController/getBerita_Id';
$route['Kegiatan_By_Id']['GET'] = 'DonaturController/getKegiatan_Id';

//--------------------------------END ANDROID URL------------------------------------------
