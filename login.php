<?php
    session_start();
    
    if ($_SESSION["loggedIn"]){
        header("Location: welcome.html");
        }
    
    
    

    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $servername = "127.0.0.1";
    $username = "root";
    $password1 = "root";
    $dbname = "phase2";
    
    $conn = new mysqli ($servername, $username, $password1, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    else{
        $stmt = $conn->prepare("SELECT * FROM USERS WHERE email = ?");
        $stmt ->bind_param("s",$email);
        $stmt ->execute();
        $stmt_result = $stmt ->get_result();
        if ($stmt_result->num_rows >0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['password'] === $password){
                
                $_SESSION["loggedIn"] = true;

                if ($_SESSION["loggedIn"]){
                    header("Location: welcome.html");
                    }
                
            }
            else{
                echo "Invalid Email or Pass";
                
            }

        }
        $conn->close();
    
}
    
    
    
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">


    <link rel="stylesheet" media="screen and (max-width: 768px)" href="mobile1.css" />
    <link rel="stylesheet" media="screen and (min-width: 769px)" href="exercise21.css" />
    
    <title>Document</title>
</head>
<body link="pink" alink="aqua" vlink="coral">
    <div class = "containerLog">
    
        <header id = "header" class = "item">
                <nav >
                    <ul class = "container2">
                        <li class = "item item-2"> <a href = "exercise2.html">About me </a></li>
                        <li class = "item item-3"> <a href = "skills.html">Skills</a> </li>
                        <li class = "item item-4"> <a href = "education.html">Education</a> </li>
                        <li class = "item item-5"> <a href ="projects.html">Projects</a> </li>
                        <li class = "item item-6"> <a href ="">Login</a> </li>
                        <li class = "item item-7"> <a href ="viewBlog.php">Blog</a> </li>
                    </ul>
                </nav>
        </header>

        <figure id = "bg" class = "item">
            <img id = "backImage" src = "images/zushi.JPG" >
            <figcaption> An Image of Tolu Adesina</figcaption>
        </figure>

        <form method = "POST" action="login.php"  id = "bloglog"  name = "bloglog" class = "item">

            <section id = "loginForm" class = "item">
                <article id = "email" class="item" >
                    <p>Email: </p>
                    <input type="email" name = "email" required >
                </article>

                <article id = "password" class = "item" >
                    <p>Password: </p>
                    <input type="text"  name = "password" required>
                </article>
            </section>

            <section id = "finalbuttons" class = "item">
                <article id = "submitbutton" class = "item">
                    <p><em class = "button"> <input type="submit"> </em></p>
                </article>
            </section>
            <p style = "color: black;"id = "registration">  <a href="register.html">No account? Register Now </p> </a>
        </form>
        
        

        
        
        
        
        <footer id = "footer" class = "item">
            <h3> Contact: </h3>
            <p>Email: adesinatolu8@gmail.com </p>
        </footer>



            
        </div>
    
</body>
</html>

    
 

