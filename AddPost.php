<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Add New Post</title>
</head>
<body>
    <div class="container">
        <h1>Add New Post</h1>
        <form action="backend/BlogController.php" method="POST">
            <input type="text" name="title" placeholder="Enter post title">
            <textarea name="content" placeholder="Enter post content"></textarea>
            <button type="submit" name="add_post">Add Post</button>
        </form>
        <a href="index.php">Back to Blog</a>
    </div>
</body>
</html>
