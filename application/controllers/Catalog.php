<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');
		$this->load->model('session_model');
		$data = array(
			'active_calculation' => '',
			'active_guide' => '',
			'active_catalog' => '',
			'active_admin_catalog' => ''
		);
	}

	public function index()
	{
		$data = array(
			'title' => 'Каталог',
			'active_catalog' => 'active'
		);
		$this->parser->parse('catalog', $data);
	}

	public function detail()
	{
		$data = array(
			'title' => 'Каталог',
			'active_catalog' => 'active'
		);
		$this->parser->parse('detail', $data);
	}

	public function admin()
	{
		$data = array(
			'title' => 'Каталог',
			'active_admin_catalog' => 'active'
		);
		$this->session_model->check_session();
		$this->parser->parse('catalog_admin', $data);
	}

	public function insert()
	{
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
			$result = $this->ajax_model->insertData('catalog', $data);
			echo $result;
        }
		else {
            echo 2;
        }
	}

	public function fetchDataforCatalog()
	{
		$resultList = $this->ajax_model->fetchAllData('*', 'catalog', array());
		echo json_encode($resultList);
	}

	public function fetchDataforAdmin()
	{
		$resultList = $this->ajax_model->fetchAllData('*', 'catalog', array());
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
		$resultData = $this->ajax_model->fetchSingeData('*', 'catalog', array('id' => $id));
		echo json_encode($resultData);
	}

	public function getDataGet()
	{
		$id = $this->input->get('id');
		$resultData = $this->ajax_model->fetchSingeData('*', 'catalog', array('id' => $id));
		echo json_encode($resultData);
	}

	public function update()
	{
		$id = $this->input->post('id');

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

		$search = $this->ajax_model->fetchSingeData('title', 'catalog', array('title' => $title, 'id !=' => $id));	//проверка по названию
		if($search == true){
			echo 5;
			exit();
		}

		if($copper != '0' && $second_connect != '0' && $accuracy != '0' && $security != '0')
		{
			if(isset($_FILES['image'])) 
			{
				$getMime = explode('.', $_FILES['image']['name']);
				$mime = strtolower(end($getMime));  	//расширение
				$types = array('jpg', 'png', 'jpeg'); 	//допустимые расширения
				if(!in_array($mime, $types)) $result = 3;
				else $image = $_FILES['image']['name'];
			}

			if(!empty($image))
			{
				$image_path = 'image/catalog/'.$image;
				move_uploaded_file($_FILES["image"]["tmp_name"], $image_path);
			}
			else $image_path = null;

			$data = array(
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
			if($image_path != null){
				$data = array('image' => $image_path);
			}
			$update = $this->ajax_model->updateData('catalog', $data, array('id' => $id));

			if($update == true) echo $result = 1;
			else echo 2;
		}
		else echo 4;
		
	}
	
    public function deleteSingeData()
    {
        $id = $this->input->post('id');
        $dataDelete = $this->ajax_model->deleteData('catalog', array('id' => $id));
		if($dataDelete == true) echo 1;
		else echo 2;
    }
}
