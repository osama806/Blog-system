<?php
include("../index.php");
$title = $_POST['title'];
$content = $_POST['content'];
$author = $_POST['author'];
$createPost = new Post(null, $title, $content, $author);
$createPost->create();
