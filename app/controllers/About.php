<?php 

class About extends Controller{

    public function index($name = 'World')
    {
        $this->view('about/index');
    }

    public function page($name = 'Hello, World!')
    {
        $data['name'] = $name;
        $this->view('about/page', $data);
    }

}