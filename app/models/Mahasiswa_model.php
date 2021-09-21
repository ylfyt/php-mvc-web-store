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
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        $bind = ['id' => $id];
        
        $this->db->query($query, $bind);

        return $this->db->single();
    }

    public function insertData($data)
    {
        $query = "INSERT INTO $this->table
                    VALUES
                    ('', :name, :nim, :email)";
        $bind = [
            'name' => $data['name'],
            'nim' => $data['nim'],
            'email' => $data['email']
        ];

        $this->db->query($query, $bind);
        $this->db->execute();

        return $this->db->rowAffected();
    }

    public function deleteData($id)
    {
        $query = "DELETE FROM $this->table WHERE id = :id";
        $bind = ['id' => $id];

        $this->db->query($query, $bind);
        $this->db->execute();

        return $this->db->rowAffected();
    }

}