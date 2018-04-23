<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panti_asuhan_admin extends CI_Model
{

    public $table = 'panti_asuhan';
	//public $table2 = 'panti_asuhan';
    //public $id = 'id_agenda';
	//public $ida = 'id_host';
	public $id_panti_asuhan='id_panti_asuhan';
	//public $idu = 'id_user';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

   
    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
	
	
    
    //read data
	
	function get_data_panti_b($number,$offset){
		$this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('status_panti_asuhan','terverifikasi');
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
        $query = $this->db->get('',$number,$offset);
        return $query->result();
    }
	
	function get_data_panti_s($number,$offset){
		$this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('status_panti_asuhan','belum_terverifikasi');
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
        $query = $this->db->get('',$number,$offset);
        return $query->result();
    }

	public function jumlah_data_t()
	{
		$this->db->select('*');
		$this->db->from('panti_asuhan');
		$this->db->where('status_panti_asuhan','Terverifikasi');
		$data = $this->db->count_all_results('');
		return $data;
	}
	
	function jumlah_data_b(){
        $this->db->select('*');
		$this->db->from('panti_asuhan');
		$this->db->where('status_panti_asuhan','Belum_Terverifikasi');
		$data = $this->db->count_all_results('');
		return $data;
    }
	
	public function getIdPanti()
  {
    $this->db->select_max('id_panti_asuhan');
    $this->db->from('panti_asuhan');
    $data=$this->db->get('')->row();
    return $data->id_panti_asuhan;
  }
  
  function get_by_id($id_panti_asuhan)
    {
       $this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.nama_pemilik,a.no_ktp_pemilik,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('a.id_panti_asuhan',$id_panti_asuhan);
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
		$data = $this->db->get('')->row();
		return $data;
    }
	
	
	function update($id_panti_asuhan, $data)
    {
        $this->db->where($this->id_panti_asuhan, $id_panti_asuhan);
        $this->db->update($this->table, $data);
    }
	
	function hapus($id_panti_asuhan)
	{
		$this->db->where('id_panti_asuhan', $id_panti_asuhan);
		$this->db->delete('panti_asuhan');
	}

	function hapuspengguna($id_panti_asuhan)
	{
		$this->db->where('id_panti_asuhan', $id_panti_asuhan);
		$this->db->delete('pengguna');
	}
	
	function updateStatus($data)
	{
		$this->db->where('id_panti_asuhan', $data['id_panti_asuhan']);
		$this->db->update('panti_asuhan',$data);
	}
	
	public function cari($cari)
	{
		$cek=true;
		$this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('a.status_panti_asuhan','Terverifikasi');
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
		$this->db->like("a.no_id_panti_asuhan",$cari);
        $this->db->or_like("a.nama_panti_asuhan",$cari);
		$this->db->or_like("a.alamat_panti_asuhan",$cari);
		$num_rows=$this->db->count_all_results('');
		if($num_rows==0)
		{
		  $cek=false;
		}
		return $cek;
	}
	
	public function hasilcari($cari)
	{
		$this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('a.status_panti_asuhan','Terverifikasi');
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
		$this->db->like("a.no_id_panti_asuhan",$cari);
        $this->db->or_like("a.nama_panti_asuhan",$cari);
		$this->db->or_like("a.alamat_panti_asuhan",$cari);
		$query = $this->db->get('');

		return $query->result();
	}
	
	public function caris($cari)
	{
		$cek=true;
		$this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('a.status_panti_asuhan','Belum_Terverifikasi');
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
		$this->db->like("a.no_id_panti_asuhan",$cari);
        $this->db->or_like("a.nama_panti_asuhan",$cari);
		$this->db->or_like("a.alamat_panti_asuhan",$cari);
		$num_rows=$this->db->count_all_results('');
		if($num_rows==0)
		{
		  $cek=false;
		}
		return $cek;
	}
	
	public function hasilcaris($cari)
	{
		$this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,b.email,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
		$this->db->from('panti_asuhan a');
		$this->db->where('a.status_panti_asuhan','Belum_Terverifikasi');
		$this->db->join('pengguna b','a.id_panti_asuhan=b.id_panti_asuhan');
		$this->db->like("a.no_id_panti_asuhan",$cari);
        $this->db->or_like("a.nama_panti_asuhan",$cari);
		$this->db->or_like("a.alamat_panti_asuhan",$cari);
		$query = $this->db->get('');

		return $query->result();
	}
}

/* End of file Admin_Admin_Model.php */
/* Location: ./application/models/Admin_Admin_Model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-11 08:36:41 */
/* http://harviacode.com */
