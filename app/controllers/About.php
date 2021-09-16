<?php 

class About extends Controller{

    public function index($name = 'World')
    {
        $this->view('about/index');
    }

    public function page()
    {
        $this->view('about/page');
    }

}