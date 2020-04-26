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

  $data = json_decode(file_get_contents("php://input"));

  
  // Get ID

  
  //$post->iduser = $data->id;
  $post->email = $data->email;
  $post->password = $data->password;

  // Get post
  $result =  $post->login();

  //print_r($post->read_single());


  $num = $result->rowCount();

  if($num > 0) {
    // Create array
    $post_arr = array(
          'iduser' => $post->iduser,
          'name' => $post->name,
          'email' => $post->email,
          'drink_counter' => $post->drink_counter,
          'token' => $post->token,
          'created_at' => $post->created_at
    );
      // Make JSON
    print_r(json_encode($post_arr));
  }else{
    echo json_encode(
      array('message' => 'O usuário não existe ou que a senha está inválida')
    );
  }
