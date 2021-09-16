<?php 

class About extends Controller{

    public function index()
    {
        $data['title'] = 'About';

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer', $data);
    }

    public function page($name = 'Hello, World!')
    {
        $data['title'] = 'Pages | About';
        $data['name'] = $name;

        $this->view('templates/header', $data);
        $this->view('about/page', $data);
        $this->view('templates/footer', $data);
    }

}