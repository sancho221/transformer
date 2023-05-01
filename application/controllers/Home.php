<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ajax_model');
	}

	public function index()
	{
		$data['title'] = 'Главная';
		$this->parser->parse('main', $data);
		// $this->load->view('table_example');
	}

	public function insert()
	{
		$name = $this->input->post('name');
		$age = $this->input->post('age');

		$data = array(
			'name' => $name,
			'age' => $age
		);
		$insert = $this->ajax_model->insertData('test', $data);
		echo json_encode($insert);
	}

	public function fetchDatafromDatabase()
	{
		$resultList = $this->ajax_model->fetchAllData('*', 'test', array());
		
		$result = array();
		$button = '';
		$i = 1;
		foreach ($resultList as $key => $value) {

			$button = '<a class="btn-sm btn-secondary text-light" onclick="editFun('.$value['id'].')"
			 href="#">Edit</a>';
			 $button .= ' <a class="btn-sm btn-danger text-light" onclick="deleteFun('.$value['id'].')"
			 href="#">Delete</a>';
			$result['data'][] = array(
				$i++,
				$value['name'],
				$value['age'],
				$button
			);
		}
		echo json_encode($result);
	}
	
	public function getEditData()
	{
		$id = $this->input->post('id');
		$resultData = $this->ajax_model->fetchSingeData('*', 'test', array('id' => $id));
		echo json_encode($resultData);
	}

	public function update()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$age = $this->input->post('age');

		$data = array(
			'name' => $name,
			'age' => $age
		);
		$update = $this->ajax_model->updateData('test', $data, array('id' => $id));
		if($update == true)
		{
			echo 1;
		}
		else{
			echo 2;
		}
	}
	
    public function deleteSingeData()
    {
        $id = $this->input->post('id');
        $dataDelete = $this->ajax_model->deleteData('test', array('id' => $id));
		if($dataDelete == true)
		{
			echo 1;
		}
		else{
			echo 2;
		}
    }
}
