<?php 

class Session_model extends CI_Model
{
	public function check_session()
    {
        $role = $this->session->userdata('role');
		if(!isset($role))
		{
			redirect('home/input');
		}
    }
}