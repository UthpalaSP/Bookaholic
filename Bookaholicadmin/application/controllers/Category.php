<?php
/**
 * Created by PhpStorm.
 * User: Uthpala
 * Date: 10/24/2018
 * Time: 8:12 AM
 */

class Category extends CI_Controller
{

    function __construct()
    {
        parent::__construct(); /*learn more*/

        $this->load->model('category_model');

        if (!$this->session->userdata('logged_in')){

            $this->session->set_flashdata('no_access', 'Sorry you are not allowed or logged in');
            redirect('home');
        }
    }

    public function index()
    {
        $data['categories'] = $this->category_model->get_categories();

        $data['main_view'] = "category/index";
        $this->load->view('layouts/main',  $data);
    }

    public function display($category_id){

        $data['category_data'] = $this->category_model->get_category($category_id);

        $data['main_view'] = "category/display_view";
        $this->load->view('layouts/main',  $data);
    }

    public function create(){

        $this->form_validation->set_rules('category_name','Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description','Category Description', 'trim');

        if ($this->form_validation->run() == FALSE){

            $errors = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($errors);
            $data['main_view'] = 'category/create_category';
            $this->load->view('layouts/main', $data);
        } else {

            $data = array(

                'user_id' => $this->session->userdata('user_id'),
                'category_name' => $this->input->post('category_name'),
                'category_description' => $this->input->post('category_description'),
            );

            if ($this->category_model->create_category($data)){

                $this->session->set_flashdata('category_created', "Category has been created");
                redirect('category/index');
            }
        }

    }

    public function edit($category_id){

        $this->form_validation->set_rules('category_name','Category Name', 'trim|required');
        $this->form_validation->set_rules('category_description','Category Description', 'trim');

        if ($this->form_validation->run() == FALSE){

            $data['category_data'] = $this->category_model->get_category($category_id);

            $data['main_view'] = 'category/edit_category';
            $this->load->view('layouts/main', $data);
        } else {

            $data = array(

                'user_id' => $this->session->userdata('user_id'),
                'category_name' => $this->input->post('category_name'),
                'category_description' => $this->input->post('category_description'),
            );

            if ($this->category_model->edit_category($category_id, $data)){

                $this->session->set_flashdata('category_updated', "Category has been updated");
                redirect('category/index');
            } else {
                redirect('home');
            }
        }

    }

    public function delete($category_id){


        $this->category_model->delete_category($category_id);
        $this->session->set_flashdata('category_deleted', "Category has been deleted");
        redirect('category/index');

    }

}