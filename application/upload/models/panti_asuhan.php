<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class panti_asuhan extends CI_Model {
	
	
	public function get_data_all_panti()
	{
		$this->db->select('id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan');
		$this->db->from('panti_asuhan');
		$this->db->where('status_panti_asuhan','Terverifikasi');
		$this->db->order_by('id_panti_asuhan','desc');
		$data = $this->db->get('')->result_array();
		return $data;
	}
	
	public function get_data_panti_jarak()
	{
		$sql='select id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan,abs(longitude_panti_asuhan-?)+abs(latitude_panti_asuhan-?) as jarak from panti_asuhan order by jarak asc';
		$query=$this->db->query($sql, array($longitude_panti_asuhan,$latitude_panti_asuhan));
		return $query->result_array();
	}

	public function getPanti_asuhan($id_panti_asuhan)
	  {
		$this->db->select('id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan');
		$this->db->from('panti_asuhan');
		$this->db->where('id_panti_asuhan',$id_panti_asuhan);
		$data = $this->db->get('')->row_array();
		return $data;
	  }

	public function insertPanti_asuhan($DataPanti_asuhan)
	  {
		$this->db->insert('panti_asuhan',$DataPanti_asuhan);
	  }

	public function getIdPanti_asuhan()
	  {
		$this->db->select_max('id_panti_asuhan');
		$this->db->from('panti_asuhan');
		$data=$this->db->get('')->row();
		return $data->id_panti_asuhan;
	  }
}
