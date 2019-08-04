<?php

class book_model extends CI_Model{

    public function get_books(){

        $this->db->select('
            books.id,
            books.book_name,
            books.book_description,
            books.author,
            categories.category_name,
            categories.category_description
        ');
        $this->db->from('books');
        $this->db->join('categories','books.category_id = categories.id');

        $query = $this->db->get();

        return $query->result();

    }

    public function get_book($id){

        $this->db->where('id' , $id);
        $query = $this->db->get('books');

        return $query->row();
    }

    public function get_book_details($id){
        $result= $this->db->query("SELECT COUNT(session_id) AS views,book_id FROM visit_details WHERE book_id = '$id'");
        return $result->row();
    }

    public function create_book($data){

        $this->db->insert('books', $data);
        $id = $this->db->insert_id();
        return $id;

    }

    public function search_books($text){
        $this->db->select('
            books.id,
            books.book_name,
            books.book_description,
            books.author,
            categories.category_name,
            categories.category_description
        ');
        $this->db->from('books');
        $this->db->join('categories','books.category_id = categories.id');
        $this->db->like('books.book_name', $text);
        $this->db->or_like('books.author', $text);

        $query = $this->db->get();

        return $query->result();
    }

    public function delete_book($id){

        $this->db->where('id', $id);
        $this->db->delete('books');
        return true;
    }

    public function top_books($current_book_id){

        $books = $this->db->query("SELECT COUNT(session_id) AS view_count,book_id,book_name,author,price FROM visit_details a 
                        LEFT JOIN books b ON a.book_id = b.id 
                        WHERE (session_id IN( SELECT session_id FROM visit_details WHERE book_id = '$current_book_id') AND book_id != '$current_book_id') 
                        GROUP BY book_id 
                        ORDER BY view_count DESC 
                        LIMIT 5");

        return $books->result();
    }
}