<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
        $this->load->library('upload');
    }


    public function user()
    {
        $this->load->view('template/header');
        $data["arrUser"] = $this->db->query("SELECT * FROM user")->result();
        $this->load->view('user/list', $data);
        $this->load->view('template/footer');
    }


    public function detail($id)
    {
        if (!$this->input->post()) {
            $this->load->view('template/header');
            $data["kodeCOD"] = $this->getDistance($id);
            $data["arrUser"] = $this->db->query("SELECT * FROM user where id=$id")->row();
            $data["CountingUser"] = $this->db->query("SELECT * FROM user where id=$id")->num_rows();
            $this->load->view('user/detail', $data);
            $this->load->view('template/footer');
        } else {
            $data = $this->input->post();
            $this->db->where("id", $id);
            $this->db->update("user", $data);
            redirect(base_url() . "user/detail/" . $id . "/success", "location", 301);
        }
    }
    public function editUser($id)
    {
        $this->load->view('template/header');
        $data["kodeCOD"] = $this->getDistance($id);
        $data["arrUser"] = $this->db->query("SELECT * FROM user where id=$id")->row();
        $data["CountingUser"] = $this->db->query("SELECT * FROM user where id=$id")->num_rows();
        $this->load->view('user/edit', $data);
        $this->load->view('template/footer');
    }
    public function update($id)
    {
        $nama = $this->input->post('name');
        $pass = $this->input->post('pass');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $address1 = $this->input->post('address1');
        $long = $this->input->post('long');
        $lat = $this->input->post('lat');
        $deviceToken = $this->input->post('deviceToken');
        $mobile = $this->input->post('mobile');
        $verifToken = $this->input->post('verifToken');
        $statusMember = $this->input->post('statusMember');
        $userDoc1 = $this->input->post('userDoc1');
        $userDoc2 = $this->input->post('userDoc2');
        $lastActifity = $this->input->post('lastActivity');
        $kecamatan = $this->input->post('kecamatan');
        $kabupaten = $this->input->post('kabupaten');
        $kota = $this->input->post('kota');
        $provinsi = $this->input->post('provinsi');

        $data = array(
            'name' => $nama,
            'pass' => $pass,
            'email' => $email,
            'address' => $address,
            'address1' => $address1,
            'long' => $long,
            'lat' => $lat,
            'deviceToken' => $deviceToken,
            'mobile' => $mobile,
            'verifToken' => $verifToken,
            'statusMember' => $statusMember,
            'userDoc1' => $userDoc1,
            'userDoc2' => $userDoc2,
            'lastActivity' => $lastActifity,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'kota' => $kota,
            'provinsi' => $provinsi
        );
        $where = $this->db->where('id', $id);
        $this->db->update('user', $data);
        redirect(base_url() . "user/detail/" . $id . "/success", "location", 301);
    }
    public function historyOrder($id)
    {
        $data["arrTrx"] = $this->db->query("SELECT * FROM allOrder where user=$id")->result();
        $this->load->view('template/header');
        $this->load->view('user/HistoryOrder', $data);
        $this->load->view('template/footer');
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

        if ($d < 1) {
            $return = "COD-1";
        } elseif ($d > 1 && $d < 5) {
            $return = "COD-2";
        } elseif ($d > 5 && $d < 10) {
            $return = "GOSEND-GRABEXPRESS";
        } elseif ($d > 10) {
            $return = "TIKI";
        }
        return $return;
    }

    public function editImg($id)
    {

        $config['upload_path'] = './assets/images_user/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {

            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['file_name'] = $id;
                $config['image_library'] = 'gd2';
                $config['source_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_user/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 600;
                $config['height'] = 600;
                $config['new_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_user/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data["userDoc1"] = $gbr['file_name'];

                $this->db->where("id", $id);
                $this->db->update("user", $data);

                redirect(base_url() . "user/detail/" . $id . "/success", "location", 301);
            }
        } else {
            redirect(base_url() . "user/detail/" . $id . "/failed", "location", 301);
        }
    }

    public function editImg2($id)
    {

        $config['upload_path'] = './assets/images_user/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {

            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['file_name'] = $id;
                $config['image_library'] = 'gd2';
                $config['source_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_user/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '100%';
                $config['width'] = 600;
                $config['height'] = 600;
                $config['new_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images_user/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data["userDoc2"] = $gbr['file_name'];

                $this->db->where("id", $id);
                $this->db->update("user", $data);

                redirect(base_url() . "user/detail/" . $id . "/success", "location", 301);
            }
        } else {
            redirect(base_url() . "user/detail/" . $id . "/failed", "location", 301);
        }
    }


    public function markAsAvailable($id)
    {
        $arr["isAvailable"] = 1;
        $this->db->where("id", $id);
        $this->db->update("user", $arr);
        redirect($_SERVER['HTTP_REFERER'] . "/success");
    }


    public function markAsNotAvailable($id)
    {
        $arr["isAvailable"] = 0;
        $this->db->where("id", $id);
        $this->db->update("user", $arr);
        redirect($_SERVER['HTTP_REFERER'] . "/success");
    }
}
