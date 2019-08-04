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

    public function create_category($data){

        $insert_query = $this->db->insert('categories', $data);
        return $insert_query;

    }

    public function edit_category($category_id, $data){

        $this->db->where('id', $category_id);
        $this->db->update('categories', $data);

        return true;
    }

    public function delete_category($category_id){

        $this->db->where('id', $category_id);
        $this->db->delete('categories');
        return true;
    }
}

