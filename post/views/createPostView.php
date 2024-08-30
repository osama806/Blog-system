<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
</head>

<body>
  <section class="section">
    <nav class="bg-info text-center">
      <h1 class="text-white py-4">Create New Post</h1>
    </nav>
    <div class="container d-flex flex-row gap-5 justify-content-center">
      <form action="../controllers/StoreController.php" method="post" class="w-100">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="author" class="form-label">Author</label>
          <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="mb-3">
          <label for="content" class="form-label d-block">Content</label>
          <textarea class="w-100" id="content" name="content" rows="10" required></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
      </form>
    </div>
  </section>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>