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
    $var;

//$var = $_REQUEST['id'];
//echo $var;  
if (isset($_POST['submit'])) {
    $name = isset($_POST['name'])?$_POST['name']:'';
    $option1 = isset($_POST['option1'])?$_POST['option1']:'';
    $option2 = isset($_POST['option2'])?$_POST['option2']:'';
    $option3 = isset($_POST['option3'])?$_POST['option3']:'';
    $option4 = isset($_POST['option4'])?$_POST['option4']:'';
    $ans = isset($_POST['ans'])?$_POST['ans']:'';
    //$var = $_REQUEST['id'];
    echo $var; 
    if ($name == 'name') {
        $error[] = array('input'=>'name', 'msg'=>'Question already exists');
    }
    
    //if (empty($_POST['name']) || empty($_POST['date']) || empty($_POST['duration']) || empty($_POST['tquestion']) || empty($_POST['rans']) || empty($_POST['wans'])) {
       // $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields!');
    //}

    if (sizeof($error)==0) {
        $sql = 'INSERT INTO question (`id`,`name`,`option1`, `option2`, `option3`,`option4`,`ans`) 
        VALUES("'.$var.'" ,"'.$name.'" ,"'.$option1.'" , "'.$option2.'", "'.$option3.'", "'.$option4.'", "'.$ans.'")';
   
        if ($conn->query($sql) === true) {
             echo "New record created successfully";
             header('Location: exam.php');
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
        <title>Test 1</title>
        <link type = "text/css" rel = "stylesheet" href = "style1.css">
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
        
        <h1 class="header">Test 1</h1>
        <?php 
           $var = $_REQUEST['id'];
           //echo $var;
        if (isset($_GET['page']) ) {
            $page = $_GET['page'];
            $page = mysqli_real_escape_string($con, $page);
            $page = htmlentities($page);
        } else {
            $page = 1;
        }  
        $sql1 = "SELECT * FROM question";
        $result1 = $conn->query($sql1);
        $count = mysqli_num_rows($result1);
        $per_page = 2;
        $no_of_page = ceil($count/$per_page);
        $start = ($page - 1)* $per_page;
        $sql = "SELECT * FROM question limit $start , $per_page";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) { 
            if ($row['id'] == $var) { 
                ?>
        <form id="Test 1" action = "" method = "POST">
        <label for="name"><?php echo $row['name']; ?></label><br><br>
        
        <label class="container"><?php echo $row['option1']; ?>
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
        </label>
        <label class="container"><?php echo $row['option2']; ?>
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
        </label>
        <label class="container"><?php echo $row['option3']; ?>
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
        </label>
        <label class="container"><?php echo $row['option4']; ?>
        <input type="radio" checked="checked" name="radio">
        <span class="checkmark"></span>
        </label>
        </select>
        <br>     

        <p><input type="submit" name="submit" value="Submit"></p>
        <div class="row">
        <p><a href="test.php?page='".($page-1). & id=$var">Previous</a></p>
        <p><a href=""  class="app-button2">Next</a></p></div>
        </form> <?php
            }
        } ?>
        </body>

</html>



