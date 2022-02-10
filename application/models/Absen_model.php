<?php

class Absen_model extends CI_Model
{
    private $table = 'absen';

    public function create($data)
	{
		return $this->db->insert($this->table, $data);
	}

    public function read()
	{
		return $this->db->get($this->table);
	}

    public function readrekap()
    {

        $query = $this->db->query("SELECT users.`nama`, absen.`waktu`, absen.`status`, absen.`jenis`
        FROM absen, users WHERE users.`id` = absen.`id_user` ");
        return $query;
    }

    public function readrekapUser($id)
    {

        $query = $this->db->query("SELECT users.`nama`, absen.`waktu`, absen.`status`, absen.`jenis`
        FROM absen, users WHERE users.`id` = absen.`id_user`AND absen.`id_user` = '$id' ");
        return $query;
    }

    public function addAbsen($data)
	{
		return $this->db->insert($this->table, $data);
	}


}
