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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
</head>
<body>


<a class="logout3" href="logout.php">
<img id = "logout_quiz"src='./gifs/outline_logout_black_24dp.png'>
</a>
<?php 
    if(isset($_SESSION['user_id']))
    {
    
    ?>

    <div class="content">
    <h6>Last successful login was on: <?php echo  $_SESSION['Previous_login'] ?> </h6> <!-- display the last log in ---->
    <div class="content"><h3>Hello <?php echo $_SESSION['name'] ?><br></h3> </div>

        <?php 
            if(isset($_SESSION['complete']))
            {   
                if($_SESSION['complete'] == true)
                {
                    $user_id = $_SESSION['user_id'];
                    $sql =" SELECT SUM(`score`) as total  FROM `scores` WHERE `user_id` =  '".$_SESSION['user_id']."' AND `taken` =1 GROUP BY `user_id`";
                   
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_assoc($result);

                    
                    echo "<p>Congratulations! You finished all quizzes. Your final score is ".$row['total']."/12 🎉 </p> "; // if she/he completed all quizzes
                    echo "<div class=\"Imgcontent\">";
                    if($row['total'] <= 2){
                        echo "<img src='./gifs/giphy.gif'>";
                    }
                    elseif($row['total'] <= 4){
                        echo "<img src='./gifs/HdCn.gif'>";
                    }
                    elseif($row['total'] <= 6){
                        echo "<img src='./gifs/AccurateSecondArabianhorse-max-1mb.gif'>";
                    }
                    elseif($row['total'] <= 8 ){
                        echo "<img src='./gifs/6-Mashable-Olympics-GIFs-Hilarious-Memes.gif'>";
                    }
                    elseif($row['total'] <= 10){
                        echo "<img src='./gifs/won-what-it-do-baby.gif'>";
                    }
                    elseif($row['total'] <= 12){
                        echo "<img src='./gifs/px9wyhyb7p171.gif'>";
                    }
                    echo "</div>";
 
                }
            }
            else 
            {
                echo "<p>Enjoy learning about History of the olympic games by taking our lessons and quizzes</p>"; //welcome message
            }
        ?>
        

        <br><br><br>
        <table >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Lesson Title</th>
                    <th>Quiz Score</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $user_id = $_SESSION['user_id'];
            $sql_lesson = "SELECT * FROM scores WHERE user_id = '$user_id' AND taken = '1'";
            $res = $conn->query($sql_lesson);

            $i=0;

            $Lesson_Taken = [];
            if($res):
                while ($row = mysqli_fetch_assoc($res)):
                    $i++;
                    $Lesson_Taken[] = $row['lesson_id']; 
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td>
                    <a href="lesson.php?lesson_id=<?php echo $row['lesson_id']; ?>">
                        <?php 
                            $sql_lesson_info= "SELECT * FROM Lessons WHERE id = ".$row['lesson_id']. "";
                            $result_lesson = $conn->query($sql_lesson_info);
                            $lesson = mysqli_fetch_assoc($result_lesson);
                            echo $lesson['lesson_title'];
                        ?>
                    </a>
                </td>
                <td><?php echo ($row['score']==-1) ? 'Not Taken' : $row['score']; ?></td>
            </tr>
        <?php 
                endwhile;
                $_SESSION['Allowed_lessons'] = $Lesson_Taken;
            endif;
        ?>
            </tbody>
        </table>
    <?php
            
    }
    ?>
    </div>
</body>
</html>
