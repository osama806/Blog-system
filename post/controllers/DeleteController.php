<?php
require_once('../models/Post.php');
$post_id = $_GET['id'];
$post = new Post();
$post->delete($post_id);
