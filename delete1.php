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
$id = $_SESSION['userdata']['userid'];
echo $id;

$sql = "DELETE FROM register WHERE id=$id";

if ($conn->query($sql) === true) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
session_destroy();
header('Location: login.php');

?>
