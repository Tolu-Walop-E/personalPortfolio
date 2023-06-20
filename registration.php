
<?php
    session_start();

    $ufname = $_POST['fNameReg'];
    $ulname = $_POST['lNameReg'];
    $uemail = $_POST['unameReg'];
    
    $upass = $_POST['uPassReg'];

    $servername = "127.0.0.1";
    $username = "root";
    $password1 = "root";
    $dbname = "phase2";

    
    $conn = new mysqli ($servername, $username, $password1, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    else{
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sql = "INSERT INTO USERS (firstname,lastname,email,password)VALUES ('$ufname', '$ulname','$uemail', '$upass')";
            $sql2 = "INSERT INTO blogPost (fistname) VALUES ('$ufname')";
        }
        
        if ($conn->query($sql) === TRUE) {
                header("Location: login.php"); 
                
            }  
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
        $conn->close();
    }
    
    
    
    
?>
