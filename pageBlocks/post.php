<!--post page-->
<?php
$post = get_post($_GET['id']);
$date = $post["date"];
$category = get_category($post["id_category"])
?>
<div class="align-content-around">
    <img src="<?php echo $post["img"];?>" class="rounded float-left m-3" alt="i-am-lovely" width="250" height="250">
    <strong class="d-inline-block mb-2 text-primary"><?php echo $category;?></strong>
    <h3 class="mb-0"><?php echo $post["title"];?></h3>
    <div class="mb-1 text-muted"><?php echo date("d.m.Y", strtotime($date));?></div>
    <p class="text-left"><?php echo $post["text"];?></p>
</div>
<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
</nav>