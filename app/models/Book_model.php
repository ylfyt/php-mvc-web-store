<?php 

class Book_model {
    private $table = 'books';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBooks(){
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getBookById($id){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id=:id';
        $bind = ['id' => $id];
        
        $this->db->query($query, $bind);

        return $this->db->single();
    }
}