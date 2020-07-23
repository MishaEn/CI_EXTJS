<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Book_model
 * Модель для работы с книгами
 */
class Book_model extends CI_Model {

    var $book_name   = '';
    var $author_name = '';
    var $book_year    = '';
	/**
	 * Загрузка списка книг
	 */
	public function loadList()
	{
		$query = $this->db->get('books');

		return $query->result_array();
	}

	public function addBook($data){
        return $this->db->insert('books', $data);
    }
    public function updateBook($data){
	    $this->book_name = $data->book_name;
	    $this->author_name = $data->author_name;
	    $this->book_year = $data->book_year;
        $this->db->where('book_id', $data->book_id);
        return $this->db->update('books',  $this);
    }

    public function removeBook($data){
        return $this->db->delete('books',  ['book_id' => $data->book_id]);
    }


}
