<?php
require_once("../controllers/post.php");
$post_id = $_GET['id'];
$p = new Post($post_id);
$post = $p->read($post_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Post</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <section class="section">
    <nav class="bg-info text-center py-4">
      <h1 class="text-white d-inline">View Page</h1>
    </nav>
    <div class="container">
      <div class="card my-3">
        <div class="card-header">
          <h4 class="card-title">Id: <?php echo $post['id']; ?></h4>
        </div>
        <div class="card-body">
          <h5 class="card-title">Title: <?php echo $post['title']; ?></h5>
          <h6 class="card-subtitle my-2 text-body-secondary">Author: <?php echo $post['author']; ?></h6>
          <p class="card-text">Content: <?php echo $post['content']; ?></p>
          <a href='edit_post.php?id=<?php echo $post["id"] ?>' class="btn btn-info text-white">Edit</a>
          <a href='delete_post.php?id=<?php echo $post["id"] ?>' class="btn btn-danger text-white">Delete</a>
        </div>
      </div>
    </div>
  </section>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>