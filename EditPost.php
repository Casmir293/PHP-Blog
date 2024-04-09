<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
     <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        <form action="./backend/BlogController.php" method="POST">
            <input type="hidden" name="edit_index" required value="<?php echo $_GET['edit']; ?>">
            <input type="text" name="title" placeholder="Enter post title" required value="<?php echo $_GET['title']; ?>">
            <textarea name="content" placeholder="Enter post content"><?php echo $_GET['content']; ?></textarea>
            <button type="submit" name="edit_post">Save Changes</button>
        </form>
        <a href="index.php">Back to Blog</a>
    </div>
</body>
</html>
