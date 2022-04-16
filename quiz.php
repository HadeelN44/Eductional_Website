<?php
include_once "config.php";

session_start();
if (!isset($_SESSION['user_id'])) {
   
    echo "You Have To Login To Access This Page ";
    echo "<a href='index.php'>Login</a>";
    exit();
}

$id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Quiz</title>

</head>

<body>

<a class="logout" href="logout.php">
<img id = "logout_quiz"src='./gifs/outline_logout_black_24dp.png'>
</a>
<?php 
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        

       
            $lesson_id = $_GET['lesson_id'];

            $sql= "SELECT * FROM questions WHERE lesson_id = $lesson_id"; //reterive questions
            $result = $conn->query($sql);

            $ListofQuestions = [];

            while($row = mysqli_fetch_assoc($result))
            {
                $ListofQuestions[] = $row;
            }
            $counter = 0;
?>
            <form action = score.php method = "POST">

            <input type="hidden" name="lesson" value="<?php echo $lesson_id; ?>">
            <div class = "Qcontent">
            <div class ="content"><?php echo "<h2>Quiz# $lesson_id </h2>"; ?></div>

            <?php  foreach($ListofQuestions as $question): ?>
                      
                        <h4><?php echo ++$counter; ?>. Question : <?php echo $question['question']; ?></h4>
                        <?php 
                            $que= $question['id'];
                            $sql= "SELECT * FROM answers WHERE question_id = $que";
                            $result = $conn->query($sql);
                            $ListofAnswers = [];
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $ListofAnswers[] = $row;
                            }
                        ?>
                        <?php  foreach($ListofAnswers as $answer): ?>
                         
                                    <label>
                                    <input type="radio" name="question[<?php echo $question['id']; ?>]" value="<?php echo $answer['id']; ?>" required="required">
                                     <?php echo $answer['options']; ?></label><br>
                  
                        <?php endforeach; ?>
              <?php endforeach; ?>
                <br><div class="content"><input type="submit" value="Sumbit" class="submit"></div>
                        </div>
            </form>
<?php } ?>
</body>
</html>