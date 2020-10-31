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
    $option1 = isset($_POST['option1'])?$_POST['option1']:'';
    $option2 = isset($_POST['option2'])?$_POST['option2']:'';
    $option3 = isset($_POST['option3'])?$_POST['option3']:'';
    $option4 = isset($_POST['option4'])?$_POST['option4']:'';
    $ans = isset($_POST['ans'])?$_POST['ans']:'';

    if (sizeof($error)==0) {
        $sql = 'SELECT * FROM question';
        $result = $conn->query($sql);
   
        if ($result->num_rows > 0) {
            // output data of each row
            $_SESSION['userdata1'] = array('examid'=>$row['id'],
                    'questid'=>$row['Qid'],
                    'name'=>$row['name'],
                    'option1'=>$row['option1'],
                    'option2'=>$row['option2'],
                    'option3'=>$row['option3'],
                    'option4'=>$row['option4'],
                    'ans'=>$row['ans']);
        }
    }


    if (sizeof($error)==0) {
        $id = $_SESSION['userdata1']['questid'];
        $sql= " UPDATE question SET `name`='".$_POST['name']."', `option1`='".$_POST['option1']."',`option2`='".$_POST['option2']."',`option3`='".$_POST['option3']."',`option4`='".$_POST['option4']."',`ans`='".$_POST['ans']."' WHERE  `id`='".$id."' " ;
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
           
        </div><h1 class="header">Update Question</h1>
       
       <form id="Add Question" action = "" method = "POST">
       <label for="name">Question Title<input type="text" name="name" value="<?php echo $_SESSION['userdata1']['name'] ?>" >
       </label><br>
       <label for="Option">Option 1<input type="text" name="option1" value="<?php echo $_SESSION['userdata1']['option1'] ?>">
       </label><br>
       <label for="Option">Option 2<input type="text" name="option2" value="<?php echo $_SESSION['userdata1']['option2'] ?>">
       </label><br>
       <label for="Option">Option 3<input type="text" name="option3" value="<?php echo $_SESSION['userdata1']['option3'] ?>">
       </label><br>
       <label for="Option">Option 4<input type="text" name="option4" value="<?php echo $_SESSION['userdata1']['option4'] ?>">
       </label><br>
       
       <label for="Option">Answer<input type="text" name="ans" value="<?php echo $_SESSION['userdata1']['ans'] ?>">
       </label><br>
       
       </select>
       <br>     

       <p><input type="submit" name="submit" value="ADD"></p>
       <p><a href="exam.php"  value="CLOSE"></p>
       </form>
    </body>

</html>
