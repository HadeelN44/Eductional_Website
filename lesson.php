<?php
include_once 'config.php';
session_start();

    if(!isset($_SESSION['user_id'])){
       echo "You Have To Login To Access This Page ";
       echo "<a href='index.php'>Login</a>";
        exit();
    }

?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lesson</title>
</head>
<body>
<a class="logout2" href="logout.php">
<img id = "logout_lesson"src='./gifs/outline_logout_black_24dp.png'>
</a>
<?php 

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        $lesson_id = $_GET['lesson_id'];

        if(isset($_SESSION['Allowed_lessons']))
         {
            if(in_array($lesson_id, $_SESSION['Allowed_lessons']))
           {
                $sql= "SELECT * FROM lessons WHERE id = $lesson_id";
                $result = $conn->query($sql);
                $lesson = mysqli_fetch_assoc($result);
?>
            <div class="content">
           
            <h2>Lesson#<?php echo $lesson_id; ?></h2><br>
                <h4><?php echo $lesson['lesson_title']; ?></h4>

                <p id="lesson"> <?php echo $lesson['content'];  ?></p>

                <div>
                <a class="home" href="userPage.php">Go to homepage</a>
                <a class="quiz" href="quiz.php?lesson_id=<?php echo $lesson_id; ?>">Start the quiz!</a>
             
                    
                </div>
            </div>
            <?php 
            }
           
        }
       
  
    }


?>
</body>
</html>
