<?php
require_once(__DIR__ . '\post.php');
$post_id = $_GET['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$post = new Post($post_id, $title, $content, $author);
$post->update($post_id);
