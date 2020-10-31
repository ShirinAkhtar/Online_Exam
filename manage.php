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
require 'header1.php';
    require 'config.php';
    session_start();

    //echo '<p class="header">'.$_SESSION['userdata']['username'].'</p>';
?>
<html>
<head>
    <title>Exam List</title>
    <link type = "text/css" rel = "stylesheet" href = "style.css">
</head>
<body>
    
    <h1 class="header">Exam List</h1>
    
<br />
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-9">
                <h3 class="panel-title"><center>Online Exam List</center</h3>
            </div>
            <div class="col-md-3" align="right">
                <a type="button" href="add.php" class="p1">Add</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="exam_data_table" 
            class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Exam Id</th>
                    <th>Question Id</th>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Correct Answer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php 
            $status = "Pending"; 
            $sql = "SELECT * FROM question";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                    $_SESSION['userdata1'] = array('examid'=>$row['id'],
                    'questid'=>$row['Qid'],
                    'name'=>$row['name'],
                    'option1'=>$row['option1'],
                    'option2'=>$row['option2'],
                    'option3'=>$row['option3'],
                    'option4'=>$row['option4'],
                    'ans'=>$row['ans']);
                    ?> 
        <tr>
            <td style="padding:10px"><?php echo $row['id']; ?></td>
            <td style="padding:10px"><?php echo $row['Qid']; ?></td>
            <td style="padding:10px"><?php echo $row['name']; ?></td>
            <td style="padding:10px"><?php echo $row['option1']; ?></td>
            <td style="padding:10px"><?php echo $row['option2']; ?></td>
            <td style="padding:10px"><?php echo $row['option3']; ?></td>
            <td style="padding:10px"><?php echo $row['option4']; ?></td>
            <td style="padding:10px"><?php echo $row['ans']; ?></td>
            <td>
                <a href="update3.php" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a  href="delete3.php" 
            onClick="return confirm('Are you sure you want to delete?')" 
                class="del_btn">Delete</a>
            </td>
           
        </tr>
                <?php 
        
            }?> <br/>  
        </table>
   </div>
</div>
</div>
    
</body>

</html>