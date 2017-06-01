<?php
include 'sqlPdo.php';
session_start();
if(!isset($_SESSION['editid']) )
    header('Location:20170531_xx.php');
$id= $_SESSION['editid'];
$account = $_GET['account'];
$password = $_GET['password'];
$realname = $_GET['realname'];

$sql = "update member set account=?,password=?,realname=? where id = ?";

$PDO = new PDO($dsn, $username, $passwd, $options);

$stat=$PDO->prepare($sql);
$stat->execute([$account,$password,$realname,$id]);  ///id


$PDO->query($sql);



//
//$db = new mysqli('127.0.0.1','root',
//    'root','iii');
//$db->query($sql);

//echo 'ok';
header('Location:HW8_20170531_PDO.php');
