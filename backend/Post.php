<?php 
class Post {
  public $title;
  public $content;

  function __construct($title, $content) {
    $this->title = $title; 
    $this->content = $content; 
  }
}