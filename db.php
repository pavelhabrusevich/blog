<?php
$dbhost = "localhost";
$dbname = "blog";
$dbusername = "debian-sys-maint";
$dbpassword = "jXv4ztAUHyr9U7as";

$dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
$dbconnection->set_charset("utf8");

// Все посты
function get_all_posts(){
    global $dbconnection;
    $posts = mysqli_query($dbconnection,"SELECT * FROM posts");
    return $posts;
}
// Лимит постов со смещением
function get_limit_posts($limit, $offset){
    global $dbconnection;
    $limit = mysqli_real_escape_string($dbconnection, $limit);
    $offset = mysqli_real_escape_string($dbconnection, $offset);
    $posts = mysqli_query($dbconnection,"SELECT * FROM posts LIMIT $limit OFFSET $offset");
    return $posts;
}
// Количество постов
function get_posts_qty(){
    global $dbconnection;
    $postsQty = mysqli_query($dbconnection, "SELECT COUNT(id) FROM posts");
    foreach ($postsQty as $qty){
        return $qty["COUNT(id)"];
    }
}

// Пост
function get_post($id){
    global $dbconnection;
    $id = mysqli_real_escape_string($dbconnection, $id);
    $posts = mysqli_query($dbconnection,"SELECT * FROM posts WHERE id = $id");
    foreach ($posts as $post){
        return $post;
    }
}
// Все категории
function get_all_categories(){
    global $dbconnection;
    $categories = mysqli_query($dbconnection,"SELECT * FROM categories");
    return $categories;
}
// id или именя категории
function get_category_data($id, $category_column){
    global $dbconnection;
    $id = mysqli_real_escape_string($dbconnection, $id);
    $query = mysqli_query($dbconnection, "SELECT * FROM categories WHERE id = $id");
    while ($categoryName = mysqli_fetch_assoc($query)){
        return $categoryName["$category_column"];
    }
}
// id постов, которые относятся к категории
function get_category_posts($id_category){
    global $dbconnection;
    $id_category = mysqli_real_escape_string($dbconnection, $id_category);
    $categoryPosts = mysqli_query ($dbconnection, "SELECT id FROM posts WHERE id_category = $id_category");
    return $categoryPosts;
}
//Ссылки на ресурсы
function get_sources(){
    global $dbconnection;
    $sources = mysqli_query($dbconnection, "SELECT * FROM other_sources");
    return$sources;
}
// Поиск по блоку
function search(){
    global $dbconnection;
    $postId = "";
    $postTitle = "";
    if (isset($_POST['submit']) && !empty($_POST['search'])) {
        $search = $_POST['search'];
        $query = mysqli_query($dbconnection, "SELECT * FROM posts WHERE title LIKE '%$search%' OR text LIKE '%$search%'");
        $queryQty = mysqli_num_rows($query);
        if ($queryQty == 0) {
            echo "Не найдено '" . $search . "'";
        } else {
            while ($data = mysqli_fetch_array($query)) {
                $postId = $data['id'];
                $postTitle = $data['title'];
                echo '<pre><a href="/blog/post.php?id=' . $postId . '" target="_blank">' . mb_strimwidth($postTitle, 0, 25, "..") . '</a></pre>';
            }
        }
    }
}