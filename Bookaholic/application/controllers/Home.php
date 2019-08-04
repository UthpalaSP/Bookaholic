<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('book_model');
        $this->load->model('category_model');

        //assign uniqid
        $arr = array("user_id" => uniqid());
        if($this->session->userdata('user_id') == NULL){
            $this->session->set_userdata($arr);
        }
    }

    public function index(){
        $this->page(0);
    }

    public function page($pg)
    {
        //get total count
        $data['count'] = $this->book_model->book_count(null);

        //pagination

        $config = array();
        $config["base_url"] = base_url() . "home/page";
        $config['first_url'] = base_url() . "home/page/0";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 8;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $data['count'];
        $config['cur_tag_open'] = '&nbsp;<a class="">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        if($this->uri->segment(3)){
            $page = ($this->uri->segment(3)) ;
            $skiprows = ($page-1)*$config["per_page"];
            if ($page == 0)
                $skiprows = 0;
        }
        else{
            $page = 0;
            $skiprows = 0;
        }

        //get books
        $data['books'] = $this->book_model->get_books_paginated(null, $skiprows, $config["per_page"]);//$this->book_model->get_books();

        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        //get categories
        $data['categories'] = $this->category_model->get_categories();
        $this->session->set_userdata('categories', $data['categories']);

        $data['main_view'] = "home_view";
        $this->load->view('layouts/main',$data);
    }

    public function selected_books($category_id){

        //get total count
        $data['count'] = $this->book_model->book_count($category_id);

        //get categories
        $data['categories'] = $this->category_model->get_categories();

        //pagination

        $config = array();
        $config["base_url"] = base_url() . "home/selected_books/".$category_id."/page/";
        $config['first_url'] = base_url() . "home/selected_books/".$category_id."page/0";
        $config["total_rows"] = $data['count'];
        $config["per_page"] = 8;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $data['count'];
        $config['cur_tag_open'] = '&nbsp;<a class="">';
        $config['cur_tag_close'] = '</a>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        if($this->uri->segment(5)){
            $page = ($this->uri->segment(5)) ;
            $skiprows = ($page-1)*$config["per_page"];
            if ($page == 0)
                $skiprows = 0;
        }
        else{
            $page = 0;
            $skiprows = 0;
        }


        //get books by category
        if ($category_id == null){
            $data['books'] = $this->book_model->get_books_paginated(null, $skiprows, $config["per_page"]);// $this->book_model->get_books();
        }else {
            $data['books'] = $this->book_model->get_books_paginated($category_id, $skiprows, $config["per_page"]);// $this->book_model->get_books_by_category($category_id);
        }

        $this->pagination->initialize($config);
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;',$str_links );

        $data['main_view'] = "home_view";
        $this->load->view('layouts/main',$data);
    }

    public function display($id){
        //book detailts
        $this->record_visit($id);

        $data['top_books'] = $this->book_model->top_books($id);

        $data['book_data'] = $this->book_model->get_book($id);

        $data['main_view'] = "book/display_view";
        $this->load->view('layouts/main',  $data);
    }

    public function view_cart(){

        $data['main_view'] = "cart_view";
        $this->load->view('layouts/main',  $data);
    }

    private function record_visit($book_id){

        $cart_item = array(
            'book_id' => $book_id,
            'session_id' => $this->session->userdata('user_id')
        );

        $this->book_model->create_visit($cart_item);
    }

}