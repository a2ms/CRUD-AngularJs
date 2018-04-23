<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiDonasiUangModel extends CI_Model {
  public function getCountDonasi($id_donatur){

   $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
   $this->db->from('donasi_dana a');
   $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
   $this->db->where('a.id_donatur',$id_donatur);
   $this->db->where('a.status_donasi_dana','Diterima');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }
 public function getDonasi($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
  $this->db->from('donasi_dana a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_dana','Diterima');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}


public function getCountDonasiMenunggu($id_donatur){
 $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
 $this->db->from('donasi_dana a');
 $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
 $this->db->where('a.id_donatur',$id_donatur);
 $this->db->where('a.status_donasi_dana','Upload Bukti');
 $data = $this->db->count_all_results('', FALSE);
 return $data;

}
public function getDonasiMenunggu($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
  $this->db->from('donasi_dana a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_dana','Upload Bukti');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountDonasiDanaPanti($id_panti_asuhan){

   $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
   $this->db->from('donasi_dana a');
   $this->db->join('donatur b','a.id_donatur=b.id_donatur');
   $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
   $this->db->where('a.status_donasi_dana','Diterima');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }

  public function getDonasiDanaPanti($page,$size,$id_panti_asuhan){
  $berita=[];
  $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
  $this->db->from('donasi_dana a');
  $this->db->join('donatur b','a.id_donatur=b.id_donatur');
  $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
  $this->db->where('a.status_donasi_dana','Diterima');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function getCountDonasiUpload($id_donatur){
 $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
 $this->db->from('donasi_dana a');
 $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
 $this->db->where('a.id_donatur',$id_donatur);
 $this->db->where('a.status_donasi_dana','Menunggu Konfirmasi');
 $data = $this->db->count_all_results('', FALSE);
 return $data;

}
public function getDonasiUpload($page,$size,$id_donatur){
  $berita=[];
  $this->db->select('a.id_donasi_dana,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
  $this->db->from('donasi_dana a');
  $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
  $this->db->where('a.id_donatur',$id_donatur);
  $this->db->where('a.status_donasi_dana','Menunggu Konfirmasi');
  $data = $this->db->get('', $size, $page)->result_array();
  $i = 0;
  foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function updateDonasiUang($DataDonasiUang)
{
  $this->db->where('id_donasi_dana',$DataDonasiUang['id_donasi_dana']);
  $this->db->update('donasi_dana',$DataDonasiUang);
}

}
