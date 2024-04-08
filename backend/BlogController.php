<?php
session_start();

include_once 'Post.php';

// Initialize posts array if not already set
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [];
}

// Add new post if form submitted
if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST["add_post"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $post = new Post($title, $content);
    $_SESSION["posts"][] = $post;
    header("Location: ../");
    exit();
}

// Display posts
foreach ($_SESSION["posts"] as $post) {
    echo "<li><h3>{$post->title}</h3><p>{$post->content}</p></li>";
}
?>
