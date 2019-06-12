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

    public function register()
    {
        $this->output->set_content_type('application_json');
//validation rules
        $this->form_validation->set_rules('login','Login','required|min_length[4]|max_length[16]|is_unique[user.login]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[4]|max_length[16]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
//custom error messages
        $this->form_validation->set_message('required','This field is required');
        $this->form_validation->set_message('valid_email','The email must have the correct format');

        if($this->form_validation->run() == false){
            $this->output->set_output(json_encode(['result'=>0,'error'=>$this->form_validation->error_array()]));
            return false;
        }else{
            $login = $this->input->post('login');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = [
                'login' => $login,
                'email' => $email,
                'password'=> hash('sha256',$password.SALT)
            ];
            $id = $this->user_model->insertUser($user);
        }

        if(isset($id)){
            $data = ['user_id'=>$id ];
            $this->session->set_userdata($data);
            $output=['result'=>1];
        }else{
            $output=['result'=>0,'error'=>'User not created'];
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