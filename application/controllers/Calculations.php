<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculations extends CI_Controller {	

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

    public function getRate()
    {
            $first = $this->input->post('first_current_r');
            $second = $this->input->post('second_current_r');
            $result = $first / $second;
            if($result != 0) echo $result;
            else if ($result == 0.0) echo $result = 'Упс, нельзя делить на 0';
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
