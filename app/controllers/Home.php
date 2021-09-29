<?php  

class Home extends Controller{

    public function index()
    {

        header('Location: ' . BASEURL . '/user');
        exit;

        $data['title'] = 'Home';

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer', $data);
    }

}