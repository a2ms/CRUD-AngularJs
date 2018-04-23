<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiDonasiModel extends CI_Model {
  public function getCountDonasi($id_donatur){

   $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
   $this->db->from('donasi_barang a');
 $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
   $this->db->where('a.id_donatur',$id_donatur);
   $this->db->where('a.status_donasi_barang','Disetujui');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }
 public function getDonasi($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
  $this->db->from('donasi_barang a');
 $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_barang','Disetujui');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountDonasiDitolak($id_donatur){
  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
  $this->db->from('donasi_barang a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_barang','Ditolak');
  $data = $this->db->count_all_results('', FALSE);
  return $data;

}
public function getDonasiDitolak($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
  $this->db->from('donasi_barang a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_barang','Ditolak');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountDonasiMenunggu($id_donatur){
 $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
 $this->db->from('donasi_barang a');
 $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');

 $this->db->where('a.id_donatur',$id_donatur);
 $this->db->where('a.status_donasi_barang','Menunggu');
 $data = $this->db->count_all_results('', FALSE);
 return $data;

}
public function getDonasiMenunggu($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
  $this->db->from('donasi_barang a');
 $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');

  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_barang','Menunggu');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountDonasiPanti($id_panti_asuhan){

  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
 $this->db->from('donasi_barang a');
 $this->db->join('donatur b','a.id_donatur=b.id_donatur');
 $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
 $this->db->where('a.status_donasi_barang','Disetujui');
 $data = $this->db->count_all_results('', FALSE);
  return $data;

}

 public function getDonasiPanti($page,$size,$id_panti_asuhan){
 $berita=[];
 $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
 $this->db->from('donasi_barang a');
$this->db->join('donatur b','a.id_donatur=b.id_donatur');
 $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
 $this->db->where('a.status_donasi_barang','Disetujui');
 $data = $this->db->get('', $size, $page)->result_array();
 $i = 0;
 foreach($data as $row):
   $berita[$i] = $row;
 $i++;
 endforeach;
 return $berita;
}

// public function getCountDonasiDitolak($id_panti_asuhan){
//
//   $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
//  $this->db->from('donasi_barang a');
//  $this->db->join('donatur b','a.id_donatur=b.id_donatur');
//  $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
//  $this->db->where('a.status_donasi_barang','Ditolak');
//  $data = $this->db->count_all_results('', FALSE);
//   return $data;
//
// }
//
// public function getDonasiDitolak($page,$size,$id_panti_asuhan){
//  $berita=[];
//  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
//  $this->db->from('donasi_barang a');
// $this->db->join('donatur b','a.id_donatur=b.id_donatur');
//  $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
//  $this->db->where('a.status_donasi_barang','Ditolak');
//  $data = $this->db->get('', $size, $page)->result_array();
//  $i = 0;
//  foreach($data as $row):
//    $berita[$i] = $row;
//  $i++;
//  endforeach;
//  return $berita;
// }

public function getCountDonasiMenungguPanti($id_panti_asuhan){

  $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
 $this->db->from('donasi_barang a');
 $this->db->join('donatur b','a.id_donatur=b.id_donatur');
 $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
 $this->db->where('a.status_donasi_barang','Menunggu');
 $data = $this->db->count_all_results('', FALSE);
  return $data;

}

public function getDonasiMenungguPanti($page,$size,$id_panti_asuhan){
 $berita=[];
 $this->db->select('a.id_donasi_barang,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
 $this->db->from('donasi_barang a');
$this->db->join('donatur b','a.id_donatur=b.id_donatur');
 $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
 $this->db->where('a.status_donasi_barang','Menunggu');
 $data = $this->db->get('', $size, $page)->result_array();
 $i = 0;
 foreach($data as $row):
   $berita[$i] = $row;
 $i++;
 endforeach;
 return $berita;
}
}
