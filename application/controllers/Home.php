<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {	

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
			'title' => 'Расчеты',
			'active_calculation' => 'active'
		);
		$this->parser->parse('home_page', $data);
	}

	public function guide()
	{
		$data = array(
			'title' => 'Справочник',
			'active_guide' => 'active'
		);
		$this->parser->parse('guide', $data);
	}

	public function input()
	{
		$data['title'] = 'Авторизация';
		if(!empty($this->input->post('sign')))
		{
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$data['user'] = $this->ajax_model->fetchSingeData('*', 'user', array('login' => $login, 'password' => $password));
			if(!empty($data['user']))
			{
				$session = array(
					'id' => $data['user']['id'],
					'role' => $data['user']['role']
				);
				$this->session->set_userdata($session);
			}
		}
		$role = $this->session->userdata('role');
		if(isset($role))
		{
			if($role == 1)
			{
				redirect('catalog/admin');
			}
		}
		$this->parser->parse('authorization', $data);
	}

	public function out()
	{
		$_SESSION = array();
		unset($_SESSION);
		redirect('home/input');
	}
}
