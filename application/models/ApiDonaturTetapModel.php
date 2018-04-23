<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiDonaturTetapModel extends CI_Model {
  public function getCountDonaturTetap($id_donatur){

    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_panti_asuhan,b.alamat_panti_asuhan,b.kebutuhan_panti_asuhan,b.foto_panti_asuhan');
    $this->db->from('donatur_tetap a');
    $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
    $this->db->where('a.id_donatur',$id_donatur);
    $this->db->where('a.status_donatur_tetap','Diterima');
    $data = $this->db->count_all_results('', FALSE);
    return $data;

  }
  public function getDonaturTetap($page,$size,$id_donatur){
    $berita=[];
    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_panti_asuhan,b.alamat_panti_asuhan,b.kebutuhan_panti_asuhan,b.foto_panti_asuhan');
    $this->db->from('donatur_tetap a');
    $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
    $this->db->where('a.id_donatur',$id_donatur);
    $this->db->where('a.status_donatur_tetap','Diterima');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $berita[$i] = $row;
    $i++;
    endforeach;
    return $berita;
  }

   public function getCountDonaturTetapMenunggu($id_donatur){

    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_panti_asuhan,b.alamat_panti_asuhan,b.kebutuhan_panti_asuhan,b.foto_panti_asuhan');
    $this->db->from('donatur_tetap a');
    $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
    $this->db->where('a.id_donatur',$id_donatur);
    $this->db->where('a.status_donatur_tetap','Menunggu');
    $data = $this->db->count_all_results('', FALSE);
    return $data;

  }
  public function getDonaturTetapMenunggu($page,$size,$id_donatur){
    $berita=[];
    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_panti_asuhan,b.alamat_panti_asuhan,b.kebutuhan_panti_asuhan,b.foto_panti_asuhan');
    $this->db->from('donatur_tetap a');
    $this->db->join('panti_asuhan b','a.id_panti_asuhan=b.id_panti_asuhan');
    $this->db->where('a.id_donatur',$id_donatur);
    $this->db->where('a.status_donatur_tetap','Menunggu');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $berita[$i] = $row;
    $i++;
    endforeach;
    return $berita;
  }
  public function insertKegiatan($DataDonasiDana)
{
  $this->db->insert('donatur_tetap',$DataDonasiDana);
}

public function cekDonaturTetap($id_donatur_tetap,$id_panti_asuhan)
  {
    $cek=true;
    $this->db->select('*');
    $this->db->from('donatur_tetap');
    $this->db->where('id_donatur',$id_donatur_tetap);
    $this->db->where('id_panti_asuhan',$id_panti_asuhan);
    $num_rows=$this->db->count_all_results('');
    if($num_rows==0)
    {
      $cek=false;
    }
    return $cek;
  }

  public function delete($id)
  {
    $this->db->where('id_donatur_tetap', $id);
    $this->db->delete('donatur_tetap');
  }
}
