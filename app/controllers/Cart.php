<?php  

class Cart extends Controller{

    public function __construct()
    {
        $this->cartModel = $this->model('Cart_model');
    }

    public function index()
    {
        if (!isset($_SESSION['signin'])){
            header('Location: ' . BASEURL . '/user/signin');
            exit;
        }
        $userId = $_SESSION['user-id'];
        $cart = $this->cartModel->getCartByUserId($userId);
        
        $totalPrice = 0;
        $items = $cart['items'];

        $bookItems = [];
        foreach ($items as $item){
            $book = $this->model('Book_model')->getBookById($item['book_id']);
            $num = $item['num'];
            
            $totalPrice += $book['price'] * $num;
            array_push($bookItems, [
                'book' => $book,
                'num' => $num
            ]);
        }


        $data = [
            'title' => 'Cart',
            'cart' => $cart,
            'book-items' => $bookItems,
            'total-price' => $totalPrice
        ];

        $this->view('cart/index', $data);
    }

}