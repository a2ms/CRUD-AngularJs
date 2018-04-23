<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Donasi_admin extends CI_Model
{

    public $table = 'donasi_barang';
	public $table2 = 'donatur';
	public $table3 = 'panti_asuhan';
	public $table4 = 'donasi_dana';
    //public $id = 'id_agenda';
	//public $ida = 'id_host';
	//public $idu = 'id_user';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

   
    // insert data
    /*function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
	
	function insertk($datak)
    {
        $this->db->insert($this->table2, $datak);
    }*/
    
    //read data
	
	function get_data_dana($number,$offset){
		$this->db->select('a.id_donasi_dana,b.nama_donatur,c.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
		$this->db->from('donasi_dana a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
        $query = $this->db->get('',$number,$offset);
        return $query->result();
    }
	
	function get_data_barang($number,$offset){
		$this->db->select('a.id_donasi_barang,b.nama_donatur,c.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
		$this->db->from('donasi_barang a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
        $query = $this->db->get('',$number,$offset);
        return $query->result();
    }
		

	function jumlah_data(){
        return $this->db->get('donasi_dana')->num_rows();
    }
	function jumlah_data2(){
        return $this->db->get('donasi_barang')->num_rows();
    }
	
	function hapusDana($id_donasi_dana)
		{
			$this->db->where('id_donasi_dana', $id_donasi_dana);
			$this->db->delete('donasi_dana');
		}
		
	function hapusBarang($id_donasi_barang)
		{
			$this->db->where('id_donasi_barang', $id_donasi_barang);
			$this->db->delete('donasi_barang');
		}
		
	public function get_by_id_view($id_donasi_dana)
	{
		$this->db->select('a.id_donasi_dana,b.nama_donatur,c.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
		$this->db->from('donasi_dana a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
		$this->db->where('a.id_donasi_dana',$id_donasi_dana);
		$query = $this->db->get();

		return $query->row();
	}
	
	public function get_by_id_view_barang($id_donasi_barang)
	{
		$this->db->select('a.id_donasi_barang,b.nama_donatur,b.telp_donatur,b.alamat_donatur,b.foto_donatur,c.nama_panti_asuhan,c.telp_panti_asuhan,c.alamat_panti_asuhan,c.foto_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
		$this->db->from('donasi_barang a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
		$this->db->where('a.id_donasi_barang',$id_donasi_barang);
		$query = $this->db->get();

		return $query->row();
	}
	
	//delete data
	//get_by_id_edit
	
	//edit data
	function update($id_donasi_barang, $data)
    {
        $this->db->where($this->id_donasi_barang, $id_donasi_barang);
        $this->db->update($this->table, $data);
    }
	
	function updateBarang($data)
	{
		$this->db->where('id_donasi_barang', $data['id_donasi_barang']);
		$this->db->update('donasi_barang',$data);
	}
	
	public function get_by_id_edit($id_donasi_barang)
	{
		$this->db->from($this->table);
		$this->db->where('id_donasi_barang',$id_donasi_barang);
		$query = $this->db->get();
		return $query->row();
	}
	
	public function cari($cari)
	{
		$cek=true;
		$this->db->select('a.id_donasi_barang,b.nama_donatur,c.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
		$this->db->from('donasi_barang a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
		$this->db->like("b.nama_donatur",$cari);
        $this->db->or_like("c.nama_panti_asuhan",$cari);
		$this->db->or_like("a.tanggal_donasi_barang",$cari);
        $this->db->or_like("a.status_donasi_barang",$cari);
		$num_rows=$this->db->count_all_results('');
		if($num_rows==0)
		{
		  $cek=false;
		}
		return $cek;
	}
	
	public function hasilcari($cari)
	{
		$this->db->select('a.id_donasi_barang,b.nama_donatur,c.nama_panti_asuhan,a.nama_donasi_barang,a.tanggal_donasi_barang,a.jam_donasi_barang,a.deskripsi_donasi_barang,a.status_donasi_barang');
		$this->db->from('donasi_barang a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
		$this->db->like("b.nama_donatur",$cari);
        $this->db->or_like("c.nama_panti_asuhan",$cari);
		$this->db->or_like("a.tanggal_donasi_barang",$cari);
        $this->db->or_like("a.status_donasi_barang",$cari);
		
		$query = $this->db->get('');

		return $query->result();
	}
	
	public function caris($cari)
	{
		$cek=true;
		$this->db->select('a.id_donasi_dana,b.nama_donatur,c.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
		$this->db->from('donasi_dana a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
		$this->db->like("b.nama_donatur",$cari);
        $this->db->or_like("c.nama_panti_asuhan",$cari);
		$this->db->or_like("a.tanggal_donasi_dana",$cari);
        $this->db->or_like("a.nominal_donasi_dana",$cari);
		$num_rows=$this->db->count_all_results('');
		if($num_rows==0)
		{
		  $cek=false;
		}
		return $cek;
	}
	
	public function hasilcaris($cari)
	{
		$this->db->select('a.id_donasi_dana,b.nama_donatur,c.nama_panti_asuhan,a.nominal_donasi_dana,a.tanggal_donasi_dana,a.foto_bukti_transfer,a.status_donasi_dana');
		$this->db->from('donasi_dana a');
		$this->db->join('donatur b','a.id_donatur=b.id_donatur');
		$this->db->join('panti_asuhan c','a.id_panti_asuhan=c.id_panti_asuhan');
		$this->db->like("b.nama_donatur",$cari);
        $this->db->or_like("c.nama_panti_asuhan",$cari);
		$this->db->or_like("a.tanggal_donasi_dana",$cari);
        $this->db->or_like("a.nominal_donasi_dana",$cari);
		
		$query = $this->db->get('');

		return $query->result();
	}
}

/* End of file Admin_Admin_Model.php */
/* Location: ./application/models/Admin_Admin_Model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-08-11 08:36:41 */
/* http://harviacode.com */
