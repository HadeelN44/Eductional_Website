<?php 
include_once 'config.php';
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

global $error_msg;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
<div class="row">
    <div class="leftcolumn">
        <div class="card">
     
        <h1>Log in Form</h1>

        <form id="login_form" method = "POST" action="index.php"  onsubmit = "return onSubmit()">

        <label for="email"> Email<span class = "req">*</span></label>
        <input type="text" id="emaill" name="emaill" ><span id="emaill_msg"></span><br>
        <label for="pass">Password<span class = "req">*</span></label>
        <input type="password" id="passlog" name="passlog" ><span id="password_msg"></span><br>
  
        <span><a  href="register.php">Register</a></span>
        <button id="log_right" type="submit" class="btn" value="Log In">Log in</button>
        


        <?php
        if ($error_msg != 'index.php') {
        echo "<div class=\"error_msg\">" . $error_msg . "</div>";
        echo $error_msg;
        }
        ?>
    </form>

</div>
</div>
</div>


    <script>

 
    function onSubmit() {
            
          
            let email = document.forms["login_form"]["emaill"].value;
            let pass = document.forms["login_form"]["passlog"].value;
       
            let valid = true;
      
            if(email === ""){
            document.getElementById("emaill_msg").innerHTML = "Please provide your email!";  //check if email is empty
            valid = false;
            }
            else {
                document.getElementById("emaill_msg").innerHTML = ""; // to provide good feedback if the user enter an email, no need for message
            }
            if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) { // checking the email format
            document.getElementById("emaill_msg").innerHTML = "Please enter valid email.";
            }
            if(pass === ""){
            document.getElementById("password_msg").innerHTML = "Please provide your password!"; //check if password is empty
            valid = false;
            }
            else {
                document.getElementById("password_msg").innerHTML = "";
            }
         
          return valid;
    }
 
    </script>

</body>
<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['emaill']) ? $_POST['emaill'] : '';
    $password = isset($_POST['passlog']) ? $_POST['passlog'] : '';


    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM user WHERE email = '$email'"; 
    $result = $conn->query($sql);
  

    if ($result && $result->num_rows > 0) {

        $row =  mysqli_fetch_assoc($result); 

        if (password_verify($password, $row['password'])){ // check if the email & password match 
    
            //set session 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['Previous_login'] = $row['last_activity'];


            //update last activity 
            $subsql = "UPDATE `user` SET `last_activity` = CURRENT_TIMESTAMP WHERE `email` = '".$_SESSION['email']."'" ;
            $resultupdated = $conn->query($subsql);
         
   

       
            header("location: userPage.php");
            exit();

        }else {
            echo "<p style=\"color: red\">Email and Password not matched.</p>";
            $error_msg = "Email and Password not matched.";
            
        }

    }
    echo "<p style=\"color: red\">Error, Can not login.</p>";
    $error_msg = "Error, Can not login.";
    
}

?>
</html>


