<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiPantiAsuhanModel extends CI_Model {
  public function getCountPanti(){

    $this->db->select('id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan,( 6371 * acos( cos( radians(' . '-7.779226' . ') ) *
      cos( radians( longtitude_panti_asuhan ) ) *
      cos( radians( latitude_panti_asuhan ) -
      radians(' . '110.415064' . ') ) +
      sin( radians('. '-7.779226' .') ) *
      sin( radians( longtitude_panti_asuhan ) ) ) )
      AS distance');
    $this->db->from('panti_asuhan');
    $this->db->where('status_panti_asuhan','Terverifikasi');
    $this->db->order_by('distance','asc');
    $data = $this->db->count_all_results('', FALSE);
    return $data;
  }
  public function getPanti($page,$size){
    $berita=[];
    $this->db->select('id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan,( 6371 * acos( cos( radians(' . '-7.779226' . ') ) *
      cos( radians( longtitude_panti_asuhan ) ) *
      cos( radians( latitude_panti_asuhan ) -
      radians(' . '110.415064' . ') ) +
      sin( radians('. '-7.779226' .') ) *
      sin( radians( longtitude_panti_asuhan ) ) ) )
      AS distance');
    $this->db->from('panti_asuhan');
    $this->db->where('status_panti_asuhan','Terverifikasi');
    $this->db->order_by('distance','asc');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $berita[$i] = $row;
    $i++;
    endforeach;
    return $berita;
  }

  public function getCountPantiRekomendasi(){
    $this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,a.nama_pemilik,a.no_ktp_pemilik,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
    $this->db->from('panti_asuhan a');
    //$this->db->join('donasi_dana b','a.id_panti_asuhan=b.id_panti_asuhan','left');
    $this->db->where('a.status_panti_asuhan','Terverifikasi');
    $this->db->group_by('a.id_panti_asuhan');
    //$this->db->order_by('jumlah','asc');
    $data = $this->db->count_all_results('', FALSE);
    return $data;
  }
  public function getPantiRekomendasi($page,$size){
    $berita=[];
    $this->db->select('a.id_panti_asuhan,a.nama_panti_asuhan,a.nama_pemilik,a.no_ktp_pemilik,a.no_id_panti_asuhan,a.foto_sertifikat_panti_asuhan,a.telp_panti_asuhan,a.rekening_panti_asuhan,a.alamat_panti_asuhan,a.deskripsi_panti_asuhan,a.kebutuhan_panti_asuhan,a.jumlah_anak_laki,a.jumlah_anak_perempuan,a.rentang_usia,a.longtitude_panti_asuhan,a.latitude_panti_asuhan,a.foto_panti_asuhan,a.status_panti_asuhan');
    $this->db->from('panti_asuhan a');
    //$this->db->join('donasi_dana b','a.id_panti_asuhan=b.id_panti_asuhan','left');
    $this->db->where('a.status_panti_asuhan','Terverifikasi');
    $this->db->group_by('a.id_panti_asuhan');
    //$this->db->order_by('jumlah','asc');
    $data = $this->db->get('', $size, $page)->result_array();
    $i = 0;
    foreach($data as $row):
      $berita[$i] = $row;
    $i++;
    endforeach;
    return $berita;
  }


  public function getCountCariPanti($cari){
    $this->db->select('id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan');
    $this->db->from('panti_asuhan');
    $this->db->where('status_panti_asuhan','Terverifikasi');
    $this->db->like('nama_panti_asuhan',$cari);
    $this->db->group_by('id_panti_asuhan','desc');
    $data = $this->db->count_all_results('', FALSE);
    return $data;
  }

  public function getCariPanti($page,$size,$cari){
   $berita=[];
   $this->db->select('id_panti_asuhan,nama_panti_asuhan,nama_pemilik,no_ktp_pemilik,no_id_panti_asuhan,foto_sertifikat_panti_asuhan,telp_panti_asuhan,rekening_panti_asuhan,alamat_panti_asuhan,deskripsi_panti_asuhan,kebutuhan_panti_asuhan,jumlah_anak_laki,jumlah_anak_perempuan,rentang_usia,longtitude_panti_asuhan,latitude_panti_asuhan,foto_panti_asuhan,status_panti_asuhan');
   $this->db->from('panti_asuhan');
   $this->db->where('status_panti_asuhan','Terverifikasi');
   $this->db->like('nama_panti_asuhan',$cari);
   $this->db->order_by('id_panti_asuhan','desc');
   $data = $this->db->get('', $size, $page)->result_array();
   $i = 0;
   foreach($data as $row):
    $berita[$i] = $row;
  $i++;
  endforeach;
  return $berita;
}

public function insertDonasiDana($DataDonasiDana)
{
  $this->db->insert('donasi_dana',$DataDonasiDana);
}

public function insertDonasiBarang($DataDonasiDana)
{
  $this->db->insert('donasi_barang',$DataDonasiDana);
}

public function insertKegiatan($DataDonasiDana)
{
  $this->db->insert('kegiatan',$DataDonasiDana);
}
}
