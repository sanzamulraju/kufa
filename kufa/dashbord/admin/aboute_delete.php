<?php
require_once('../../db-connect.php');
session_start();
$id = $_GET['id'];

$about_delete_query = "DELETE  FROM abouts WHERE id='$id'";
$about_delete_query_db = mysqli_query($db_connect, $about_delete_query);
header('location:./about_list.php');
