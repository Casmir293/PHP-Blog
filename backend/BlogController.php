<?php
session_start();

class Post {
  public $title;
  public $content;

  function __construct($title, $content) {
    $this->title = $title; 
    $this->content = $content; 
  }
}

// Initialize posts array if not already set
if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = [];
}

// Add new post if form submitted
if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST["add_post"])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $post = new Post($title, $content);
    array_unshift($_SESSION["posts"], $post);
    header("Location: ../");
    exit();
}

// Delete a post if requested
if (isset($_GET['delete']) && isset($_SESSION['posts'][$_GET['delete']])) {
    unset($_SESSION['posts'][$_GET['delete']]);
}

// session_unset();
// session_destroy();

// Display posts
foreach ($_SESSION["posts"] as $key => $post) {
    echo "<li><h3>{$post->title}</h3><p>{$post->content}</p></li> <br>";
    echo "<a href=\"index.php?edited=$key\">[Edit]</a><a href=\"index.php?delete=$key\">[Delete]</a> <hr>";
}
