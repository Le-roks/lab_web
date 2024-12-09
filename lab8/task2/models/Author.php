<?php
class Author
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllAuthors()
    {
        $stmt = $this->db->prepare("SELECT * FROM authors");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>