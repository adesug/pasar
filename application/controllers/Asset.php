<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset extends CI_Controller {

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
        $this->load->library('upload');
        
		
	}
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('asset/upload');
		$this->load->view('template/footer');
    }

    public function upload(){

        $config['upload_path'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_slide/'; //path folder
        $config['allowed_types'] = 'jpg'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '*'; 
        
        $new_name="slide-1";
        $config['file_name'] = $new_name;
        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            unlink("/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_slide/slide-1.jpg");
 
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                var_dump($gbr);

            }else{
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
        }

            if(!empty($_FILES['filefoto2']['name'])){
                unlink("/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_slide/slide-2.jpg");
                $config['file_name']="slide-2.jpg";
                $this->upload->initialize($config);
                if ($this->upload->do_upload('filefoto2')){
                    $gbr = $this->upload->data();
                    var_dump($gbr);
    
                }else{
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                }
            }
            if(!empty($_FILES['filefoto3']['name'])){
                unlink("/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_slide/slide-3.jpg");
                $config['file_name']="slide-3.jpg";
                $this->upload->initialize($config);
                if ($this->upload->do_upload('filefoto3')){
                    $gbr = $this->upload->data();
                    var_dump($gbr);
    
                }else{
                    $error = array('error' => $this->upload->display_errors());
                    var_dump($error);
                }
            }
            // redirect(base_url()."asset/index","location",301);

            
        
    }
}