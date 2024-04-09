<?php
session_start();

class Post {
  public $title;
  public $content;
  private $edited = false;

  function __construct($title, $content) {
    $this->title = $title; 
    $this->content = $content;
  }

  public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setEdited($edited) {
        $this->edited = $edited;
    }

    public function isEdited() {
        return $this->edited;
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

// Edit a post if requested
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit'])) {
    $editIndex = $_GET['edit'];
    if (isset($_SESSION['posts'][$editIndex])) {
        $postToEdit = $_SESSION['posts'][$editIndex];
        // Redirect to edit form
        header("Location: ./EditPost.php?edit=$editIndex&title={$postToEdit->title}&content={$postToEdit->content}");
        exit();
    }
}

// Handle post editing if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])) {
    $editIndex = $_POST['edit_index'];
    if (isset($_SESSION['posts'][$editIndex])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $_SESSION['posts'][$editIndex]->setTitle($title);
        $_SESSION['posts'][$editIndex]->setContent($content);
        $_SESSION['posts'][$editIndex]->setEdited(true);
        header("Location: ../index.php");
        exit();
    }
}

// Delete a post if requested
if (isset($_GET['delete']) && isset($_SESSION['posts'][$_GET['delete']])) {
    unset($_SESSION['posts'][$_GET['delete']]);
}

// Display posts
foreach ($_SESSION["posts"] as $key => $post) {
    echo "<li><h3>{$post->title}</h3><p>{$post->content}</p></li> <br>";
    echo "<a href=\"index.php?edit=$key\">[Edit]</a><a href=\"index.php?delete=$key\">[Delete]</a>";
    // Display "Edited" span if the post has been edited
    if ($post->isEdited()) {
        echo "<span class='edited'>Edited</span>";
    }
    echo "<hr>";
}
