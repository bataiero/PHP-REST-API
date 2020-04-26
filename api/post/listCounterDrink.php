

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



// Blog post query
$result = $post->listCounterDrink();

// Get row count
$num = $result->rowCount();

// Check if any posts
if($num > 0) {
  // Post array
  $posts_arr = array();
  // $posts_arr['data'] = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $post_item = array(
        'iduserdc' => $iduserdc,
        'drink_counterdc' => $drink_counterdc,
        'created_atdc' => $created_atdc
    );

    // Push to "data"
    array_push($posts_arr, $post_item);
    // array_push($posts_arr['data'], $post_item);
  }

  // Turn to JSON & output
  echo json_encode($posts_arr);

} else {
  // No Posts
  echo json_encode(
    array('message' => 'Não foi adicionado ML')
  );
}
