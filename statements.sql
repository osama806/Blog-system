SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$this->dbname'

SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = :dbname AND table_name = :table

CREATE DATABASE blog_db

CREATE TABLE posts (
          id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          title VARCHAR(255),
          content TEXT,
          author VARCHAR(100),
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)

SELECT id, title, content, author FROM posts

INSERT INTO posts (title, author, content) VALUES (:title, :author, :content)

SELECT id, title, content, author FROM posts WHERE id =$id

UPDATE posts SET title = :title, author = :author, content = :content WHERE id = :id

DELETE FROM posts WHERE id =$id
          