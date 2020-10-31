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

    echo '<h1 class="header">Welcome User</h1>
    <p class="header">'.$_SESSION['userdata']['username'].'</p>';
?>
<html>
    <header>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
    </header>
    <body>
    <table>
        
        <thead>
                <tr>
                    <th >Id</th>
                    <th>Name</th>
                   
                    <th>Email Address</th>
                    <th colspan="4">Action</th>
                </tr>
        </thead>
        <tr>
            <td><?php echo $_SESSION['userdata']['userid']; ?></td>
            <td><?php echo $_SESSION['userdata']['username']; ?></td>
            
            <td><?php echo $_SESSION['userdata']['email']; ?></td>
            <td>
                <a href="update.php" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a  href="delete.php" 
            onClick="return confirm('Are you sure you want to delete?')" 
                class="del_btn">Delete</a>
            </td>
           
        </tr>

</table>

    <body>
</html>