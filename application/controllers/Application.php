<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Application extends CI_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');
		$this->load->model('session_model');
        $data = array(
			'active_admin_catalog' => '',
			'active_application' => ''
		);
	}

	public function admin()
	{
		$data = array(
			'title' => 'Заявки',
			'active_application' => 'active'
		);
		$this->session_model->check_session();
		$this->parser->parse('application_admin', $data);
	}

	public function insert()
	{
        $fio = $this->input->post('fio');
        $phone = $this->input->post('phone');
		$title = $this->input->post('title');
		$accuracy = $this->input->post('accuracy');
        $copper = $this->input->post('copper');
        $voltage = $this->input->post('voltage');
        $first_current = $this->input->post('first_current');
		$second_connect = $this->input->post('second_connect');
		$second_power = $this->input->post('second_power');
		$second_current = $this->input->post('second_current');
		$security = $this->input->post('security');
		$weight = $this->input->post('weight');
		$height = $this->input->post('height');

        if($copper != '0' && $second_connect != '0' && $accuracy != '0' && $security != '0')
        {
			
			if(isset($_FILES['image'])) 
			{
				$getMime = explode('.', $_FILES['image']['name']);
				$mime = strtolower(end($getMime));  	//расширение
				$types = array('jpg', 'png', 'jpeg'); 	//допустимые расширения
				if(!in_array($mime, $types)) echo 3;
				else $image = $_FILES['image']['name'];
			}

			if(!empty($image))
			{
				$image_path = 'image/catalog/'.$image;
				move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
			}
			else $image_path = null;

			$data = array(
                'fio' => $fio,
                'phone' => $phone,
				'title' => $title,
				'image' => $image_path,
				'accuracy' => $accuracy,
				'copper' => $copper,
				'voltage' => $voltage,
				'first_current' => $first_current,
				'second_connect' => $second_connect,
				'second_power' => $second_power,
				'second_current' => $second_current,
				'security' => $security,
				'weight' => $weight,
				'height' => $height
			);
			$result = $this->ajax_model->insertData('application', $data);
			echo $result;
        }
		else {
            echo 2;
        }
	}

	public function fetchDataforAdmin()
	{
		$resultList = $this->ajax_model->fetchAllData('*', 'application', array());
		$result = array();
		$button = '';
		$i = 1;
		foreach ($resultList as $key => $value) {
			$button = '<a class="btn-sm btn-info text-light mr-1" onclick="editFun('.$value['id'].')"
			 href="#">
			 	<i class="fa fa-retweet" aria-hidden="true"></i>
			 </a>';
			$button .= ' <a class="btn-sm btn-danger text-light" onclick="deleteFun('.$value['id'].')"
			 href="#">
			 	<i class="fa fa-trash" aria-hidden="true"></i>
			 </a>';
			if($value['image'] == null) $value['image'] = 'image/not_photo.jpg';
			$image = '<img src="'.base_url($value['image']).'" class="img-fluid rounded-start" style="height: 100px;">';
			$result['data'][] = array(
				$i++,
                $value['fio'],
                $value['phone'],
				$image,
				$value['title'],
				$button
			);
		}
		echo json_encode($result);
	}
	
	public function getEditData()
	{
		$id = $this->input->post('id');
		$resultData = $this->ajax_model->fetchSingeData('*', 'application', array('id' => $id));
		echo json_encode($resultData);
	}

	public function success()
	{
        $id = $this->input->post('id');
        $image = $this->input->post('image');
		$title = $this->input->post('title');
		$accuracy = $this->input->post('accuracy');
        $copper = $this->input->post('copper');
        $voltage = $this->input->post('voltage');
        $first_current = $this->input->post('first_current');
		$second_connect = $this->input->post('second_connect');
		$second_power = $this->input->post('second_power');
		$second_current = $this->input->post('second_current');
		$security = $this->input->post('security');
		$weight = $this->input->post('weight');
		$height = $this->input->post('height');

		$search = $this->ajax_model->fetchSingeData('title', 'catalog', array('title' => $title));	//проверка по названию
		if($search == true){
			echo 5;
			exit();
		}
        
        $data = array(
            'image' => $image,
            'title' => $title,
            'accuracy' => $accuracy,
            'copper' => $copper,
            'voltage' => $voltage,
            'first_current' => $first_current,
            'second_connect' => $second_connect,
            'second_power' => $second_power,
            'second_current' => $second_current,
            'security' => $security,
            'weight' => $weight,
            'height' => $height
        );
        $update = $this->ajax_model->insertData('catalog', $data);
        if($update == true){
            $this->ajax_model->deleteData('application', array('id' => $id));
            echo $result = 1;
        } 
        
        else echo 2;
	}
	
    public function deleteSingeData()
    {
        $id = $this->input->post('id');
        $dataDelete = $this->ajax_model->deleteData('application', array('id' => $id));
		if($dataDelete == true) echo 1;
		else echo 2;
    }
}
