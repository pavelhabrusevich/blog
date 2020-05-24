<?php
$dbhost = "localhost";
$dbname = "blog";
$dbusername = "debian-sys-maint";
$dbpassword = "jXv4ztAUHyr9U7as";

$dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$dbconnection->set_charset("utf8");

function get_all_posts(){
    global $dbconnection;
    $posts = $dbconnection->query("SELECT * FROM posts LIMIT 4");
    return $posts;
}

//function get_posts_qty(){
//    global $dbconnection;
//    $posts_qty = $dbconnection->query("SELECT COUNT(id) FROM posts");
//    foreach ($posts_qty as $qty){
//        return $qty["COUNT(id)"];
//    }
//}

function get_post($id){
    global $dbconnection;
    $posts = $dbconnection->query("SELECT * FROM posts WHERE id = $id");
    foreach ($posts as $post){
        return $post;
    }
}

function get_all_categories(){
    global $dbconnection;
    $categories = $dbconnection->query("SELECT * FROM categories");
    return $categories;
}

function get_category_data($id, $category_column){
    global $dbconnection;
    $query = mysqli_query($dbconnection, "SELECT * FROM categories WHERE id = $id");
    while ($categoryName = mysqli_fetch_assoc($query)){
        return $categoryName["$category_column"];
    }
}
// Посты, которые относятся к категории
function get_category_posts($id_category){
    global $dbconnection;
    $categoryPosts = $dbconnection->query("SELECT id FROM posts WHERE id_category = $id_category");
    return $categoryPosts;
}