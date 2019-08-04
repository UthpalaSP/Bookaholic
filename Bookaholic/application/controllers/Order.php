<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('order_model');
        $this->load->model('category_model');
        //get categories
        $data['categories'] = $this->category_model->get_categories();
    }

    public function index()
    {
        $order_id = $this->session->set_userdata('order_id');
        $data['items'] = $this->order_model->get_order_details($order_id);

        $data['main_view'] = "order_view";
        $this->load->view('layouts/main',$data);
    }

    public function create_order()
    {
        if (unserialize($this->session->userdata('cart')) != null) {
            $items = array_values(unserialize($this->session->userdata('cart')));

            $order = array(
                'session_id' => 1
            );

            $order_id = $this->order_model->create_order($order);
            $this->session->set_userdata('order_id',$order_id);

            $order_details = array();
            foreach ($items as $item){
                $element = array(

                    'book_id' => $item->id,
                    'order_id' => $order_id,
                    'quantity' => $item->quantity
                );
                array_push($order_details, $element);
            }

            $result = $this->order_model->create_order_details($order_details);

            $this->index();
        }
    }

}