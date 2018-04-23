<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiBeritaModel extends CI_Model {
  public function getCountBerita(){

    $this->db->select('a.id_berita,a.judul_berita,a.tanggal_berita,a.foto_berita,a.isi_berita,p.nama_panti_asuhan');
    $this->db->from('berita a');
    $this->db->join('panti_asuhan p','a.id_berita=p.id_panti_asuhan');
    $this->db->order_by('a.id_berita','desc');
    $data = $this->db->count_all_results('', FALSE);
    return $data;

  }
  public function getBerita($page,$size){
    $berita=[];
    $this->db->select('a.id_berita,a.judul_berita,a.tanggal_berita,a.foto_berita,a.isi_berita,p.nama_panti_asuhan');
    $this->db->from('berita a');
    $this->db->join('panti_asuhan p','a.id_berita=p.id_panti_asuhan');
    $this->db->order_by('a.id_berita','desc');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $berita[$i] = $row;
    $i++;
    endforeach;
    return $berita;
  }

  public function getCountBeritaPanti($id){

    $this->db->select('a.id_berita,a.judul_berita,a.tanggal_berita,a.foto_berita,a.isi_berita,p.nama_panti_asuhan');
    $this->db->from('berita a');
    $this->db->join('panti_asuhan p','a.id_panti_asuhan=p.id_panti_asuhan');
    $this->db->where('a.id_panti_asuhan',$id);
    $this->db->order_by('a.id_berita','ASC');
    $data = $this->db->count_all_results('', FALSE);
    return $data;

  }
  public function getBeritaPanti($page,$size,$id){
    $berita=[];
    $this->db->select('a.id_berita,a.judul_berita,a.tanggal_berita,a.foto_berita,a.isi_berita,p.nama_panti_asuhan');
    $this->db->from('berita a');
    $this->db->join('panti_asuhan p','a.id_panti_asuhan=p.id_panti_asuhan');
    $this->db->where('a.id_panti_asuhan',$id);
    $this->db->order_by('a.id_berita','ASC');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $berita[$i] = $row;
    $i++;
    endforeach;
    return $berita;
  }
}
