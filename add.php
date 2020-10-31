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
    $name = isset($_POST['name'])?$_POST['name']:'';
    $date = isset($_POST['date'])?$_POST['date']:'';
    $duration = isset($_POST['duration'])?$_POST['duration']:'';
    $tquestion = isset($_POST['tquestion'])?$_POST['tquestion']:'';
    $rans = isset($_POST['rans'])?$_POST['rans']:'';
    $wans = isset($_POST['wans'])?$_POST['wans']:'';
        
    if ($name == 'name') {
        $error[] = array('input'=>'email', 'msg'=>'Exam already exists');
    }
    
    //if (empty($_POST['name']) || empty($_POST['date']) || empty($_POST['duration']) || empty($_POST['tquestion']) || empty($_POST['rans']) || empty($_POST['wans'])) {
       // $error[] = array('input'=>'username', 'msg'=>'Please Fill Out all the fields!');
    //}

    if (sizeof($error)==0) {
        $sql = 'INSERT INTO exam (`name`,`date`, `duration`, `tquestion`,`rans`,`wans`) 
        VALUES("'.$name.'" ,"'.$date.'" , "'.$duration.'", "'.$tquestion.'", "'.$rans.'", "'.$wans.'")';
   
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
        <title>Add Examination form </title>
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
        
        <h1 class="header">Add Examination</h1>
       
        <form id="Add Examination" action = "add.php" method = "POST">
        <label for="name">Exam Title<input type="text" name="name" >
        </label><br>
        <label for="date">Exam Date & Time<input type="datetime-local" name="date">
        </label><br>
        
        <label for="duration">Exam Duration</label><br>
        <select class="select" placeholder="Select" name="duration">
        <option value="5 Minutes" class="select">5 Minutes</option>
        <option value="10 Minutes" class="select">10 Minutes</option>
        <option value="15 Minutes" class="select">15 Minutes</option>
        <option value="30 Minutes" class="select">30 Minutes</option>
        <option value="1 hour" class="select">1 hour</option>
        <option value="2 hour" class="select">2 hours</option>
        </select>
        <br>     

        <label for="gender">Total Questions</label><br>
        <select class="select"  name="tquestion">
        <option value="5 Questions" class="select">5 Questions</option>
        <option value="10 Questions" class="select">10 Questions</option>
        <option value="25 Questions" class="select">25 Questions</option>
        <option value="30 Questions" class="select">50 Questions</option>
        <option value="100 Questions" class="select">100 Questions</option>
        <option value="200 Questions" class="select">200 Questions</option>
        <option value="300 Questions" class="select">300 Questions</option>
        <option value="500 Questions" class="select">500 Questions</option>
        </select>
        <br>

        <label for="gender">Marks of Right Answer</label><br>
        <select  class="select" name="rans">
        <option value="+1 Marks" class="select">+ 1 Marks</option>
        <option value="+2 Marks" class="select">+ 2 Marks</option>
        <option value="+5 Marks" class="select">+ 5 Marks</option>
        <option value="+10 Marks" class="select">+ 10 Marks</option>
        </select>
        <br>

        <label for="gender">Marks of Wrong Answer</label><br>
        <select class="select" name="wans">
        <option value="-1 Marks" class="select">- 1 Marks</option>
        <option value="-2 Marks" class="select">- 2 Marks</option>
        <option value="-5 Marks" class="select">- 5 Marks</option>
        <option value="-10 Marks" class="select">- 10 Marks</option>
        </select>
        <br>
        <p><input type="submit" name="submit" value="ADD"></p>
        </form>
        </body>

</html>



