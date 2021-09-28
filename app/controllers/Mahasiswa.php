<?php 

class Mahasiswa extends Controller {
    
    public function index()
    {
        $data['title'] = 'Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer', $data);
    }

    public function insert()
    {
        if (isset($_POST['insert'])){
            if ($this->model('Mahasiswa_model')->insertData($_POST) > 0){
                Flasher::setFlash('success to', 'insert', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
            else{
                Flasher::setFlash('failed to', 'insert', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        else{
            // TODO: Set error flasher 
            header('Location: ' . BASEURL . '/mahasiswa');
        }
    }

    public function delete()
    {
        if (isset($_POST['delete'])){
            $id = $_POST['id'];
            if ($this->model('Mahasiswa_model')->deleteData($id) > 0){
                Flasher::setFlash('success to', 'delete', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
            else{
                Flasher::setFlash('failed to', 'delete', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        else{
            // TODO: Set error flasher 
            header('Location: ' . BASEURL . '/mahasiswa');
        }
    }

    public function edit()
    {
        if (isset($_POST['edit'])){
            if ($this->model('Mahasiswa_model')->editData($_POST) > 0){
                Flasher::setFlash('success to', 'edit', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
            else{
                Flasher::setFlash('failed to', 'edit', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }
        else{
            // TODO: Set error flasher 
            header('Location: ' . BASEURL . '/mahasiswa');
        }
    }

    public function get(){
        $id = $_POST['id'];
        $mhs = $this->model('Mahasiswa_model')->getMahasiswaById($id);

        echo json_encode($mhs);
    }

}