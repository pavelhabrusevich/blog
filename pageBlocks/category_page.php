<!--categories page-->
<?php
$categoryPosts = get_category_posts($_GET["id_category"]);
foreach ($categoryPosts as $categoryPost):
    foreach ($categoryPost as $postId):
        $post = get_post($postId);
        $date = $post["date"];
        $category = get_category_data($post["id_category"], "category_name");
?>
<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-260 position-relative">
    <div class="col-auto d-none d-lg-block">
        <a href="/blog/post.php?id=<?php echo $post["id"];?>" target="_blank">
            <img src="<?php echo $post["img"];?>" class="rounded float-left m-3" alt="i-am-lovely" width="250" height="250">
        </a>
    </div>
    <div class="col p-4 d-flex flex-column position-static">
        <strong href="/blog/" class="d-inline-block mb-2 text-primary"><?php echo $category;?></strong>
        <h3 class="mb-0">
            <a class="text-dark" href="/blog/post.php?id=<?php echo $post["id"];?>" target="_blank"><?php echo $post["title"];?></a>
        </h3>
        <div class="mb-1 text-muted"><?php echo date("d.m.Y", strtotime($date));?></div>
        <p class="card-text mb-auto"><?php echo mb_strimwidth($post["text"], 0, 200, "..");?></p>
        <a href="/blog/post.php?id=<?php echo $post["id"];?>" target="_blank">Continue reading</a>
    </div>
</div>
    <?php endforeach;?>
<?php endforeach;?>
<!--<nav class="blog-pagination">-->
<!--    <a class="btn btn-outline-primary" href="#">Older</a>-->
<!--    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>-->
<!--</nav>-->