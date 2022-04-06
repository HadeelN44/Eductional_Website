<?php
include_once 'config.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Re</title>
</head>
<body>
<div class="row">
 
        <div class="card">
    <div class="register_form">
        <h1>Register Form</h1>

    <form id ="register_form" method = "POST" action="register.php"  onsubmit = "return onSubmit()">
        <label for="name"> Name<span class = "req">*</span></label>
        <input type="text" id="name" name="name"   value="" ><span id="name_mes"></span><br>
        <label for="name"> Email <span class = "req">*</span></label>
        <input type="text" id="email" name="email"  value="" ><span id="email_mes"></span><br>
        <label for="pass">Password <span class = "req">*</span></label>
        <input type="password" id="password" name="password" value="" ><span id="pass_mes"></span><br>

        <label for="conpass">Confirm Password<span class = "req">*</span></label>
        <input type="password" id="conpass" name="conpass"  value="" ><span id="conf_mes"></span><br>
     

        <span  ><br><a href="index.php">Home</a></span>
        <button id="reg_right"  type="submit" class="btn" value="Register" >Register</button>
        
        
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
            
            let name = document.forms["register_form"]["name"].value;
            let email = document.forms["register_form"]["email"].value;
            let pass = document.forms["register_form"]["password"].value;
            let pass_comf = document.forms["register_form"]["conpass"].value;
            let valid = true;
            if(name === ""){
            document.getElementById("name_mes").innerHTML = "Please provide your name!";
            valid = false;
            }
            else {
            document.getElementById("name_mes").innerHTML = "";
            }
            if(email === ""){
            document.getElementById("email_mes").innerHTML = "Please provide your email!";
            valid = false;
            }
            else {
                document.getElementById("email_mes").innerHTML = "";
            }
            if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
            document.getElementById("email_mes").innerHTML = "Please enter valid email.";
            }
            if(pass === ""){
            document.getElementById("pass_mes").innerHTML = "Please provide your password!";
            valid = false;
            }
            else {
                document.getElementById("pass_mes").innerHTML = "";
            }
            if(pass_comf === ""){
            document.getElementById("conf_mes").innerHTML = "You must confirm your password";
            valid = false;
            }
            else {
                document.getElementById("conf_mes").innerHTML = "";
            }
            

            if(pass !== pass_comf){
                document.getElementById("conf_mes").innerHTML = "Password doesn't match";
                valid = false;
            }
           
        
        return valid;
            
    }

    function Email_taken() {

        document.getElementById("email_mes").innerHTML = "<p style=\"color: red\">Email taken, try another one.</p>";

    }

 
    </script>



</body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? PASSWORD_HASH($_POST["password"], PASSWORD_DEFAULT) : ''; //hash password for security purposes
    $name = isset($_POST['name']) ? $_POST['name'] : '';


    $sql = "SELECT * FROM user WHERE email='$email' ";  //check if the email exsist
    $result = $conn->query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
    
?>
<script>
    Email_taken();
</script>
<?php
        
    }

    $email = mysqli_real_escape_string($conn, $email); //To delete special charaters
    $password = mysqli_real_escape_string($conn, $password);
    $name = mysqli_real_escape_string($conn, $name);

   
    
    $sql = "INSERT INTO user(email, password, name)
     VALUES ('$email', '$password','$name')";
    $result = $conn->query($sql);
    

    $user_id = mysqli_insert_id($conn);


    //initalize scroce to keep record of taken lessons
    $sql_score = "INSERT INTO scores (user_id,lesson_id,score,taken) VALUES ('$user_id',1,-1,1),('$user_id',2,-1,0),('$user_id',3,-1,0)";
    $sql_res = $conn->query($sql_score);
    

    if ($result) {
        echo "New record created successfully";
        header("location: index.php");
    } 
   

 
    
}


?>
</html>
