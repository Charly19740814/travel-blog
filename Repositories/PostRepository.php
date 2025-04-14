<?php

namespace Repositories;
require_once 'Config/bootstrap.php';
require_once REPOSITORY_PATH . '/Repository.php';
use Repositories\Repository;

class PostRepository extends Repository
{
    protected $table = 'posts';
    

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllArticle()
    {
        $sql = sprintf("SELECT posts.*, authors.name AS author_name, images.name AS image_name, images.extension AS image_extension FROM `%s` JOIN authors ON posts.author_id = authors.id JOIN images ON posts.image_id = images.id", $this->table);
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll($this->returnType);
    }

    public function getArticleById($id)
    {
        $sql = sprintf("SELECT posts.*, authors.name AS author_name, images.name AS image_name, images.extension AS image_extension FROM `%s` JOIN authors ON posts.author_id = authors.id JOIN images ON posts.image_id = images.id WHERE posts.id = :id", $this->table);
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch($this->returnType);
    }

    // Teljes cikk lekerdezese
    public function getPostById($id)
    {
        $sql = "SELECT posts.*, authors.name AS author_name, images.name AS image_name, images.extension AS image_extension
        FROM posts 
        JOIN authors ON posts.author_id = authors.id 
        JOIN images ON posts.image_id = images.id
        WHERE posts.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch($this->returnType);
    }

    // cikk letrehozasa

    public function createArticle($title, $content, $image_id, $author_id)
    {
        
        $published_at = date('Y-m-d H:i:s');
        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO posts (`id`,`author_id`, `title`, `content`,`published_at`,`created_at`,`image_id`) 
    VALUES (NULL, :author_id, :title, :content, :published_at, :created_at, :image_id)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':published_at', $published_at);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':image_id', $image_id);
        $stmt->execute();

        $id = $this->db->lastInsertId();
        return $this->getArticleById($id);
    }


    // cikk szerkesztese

    public function updateArticle($updateData)
    {
        $query = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->execute(['title' => $updateData['title'], 'content' => $updateData['content'], 'id' => $updateData['id']]);

        return $this->getArticleById($updateData['id']);
    }


    // cikk torlese

    public function deleteArticle($id)
    {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}

        



