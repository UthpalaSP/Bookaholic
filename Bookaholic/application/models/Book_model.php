<?php

class book_model extends CI_Model{

    public function get_books(){

        $this->db->select('
            books.id,
            books.book_name,
            books.book_description,
            books.author,
            books.price,
            books.image,
            categories.category_name,
            categories.category_description
        ');
        $this->db->from('books');
        $this->db->join('categories','books.category_id = categories.id');

        $query = $this->db->get();

        return $query->result();

    }

    public function get_books_by_category($cat_id){

        if ($cat_id == 0){

            get_books();

        } else {

            $this->db->select('
            books.id,
            books.book_name,
            books.book_description,
            books.author,
            books.price,
            books.image,
            categories.category_name,
            categories.category_description
        ');
            $this->db->from('books');
            $this->db->join('categories','books.category_id = categories.id');
            $this->db->where('books.category_id',$cat_id);

            $query = $this->db->get();

            return $query->result();
        }
    }

    public function get_book($id){

        $this->db->where('id' , $id);
        $query = $this->db->get('books');

        return $query->row();
    }

    public function create_book($data){

        $insert_query = $this->db->insert('books', $data);
        return $insert_query;

    }

    public function create_visit($data){

        $insert_query = $this->db->insert('visit_details', $data);
        return $insert_query;

    }

    public function search_books($text){
        $this->db->select('
            visit_details.session_id,
            visit_details.book_id
        ');
        $this->db->from('visit_details');
        $this->db->join('categories','books.category_id = categories.id');
        $this->db->like('books.book_name', $text);
        $this->db->or_like('books.author', $text);
        //author

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

    public  function get_books_paginated($cat_id,$skip_rows,$get_rows)
    {
        if ($cat_id != null)
        {
            $query = $this->db->query("SELECT b.id,b.book_name, b.book_description, b.author,b.price, b.image, c.category_name, c.category_description 
                  FROM `books` AS b LEFT JOIN categories AS c ON b.category_id = c.id 
                  WHERE '$cat_id' IS NULL OR c.id = '$cat_id' ORDER BY book_name ASC
                  LIMIT $skip_rows,$get_rows");

        } else {

            $query = $this->db->query("SELECT b.id,b.book_name, b.book_description, b.author,b.price, b.image, c.category_name, c.category_description 
                  FROM `books` AS b LEFT JOIN categories AS c ON b.category_id = c.id 
                  ORDER BY book_name ASC
                  LIMIT $skip_rows,$get_rows");
        }

        return $query->result();
    }

    public function book_count($categoryId)
    {
        $row_count = 0;
        if ($categoryId == null){
            $row_count = $this->db->query("SELECT COUNT(id) AS count FROM books");
        } else {
            $row_count = $this->db->query("SELECT COUNT(id) AS count FROM `books` WHERE category_id = '$categoryId'");
        }
        return $row_count->row()->count;
    }
}