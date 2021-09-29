<?php 

class Cart_model {
    private $table = 'carts';
    private $itemsTable = 'cart_items'; 
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }

    // public function getAllCarts(){
    //     $this->db->query('SELECT * FROM ' . $this->table);

    //     return $this->db->resultSet();
    // }

    public function getCartByUserId($id){
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id=:id';
        $bind = ['id' => $id];
        
        $this->db->query($query, $bind);

        $cartInfo = $this->db->single();
        $itemsInfo = $this->getItemsByCartId($cartInfo['id']);

        $items = [];
        foreach($itemsInfo as $info){
            array_push($items, [
                'book_id' => $info['book_id'],
                'num' => $info['num']
            ]);
        }

        $cart = [
            'id' => $cartInfo['id'],
            'user_id' => $cartInfo['user_id'],
            'items' => $items
        ];


        return $cart;
    }

    public function getItemsByCartId($id)
    {
        $query = 'SELECT * FROM ' . $this->itemsTable . ' WHERE cart_id=:id';
        $bind = ['id' => $id];

        $this->db->query($query, $bind);

        return $this->db->resultSet();
    }

    public function createCart($userId){
        $query = "INSERT INTO $this->table
                    VALUES
                    ('', :user_id)";
        $bind = [
            'user_id' => $userId
        ];

        $this->db->query($query, $bind);
        $this->db->execute();

        return $this->db->rowAffected();
    }

    public function addItemToCart($userId, $bookId){
        $cart = $this->getCartByUserId($userId);
        
        $query = 'SELECT * FROM ' . $this->itemsTable . ' WHERE cart_id=:cart_id AND book_id=:book_id';
        $bind = [
            'cart_id' => $cart['id'],
            'book_id' => $bookId
        ]; 

        $this->db->query($query, $bind);
        $item = $this->db->single();

        if (!$item){
            $query = "INSERT INTO $this->itemsTable
                        VALUES
                        (:cart_id, :book_id, 1)";
            $bind = [
                'cart_id' => $cart['id'],
                'book_id' => $bookId
            ];

            $this->db->query($query, $bind);
            $this->db->execute();
            return $this->db->rowAffected();
        } else {
            $num = $item["num"];
            $num += 1;

            $query = "UPDATE $this->itemsTable SET
                    num = :num
                WHERE cart_id = :cart_id AND book_id = :book_id";
            
            $bind = [
                'num' => $num,
                'cart_id' => $cart['id'],
                'book_id' => $bookId
            ];

            $this->db->query($query, $bind);
            $this->db->execute();
            return $this->db->rowAffected();
        }

    }

    public function removeItemFromCartBy1($userId, $bookId){
        $cart = $this->getCartByUserId($userId);
        
        $query = 'SELECT * FROM ' . $this->itemsTable . ' WHERE cart_id=:cart_id AND book_id=:book_id';
        $bind = [
            'cart_id' => $cart['id'],
            'book_id' => $bookId
        ]; 

        $this->db->query($query, $bind);
        $item = $this->db->single();

        if (!$item){
            return 0;
        } else {
            $num = $item["num"];
            $num -= 1;

            if ($num == 0)
            {
                $query = "DELETE FROM $this->itemsTable WHERE cart_id = :cart_id AND book_id = :book_id";
                $bind = [
                    'cart_id' => $cart['id'],
                    'book_id' => $bookId
                ];

                $this->db->query($query, $bind);
                $this->db->execute();

                return $this->db->rowAffected();
            } 
            else 
            {
                $query = "UPDATE $this->itemsTable SET
                    num = :num
                WHERE cart_id = :cart_id AND book_id = :book_id";
            
                $bind = [
                    'num' => $num,
                    'cart_id' => $cart['id'],
                    'book_id' => $bookId
                ];

                $this->db->query($query, $bind);
                $this->db->execute();
                return $this->db->rowAffected();
            }

            
        }

    }
}