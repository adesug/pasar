<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


	function __construct() {
		parent::__construct();
		$this->load->library('encryption');
		
	}


	public function index()
	{
		$kue=$this->db->query("select * from temandekat.users where accountModerateAt=0")->result();
		foreach($kue as $val){
			$accountModerateAt=$val->regtime;
			$id=$val->id;
			$this->db->query("UPDATE `temandekat`.`users` SET `accountModerateAt`=$accountModerateAt WHERE `id`=$id;");
		}

		$kue=null;

		$kue=$this->db->query("select * from temandekat.photos where moderateAt=0")->result();
		foreach($kue as $val){
			$moderateAt=$val->createAt;
			$id=$val->id;
			$this->db->query("UPDATE `temandekat`.`photos` SET `moderateAt`=$moderateAt WHERE `id`=$id;");
		}


		$this->tda=$this->load->database('temandekat',TRUE);
		$kue=$this->tda->query("select * from tda.users where accountModerateAt=0")->result();
		foreach($kue as $val){
			$accountModerateAt=$val->regtime;
			$id=$val->id;
			$this->tda->query("UPDATE `tda`.`users` SET `accountModerateAt`=$accountModerateAt WHERE `id`=$id;");
		}

		$kue=null;

		$kue=$this->tda->query("select * from tda.photos where moderateAt=0")->result();
		foreach($kue as $val){
			$moderateAt=$val->createAt;
			$id=$val->id;
			$this->tda->query("UPDATE `tda`.`photos` SET `moderateAt`=$moderateAt WHERE `id`=$id;");
		}

	}


	public function cedake($lat,$long){
		$this->tda=$this->load->database('temandekat',TRUE);

		$data['gcm_regid']=uniqid();
		$data['last_authorize']=time();
		$data['lat']=0.0;
		$data['lng']=0.0;
		$this->tda->update("tda.users",$data);

		$result=$this->tda->query("select * from tda.users order by RAND() limit 200")->result();

		foreach ($result as $value) {
			$data['gcm_regid']=uniqid();
			$data['last_authorize']=time();
			$data['lat']=$lat;
			$data['lng']=$long;
			$this->tda->where("id",$value->id);
			$this->tda->update("tda.users",$data);
		}

		
	}


	public function addphoto(){
		$urlPhoto="";
		$userId=rand(1,4000);
		$caption="";
		$this->db->query("INSERT INTO `photos` VALUES (1,$userId,0,0,1,0,0,0,$caption,0,0,$urlPhoto,'$urlPhoto','$urlPhoto','','','','','',0.000000,0.000000,'',1558760100,0,1558760395,'115.178.237.159');");
	}





	
}
