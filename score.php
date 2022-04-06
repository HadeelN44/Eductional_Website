<?php
include_once "config.php";
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
    <title>Score</title>
</head>
<body>
<a class="logout" href="logout.php">
<img id = "logout_quiz"src='./gifs/outline_logout_black_24dp.png'>
</a>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $selected_answers = [];
        foreach($_POST['question'] as $question_id => $selected_answer)
        {
            $selected_answers[$question_id] = $selected_answer;
        }
        $lesson_id = $_POST['lesson'];
        $sql_qeustions= "SELECT * FROM questions WHERE lesson_id = $lesson_id";
        $resultQ = mysqli_query($conn, $sql_qeustions);
        $questions = [];
        while($row = mysqli_fetch_assoc($resultQ))
        {
            $questions[]  = $row;
        }
       

        $score = 0;
        foreach($selected_answers as $question_id => $selected_answer)
        {
            
            $sql_answers= "SELECT * FROM answers WHERE id = $selected_answer AND question_id = $question_id ";
            $resultA = $conn->query($sql_answers);
            $res = mysqli_fetch_assoc($resultA);
            if($res['correct'])
            {
                $score++;
            } 
        }
        $sql_update_score= "UPDATE `scores` SET `score`='$score' WHERE `lesson_id` = '$lesson_id' AND `user_id` = '".$_SESSION['user_id']."' ";
        $conn->query($sql_update_score);
        
        if($lesson_id == 3)
        {
            $_SESSION['complete'] = true;
        }

        if($lesson_id < 3)
        {
            $currentLesson = $lesson_id + 1 ;
            $sql_taken= "UPDATE `scores` SET `taken`= 1  WHERE `lesson_id` = '$currentLesson' AND `user_id`= '".$_SESSION['user_id']."' ";
            $conn->query($sql_taken);
        }           
?>
        <div class="Qcontent">
        <h3 class = "content">Your Score is <?=$score?> / 4</h3>
        <form>
            <?php  
                foreach($questions as $question): 
                $question_id = $question['id']; ?>

            <h4> Question : <?=$question['question']?></h4>
                <?php
                 $sql_options= "SELECT * FROM answers WHERE question_id = $question_id";
                 $result_options = $conn->query($sql_options);

                 $options = [];
                 while($row = mysqli_fetch_assoc($result_options))
                 {
                     $options[]= $row;
                 }

                ?>
                    <?php  foreach($options as $option): ?>

                            

                            <label>
                     
                            <input type="radio" name="question<?=$question_id?>"  <?=($selected_answers[$question_id] == $option['id']) ? 'checked' : ''?> disabled>
                                <span 
                                      <?php  
                                       if($selected_answers[$question_id] == $option['id']){
                                        if($option['correct'] == '1'){
                                            echo "style=\"color: 	DarkOliveGreen\"";
                                        }elseif($option['correct'] == '0'){
                                            echo "style=\"color: 	FireBrick\"";
                                        }
                                      }elseif($selected_answers[$question_id] != $option['id']){
                                        if($option['correct'] == '1'){
                                            echo "style=\"color: 	DarkOliveGreen\"";
                                        }
                                     
                                      }else{
                                        echo "style=\"color: 	#455E89\"";
                                      }?> 
                                       > 

                                    <?php
                                        echo $option['options'];
                                        if($selected_answers[$question_id] == $option['id']){
                                            if($option['correct'] == '1'){
                                                echo " <span class =\"icon\">✔</span>";
                                            }
                                            elseif($option['correct'] == '0'){
                                                echo " <span class =\"icon\">❌</span>";  } } ?> 
                                      </span>
                            </label>
                            

                    <?php endforeach; ?>
                

            <?php endforeach; ?>
            
        </form>
                                    </div>
                                    <div class="center">                           
        <a href="userPage.php">Go to homepage</a></div>
<?php 
    }
    
?>

</body>
</html>
