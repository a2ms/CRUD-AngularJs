<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengguna extends CI_Model {

  public function getPengguna($email,$password,$id_role)
  {
    if($id_role=='3')
    {
      $this->db->select('id_pengguna,email,password,id_role,id_donatur');
    }
    if($id_role=='2')
    {
      $this->db->select('id_pengguna,email,password,id_role,id_panti_asuhan');
    }
    $this->db->from('pengguna');
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $data= $this->db->get('')->row_array();
    return $data;
  }

  public function getDetailPengguna($email,$password)
  {
    $this->db->select('id_role,id_donatur,id_panti_asuhan');
    $this->db->from('pengguna');
    $this->db->where('email',$email);
    $this->db->where('password',$password);
    $data = $this->db->get('')->row_array();
    $num_rows = $this->db->count_all_results('');
    if($num_rows==0)
    {
        return NULL;
    }
    else
      return $data;
  }

  public function cekUsername($email)
  {
    $cek=false;
    $this->db->select('email');
    $this->db->from('pengguna');
    $this->db->where('email',$email);
    $num_rows=$this->db->count_all_results('');
    if($num_rows==0)
    {
      $cek=true;
    }
    return $cek;
  }

  public function insertPengguna($DataPengguna)
  {
    $this->db->insert('pengguna',$DataPengguna);
  }

  public function gantiPassword($id_pengguna,$DataPengguna)
  {
    $this->db->where('id_pengguna',$id_pengguna);
    $this->db->update('pengguna',$DataPengguna);
  }

}
