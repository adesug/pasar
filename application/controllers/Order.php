<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
	}

	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('order/list');
		$this->load->view('template/footer');
	}

	public function chart()
	{
		$this->load->view('template/header');
		$data["arrTrx"]=$this->db->query("SELECT allOrder.id,allOrder.name,allOrder.mobile,allOrder.address,allOrder.trxStatus,getDate.createOn as updateOn FROM allOrder,(select trxId,createOn from (SELECT * FROM pasar.chart order by createOn desc) as q group by trxId order by createOn desc) as getDate where allOrder.id=getDate.trxId and trxStatus='ONCHART' AND allOrder.id in (SELECT trxid FROM pasar.viewAllChart);")->result();
		$this->load->view('order/listChart',$data);
		$this->load->view('template/footer');
	}
	
	public function order()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus!='ONCHART'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}

	public function orderDetail($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data['arrShip'] = $this->getDistance($arrChart[0]->user);
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["CountingarrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->num_rows();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["CountingArrTrx"]=$this->db->query("SELECT * FROM trx where id=$trxId")->num_rows();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$data["CountingarrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->num_rows();
		$this->load->view('template/header');
		$this->load->view('order/detail', $data);
		$this->load->view('template/footer');
	}
	public function orderDetailOnChart($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data['arrShip'] = $this->getDistance($arrChart[0]->user);
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["CountingarrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->num_rows();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["CountingArrTrx"]=$this->db->query("SELECT * FROM trx where id=$trxId")->num_rows();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$data["CountingarrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->num_rows();
		$this->load->view('template/header');
		$this->load->view('order/detailOrderOnChart', $data);
		$this->load->view('template/footer');
	}


	public function orderDetailSimple($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header_nota');
		$this->load->view('order/detail_simple', $data);
		$this->load->view('template/footer');
	}

	public function chartdetail($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header_nota');
		$this->load->view('order/chart', $data);
		$this->load->view('template/footer');
	}

	public function order_chart($id)
	{
		if (!$this->input->post()) {
			$data["arrCart"] = $this->db->query("SELECT * FROM chart where id=$id")->row();
			$this->load->view('template/header');
			$this->load->view('order/detail_chart', $data);
			$this->load->view('template/footer');
		} else {
			$data = $this->input->post();
			$this->db->where("id", $id);
			$this->db->update("chart", $data);
			redirect(base_url() . "order/order_chart/" . $id . "/success", "location", 301);
		}
	}

	public function orderCetak($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header_cetak');
		$this->load->view('order/cetak', $data);
		$this->load->view('template/footer');
	}

	public function orderCetak2($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header_nota');
		$this->load->view('order/cetak2', $data);
		$this->load->view('template/footer');
	}

	public function orderCetakonchart($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header_cetak');
		$this->load->view('order/cetakonchart', $data);
		$this->load->view('template/footer');
	}

	public function orderCetak2onchart($trxId)
	{
		$arrChart = $data["arrChart"] = $this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId = $arrChart[0]->user;
		$data["arrUser"] = $this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"] = $this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"] = $this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header_nota');
		$this->load->view('order/cetakonchart2', $data);
		$this->load->view('template/footer');
	}



	public function orderWaiting()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus='WAITING ORDER CONFIRMATION'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}

	public function orderProcessed()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus='PROCESSED'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}

	public function orderReadyToShip()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus='READY TO SHIP'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}

	public function orderShipped()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus='SHIPPED'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}


	public function orderCompleted()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus='COMPLETED'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}

	public function orderCanceled()
	{
		$this->load->view('template/header');
		$data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where trxStatus='CANCELED'")->result();
		$this->load->view('order/list', $data);
		$this->load->view('template/footer');
	}



	function compareTime($time = "1556598920")
	{
		$week = strtotime("-1 week");
		if ($time < $week) {
			echo 1;
		} else {
			echo 0;
		}
	}



	function getDistance($user)
	{
		$userdata = $this->db->query("Select * from user where id=$user")->row();
		$latitude2 = $userdata->lat;
		$longitude2 = $userdata->long;

		$earth_radius = 6371;
		$latitude1 = "-7.4263718";
		$longitude1 = "109.248178";
		$dLat = deg2rad($latitude2 - $latitude1);
		$dLon = deg2rad($longitude2 - $longitude1);

		$a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon / 2) * sin($dLon / 2);
		$c = 2 * asin(sqrt($a));
		$d = $earth_radius * $c;

		if ($d < 0.5) {
			$return['kodeKirim'] = "COD-1";
			$return['biayaKirim'] = "3000";
		} elseif ($d > 0.5 && $d < 2) {
			$return['kodeKirim'] = "COD-13";
			$return['biayaKirim'] = "9000";
		} elseif ($d > 2 && $d < 4.5) {
			$return['kodeKirim'] = "COD-35";
			$return['biayaKirim'] = "10000";
		} elseif ($d > 4.5 && $d < 6.5) {
			$return['kodeKirim'] = "COD-57";
			$return['biayaKirim'] = "12000";
		} elseif ($d > 6.5 && $d < 7.5) {
			$return['kodeKirim'] = "COD-67";
			$return['biayaKirim'] = "14000";
		} elseif ($d > 7.5 && $d < 8.5) {
			$return['kodeKirim'] = "COD-78";
			$return['biayaKirim'] = "18000";
		} elseif ($d > 9.5 && $d < 10.5) {
			$return['kodeKirim'] = "COD-910";
			$return['biayaKirim'] = "20000";
		} elseif ($d > 10.5) {
			$return['kodeKirim'] = "TIKI";
			$return['biayaKirim'] = "30000";
		}

		return $return;
	}

	public function testtoken()
	{
		$this->load->helper('security');
		echo $token = encrypt_url("1." . time());
		echo "<br>";
		echo $tokenex = decrypt_url($token);
		echo "<br>";
		$tokenex = explode(".", $tokenex);
		echo "<br>";
		var_dump($tokenex);
		$this->compareTime($tokenex);
	}
}
