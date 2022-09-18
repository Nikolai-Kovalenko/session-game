<?php
session_start();

function redirect(){
    header('Location: index.php');
    exit();
}

$_SESSION['userHP'] = 10;
$_SESSION['serverHP'] = 10;
redirect();