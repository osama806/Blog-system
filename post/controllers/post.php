<?php

require_once(__DIR__ . '\database.php');

class Post
{
  public $id;
  public $title;
  public $content;
  public $author;
  public $created_at;
  public $updated_at;
  private $db;

  public function __construct(int $id = null, string $title = null, string $content = null, string $author = null)
  {
    $this->db = new Database();
    $this->id = $id;
    $this->title = $title;
    $this->author = $author;
    $this->content = $content;
  }

  public function create()
  {
    if (empty(trim($this->title)) || empty(trim($this->author)) || empty(trim($this->content))) {
      header("Location: ../views/create_post.php");
      return;
    }
    $this->db->create($this->title, $this->author, $this->content);
    header('Location: ../views/list_posts.php');
  }

  public function read($id)
  {
    return $this->db->read($id);
  }

  public function update($id)
  {
    if (empty(trim($this->title)) || empty(trim($this->author)) || empty(trim($this->content))) {
      header("Location: ../views/edit_post.php?id=$id");
      return;
    }
    $this->db->update($id, $this->title, $this->author, $this->content);
    header("Location: ../views/list_posts.php");
  }

  public function delete($id)
  {
    $this->db->delete($id);
    header("Location: ../views/list_posts.php");
  }

  public function listAll()
  {
    $this->db->db_connection();
    $this->db->create_table();
    return $this->db->listAll();
  }
}
