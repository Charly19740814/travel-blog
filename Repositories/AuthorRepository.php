<?php

namespace Repositories;

require_once REPOSITORY_PATH . '/Repository.php';
use Repositories\Repository;

class AuthorRepository extends Repository
{
    protected $table = 'authors';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $sql = sprintf("SELECT posts.*, authors.name AS author_name FROM `%s` JOIN authors ON posts.author_id = authors.id", $this->table);
        $sql = "SELECT * FROM authors";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll($this->returnType);
    }

    public function getAuthorsById($id)
    {
        $sql = "SELECT * FROM authors WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch($this->returnType);
    }


    // szerzö hozzaadasa - privat

    public function createAuthor($name, $email, $hashPassword, $status)
    {
        $query = "INSERT INTO authors (name, email, password, status) 
        VALUES (:name, :email, :password, :status)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashPassword);
        $stmt->bindParam(':status', $status);
        $stmt->execute();

        return $this->db->lastInsertId();

    }


    public function updateAuthor($author)
    {
        $sql = "UPDATE authors 
              SET   name = :name, 
                    email = :email, 
                    status = :status 
              WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            'id' => $author['id'],
            'name' => $author['name'],
            'email' => $author['email'],
            'status' => $author['status']
        ]);
        return $this->getAuthorsById($author['id']);
    }


    // szerzö letiltasa - privat
    public function statusChange($id, $status)
    {
        $query = "UPDATE authors SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();


    }


    public function deleteAuthor($id)
    {
        $query = "DELETE FROM authors WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }



}



