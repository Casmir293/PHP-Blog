<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP Blog</title>
</head>

<body>
    <div class="container">
        <h1>Simple Blog</h1>
        <a class="add-post" href="AddPost.php">Add New Post</a>
        <h2>Recent Posts</h2>
        <ul>
            <?php include_once './backend/BlogController.php'; ?>
        </ul>
    </div>
</body>
</html>