<?php


class Home extends CI_Controller
{

    public function index(){
        $this->load->view('home/inc/header_view');
        $this->load->view('home/home_view');
        $this->load->view('home/inc/footer_view');
    }

    public function register()
    {
        $this->load->view('home/inc/header_view');
        $this->load->view('home/register_view');
        $this->load->view('home/inc/footer_view');
    }

    public function code()
    {
//        //CodeIgniter encryption class
//        $this->load->library('encryption');
//        $text = 'makis';
//        $encoded='e0bdbdcddb7642a2f6991d312ac7b581ba0b671418e3cec730607ec15c64f3fb0dd9f3ceef3c072efa60987317be6fcd935e52afe691ab7c8bbaaf4b6c61e9a0EcYx/2ynYIL5r9dBqkE5QQzcQ6fdwWI2/9kaD0a1e7DRoG50sQqS/n8oJLtbohie';
//        $ciphertext = $this->encryption->encrypt($text);
//        $original = $this->encryption->decrypt($encoded);
//       echo $ciphertext;

       //php built in hash function salted
       echo hash('sha256','makis'.SALT);
    }



}