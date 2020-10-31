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

$var = $_REQUEST['id'];
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
        <title>Add Question form </title>
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
        
        <h1 class="header">Add Question</h1>
       
        <form id="Add Question" action = "" method = "POST">
        <label for="name">Question Title<input type="text" name="name" >
        </label><br>
        <label for="Option">Option 1<input type="text" name="option1">
        </label><br>
        <label for="Option">Option 2<input type="text" name="option2">
        </label><br>
        <label for="Option">Option 3<input type="text" name="option3">
        </label><br>
        <label for="Option">Option 4<input type="text" name="option4">
        </label><br>
        
        <label for="Option">Answer<input type="text" name="ans">
        </label><br>
        
        </select>
        <br>     

        <p><input type="submit" name="submit" value="ADD"></p>
        <p><a href="exam.php"  value="CLOSE"></p>
        </form>
        </body>

</html>



