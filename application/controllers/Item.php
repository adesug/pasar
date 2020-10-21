<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    function __construct()
    {
        parent::__construct('');
        $this->load->library('encryption');
        $this->load->library('upload');
    }

    public function item($cat = NULL)
    {
        $this->load->view('template/header');
        if ($cat != "" && $cat != NULL) {
            $data["arrItem"] = $this->db->query("SELECT * FROM item WHERE category IN (select code from pasar.menu where parent='$cat' or code='$cat')")->result();
        } else {
            $data["arrItem"] = $this->db->query("SELECT * FROM item")->result();
        }
        $this->load->view('item/list', $data);
        $this->load->view('template/footer');
    }


    public function generateHargaHariIni()
    {
        $data["arrItem"] = $this->db->query("SELECT * FROM item order by rand() limit 9")->result();
        $this->load->view('item/generate1', $data);
    }



    public function itemwaitgambar($cat = NULL)
    {
        $this->load->view('template/header');
        if ($cat != "" && $cat != NULL) {
            $data["arrItem"] = $this->db->query("SELECT * FROM item WHERE category='$cat'")->result();
        } else {
            $data["arrItem"] = $this->db->query("SELECT * FROM item where img='' OR img IS NULL")->result();
        }
        $this->load->view('item/list', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        if (!$this->input->post()) {
            $this->load->view('template/header');
            $data["arrItem"] = $this->db->query("SELECT * FROM item where id=$id")->row();
            $data["countDetail"] = $this->db->query("SELECT * FROM item where id=$id")->num_rows();
            $data["item"] = $this->db->get_where('item', ['id' => $id])->row_array();
            $this->load->view('item/detail', $data);
            // var_dump($data['item']);
            // die;
            $this->load->view('template/footer');
        } else {
            $data = $this->input->post();
            $this->db->where("id", $id);
            $this->db->update("item", $data);
            redirect(base_url() . "item/detail/" . $id . "/success", "location", 301);
        }
    }
    public function editItem($id)
    {
        $this->load->view('template/header');
        $data["arrItem"] = $this->db->query("SELECT * FROM item where id=$id")->row();
        $data["countDetail"] = $this->db->query("SELECT * FROM item where id=$id")->num_rows();
        $data["item"] = $this->db->get_where('item', ['id' => $id])->row_array();
        $this->load->view('item/edit', $data);
        $this->load->view('template/footer');
    
        
    }
    public function update($id)
    {
        $name = $this->input->post('name');
        $sdesc = $this->input->post('sdesc');
        $desc1 = $this->input->post('desc1');
        $total = $this->input->post('total');
        $unit = $this->input->post('unit');
        $price = $this->input->post('price');
        $price1 = $this->input->post('price1');
        $price2 = $this->input->post('price2');
        $price3 = $this->input->post('price3');
        $price4 = $this->input->post('price4');
        $diskon = $this->input->post('diskon');
        $category = $this->input->post('category');
        $isAvailable = $this->input->post('isAvailable');
        $img = $this->input->post('img');
        $img_thumb = $this->input->post('img_thumb');
        $img1 = $this->input->post('img1');
        $img2 = $this->input->post('img2');
        $loc = $this->input->post('loc');

        $data = array(
            'name' => $name,
            'sdesc' => $sdesc,
            'desc1' => $desc1,
            'total' => $total,
            'unit' => $unit,
            'price' => $price,
            'price1' => $price1,
            'price2' => $price2,
            'price3' => $price3,
            'price4' => $price4,
            'diskon' => $diskon,
            'category' => $category,
            'isAvailable' => $isAvailable,
            'img' => $img,
            'img_thumb' => $img_thumb,
            'img1' => $img1,
            'img2' => $img2,
            'loc' => $loc
        );
        $where = $this->db->where('id', $id);
        $this->db->update('item', $data);
        redirect(base_url() . "item/detail/" . $id . "/success", "location", 301);
    }
    public function checkItem($id)
    {
        $arr["isAvailable"] = $this->input->get('isAvailable');
        $this->db->where("id", $id);
        $this->db->update("item", $arr);

        $response['message'] = 1;
        $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function add()
    {
        if (!$this->input->post()) {
            $this->load->view('template/header');
            $this->load->view('item/add');
            $this->load->view('template/footer');
        } else {
            $data = $this->input->post();
            $this->db->insert("item", $data);
            $id = $this->db->insert_id();
            redirect(base_url() . "item/detail/" . $id . "/success", "location", 301);
        }
    }


    public function editImg($id)
    {

        $config['upload_path'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/'; //path folder
        $config['allowed_types'] = '*'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        $config['max_size'] = '*';

        $this->upload->initialize($config);
        if (!empty($_FILES['filefoto']['name'])) {

            if ($this->upload->do_upload('filefoto')) {
                $gbr = $this->upload->data();


                //watermark
                $config['wm_type']       = 'overlay';
                $config['wm_overlay_path'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/watermark.png';
                $config['image_library'] = 'gd2';
                $config['source_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/' . $gbr['file_name'];
                $config['wm_opacity'] = 50;
                $config['wm_vrt_alignment'] = 'middle';
                $config['wm_hor_alignment'] = 'center';
                $this->load->library('image_lib', $config);
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->watermark();
                $this->image_lib->clear();

                $data["img"] = $gbr['file_name'];
                $img1 = $gbr['file_name'];
                $this->_create_thumbs($gbr['file_name']);



                if (!empty($_FILES['filefoto2']['name'])) {
                    $this->upload->do_upload('filefoto2');
                    $gbr = $this->upload->data();

                    //watermark
                    $config['wm_type']       = 'overlay';
                    $config['wm_overlay_path'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/watermark.png';
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/' . $gbr['file_name'];
                    $config['wm_opacity'] = 50;
                    $config['wm_vrt_alignment'] = 'middle';
                    $config['wm_hor_alignment'] = 'center';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->watermark();
                    $this->image_lib->clear();

                    $data["img1"] = $gbr['file_name'];
                    $this->_create_thumbs($gbr['file_name']);
                } else {
                    $data["img1"] = $img1;
                }

                if (!empty($_FILES['filefoto3']['name'])) {
                    $this->upload->do_upload('filefoto3');
                    $gbr = $this->upload->data();


                    //watermark
                    $config['wm_type']       = 'overlay';
                    $config['wm_overlay_path'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/watermark.png';
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/' . $gbr['file_name'];
                    $config['wm_opacity'] = 50;
                    $config['wm_vrt_alignment'] = 'middle';
                    $config['wm_hor_alignment'] = 'center';
                    $this->load->library('image_lib', $config);
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    $this->image_lib->watermark();
                    $this->image_lib->clear();


                    $data["img2"] = $gbr['file_name'];
                    $this->_create_thumbs($gbr['file_name']);
                } else {
                    $data["img2"] = $img1;
                }



                $this->db->where("id", $id);
                $this->db->update("item", $data);


                redirect(base_url() . "item/detail/" . $id . "/success", "location", 301);
                // echo $this->image_lib->display_errors();

            } else {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
        } else {
            redirect(base_url() . "item/detail/" . $id . "/failed", "location", 301);
        }
    }



    function _create_thumbs($file_name)
    {
        // Image resizing config
        $config = array(
            // Image Large
            array(
                'image_library' => 'GD2',
                'source_image'  => '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/' . $file_name,
                'maintain_ratio' => TRUE,
                'quality'       => '25%',
                'width'         => 400,
                'height'        => 400,
                'new_image'     => '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/large/' . $file_name
            ),
            // image Medium
            array(
                'image_library' => 'GD2',
                'source_image'  => '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/' . $file_name,
                'maintain_ratio' => TRUE,
                'quality'       => '50%',
                'width'         => 250,
                'height'        => 250,
                'new_image'     => '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/medium/' . $file_name
            ),
            // Image Small
            array(
                'image_library' => 'GD2',
                'source_image'  => '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/' . $file_name,
                'maintain_ratio' => TRUE,
                'quality'       => '25%',
                'width'         => 100,
                'height'        => 100,
                'new_image'     => '/var/www/restapi.xyz/public_html/sys/pasarin/assets/images/small/' . $file_name
            )
        );

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item) {
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                return false;
            }
            $this->image_lib->clear();
        }
    }

    public function delete($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("item");
        redirect(base_url() . "item/item", "location", 301);
    }

    public function markAsAvailable($id)
    {
        $arr["isAvailable"] = 1;
        $this->db->where("id", $id);
        $this->db->update("item", $arr);
        redirect($_SERVER['HTTP_REFERER'] . "/success");
    }


    public function markAsNotAvailable($id)
    {
        $arr["isAvailable"] = 0;
        $this->db->where("id", $id);
        $this->db->update("item", $arr);
        redirect($_SERVER['HTTP_REFERER'] . "/success");
    }


    public function exim()
    {
        $this->load->view('template/header');

        $this->load->view('item/exim');
        $this->load->view('template/footer');
    }

    public function csvdwn()
    {

        $this->db->select('id,name,total,unit,price,price1,price2,price3,diskon,isAvailable,category,loc');
        $data["item"] = $this->db->get('item')->result();
        $this->load->view('item/excel', $data);
    }


    public function csvup()
    {
        $this->load->library('PHPExcel/IOFactory');

        if ($this->input->post('submit')) {
            $path = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/exim/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            // var_dump($error);
            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = IOFactory::identify($inputFileName);
                    $objReader = IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                }

                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
                    $rowData = $sheet->rangeToArray(
                        'A' . $row . ':' . $highestColumn . $row,
                        NULL,
                        TRUE,
                        FALSE
                    );

                    //Sesuaikan sama nama kolom tabel di database                                
                    $data = array(
                        "name" => $rowData[0][1],
                        "total" => $rowData[0][2],
                        "unit" => $rowData[0][3],
                        "price" => $rowData[0][4],
                        "price1" => $rowData[0][5],
                        "price2" => $rowData[0][6],
                        "price3" => $rowData[0][7],
                        "diskon" => $rowData[0][8],
                        "isAvailable" => $rowData[0][9],
                        "category" => $rowData[0][10],
                        "loc" => $rowData[0][11]
                    );
                    //sesuaikan nama dengan nama tabel
                    $this->db->where("id", $rowData[0][0]);
                    $this->db->update("item", $data);
                    // delete_files($media['file_path']);

                }
            }
        }
        // $this->load->view('upload');
        redirect(base_url() . "item/item", "location", 301);
    }



    public function csvadd()
    {
        $this->load->library('PHPExcel/IOFactory');

        if ($this->input->post('submit')) {
            $path = '/var/www/restapi.xyz/public_html/sys/pasarin/assets/exim/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            // var_dump($error);
            if (empty($error)) {
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = IOFactory::identify($inputFileName);
                    $objReader = IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
                }

                $sheet = $objPHPExcel->getSheet(0);
                $highestRow = $sheet->getHighestRow();
                $highestColumn = $sheet->getHighestColumn();

                for ($row = 2; $row <= $highestRow; $row++) {                  //  Read a row of data into an array                 
                    $rowData = $sheet->rangeToArray(
                        'A' . $row . ':' . $highestColumn . $row,
                        NULL,
                        TRUE,
                        FALSE
                    );

                    //Sesuaikan sama nama kolom tabel di database                                
                    $data = array(
                        "name" => $rowData[0][1],
                        "total" => $rowData[0][2],
                        "unit" => $rowData[0][3],
                        "price" => $rowData[0][4],
                        "price1" => $rowData[0][5],
                        "price2" => $rowData[0][6],
                        "price3" => $rowData[0][7],
                        "diskon" => $rowData[0][8],
                        "isAvailable" => $rowData[0][9],
                        "category" => $rowData[0][10],
                        "loc" => $rowData[0][11]
                    );
                    //sesuaikan nama dengan nama tabel
                    $this->db->insert("item", $data);
                    // delete_files($media['file_path']);

                }
            }
        }
        // $this->load->view('upload');
        redirect(base_url() . "item/item", "location", 301);
    }

    public function generate1()
    {
        $data['items'] = $this->db->query("select * from item ORDER BY RAND() limit 6")->result();
        $this->load->view("item/generate1", $data);
    }
}
