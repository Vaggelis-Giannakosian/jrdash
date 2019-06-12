<?php


class Api extends CI_Controller
{

    //-------------------------------------------


    public function __construct()
    {
        parent::__construct();
    }

    private function _require_login()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id){
            $output=['result'=>0,'error'=>'You are not authorized'];
            $this->output->set_output(json_encode($output));
            return false;
        }
    }

//-------------------------------------------


    public function login()
    {
        $this->load->model('user_model');
        $login = $this->input->post('login');
        $password = $this->input->post('password');
        $encodedPass =  hash('sha256',$password.SALT);
        $user = $this->user_model->authenticateUser($login,$encodedPass);
        $this->output->set_content_type('application_json');
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



//-------------------------------------------


    public function register()
    {
        $this->load->model('user_model');
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

//-------------------------------------------
    public function create_todo()
    {
        $this->_require_login();

    }


//-------------------------------------------


    public function update_todo()
    {
        $this->_require_login();

    }


//-------------------------------------------


    public function delete_todo()
    {
        $this->_require_login();

    }


//-------------------------------------------


    public function create_note()
    {
        $this->_require_login();

    }


//-------------------------------------------


    public function update_note()
    {
        $this->_require_login();

    }


//-------------------------------------------


    public function delete_note()
    {
        $this->_require_login();

    }


}