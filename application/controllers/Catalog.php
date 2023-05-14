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
			'active_catalog' => ''
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
		$data['title'] = 'Авторизация';
		$this->session_model->check_session();
		$this->parser->parse('catalog_admin', $data);
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

	public function fetchDataforCatalog()
	{
		$resultList = $this->ajax_model->fetchAllData('*', 'catalog', array());
		echo json_encode($resultList);
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
