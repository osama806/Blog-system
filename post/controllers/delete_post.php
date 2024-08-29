<?php
require_once(__DIR__ . '\post.php');
$post_id = $_GET['id'];
$post = new Post();
$post->delete($post_id);
