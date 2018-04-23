<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kegiatan extends CI_Model {

public function getCountKegiatanPantiDisetujui($id_panti_asuhan){

   $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	$this->db->join('donatur b','a.id_donatur=b.id_donatur');
	$this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	$this->db->where('a.status_kegiatan','Disetujui');
	$data = $this->db->count_all_results('', FALSE);
   return $data;
}

  public function getKegiatanPanti_by_id_disetujui($page, $size,$id_panti_asuhan)
  {
	  $brt=[];
	  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	  $this->db->join('donatur b','a.id_donatur=b.id_donatur');
	  $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	  $this->db->where('a.status_kegiatan','Disetujui');
	  $data = $this->db->get('', $size, $page)->result_array();
	  $i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
	  return $brt;
  }

  public function getCountKegiatanPantiMenunggu($id_panti_asuhan){

   $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	$this->db->join('donatur b','a.id_donatur=b.id_donatur');
	$this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	$this->db->where('a.status_kegiatan','Menunggu Konfirmasi');
	$data = $this->db->count_all_results('', FALSE);
   return $data;
}

  public function getKegiatanPanti_by_id_menunggu($page, $size,$id_panti_asuhan)
  {
	  $brt=[];
	  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	  $this->db->join('donatur b','a.id_donatur=b.id_donatur');
	  $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	  $this->db->where('a.status_kegiatan','Menunggu Konfirmasi');
	  $data = $this->db->get('', $size, $page)->result_array();
	  $i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
	  return $brt;
  }

  public function getCountKegiatanPantiDitolak($id_panti_asuhan){

   $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	$this->db->join('donatur b','a.id_donatur=b.id_donatur');
	$this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	$this->db->where('a.status_kegiatan','Ditolak');
	$data = $this->db->count_all_results('', FALSE);
   return $data;
}

  public function getKegiatanPanti_by_id_ditolak($page, $size,$id_panti_asuhan)
  {
	  $brt=[];
	  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_donatur,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	  $this->db->join('donatur b','a.id_donatur=b.id_donatur');
	  $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	  $this->db->where('a.status_kegiatan','Ditolak');
	  $data = $this->db->get('', $size, $page)->result_array();
	  $i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
	  return $brt;
  }
}
