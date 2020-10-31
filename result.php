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
//require 'header1.php';
    require 'config.php';
    //session_start();

    echo '<h1 class="header">Result</h1>';
?>
<html>
    <header>
        <title>Result</title>
        <link type = "text/css" rel = "stylesheet" href = "style.css">
    </header>
    <body>
    
<?php 
$sql = "SELECT * FROM question";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    
         
$counter = 0;
$radioVal = $_POST["radio1"];
echo $radioVal; '<br><br>';
if(isset($_POST['radio1'])){
if($radioVal == $row['ans'])
{
    $counter = $counter + 1;
    echo("Average");
}
else 
{
    $counter = $counter - 1;
    echo("Average");
}
}
}
?>