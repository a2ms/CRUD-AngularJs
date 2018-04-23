<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class donatur extends CI_Model {

  public function getDonatur($id_donatur)
  {
    $this->db->select('id_donatur,nama_donatur,telp_donatur,alamat_donatur,foto_donatur');
    $this->db->from('donatur');
    $this->db->where('id_donatur',$id_donatur);
    $data = $this->db->get('')->row_array();
    return $data;
  }

  public function insertDonatur($DataDonatur)
  {
    $this->db->insert('donatur',$DataDonatur);
  }

  public function getIdDonatur()
  {
    $this->db->select_max('id_donatur');
    $this->db->from('donatur');
    $data=$this->db->get('')->row();
    return $data->id_donatur;
  }

  public function editProfile($id_donatur,$DataDonatur)
  {
    $this->db->where('id_donatur',$id_donatur);
    $this->db->update('donatur',$DataDonatur);
  }
  
  public function getKegiatan_by_id_disetujui($id_donatur)
  {
	  $brt=[];
	  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	  $this->db->join('panti_asuhan b','a.id_kegiatan=b.id_panti_asuhan');
	  $this->db->where('a.id_donatur',$id_donatur);
	  $this->db->where('a.status_kegiatan','Disetujui');
	  $data = $this->db->get('')->result_array();
	  $i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
	  return $brt;
  }
  
  public function getKegiatan_by_id_menunggu($id_donatur)
  {
	  $brt=[];
	  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	  $this->db->join('panti_asuhan b','a.id_kegiatan=b.id_panti_asuhan');
	  $this->db->where('a.id_donatur',$id_donatur);
	  $this->db->where('a.status_kegiatan','Menunggu');
	  $data = $this->db->get('')->result_array();
	  $i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
	  return $brt;
  }
  
}
