<?php 

class Mahasiswa_model {
    private $table = 'Mahasiswa';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllMahasiswa(){
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function insertData($data)
    {
        $query = "INSERT INTO $this->table
                    VALUES
                    ('', :name, :nim, :email)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();

        return $this->db->rowAffected();
    }

}