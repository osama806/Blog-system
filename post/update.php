<?php
include("../index.php");
$post_id = $_GET['id'];
$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$post1 = new Post($post_id, $title, $content, $author);
$post1->update($post_id);
