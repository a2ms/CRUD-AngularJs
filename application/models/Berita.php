<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Model {

  public function getBerita()
  {
	  $brt=[];
    $this->db->select('a.id_berita,a.judul_berita,a.tanggal_berita,a.foto_berita,a.isi_berita,p.nama_panti_asuhan');
    $this->db->from('berita a');
	$this->db->join('panti_asuhan p','a.id_berita=p.id_panti_asuhan');
  $this->db->order_by('a.id_berita','desc');
    $data = $this->db->get('')->result_array();
	$i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
    return $brt;
  }
  public function getBeritaId($id_panti_asuhan)
  {
	  $brt=[];
    $this->db->select('a.id_berita,a.judul_berita,a.tanggal_berita,a.foto_berita,a.isi_berita,p.nama_panti_asuhan');
    $this->db->from('berita a');
	$this->db->join('panti_asuhan p','a.id_berita=p.id_panti_asuhan');
	$this->db->where('p.id_panti_asuhan',$id_panti_asuhan);
  $this->db->order_by('a.id_berita','desc');
    $data = $this->db->get('')->result_array();
	$i = 0;
        foreach($data as $row):
          $brt[$i] = $row;
          $i++;
      endforeach;
    return $brt;
  }

  public function insertBerita($DataBerita)
  {
    $this->db->insert('berita',$DataBerita);
  }
}
