<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('encryption');
        $this->load->library('upload');
	}


	public function index()
	{
		$data['title'] = "Dashboard";
        $this->load->view('template/headerDashboard',$data);
		$data["arrUser"]=$this->db->query("SELECT * FROM user")->result();
		$query["users"] = $this->db->query("SELECT COUNT(id) as totaluser FROM user")->result_array();
		$query["items"] = $this->db->query("SELECT COUNT(id) as totalItem FROM item")->result_array();
		$query["onchart"] = $this->db->query("select count(id) as totalOnChart from allOrder where trxStatus = 'ONCHART'")->result_array();
		$query["complete"] = $this->db->query("select count(id) as totalCompleted from allOrder where trxStatus = 'completed'")->result_array();
		$query["cancel"] = $this->db->query("select count(id) as totalCanceled from allOrder where trxStatus = 'canceled'")->result_array();
		$query["order"] = $this->db->query("select count(id) as totalOrder from allOrder")->result_array();
		// $this->load->view('user/list',$data);
		$this->load->view('Dashboard',$query);
		$this->load->view('template/footer');
    }
}