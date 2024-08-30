<?php

class Database
{
  public $servername = "localhost";
  public $username = "root";
  public $password = "";
  public $dbname = "blog_db";
  public $table = "posts";

  // method for execute sql statements
  public function execute_statement($statement, $params = [], $db = null, $id = null)
  {
    try {
      // check if passing $db argument or no
      $conn = $db === null
        // create connection with DB
        ? new PDO("mysql:host={$this->servername}", $this->username, $this->password)
        : new PDO("mysql:host={$this->servername};dbname={$db}", $this->username, $this->password);
      // assign error exception to attribute 
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // to avoid sql injection statements
      $stmt = $conn->prepare($statement);
      // assign values to parameters it
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':title', $title);
      $stmt->bindParam(':author', $author);
      $stmt->bindParam(':content', $content);
      // execute sql statement in DB
      $stmt->execute($params);
      // fetch result of execute sql statement 
      $response = $id !== null ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll();
      // destroy connection with DB
      $conn = null;
      return $response;
    }
    // to show message error 
    catch (PDOException $e) {
      $conn = null;
      $e->getMessage();
    }
  }

  // check if DB exists or No
  public function check_db()
  {
    try {
      $conn = new PDO("mysql:host=$this->servername", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // get number DB that name is blog_db
      $stmt = $conn->prepare("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$this->dbname'");
      // will execute this statement with this parameter
      $stmt->execute([':dbname' => $this->dbname]);
      // fetch first value from result execute statement 
      $dbExists = (bool) $stmt->fetchColumn();
      if ($dbExists) {
        $conn = null;
        return true;
      } else {
        $conn = null;
        return false;
      }
    } catch (PDOException $e) {
      $conn = null;
      $e->getMessage();
    }
  }

  // check if table exists or No
  public function check_table()
  {
    try {
      $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // get number tables that name is posts
      $stmt = $conn->prepare("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :table");
      $stmt->execute([':dbname' => $this->dbname, ':table' => $this->table]);
      $tableExists = (bool) $stmt->fetchColumn();
      if ($tableExists) {
        $conn = null;
        return true;
      } else {
        $conn = null;
        return false;
      }
    } catch (PDOException $e) {
      $conn = null;
      $e->getMessage();
    }
  }

  // connection with server and create DB
  public function db_connection()
  {
    $result = $this->check_db();
    if ($result) {
      return;
    } else if (!$result) {
      $sql = "CREATE DATABASE blog_db";
      $this->execute_statement($sql, []);
    }
  }

  // create posts table
  public function create_table()
  {
    $result = $this->check_table();
    if ($result === true) {
      return;
    } else if ($result === false) {
      $sql = "CREATE TABLE posts (
          id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          title VARCHAR(255),
          content TEXT,
          author VARCHAR(100),
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP )";
      $this->execute_statement($sql, [], $this->dbname);
    }
  }

  // get all posts from DB
  public function listAll()
  {
    $result = $this->check_table();
    if (!$result) {
      echo "Posts table isn't found in DB";
      return;
    } else if ($result) {
      $sql = "SELECT id, title, content, author FROM posts";
      $response = $this->execute_statement($sql, [], $this->dbname);
      return $response;
    }
  }

  // create new post in DB
  public function create($title, $author, $content)
  {
    $result = $this->check_table();
    if (!$result) {
      echo "Posts table isn't found in DB";
      return null;
    } else {
      $sql = "INSERT INTO posts (title, content, author) VALUES (:title, :content, :author)";
      $params = [
        ':title' => $title,
        ':content' => $content,
        ':author' => $author
      ];
      $response = $this->execute_statement($sql, $params, $this->dbname);
      return $response;
    }
  }

  // get post from DB
  public function read($id)
  {
    $result = $this->check_table();

    if (!$result) {
      echo "Posts table isn't found in DB";
      return null;
    } else {
      $sql = "SELECT id, title, content, author FROM posts WHERE id =$id";
      $response = $this->execute_statement($sql, [], $this->dbname, $id);
      return $response;
    }
  }

  // modify post data in DB
  public function update($id, $title, $author, $content)
  {
    $result = $this->check_table();
    if (!$result) {
      echo "Posts table isn't found in DB";
      return null;
    } else {
      $sql = "UPDATE posts SET title = :title, author = :author, content = :content WHERE id = :id";
      $params = [
        ":title"   => $title,
        ":author"  => $author,
        ":content" => $content,
        ":id"      => $id
      ];
      $response = $this->execute_statement($sql, $params, $this->dbname);
      return $response;
    }
  }

  // remove post from DB
  public function delete($id)
  {
    $result = $this->check_table();
    if (!$result) {
      echo "Posts table isn't found in DB";
      return null;
    } else {
      $sql = "DELETE FROM posts WHERE id =$id";
      $response = $this->execute_statement($sql, [], $this->dbname, $id);
      return $response;
    }
  }
}

