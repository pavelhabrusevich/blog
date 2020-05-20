<?php
$dbhost = "localhost";
$dbname = "blog";
$dbusername = "debian-sys-maint";
$dbpassword = "jXv4ztAUHyr9U7as";

$dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$dbconnection->set_charset("utf8");

function get_all_posts(){
    global $dbconnection;
    $posts = $dbconnection->query("SELECT * FROM posts");
    return $posts;
}

function get_post($id){
    global $dbconnection;
    $posts = $dbconnection->query("SELECT * FROM posts WHERE id = $id");
    foreach ($posts as $post){
        return $post;
    }
}

function get_category($id){
    global $dbconnection;
    $categories = $dbconnection->query("SELECT * FROM categories WHERE id = $id");
    foreach ($categories as $category){
        return $category["category_name"];
    }
}