<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Book
 * Контроллер для работы с книгами
 */
class Book extends CI_Controller {

	/**
	 * Загрузка списка книг
	 */
	public function loadList()
	{
		$this->load->model('Book_model');
		$bookList = $this->Book_model->loadList();
		echo json_encode($bookList);
	}
	 public function addBook(){

         $data = json_decode($_POST['data']);
         $this->load->model('Book_model');
         $add_book = $this->Book_model->addBook($data);

         if($add_book){
             $response = ['error' => false];
         }
         else{
             $response = ['error' => true];
         }
         echo json_encode($response);
     }
     public function updateBook(){
         $data = json_decode($_POST['data']);
         $this->load->model('Book_model');
         $update_book = $this->Book_model->updateBook($data);

         if($update_book){
             $response = ['error' => false];
         }
         else{
             $response = ['error' => true];
         }
         echo json_encode($response);
     }

     public function removeBook(){
         $data = json_decode($_POST['data']);
         $this->load->model('Book_model');
         $delete_book = $this->Book_model->removeBook($data);

         if($delete_book){
             $response = ['error' => false];
         }
         else{
             $response = ['error' => true];
         }
         echo json_encode($response);
     }

     public function generateXML(){
         $this->load->model('Book_model');
         $data = $this->Book_model->loadList();
         $xml = '<?xml version="1.1" encoding="UTF-8" ?>';
         $xml .= '<books>';
         foreach($data as $book){
             $xml .= '<book>';
             $xml .= '<id>'.$book['book_id'].'</id>';
             $xml .= '<name>'.$book['book_name'].'</name>';
             $xml .= '<author>'.$book['author_name'].'</author>';
             $xml .= '</book>';
         }
         $xml .= '</books>';

         echo $xml;

     }

}
