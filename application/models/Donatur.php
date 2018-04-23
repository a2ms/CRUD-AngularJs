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

  public function getKegiatan_by_id_ditolak($id_donatur)
  {
	  $brt=[];
	  $this->db->select('a.id_kegiatan,a.id_donatur,a.id_panti_asuhan,b.nama_panti_asuhan,a.nama_kegiatan,a.tanggal_kegiatan,a.jam_kegiatan,a.deskripsi_kegiatan,a.status_kegiatan');
	  $this->db->from('kegiatan a');
	  $this->db->join('panti_asuhan b','a.id_kegiatan=b.id_panti_asuhan');
	  $this->db->where('a.id_donatur',$id_donatur);
	  $this->db->where('a.status_kegiatan','Ditolak');
	  $data = $this->db->get('')->result_array();
	  $i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
	  return $brt;
  }

  public function getCountDonaturTetapDiterima($id_panti_asuhan){

   $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_donatur,b.alamat_donatur,b.telp_donatur,b.foto_donatur');
    $this->db->from('donatur_tetap a');
    $this->db->join('donatur b','a.id_donatur=b.id_donatur');
   $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
   $this->db->where('a.status_donatur_tetap','Diterima');
   $data = $this->db->count_all_results('', FALSE);
   return $data;

 }

public function getDonaturTetapDiterima($page, $size,$id_panti_asuhan)
  {
    $brt = [];
    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_donatur,b.alamat_donatur,b.telp_donatur,b.foto_donatur');
    $this->db->from('donatur_tetap a');
    $this->db->join('donatur b','a.id_donatur=b.id_donatur');
    $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	  $this->db->where('a.status_donatur_tetap','Diterima');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $brt[$i] = $row;
    $i++;
    endforeach;
    return $brt;
  }

  public function getCountDonaturTetapMenunggu($id_panti_asuhan){

    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_donatur,b.alamat_donatur,b.telp_donatur,b.foto_donatur');
     $this->db->from('donatur_tetap a');
     $this->db->join('donatur b','a.id_donatur=b.id_donatur');
    $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
    $this->db->where('a.status_donatur_tetap','Menunggu Konfirmasi');
    $data = $this->db->count_all_results('', FALSE);
    return $data;
 }

  public function getDonaturTetapMenunggu($page, $size,$id_panti_asuhan)
  {
    $brt = [];
    $this->db->select('a.id_donatur_tetap,a.id_donatur,a.id_panti_asuhan,a.tanggal_mulai,a.status_donatur_tetap,b.nama_donatur,b.alamat_donatur,b.telp_donatur,b.foto_donatur');
    $this->db->from('donatur_tetap a');
    $this->db->join('donatur b','a.id_donatur=b.id_donatur');
    $this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
	  $this->db->where('a.status_donatur_tetap','Menunggu Konfirmasi');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $brt[$i] = $row;
    $i++;
    endforeach;
    return $brt;
  }

  public function updateStatusDonaturTetap($id_donatur_tetap, $status)
	{
		$this->db->where('id_donatur_tetap',$id_donatur_tetap);
		 $this->db->update('donatur_tetap',$status);

	}

	public function updateStatusDonasiBarang($id_donasi_barang, $status)
	{
		$this->db->where('id_donasi_barang',$id_donasi_barang);
		 $this->db->update('donasi_barang',$status);

	}

	public function updateStatusKegiatan($id_kegiatan, $status)
	{
		$this->db->where('id_kegiatan',$id_kegiatan);
		 $this->db->update('kegiatan',$status);

	}


}
