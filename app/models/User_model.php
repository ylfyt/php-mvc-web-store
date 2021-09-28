<?php 

class User_model {
    private $table = 'users';
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getUserByUsername($username){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE username=:username';
        $bind = ['username' => $username];
        
        $this->db->query($query, $bind);

        return $this->db->single();
    }

    public function addUser($data)
    {
        $query = "INSERT INTO $this->table
                    VALUES
                    ('', :username, :password, :email)";
        $bind = [
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email']
        ];

        $this->db->query($query, $bind);
        $this->db->execute();

        return $this->db->rowAffected();
    }
}