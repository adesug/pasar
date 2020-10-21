<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Core extends CI_Controller {

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


	
	// public function index()
	// {
	// 	$this->load->view('template/header');
	// 	$this->load->view('order/list');
	// 	$this->load->view('template/footer');
	// }



	
	public function log()
	{
		$query=$this->db->query("select * from log  order by id desc limit 500")->result();
		echo "<table border='1'>";
		foreach($query as $val){
			echo "<tr><td>".$val->timestamp."</td><td>".$val->activity."</td><td>".$val->data."</td></tr>";
		}
		echo "</table>";

	}



	public function chartDetail($trxId)
	{
		$arrChart=$data["arrChart"]=$this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId=$arrChart[0]->user;
		$data["arrUser"]=$this->db->query("SELECT * FROM user where id=$userId")->row();
		$data["arrTrx"]=$this->db->query("SELECT * FROM trx where id=$trxId")->row();
		$data["arrPayment"]=$this->db->query("SELECT * FROM payment where trxId=$trxId")->row();
		$this->load->view('template/header');
		$this->load->view('order/detail',$data);
		$this->load->view('template/footer');
	}

	public function orderCetak()
	{
		$this->load->view('order/cetak');
		$this->load->view('template/footer');
	}

	function getDetailUser($trxId){
		$arrChart=$data["arrChart"]=$this->db->query("SELECT * FROM viewAllChart where trxId=$trxId")->result();
		$userId=$arrChart[0]->user;
		return $this->db->query("SELECT * FROM user where id=$userId")->row();
	}


	public function markAsProcessed($trxId){
		$arrTrx["trxStatus"]="PROCESSED";
		$this->db->where("id",$trxId);
		$this->db->update("trx",$arrTrx);
		$this->writeLog($trxId,$arrTrx["trxStatus"],"Order kamu telah diproses. Terimakasih telah Belanja di Pasar.in :)",1);
		$user=$this->getDetailUser($trxId);
		$mobPhone = preg_replace('/^0?/', '62', $user->mobile);
		redirect("https://api.whatsapp.com/send?phone=$mobPhone&text=Halo%20%20*kak%20".urlencode($user->name)."%2C*%0A%0A*Yay!!!%20Order%20kakak%20sudah%20kami%20terima%2C*%0A%0AMengkonfirmasikan%20terkait%20Order%20Nomor%20%3A%20*$trxId*%20akan%20diproses%20dan%20akan%20dikirimkan%20pada%20jadwal%20pengantaran%20*tebal*%0A%0AKami%20harap%20sobat%20bisa%20menginfomasikan%20*jika%20ada%20kendala*%20ketika%20*belanja%20di%20Pasar.in*%20di%20tengah%20pandemik%20sekarang%20ini.%20Tim%20kami%20akan%20sangat%20*senang%20bisa%20membantu%20sobat*%20%26%20memastikan%20sobat%20mendapatkan%20*pelayanan%20terbaik*%20.%0A%0A_Santi%2C_");
	}


	public function markAsReadyToShip($trxId){
		$arrTrx["trxStatus"]="READY TO SHIP";
		$this->db->where("id",$trxId);
		$this->db->update("trx",$arrTrx);
		$this->writeLog($trxId,$arrTrx["trxStatus"],"Order kamu telah dikemas dan siap diantar.",1);
		$user=$this->getDetailUser($trxId);
		$mobPhone = preg_replace('/^0?/', '62', $user->mobile);
		redirect("https://api.whatsapp.com/send?phone=$mobPhone&text=Halo%20*kak%20".urlencode($user->name)."%2C*%0A%0AMengkonfirmasikan%20terkait%20Order%20Nomor%20%3A%20*$trxId*%20*sudah%20siap%20diantar.*%20System%20sedang%20*menghubungkan%20dengan%20kurir%20terdekat.*%0A%0ATerimakasih%0A_Santi%2C_");
	}

	public function markAsShipped($trxId){
		$arrTrx["trxStatus"]="SHIPPED";
		$this->db->where("id",$trxId);
		$this->db->update("trx",$arrTrx);
		$this->writeLog($trxId,$arrTrx["trxStatus"],"Order kamu sedang diantar. Kurir sedang menuju alamat tujuan.",1);
		$user=$this->getDetailUser($trxId);
		$mobPhone = preg_replace('/^0?/', '62', $user->mobile);
		redirect("https://api.whatsapp.com/send?phone=$mobPhone&text=Halo%20*kak%20".urlencode($user->name)."%2C*%0A%0AMengkonfirmasikan%20terkait%20Order%20Nomor%20%3A%20*$trxId*%20*sudah%20diproses%20untuk%20pengiriman.*%20Order%20tersebut%20dikirim%20dengan%20kurir%20a%2Fn%20*Wahyu*%20nomor%20HP%20*082223584402*.%20%0A%0A*Jika%20ada%20permasalahan*%20terkait%20penerimaan%20barang%20kakak%20bisa%20menghubungi%20kami.%20*Dengan%20senang%20hati*%20kami%20bisa%20*membantu%20kakak.*%0A%0ATerimakasih%0A_Santi%2C_");
	}

	public function markAsComplete($trxId){
		$arrTrx["trxStatus"]="COMPLETED";
		$this->db->where("id",$trxId);
		$this->db->update("trx",$arrTrx);
		$this->writeLog($trxId,$arrTrx["trxStatus"],"Order kamu sudah selesai. Terimakasih telah Belanja di Pasar.in :)",1);
		$user=$this->getDetailUser($trxId);
		$mobPhone = preg_replace('/^0?/', '62', $user->mobile);
		redirect("https://api.whatsapp.com/send?phone=$mobPhone&text=Halo%20%20*kak%20".urlencode($user->name)."*%0A%0A*Transaksi%20pembelian%20$trxId*%20,sudah%20*selesai*%2C%0ATerimakasih%20telah%20menjadi%20*mitra%20belanja%20Pasar.in*%20.%20*Kami%20senang%20bisa%20membantu%20kakak*%20untuk%20berbelanja.%20Jika%20kakak%20sempat%20bisa%20*memberikan%20review*%20belanjaan%20berupa%20foto%20melalui%20pesan%20ini%20dan%20*review%20aplikasi*%20melalui%20http%3A%2F%2Fwww.pasar.in%2Fdownload.%0A%0A*Apakah%20ada%20permasalahan*%20dalam%20pembelian%3F%20Kami%20akan%20*sangat%20senang*%20bisa%20*membantu%20kakak*%20😊😊😊%0A%0A_Santi%2C_");
	}
	public function markAsCancel($trxId){
		$arrTrx["trxStatus"]="CANCELED";
		$this->db->where("id",$trxId);
		$this->db->update("trx",$arrTrx);
		$this->writeLog($trxId,$arrTrx["trxStatus"],"Order Kamu ter-Cancel. Silahkan kontak tim Pasar.in",1);
		$user=$this->getDetailUser($trxId);
		$mobPhone = preg_replace('/^0?/', '62', $user->mobile);		
		redirect("https://api.whatsapp.com/send?phone=$mobPhone&text=Halo%20%20*kak%20".urlencode($user->name)."*%0A%0A*Transaksi%20pembelian%20$trxId*%20, *DIBATALKAN*%20%2C%0ATerimakasih%20telah%20menjadi%20*mitra%20belanja%20Pasar.in*%20.%20*Kami%20senang%20bisa%20membantu%20kakak*%20untuk%20berbelanja.%20Jika%20kakak%20sempat%20bisa%20*memberikan%20review*%20belanjaan%20berupa%20foto%20melalui%20pesan%20ini%20dan%20*review%20aplikasi*%20melalui%20http%3A%2F%2Fwww.pasar.in%2Fdownload.%0A%0A*Apakah%20ada%20permasalahan*%20dalam%20pembelian%3F%20Kami%20akan%20*sangat%20senang*%20bisa%20*membantu%20kakak*%20😊😊😊%0A%0A_Santi%2C_");

	}

	function writeLog($user=0,$activity=0,$dat=0,$notif=0){
		$arrChart=$this->db->query("SELECT * FROM viewAllChart where trxId=$user")->result();
		$trxId=$user;
		$user=$arrChart[0]->user;
		$arrUser=$this->db->query("SELECT * FROM user where id=$user")->row();
		
		$data["user"]=$arrChart[0]->user;
		$data["activity"]=$activity;
		$data["data"]=$dat;
		$data["toNotif"]=$notif;
		$this->db->insert("log",$data);

		$title="Order Nomor #".$trxId;
		$message="Hai ".$arrUser->name.", ".$dat;
		$this->send_notification($arrUser->deviceToken,$title,$message);
		echo $arrUser->deviceToken;

		echo $title;
		echo $message;
	}


	function send_notification_chart(){
		$arrUser=$this->db->query("SELECT chart.trxId,chart.user,user.name,user.deviceTOKEN  FROM pasar.viewAllOnChart chart, pasar.user  user where user.id=chart.user group by trxId")->result();
		foreach($arrUser as $user){
			$title="Hai ".$user->name."!";
			$message="Masih ada Belanja-an kamu dikeranjang, jika ada permasalahan dalam proses berlanja kamu bisa menghubungi 08816743160 via WA/TELP/SMS. Kami senang membantu sobat :) ";
			$this->send_notification($user->deviceTOKEN,$title,$message);
		}
	}


	function send_notification($IDONESIGNAL='', $title='',$message = ''){
		$content = array(
		  "en" => $message,
		  "id" => $message
		  );
		  $heading = array(
			"en" => $title,
			"id" => $title
		 );
		 $user = array($IDONESIGNAL);
	
		$fields = array(
		  'app_id' => "dd30565d-4055-4dab-9818-080b384c0576",
		  'include_player_ids' => $user,
		  //'data' => array("foo" => "bar"),
		  'contents' => $content,
		  'headings' => $heading
		);
	
		$fields = json_encode($fields);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	
		$response = curl_exec($ch);
		curl_close($ch);
	
		var_dump($response);
	  }


	function send_notification_all(){
		

        if($this->input->post()){	
			var_dump($_POST);
			$title=$this->input->post('title');
			$message=$this->input->post('message');
			$content = array(
			"en" => $message,
			"id" => $message
			);
			$heading = array(
				"en" => $title,
				"id" => $title
			);
		
			$fields = array(
				'app_id' => "dd30565d-4055-4dab-9818-080b384c0576",
				// 'include_player_ids' => $user,
				'included_segments' => ["Active Users", "Inactive Users"],
				'contents' => $content,
				'headings' => $heading
			  );
		  
			  $fields = json_encode($fields);
			  $ch = curl_init();
			  curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
			  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Authorization: Basic NDJjY2VkMDMtYmNiMy00MzVkLTgwNjUtZmUzMDFjOWNjYjQ1'));
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			  curl_setopt($ch, CURLOPT_HEADER, FALSE);
			  curl_setopt($ch, CURLOPT_POST, TRUE);
			  curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
			  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		  
			  $response = curl_exec($ch);
			  curl_close($ch);
		  
			  var_dump($response);
			redirect($_SERVER['HTTP_REFERER']."/success");
		}else{
			$this->load->view('template/header');
			$this->load->view('user/notification');
			$this->load->view('template/footer');
		}
	  }
	
}
