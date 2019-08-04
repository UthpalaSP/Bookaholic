<?php


class category_model extends CI_Model{

    public function get_categories(){

        $query = $this->db->get('categories');
        return $query->result();

    }

    public function get_category($id){

        $this->db->where('id' , $id);
        $query = $this->db->get('categories');

        return $query->row();
    }

}

