<?php
class Book
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getBooks($search = null)
    {
        $query = "SELECT books.*, authors.first_name, authors.last_name 
                  FROM books 
                  JOIN authors ON books.author_id = authors.id";
        if ($search) {
            $query .= " WHERE books.title LIKE :search OR authors.last_name LIKE :search";
        }
        $stmt = $this->db->prepare($query);
        if ($search) {
            $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>