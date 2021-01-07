<?php
session_start();

if(isset($_POST['pid'])){
    $_SESSION['cart_pid'] = $_POST['pid'];
}

if(isset($_POST['ward'])){
    $_SESSION['id_did'] = $_POST['ward'];
}

?>