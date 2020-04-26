<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'users';

    // Post Properties
    public $iduser;
    public $name;
    public $email;
    public $drink_counter;
    public $created_at;
    public $password;



    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
 
      $query = 'SELECT iduser, name, email, drink_counter, created_at FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT iduser, name, email, drink_counter, created_at FROM ' . $this->table.' WHERE iduser = ? LIMIT 0,1';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->iduser);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->iduser = $row['iduser'];
          $this->name = $row['name'];
          $this->email = $row['email'];
          $this->drink_counter = $row['drink_counter'];
          $this->created_at = $row['created_at'];
    }

   public function login() {
     // Create query
     $query = 'SELECT iduser, name, email, drink_counter, created_at FROM ' . $this->table.' WHERE email = ? and password = ? LIMIT 0,1';

     // Prepare statement
     $stmt = $this->conn->prepare($query);

     // Bind ID
     $stmt->bindParam(1, $this->email);
     $stmt->bindParam(2, $this->password);
     // Execute query
     $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_ASSOC);

     // Set properties
     $this->iduser = $row['iduser'];
     $this->name = $row['name'];
     $this->email = $row['email'];
     $this->drink_counter = $row['drink_counter'];
     $this->created_at = $row['created_at'];
     $this->token = md5($row['name']);
     return $stmt;

    }






    // Create Post
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET name = :name, email = :email, password = :password';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->password = htmlspecialchars(strip_tags($this->password));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':password', $this->password);


          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET name = :name, email = :email, password = :password
                                WHERE iduser = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->password = htmlspecialchars(strip_tags($this->password));
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':password', $this->password);
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE iduser = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    

// Update Post
public function add() {
  // Create query
  $query = 'UPDATE ' . $this->table . '
                        SET drink_counter = drink_counter + 1
                        WHERE iduser = :id';
                        
  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data

  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt->bindParam(':id', $this->id);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
}



  }