<?php

class Users_model extends CI_Model
{
    private $table = 'users';

    public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

    public function read()
	{
		return $this->db->get($this->table);
	}

    public function getUser($id)
	{
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}

    public function update($id, $data)
	{
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}
    
    public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	
}
