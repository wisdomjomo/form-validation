<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="register.css">
	<title>Register Form</title>
</head>
<body>
<?php
    if(isset($_POST['verify'])){
        $is_error = false;
        $user_error = "";
        $username = $_POST['username'];
        if(strlen($username) < 6){
            $user_error1 = "The username must not be less than six characters";
            $is_error = true;
        } else {
            $user_error1 ="";
            $is_error = false;
        }
        $pass1 = $_POST ['pass1'];
        $pass2 = $_POST ['pass2'];
        $encrypt1 = md5($pass1, $pass2);
        if(strlen($pass1 != $pass2)){
            $user_error = "Your password does not match"; 
            $is_error = true; 
        }
        else {
            $is_error = false;
            $user_error ="";
        }
        $email = $_POST ['email'];
    }
    ?>
    <form action="" method="Post">
        <div>
        <label for="">User Name</label> <br>
        <input type="text" name="username" required> 
        <span><?php if(isset($user_error1)) echo $user_error1; ?></span>  <br>
        </div>
        <div>
        <label for="">Enter Email</label> <br>
        <input type="email" name="email" required> 
        </div>
        <div>
        <label for="">Password</label> <br>
        <input type="password" name="pass1" required> 
        </div>
        <div>
        <label for="">Confirm Password</label> <br>
        <input type="password" name="pass2" required> 
        <span><?php if(isset($user_error))
        echo $user_error; ?></span> <br>
        </div>
        <div class="submit">
        <input type="submit" name="verify" value="Register">  
        </div>
       <?php
           if(isset($is_error)  && $is_error === false) { 
           if(isset($username)) echo "<p>$username</p>";
           if(isset($pass1)) echo "<p>$encrypt1</p>";
           if(isset($pass2)) echo "<p>$encrypt1</p>";
           if(isset($email)) echo "<p class='p'>$email</p>";
        } 
       ?>
    </form>
</body>
</html>