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
require 'header.php';
    require 'config.php';
    session_start();

    echo '<p class="header">'.$_SESSION['userdata']['username'].'</p>';
?>
<html>
<head>
    <title>Dashboard</title>
    <link type = "text/css" rel = "stylesheet" href = "style.css">
</head>
<body>
    
    <h1 class="header">Select exam</h1>
    
    <div class="card-body">
        <div class="table-responsive">
            <table id="exam_data_table" 
            class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   
                    <th>Exam Title</th>
                    <th>Date & Time</th>
                    <th>Duration</th>
                    <th>Total Question</th>
                    <th>Right Answer Mark</th>
                    <th>Wrong Answer Mark</th>
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
            
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['duration']; ?></td>
            <td><?php echo $row['tquestion']; ?></td>
            <td><?php echo $row['rans']; ?></td>
            <td><?php echo $row['wans']; ?></td>
            <td>
                <a href="test.php?id=<?php echo $row['id']; ?>" class="edit_btn" >Start Your Exam</a>
            </td>
        </tr>
                <?php 
        
            }?> <br/>  
        </table>
   </div>
</div>
    
</body>

</html>