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
    session_start();
    require 'config.php';
    $error  = array();
    $message = '';


if (isset($_POST['submit'])) {
    $name = isset($_POST['name'])?$_POST['name']:'';
    $date = isset($_POST['date'])?$_POST['date']:'';

    if (sizeof($error)==0) {
        $sql = 'SELECT * FROM exam WHERE
        `name` = "'.$name.'" AND `date` = "'.$date.'" ';
        $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION['userdata'] = array('userid'=>$row['id'],
                'name'=>$row['name'],
                'date'=>$row['date'],
                'duration'=>$row['duration'],
                'tquestion'=>$row['tquestion'],
                'rans'=>$row['rans'],
                'wans'=>$row['wans']);
            }
        }
    } 

    if (sizeof($error)==0) {
        $id = $_SESSION['userdata']['userid'];
        $sql="UPDATE exam SET `name`='".$_POST['name']."', `date`='".$_POST['date']."',`duration`='".$_POST['duration']."',`tquestion`='".$_POST['tquestion']."',`rans`='".$_POST['rans']."',`wans`='".$_POST['wans']."' WHERE  `id`='".$id."' " ;
        if ($conn->query($sql) === true) {
             echo "Record Updated successfully";
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
        <title>PHP Update Record form </title>
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
                        <li> <?php echo $error1['msg'];?> </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif;?>
           
        </div>
        <h1 class="header">Update Record</h1>
        <form id="SignUp Form" action = "update2.php" method = "POST">
        <label for="name">Exam Title<input type="text" name="name" value="<?php echo $_SESSION['userdata']['username'] ?>" required >
        </label><br>
        <label for="date">Exam Date & Time<input type="datetime-local" name="date" value="<?php echo $_SESSION['userdata']['date'] ?>" required>
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

        <label for="question">Total Questions</label><br>
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

        <label for="rans">Marks of Right Answer</label><br>
        <select  class="select" name="rans">
        <option value="+1 Marks" class="select">+ 1 Marks</option>
        <option value="+2 Marks" class="select">+ 2 Marks</option>
        <option value="+5 Marks" class="select">+ 5 Marks</option>
        <option value="+10 Marks" class="select">+ 10 Marks</option>
        </select>
        <br>

        <label for="wans">Marks of Wrong Answer</label><br>
        <select class="select" name="wans">
        <option value="-1 Marks" class="select">- 1 Marks</option>
        <option value="-2 Marks" class="select">- 2 Marks</option>
        <option value="-5 Marks" class="select">- 5 Marks</option>
        <option value="-10 Marks" class="select">- 10 Marks</option>
        </select>
        <br>
        <p><input type="submit" name="submit" value="Update"></p>
        </form>
        <p class="p2">Login Again With Your updated Values</p><br>
        <a href="login.php" class="a2" role="button" aria-pressed="true">Login</a>
    </body>

</html>
