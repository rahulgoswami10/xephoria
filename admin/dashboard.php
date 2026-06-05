<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    
	header("Location: ../auth/login.php");
	exit();
}

if ($_SESSION['user_type'] != 1) {

    header("Location: ../index.php");
    exit();

}

?>