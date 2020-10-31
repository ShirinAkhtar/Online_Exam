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

    echo '<h1 class="header">Welcome User</h1>
    <p class="header">'.$_SESSION['userdata']['username'].'</p>';
?>
<html>
    <header>
        <title>User Records</title>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
    </header>
    <body>
    <table>
        
        <thead>
                <tr>
                    <th >Id</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Mobile</th>
                    <th colspan="4">Action</th>
                </tr>
        </thead>
        <?php  
        $sql = "SELECT * FROM register";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            if ($row["role"] == "user"||$row["role"] == "User") {
                ?> 
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['role']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td><a  href="delete1.php" 
            onClick="return confirm('Are you sure you want to delete?')" 
            class="del_btn">Delete</a>
            </td>
           
        </tr>
                   <?php 
        }
        
    }?> <br/>  
</table>

    <body>
</html>