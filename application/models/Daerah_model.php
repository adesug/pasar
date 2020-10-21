<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daerah_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

	public function getProv()
	{
		$sql="SELECT * FROM db_daerah.provinsi";
		$query=$this->db->query($sql);
		return $query->result();
	}

	public function getKab($id_prov)
	{
	  $sql="SELECT * FROM db_daerah.kabupaten WHERE id_prov={$id_prov} ORDER BY nama";
	  $query=$this->db->query($sql);
      return $query->result();
	}

	public function getKec($id_kab)
	{
	  $sql="SELECT * FROM db_daerah.kecamatan WHERE id_kab={$id_kab} ORDER BY nama";
	  $query=$this->db->query($sql);
      return $query->result();
	}

	public function getKel($id_kec)
	{
	  $sql="SELECT * FROM db_daerah.kelurahan WHERE id_kec={$id_kec} ORDER BY nama";
	  $query=$this->db->query($sql);
      return $query->result();
	}
}
