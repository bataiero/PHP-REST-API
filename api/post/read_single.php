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
  $post->read_single();

  print_r($post->read_single());

  // Create array
  $post_arr = array(
        'iduser' => $post->iduser,
        'name' => $post->name,
        'email' => $post->email,
        'drink_counter' => $post->drink_counter,
        'created_at' => $post->created_at
  );

  // Make JSON
  print_r(json_encode($post_arr));