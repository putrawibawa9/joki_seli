<?php

use Connection\Connect;

require_once "construct.php";
class Auth extends Connection\Connect{
    public $error =false;
    public $row;

public function register($username, $password){
    $connection = $this->getConnection();

    // Check if the username already exists
    $query = "SELECT COUNT(*) as count FROM user2 WHERE username = ?";
    $stmt = $connection->prepare($query);
    $stmt->execute([$username]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // If the count is greater than 0, it means the username already exists
    if($row['count'] > 0) {
        echo "<script>
        alert('Username is already been made');
        document.location.href = 'register.php';
  </script>";
    }

    // If username doesn't exist, proceed with insertion
    $query = "INSERT INTO user2 (username, password) VALUES (?, ?)";
    $result = $connection->prepare($query);
    $result->execute([$username, $password]);

    return $result;
}
    
public function login ($username, $password){

    $connection = $this->getConnection();

    $query = "SELECT * FROM user2 WHERE username = ? AND password = ?";
    $result = $connection->prepare($query);

    $result->execute([$username, $password]);
    if($this->row = $result->fetch()){
        header("Location: admins/produk.php");
    }else{
        $this->error = True;
        header("Location: index.php?error=1");
        exit();
    };
   
    }

public function logout(){
    header("Location: ../index.php");
    exit;
}
}
?>