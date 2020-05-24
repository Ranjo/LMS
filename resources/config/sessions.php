<?php
session_start();
//include '../../db.php';
if (!isset($_SESSION['User_ID'])) {
	header('location: http://localhost/lms');
}
?>