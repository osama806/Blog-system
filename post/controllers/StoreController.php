<?php
require_once('../models/Post.php');
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$createPost = new Post(null, $title, $content, $author);
$createPost->create();
