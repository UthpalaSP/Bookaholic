<?php

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');

    }

    public function index()
    {
        $this->load->view('home_view',  array('errmsg' => ''));
    }

    public function register(){

        $this->form_validation->set_rules('first_name','First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name','Last Name', 'trim|min_length[3]');
        $this->form_validation->set_rules('email','Email', 'trim|min_length[3]');
        $this->form_validation->set_rules('username','Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password','Confirm Password', 'trim|required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == FALSE){

            $data['main_view'] = 'user/register_view';
            $this->load->view('layouts/main', $data);

        }else{

            if ($this->user_model->create_user()){

                $this->session->set_flashdata('user_registered','User has been registered');
                redirect('home');

            }

        }

    }

    public function login(){
        $this->form_validation->set_rules('username','Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password', 'trim|required');

        
        if ($this->form_validation->run() == FALSE){

            $data = array(
                'errors' => validation_errors()
            );
            
            $this->session->set_flashdata($data); /*what does this do*/
            
            redirect('home');
            
        } else {
            $username = $this->input->post('username');
            $password= $this->input->post('password');

            $user_id = $this->user_model->login_user($username,$password);
            ;

            if ($user_id){

                $user_data = array(
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true,
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('login_success', 'You are now logged in');
                $data['main_view'] = "admin_view";
                $this->load->view('layouts/main',$data);

            }else {
                $this->session->set_flashdata('login_failed', 'Sorry You have entered wrong credentials');
                redirect('home');
            }

        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }


}