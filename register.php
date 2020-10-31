<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
require 'config.php';
    $error  = array();
    $message = '';

if (isset($_POST['submit'])) {
        $username = isset($_POST['username'])?$_POST['username']:'';
        $role = isset($_POST['role'])?$_POST['role']:'';
        $password = isset($_POST['password'])?$_POST['password']:'';
        $repassword = isset($_POST['repassword'])?$_POST['repassword']:'';
        $gender = isset($_POST['gender'])?$_POST['gender']:'';
        $email = isset($_POST['email'])?$_POST['email']:'';
        $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';

    if ($password != $repassword) {
        $error[] = array('input'=>'password', 'msg'=>'password doesnt match');
    }
    if ($email == 'email') {
        $error[] = array('input'=>'email', 'msg'=>'email already exists');
    }

    if (empty($_POST['username']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['repassword']) || empty($_POST['gender']) || empty($_POST['email']) ||empty($_POST['mobile'])) {
        $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields! ');
    }

    if (sizeof($error)==0) {
        $sql = 'INSERT INTO register (`username`,`role`, `password`, `gender`,`email`,`mobile`) 
        VALUES("'.$username.'" ,"'.$role.'" , "'.$password.'", "'.$gender.'", "'.$email.'", "'.$mobile.'")';
   
        if ($conn->query($sql) === true) {
             echo "New record created successfully";
        } else {
            $error[] = array('input'=>'form','msg'=>$conn->error);
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
}


?>
<html>
    <head>
        <title>Register form </title>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
    </head>
    <body>
        <div id="message">
            <?php echo $message; ?>
        </div>
        <div id = "error">
            <?php if (sizeof($error)>0 ) : ?>
                <ul>
                    <?php foreach($error as $error1): ?>
                        <li> <?php echo $error1['msg']; ?> </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
           
        </div>
        <h1 class="header">Registration</h1>
       
        <form id="Register Form" action = "register.php" method = "POST">
        <label for="username">Username<input type="text" name="username" >
        </label><br>
        <label for="role">Role<input type="text" name="role"placeholder="Admin Or User" required>
        </label><br>
        
        <label for="password">Password<input type="text" name="password" >
        </label><br>
        <label for="repassword">Re - Password<input type="text" 
        name="repassword"></label required><br>
        

        <label for="gender">Select Gender</label><br>
        <select name="gender" class="select">
        <option value="gender" class="select">Female</option>
        <option value="gender" class="select">Male</option>
      
        </select>
        <br>

        <label for="email">Email<input type="text" name="email" ></label><br>
        <label for="mobile">Mobile<input type="number" name="mobile" >
        </label><br>
        <p><input type="submit" name="submit" value="Register"></p>
        </form>
        <p class="p2">Already User?</p><br>
        <a href="login.php" class="a2" role="button" aria-pressed="true">Login</a>
    </body>

</html>



