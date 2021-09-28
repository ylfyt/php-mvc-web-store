<?php  

class User extends Controller{

    public function __construct()
    {
        $this->userModel = $this->model('User_model');
    }

    public function index()
    {
        $data['title'] = 'User Profile';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }


    public function signin()
    {
        if(isset($_SESSION['signin'])){
            header('Location: ' . BASEURL . '/book');
            exit;
        }


        $data['title'] = 'Sign In';

        if (isset($_POST['signin'])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $user = $this->userModel->getUserByUsername($username);

            if ($user != null){ 
                if (password_verify($password, $user['password'])){
                    $_SESSION["signin"] = true;
                    $_SESSION["user-id"] = $user['id'];
                    
                    header('Location: ' . BASEURL . '/book');
                    exit;
                }
            }

            $data['error'] = true;
            $this->view('user/signin', $data);
        }
        else{
            $this->view('user/signin', $data);
        }

    }

    public function signup()
    {
        if(isset($_SESSION['signin'])){
            header('Location: ' . BASEURL . '/book');
            exit;
        }
        
        $data['title'] = 'Sign Up';

        if (isset($_POST['signup'])){
            $username = strtolower(stripslashes($_POST["username"]));
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirm-password"];
            $email = $_POST["email"];

            if ($username === "" || $password === "" || $email === ""){
                $data['error'] = -1;
                $this->view('user/signup', $data);
                exit;
            }

            if ($confirmPassword != $password){
                $data['error'] = -2;
                $this->view('user/signup', $data);
                exit;
            }

            $checkUser = $this->userModel->getUserByUsername($username);
            if ($checkUser){
                $data['error'] = -3;
                $this->view('user/signup', $data);
                exit;
            }

            // encryption
            $password = password_hash($password, PASSWORD_DEFAULT);

            $userData = [
                'username' => $username,
                'email' => $email,
                'password' => $password
            ];

            $data['error'] = $this->userModel->addUser($userData);

            $this->view('user/signup', $data);
        }
        else{
            $this->view('user/signup', $data);
        }

    }

    public function signout(){
        $_SESSION = [];
        session_unset();
        session_destroy();

        header("Location: " . BASEURL . '/user/signin');
        exit;
    }

}