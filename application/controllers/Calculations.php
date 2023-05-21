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
	
    public function getVoltage()
	{
		$radio = $this->input->post('v_check');
		$power = $this->input->post('v_power');
		$current = $this->input->post('v_current');
		$resist = $this->input->post('v_resist');
		if($radio == 1){
			$result = $power / $current;
		} else if($radio == 2){
			$result = $current * $resist;
		} else if($radio == 3){
			$result = sqrt(($power * $resist));
		}
		if($result == 0.0) $result = 'Упс, нельзя делить на 0';
		echo $result;
	}

	public function getCurrent()
	{
		$radio = $this->input->post('c_check');
		$power = $this->input->post('c_power');
		$voltage = $this->input->post('c_voltage');
		$resist = $this->input->post('c_resist');
		if($radio == 1){
			$result = $power / $voltage;
		} else if($radio == 2){
			$result = sqrt(($power / $resist));
		} else if($radio == 3){
			$result = $voltage / $resist;
		}
		if($result == 0.0) $result = 'Упс, нельзя делить на 0';
		echo $result;
	}

	public function getPower()
	{
		$radio = $this->input->post('p_check');
		$voltage = $this->input->post('p_voltage');
		$current = $this->input->post('p_current');
		$resist = $this->input->post('p_resist');
		if($radio == 1){
			$result = $voltage * $current;
		} else if($radio == 2){
			$result = pow($current, 2) * $resist;
		} else if($radio == 3){
			$result = pow($voltage, 2) / $resist;
		}
		if($result == 0.0) $result = 'Упс, нельзя делить на 0';
		echo $result;
	}

	public function getResist()
	{
		$radio = $this->input->post('r_check');
		$voltage = $this->input->post('r_voltage');
		$current = $this->input->post('r_current');
		$power = $this->input->post('r_power');
		if($radio == 1){
			$result = $voltage / $current;
		} else if($radio == 2){
			$result = $power / pow($current, 2);
		} else if($radio == 3){
			$result = pow($voltage, 2) / $power;
		}
		if($result == 0.0) $result = 'Упс, нельзя делить на 0';
		echo $result;
	}
}
