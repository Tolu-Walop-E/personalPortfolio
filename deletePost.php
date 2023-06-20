
<?php
    session_start();

    $id = $_POST['deleteButton'];

    $servername = "127.0.0.1";
    $username = "root";
    $password1 = "root";
    $dbname = "phase2";

    
    $conn = new mysqli ($servername, $username, $password1, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    else{
        $sql = "DELETE FROM blogPost WHERE id = $id";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            header("Location: viewBlog.php");
        } 

        // Close the database connection
        $conn->close();
        }
    
    
    
?>
