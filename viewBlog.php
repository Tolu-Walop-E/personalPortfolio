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
        
        
        <title>Blog</title>  
    </head>
    <body link="pink" alink="aqua" vlink="coral">
        <div class = "containerBlog">
            <header id = "header" class = "item">
                    <nav >
                        <ul class = "container2" >
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
            </figure>

            <section id = "blogmainPost" class = "item">
                <?php
                
                session_start();
                
                $servername = "127.0.0.1";
                $username = "root";
                $password1 = "root";
                $dbname = "phase2";
                $conn = new mysqli ($servername, $username, $password1, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                else{
                    $sql = "SELECT ID, blogtitle, blogtext, date,comments FROM blogPost";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $datarow = array();
                        while ($row = $result->fetch_assoc()) {
                            $datarow[] = $row; // creates an array of rows where each row is data from the db
                        }
                        usort($datarow, function ($val1, $val2) {// $val1 is the needs to be sorted and $val2 is 
                            $myDate =  strtotime($val2['date']) - strtotime($val1['date']); //strtotime converts ihe dates into timestamps
                            return $myDate;
                        });
                        
                        foreach ($datarow as $row) {
                            $id = $row['ID'];
                            echo "<div id='titlePad'>";
                            echo "<h1>{$row['blogtitle']}</h1>";
                            echo "</div>";
                            echo "<div id='textPad'>";
                            echo "<p>{$row['blogtext']}</p>";   
                            echo "</div>";
                            
                            echo "<p style='color:black; font-type:bold;'> Comments </p>";
                            echo "<div style='white-space:pre-line;color: white; background-color:black;padding:2%;'>{$row['comments']}</div>  ";

                            if ($_SESSION["loggedIn"]){

                                    echo ("<form method='post' action='deletePost.php'>
                                    <img style='width:10pt'; src = 'images/binphoto.png'><input type='hidden' name='deleteButton' value='$id'>
                                    <button type='submit'>Delete Post</button>
                                    </form>");
                                

                                echo("<form method = 'post' action ='comments.php' id = 'commentsForm-$id'>
                                            
                                                <input type='text' name = 'userComment' id = 'userComment' placeholder='Add a comment' style='height: 50pt;width:500pt'>
                                                <input type='hidden' name='postId' value='$id'>
                                                <div>
                                                <em> <input type='submit' value = 'Submit'>  </em> 
                                                <em ><input type = 'reset' value = 'Clear'>  </em>
                                                </div>
                                    </form>");  
                            }
                            else{
                                echo "<a href = 'login.php'>Login to Comment</a>";
                            } 
                        }
                    }
                    else{
                        echo "No additions to the blog yet";
                        }
                    $conn->close();   
                    }

                ?>
                
                <a href = "login.php" >Post Blog </a>
            </section>
        
        </div> 
          
        </body>
    </html>


