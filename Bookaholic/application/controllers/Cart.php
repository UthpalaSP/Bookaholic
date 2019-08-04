<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cart extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('book_model');
        $this->load->model('category_model');
        //get categories
        $data['categories'] = $this->category_model->get_categories();
    }

    public function index()
    {

        $data['main_view'] = "blank_view";
        $this->load->view('layouts/main',$data);
    }

    public function view_cart()
    {

        //no items will throw an  error

        if (unserialize($this->session->userdata('cart')) == null) {

            $this->session->set_flashdata('empty_cart', 'Sorry! You do not have any item in your cart');
            $data['main_view'] = "blank_view";
            $this->load->view('layouts/main',  $data);

        } else {
            $data['items'] = array_values(unserialize($this->session->userdata('cart')));
            $data['total'] = $this->total();
            $data['main_view'] = "cart_view";
            $this->load->view('layouts/main',  $data);
        }

    }

    public function add()
    {
        $id = $this->input->post('id');

        $book_data= $this->book_model->get_book($id);

        $cart_item = array(
            'id' => $id,
            'book_name' => $book_data->book_name,
            'price' => $book_data->price,
            'quantity' => 1
        );

        if(!$this->session->has_userdata('cart')) {
            $cart = array($cart_item);
            $this->session->set_userdata('cart', serialize($cart));
        } else {
            $index = $this->exists($id);
            $cart = array_values(unserialize($this->session->userdata('cart')));
            if($index == -1) {
                array_push($cart, $cart_item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $cart[$index]['quantity']++;
                $this->session->set_userdata('cart', serialize($cart));
            }
        }

        redirect('cart/view_cart');
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    private function total() {
        $items = array_values(unserialize($this->session->userdata('cart')));
        $s = 0;
        foreach ($items as $item) {
            $s += $item['price'] * $item['quantity'];
        }
        return $s;
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        redirect('cart/view_cart');
    }

    public function update($id, $qty)
    {
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        $cart[$index]['quantity'] = $qty;
        $this->session->set_userdata('cart', serialize($cart));
        redirect('cart/view_cart');
    }

}