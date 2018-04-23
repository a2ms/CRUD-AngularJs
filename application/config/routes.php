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
$route['panti_terverifikasi/(:any)']='Admin_Panti_Asuhan/panti_asuhan_terverifikasi/$1';
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
$route['donasi_barang']='Admin_Donasi_Barang/donasi_barang';
$route['getid_dana']['GET']='Admin_Donasi/GetIdDana';
$route['delete_dana']['GET']='Admin_Donasi/hapusDana';
$route['getid_barang']['GET']='Admin_Donasi_Barang/GetIdBarang';
$route['delete_barang']['GET']='Admin_Donasi_Barang/hapusBarang';
$route['detail_donasi/read/(:num)']='Admin_Donasi_Barang/read_more/$1';
$route['barang/updateaction']='Admin_Donasi_Barang/update_action';
$route['updatebarang']['POST']='Admin_Donasi_Barang/UpdateBarang';
$route['updatebtolak']['POST']='Admin_Donasi_Barang/UpdateTolak';
$route['updatebsetuju']['POST']='Admin_Donasi_Barang/UpdateDisetujui';
$route['updatebmenunggu']['POST']='Admin_Donasi_Barang/UpdateMenunggu';
$route['search_donasi']='Admin_Donasi_Barang/cari';
$route['search_donasi_d']='Admin_Donasi/caris';
$route['verifikasidana']['POST']='Admin_Donasi/UpdateDiterima';


//--------------------------------END WEB URL------------------------------------------












//--------------------------------ANDROID URL------------------------------------------

//--------------------------------ANDROID URL------------------------------------------

$route['Login_Android']['POST'] = 'PenggunaController/Login';
$route['Register_Donatur']['POST'] = 'PenggunaController/Register';
$route['Register_Panti']['POST']='PenggunaController/Register';

$route['Berita_Android']['GET'] = 'BeritaController/getBerita_All';
$route['Panti_Asuhan_Android']['GET'] = 'PantiController/getListPantiAll';
$route['Berita_By_Id']['GET'] = 'BeritaController/getBerita_Id';
$route['Kegiatan_By_Id']['GET'] = 'DonaturController/getKegiatan_Id';
$route['donatur/update_profil']['POST']='DonaturController/UpdateDonatur';
$route['pantiasuhan/update_profil']['POST']='PantiController/UpdateProfil';
$route['berita/insert']['POST']='BeritaController/TambahBerita';
//--------------------------------END ANDROID URL------------------------------------------


//Panti Asuhan
$route['api/panti/(:num)/(:num)']['GET'] = 'ApiPantiAsuhanController/getPantiAsuhan/$1/$2';
$route['api/caripanti/(:num)/(:num)']['GET'] = 'ApiPantiAsuhanController/cariPantiAsuhan/$1/$2';
$route['api/panti/insertdana']['GET'] = 'ApiPantiAsuhanController/insertDonasiDana';
$route['api/panti/insertbarang']['GET'] = 'ApiPantiAsuhanController/insertDonasiBarang';
$route['api/panti/insertkegiatan']['GET'] = 'ApiPantiAsuhanController/insertKegiatan';

//Berita
$route['api/berita/(:num)/(:num)']['GET'] = 'ApiBeritaController/getBerita/$1/$2';


//Donasi Barang
$route['api/donasi/setuju/(:num)/(:num)']['GET'] = 'ApiDonasiController/tampilDonasiSetuju/$1/$2';
$route['api/donasi/tolak/(:num)/(:num)']['GET'] = 'ApiDonasiController/tampilDonasiDitolak/$1/$2';
$route['api/donasi/menunggu/(:num)/(:num)']['GET'] = 'ApiDonasiController/tampilDonasiMenunggu/$1/$2';

//Donatur
$route['api/donaturtetap/diterima/(:num)/(:num)']['GET']='DonaturController/TampilDonaturTetapDiterima/$1/$2';
$route['api/donaturtetap/menunggu_konfirmasi/(:num)/(:num)']['GET']='DonaturController/TampilDonaturTetapMenunggu/$1/$2';

//kegiatan
$route['api/kegiatanpanti/disetujui/(:num)/(:num)']['GET']='KegiatanController/TampilKegiatanPantiDisetujui/$1/$2';
$route['api/kegiatanpanti/menunggu/(:num)/(:num)']['GET']='KegiatanController/TampilKegiatanPantiMenunggu/$1/$2';
$route['api/kegiatanpanti/ditolak/(:num)/(:num)']['GET']='KegiatanController/TampilKegiatanPantiDitolak/$1/$2';

//Donatur Tetap
$route['api/donaturtetap/setuju/(:num)/(:num)']['GET'] = 'ApiDonaturTetapController/getDonaturTetap/$1/$2';
$route['api/donaturtetap/menunggu/(:num)/(:num)']['GET'] = 'ApiDonaturTetapController/getDonaturTetapMenunggu/$1/$2';

$route['api/panti/insertdonaturtetap']['GET'] = 'ApiDonaturTetapController/insertDonaturTetap';

//Kegiatan
$route['api/kegiatan/setuju/(:num)/(:num)']['GET'] = 'ApiKegiatanController/getKegiatan/$1/$2';
$route['api/kegiatan/menunggu/(:num)/(:num)']['GET'] = 'ApiKegiatanController/getKegiatanMenunggu/$1/$2';
$route['api/kegiatan/ditolak/(:num)/(:num)']['GET'] = 'ApiKegiatanController/getKegiatanDitolak/$1/$2';

//Donasi Uang
$route['api/donasiuang/setuju/(:num)/(:num)']['GET'] = 'ApiDonasiUangController/tampilDonasiSetuju/$1/$2';
$route['api/donasiuang/menunggu/(:num)/(:num)']['GET'] = 'ApiDonasiUangController/tampilDonasiMenunggu/$1/$2';
$route['api/donasiuang/upload/(:num)/(:num)']['GET'] = 'ApiDonasiUangController/tampilDonasiUpload/$1/$2';

$route['api/donasidana/(:num)/(:num)']['GET']='ApiDonasiUangController/tampilDonasiDanaPanti/$1/$2';
$route['api/panti/donasibarang/setuju/(:num)/(:num)']['GET']='ApiDonasiController/tampilDonasiSetujuPanti/$1/$2';
$route['api/panti/donasibarang/menunggu/(:num)/(:num)']['GET']='ApiDonasiController/tampilDonasiMenungguPanti/$1/$2';

$route['api/update/donatur']['GET']='DonaturController/getID_Donatur_Tetap';
$route['api/update/donasibarang']['GET']='DonaturController/getID_Donasi_Barang';
$route['api/update/kegiatan']['GET']='DonaturController/getID_Kegiatan';
$route['api/panti/rekomendasi/(:num)/(:num)']['GET']='ApiPantiAsuhanController/TampilPantiRekomendasi/$1/$2';

$route['api/beritapanti/(:num)/(:num)']['GET'] = 'ApiBeritaController/getBeritaPanti/$1/$2';
$route['api/cekdonatur']['GET'] = 'ApiDonaturTetapController/cekDonaturTetap';
$route['api/donatur/hapus']['GET'] = 'ApiDonaturTetapController/hapusfavorit';

$route['donasiuang/uploadbukti']['POST']='ApiDonasiUangController/UploadBuktiPembayaran';
