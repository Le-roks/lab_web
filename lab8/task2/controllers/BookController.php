<?php
class BookController
{
    private $bookModel;

    public function __construct($bookModel)
    {
        $this->bookModel = $bookModel;
    }

    public function index($search = null)
    {
        $books = $this->bookModel->getBooks($search);
        include 'views/book_list.php';
    }
}
?>