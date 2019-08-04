<?php

class order_model extends CI_Model{

    public function get_order_details($order_id)
    {
//            orders.session_id,
//            orders.order_date,
        $this->db->select('
            order_details.order_id,
            order_details.book_id,
            order_details.quantity,
            books.book_name,
            books.price
        ');
        $this->db->from('order_details');
        $this->db->join('books','books.id = order_details.book_id');
        $this->db->where('order_details.order_id',$order_id);

        $query = $this->db->get();

        return $query->result();

    }

    public function create_order($data){

        $this->db->insert('orders', $data);
        $order_id = $this->db->insert_id('orders', $data);
        return $order_id;

    }

    public function create_order_details($data){

        $result = $this->db->insert('order_details', $data);
        return $result;

    }

}