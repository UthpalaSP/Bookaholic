<?php

class book extends CI_Controller
{

    function __construct()
    {
        parent::__construct(); /*learn more*/

        $this->load->model('book_model');
        $this->load->model('category_model');

        if (!$this->session->userdata('logged_in')){

            $this->session->set_flashdata('no_access', 'Sorry you are not allowed or logged in');
            redirect('home');
        }
    }

    public function index()
    {
        $data['books'] = $this->book_model->get_books();
        $data['text'] = '';

        $data['main_view'] = "book/index";
        $this->load->view('layouts/main',  $data);
    }

    public function create(){

        $this->form_validation->set_rules('book_name','Book Name', 'trim|required');
        $this->form_validation->set_rules('book_description','Book Description', 'trim');
        $this->form_validation->set_rules('price','Price', 'trim|required|greater_than[0]|decimal');
        $this->form_validation->set_rules('author','Auhtor', 'required|trim');

        if (!empty($_FILES['image']['name'])){
            $config['upload_path'] = 'C:\xampp\htdocs\Bookaholic\assets\images\books';// './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
        }

        if ($this->form_validation->run() == FALSE){

            $errors = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($errors);

            $data['categories'] = $this->category_model->get_categories();
            $data['main_view'] = 'book/create_book';
            $this->load->view('layouts/main', $data);

        } else {

            //user_id is the logged admin
            $data = array(

                'user_id' => $this->session->userdata('user_id'),
                'book_name' => $this->input->post('book_name'),
                'book_description' => $this->input->post('book_description'),
                'author' => $this->input->post('author'),
                'category_id' => $this->input->post('category_id'),
                'price' => $this->input->post('price')
            );

            $book_id = $this->book_model->create_book($data);
            if ($book_id != null){

                $config['file_name'] = $book_id+'jpg';//take id
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('book_image_failed', "Failed to upload the image " + $error);

                }
                else
                {//success
                    $data = array('upload_data' => $this->upload->data());
                }

                $this->session->set_flashdata('book_created', "Book has been created");
                redirect('book/index');
            }
        }

    }

    public function search()
    {
        $text = $this->input->post('search_text');
        $data['books'] = $this->book_model->search_books($text);
        $data['text'] = $text;

        $data['main_view'] = "book/index";
        $this->load->view('layouts/main',  $data);
    }

    public function display($id){

        $data['book_views'] = $this->book_model->get_book_details($id);
        $data['top_books'] = $this->book_model->top_books($id);
        $data['book_data'] = $this->book_model->get_book($id);

        $data['main_view'] = "book/display_view";
        $this->load->view('layouts/main',  $data);
    }

    public function delete($id){


        $this->book_model->delete_book($id);
        $this->session->set_flashdata('book_deleted', "Book has been deleted");
        redirect('book/index');

    }

}