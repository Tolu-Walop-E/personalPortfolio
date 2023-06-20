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

    <script src = "elements.js"> </script>
    
    <title>Document</title>
</head>
<body link="pink" alink="aqua" vlink="coral">
    <div class = "container">
    
        <header id = "header" class = "item">
                <nav >
                    <ul class = "container2">
                        <li class = "item item-2"> <a href = "exercise2.html">About me </a></li>
                        <li class = "item item-3"> <a href = "skills.html">Skills</a> </li>
                        <li class = "item item-4"> <a href = "education.html">Education</a> </li>
                        <li class = "item item-5"> <a href ="projects.html">Projects</a> </li>
                        <li class = "item item-6"> <a href ="login.php">Login</a> </li>
                        <li class = "item item-7"> <a href ="viewBlog.php">Blog</a> </li>
                        
                    </ul>
                </nav>
        </header>

        <figure id = "bg" class = "item">
            <img id = "backImage" src = "images/zushi.JPG" >
            <figcaption> An Image of Tolu Adesina</figcaption>
        </figure>
        <section id = "addBlogTitle" class = "item">
            <h2>Add Blog</h2>
        

        
            <form action = "addpost.php" method = "post" id = "userForm" onsubmit=" return checkEmpty(event);">
                <article id = "title" class = "item">
                        <input type="text" name = "title1" id = "mainTitle" placeholder="Title" style="height: 50pt;width:500pt">
                </article>            
                <article id = "blogtext1" class = "item">
                    <input type="text" name = "blogtext"  id  = "mainText" placeholder="Enter your text here" style="height: 110pt;width:500pt">
                </article> 
                <div>
                <em> <input type="submit" value = "Post">   </em> 
                <em ><input type = "button" value = "Clear" onclick="clearButton();">  </em>
                </div>
            
            </form>
        </section>

        
        
        
        <footer id = "footer" class = "item">
            <h3> Contact: </h3>
            <p>Email: adesinatolu8@gmail.com </p>
        </footer>



            
        </div>
    
</body>
</html>

    
 
<?php
    session_start();

    $title = $_POST['title1'];
    $text = $_POST['blogtext'];
    $servername = "127.0.0.1";
    $username = "root";
    $password1 = "root";
    $dbname = "phase2";

    

    


    
    
    $conn = new mysqli ($servername, $username, $password1, $dbname);
    $conn->set_charset('utf8mb4');

    $text = mysqli_real_escape_string($conn, $text);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

    else{
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $sql = "INSERT INTO  blogPost (blogtitle,blogtext,comments,firstname)VALUES ('$title', '$text','','')";
        
        if ($conn->query($sql) === TRUE) {
                header("Location: viewBlog.php");    
            }  
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }}
        $conn->close();
    }
    
    
    
    
?>
