<?php
    session_start();

    $comment = $_POST['userComment'];
    $myId = $_POST['postId'];
    
    $servername = "127.0.0.1";
    $username = "root";
    $password1 = "root";
    $dbname = "phase2";
    $conn = new mysqli ($servername, $username, $password1, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            
            $stmt = $conn->prepare("UPDATE blogPost SET comments = CONCAT(comments, ?, '\n') WHERE id = $myId ");
            $stmt->bind_param("s", $comment);
            $stmt->execute();
            
        }  
        
        $stmt = $conn->prepare("SELECT comments FROM blogPost WHERE id = $myId ");
        $stmt->execute();
        $result = $stmt->get_result();
        $row2 = $result->fetch_assoc();
        $row2 = $row2['comments'];
        
        header("Location: viewBlog.php");
        exit;
         
    }
             
    