<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);


  // Get ID
  $post->iduser = isset($_GET['id']) ? $_GET['id'] : die();


  // Get post
  $post->getdrink();

  //print_r($post->getdrink());

  // Create array
  $post_arr = array(
     'drink_counter' => $post->drink_counter

  );

  // Make JSON
  print_r(json_encode($post_arr));