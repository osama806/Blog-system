<?php
require_once("../controllers/post.php");
$p = new Post();
$posts = $p->listAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Task 02</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <section class="section">
    <nav class="bg-info text-center py-4">
      <h1 class="text-white d-inline">Welcome to Osama Blog</h1>
      <a href='create_post.php' class="btn btn-primary text-white align-bottom">Create</a>
    </nav>
    <div class="container py-2 d-flex flex-row flex-wrap gap-5">
      <?php
      foreach ($posts as $post):
      ?>
        <div class="card" style="width: 18rem;">
          <div class="card-header">
            <a class="text-decoration-none" href="view_post.php?id=<?php echo $post['id'] ?>">
              <h5 class="card-title text-black"><?php echo $post['title']; ?></h5>
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-subtitle mb-2 text-body-secondary">author: <?php echo $post['author']; ?></h6>
            <p class="card-text"><?php echo $post['content']; ?></p>
            <a href='edit_post.php?id=<?php echo $post["id"] ?>' class="btn btn-info text-white">Edit</a>
            <a href='../controllers/delete_post.php?id=<?php echo $post["id"] ?>' class="btn btn-danger text-white">Delete</a>
          </div>
        </div>

      <?php endforeach; ?>
    </div>
  </section>

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>