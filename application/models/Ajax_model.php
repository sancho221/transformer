<?php 

class Ajax_model extends CI_Model
{
	public function insertData($tablename, $data)
	{
		$query = $this->db->insert($tablename,$data);
		return $query;
	}

    public function fetchAllData($data, $tablename, $where)
    {
        $query = $this->db->select($data)
                        ->from($tablename)
                        ->where($where)
                        ->get();
        return $query->result_array();
    }

    public function fetchSingeData($data, $tablename, $where)
    {
        $query = $this->db->select($data)
                        ->from($tablename)
                        ->where($where)
                        ->get();
        return $query->row_array();
    }

    public function updateData($tablename, $data, $where)
    {
        $query = $this->db->update($tablename, $data, $where);
        return $query;
    }

    public function deleteData($tablename, $where)
    {
        $query = $this->db->delete($tablename, $where);
        return $query;
    }
}