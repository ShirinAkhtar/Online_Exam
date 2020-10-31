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
                    <th>Exam Title</th>
                    <th>Date & Time</th>
                    <th>Duration</th>
                    <th>Total Question</th>
                    <th>Right Answer Mark</th>
                    <th>Wrong Answer Mark</th>
                    <th>Status</th>
                    <th>Enroll</th>
                    <th>Question</th>
                    <th>Result</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php 
            $status = "Pending"; 
            $sql = "SELECT * FROM exam";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                    $_SESSION['userdata'] = array('userid'=>$row['id'],
                    'username'=>$row['name'],
                    'userdate'=>$row['date'],
                    'userduration'=>$row['duration'],
                    'usertquestion'=>$row['tquestion'],
                    'userrans'=>$row['rans'],
                    'userwans'=>$row['wans']);
                    ?> 
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['tquestion']; ?></td>
            <td><?php echo $row['rans']; ?></td>
            <td><?php echo $row['wans']; ?></td>
            <td><?php echo $status ?></td>
            <td><a type="button" href="addQuest.php?id=<?php echo $row['id'];?>" class="p1">Add Question</a></td>
            <td><?php //echo $row['tquestion']; ?></td>
            <td><?php //echo $row['tquestion']; ?></td>
            <td>
                <a href="update2.php" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a  href="delete2.php" 
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