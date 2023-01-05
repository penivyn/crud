<style>
    body{
        background-image: url('https://th.bing.com/th/id/R.5c29a30edd3d9b0561f9c97f8bf57253?rik=dcC20pisZ4xLQw&riu=http%3a%2f%2fwww.pixelstalk.net%2fwp-content%2fuploads%2f2016%2f10%2fAesthetic-Backgrounds-Free-Download.jpg&ehk=86e%2b0xABp5zs6PMwNkww0pj5COWChyD6ccayVKXz%2bWw%3d&risl=&pid=ImgRaw&r=0');
    }
</style>

<?php

class Login extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('m_data');
    }
    
    function index() {
        $this->load->view('tampil_login');
    }

    function aksi_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5 ($password)
            );
        $cek = $this->m_data->cek_login("admin",$where)->num_rows();
        if($cek > 0){

            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );

            $this->session->set_userdata($data_session);

            redirect (base_url ("kampus"));

        }else{
            echo "<script language=\"javascript\">alert (\"Username atau Password Salah\") ;document.location=\"../login\"</script>";
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}