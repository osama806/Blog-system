<?php
include("../index.php");
$post_id = $_GET['id'];
$post = new Post();
$post->delete($post_id);
