<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiKegiatanModel extends CI_Model {
  public function getCountKegiatanDisetujui($id_donatur){
   $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
   $this->db->from('kegiatan a');
   $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
   $this->db->where('a.id_donatur',$id_donatur);
   $this->db->where('a.status_kegiatan','Disetujui');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }
 public function getKegiatanDisetujui($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
  $this->db->from('kegiatan a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_kegiatan','Disetujui');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountKegiatanMenunggu($id_donatur){
   $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
   $this->db->from('kegiatan a');
   $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
   $this->db->where('a.id_donatur',$id_donatur);
   $this->db->where('a.status_kegiatan','Menunggu Konfirmasi');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }
 public function getKegiatanMenunggu($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
  $this->db->from('kegiatan a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_kegiatan','Menunggu Konfirmasi');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountKegiatanDitolak($id_donatur){
   $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
   $this->db->from('kegiatan a');
   $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
   $this->db->where('a.id_donatur',$id_donatur);
   $this->db->where('a.status_kegiatan','Ditolak');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }
 public function getKegiatanDitolak($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
  $this->db->from('kegiatan a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_kegiatan','Ditolak');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}
}
