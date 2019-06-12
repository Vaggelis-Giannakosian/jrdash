<?php


class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }


    public function login()
    {
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        $encodedPass =  hash('sha256',$password.SALT);
        $user = $this->user_model->authenticateUser($login,$encodedPass);
        $this->output->set_content_type('application_json');
        $output = [];
        if($user){
            $data = ['user_id'=>$user[0]['user_id']];
            $this->session->set_userdata($data);
            $output=['result'=>1];
        }else{
            $output=['result'=>0];
        }
        $this->output->set_output(json_encode($output));
        return false;
    }

    public function get()
    {
        $users = $this->user_model->get();
        print_r($users);
        $this->output->enable_profiler();

    }

    public function insert()
    {
        $user = [
            'login'=>'vakos',
            'email'=>'fonias',
            'password'=>'denthampeispotesou'
        ];
        $userId = $this->user_model->insertUser($user);
        echo  $userId;
    }

    public function update()
    {
        $id=1;
        $user = ['email'=>'Vaggoulo'];
        $result = $this->user_model->updateUser($id,$user);
        echo $result;
    }

    public function delete()
    {
        $id=8;
        $result = $this->user_model->deleteUser($id);
        echo $result;
    }


}