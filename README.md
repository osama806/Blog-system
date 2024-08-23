# Project Objective

Create a simple blog management system that allows users to create, read, update, and delete articles. Object-oriented programming principles in PHP should be used to organize code, and use SQL to manage the database.

# Requirements

1. Database Design:

```
   - Create a MySQL database named 'blog_db'.
   - Within 'blog_db', create a table named 'posts' with the following columns:
     - 'id' (master key, automatically increasing)
     - 'title' (VARCHAR(255))
     - 'content' (TEXT)
     - 'author' (VARCHAR(100))
     - 'created_at' (TIMESTAMP)
     - 'updated_at' (TIMESTAMP)
```

2. PHP OOP Structure:

```
   - Create a class named 'Database' to handle connection to the database.
     - This class must contain methods to connect to the database, execute queries, and fetch results.
   - Create a class named 'Post' representing the blog article.
     - This class must contain properties such as 'id', 'title', 'content', 'author','created_at', and 'updated_at'.
     - The class must contain methods to do the following:
       - Create a new article ('create()')
       - Read an article by identifier ('read($id)')
       - Update an existing article ('update($id)')
       - delete article ('delete($id)')
```

3. CRUD operations:

```
   - Execute the following pages with PHP:
     - 'create_post.php': A template for creating a new article.
     - 'view_post.php': View one article.
     - 'edit_post.php': A template for modifying an existing article.
     - 'delete_post.php': Script to delete an article.
     - 'list_posts.php': View all articles with links to view, edit, and delete each article.
```

4. Additional features:

```
   - Include a simple validation of entries in forms (e.g. title and content should not be empty).
   - Use pre-prepared queries (Prepared Statements) in SQL to prevent SQL injection attacks.
   - Implement a simple front-end using HTML and CSS to format forms and pages.
```

# Usage

```
- Clone this repository
- Move folder that downloaded to xampp->htdocs folder
- Run xampp app
- Start Apache and MySql
- Move to browser and set in url http://localhost/Blog-system/post/list_posts.php
```
