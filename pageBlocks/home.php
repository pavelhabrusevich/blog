<!--home page-->
<?php
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$limit = 5;
$offset = $limit * ($page - 1);
$posts = get_limit_posts($limit, $offset);
$postsQty = get_posts_qty();
$pagesQty = ceil($postsQty / $limit);
foreach ($posts as $post):
    $date = $post["date"];
    $categoryName = get_category_data($post["id_category"], "category_name");
    $categoryId = get_category_data($post["id_category"], "id");
    ?>
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-260 position-relative">
        <div class="col-auto d-none d-lg-block">
            <a href="/blog/post.php?id=<?php echo $post["id"]; ?>" target="_blank">
                <img src="<?php echo $post["img"]; ?>" class="rounded float-left m-3" alt="i-am-lovely" width="250"
                     height="250">
            </a>
        </div>
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">
                <a href="/blog/category.php?id_category=<?php echo $categoryId; ?>"><?php echo $categoryName; ?></a>
            </strong>
            <h3 class="mb-0">
                <a class="text-dark" href="/blog/post.php?id=<?php echo $post["id"]; ?>"
                   target="_blank"><?php echo $post["title"]; ?></a>
            </h3>
            <div class="mb-1 text-muted"><?php echo date("d.m.Y", strtotime($date)); ?></div>
            <p class="card-text mb-auto"><?php echo mb_strimwidth($post["text"], 0, 200, ".."); ?></p>
            <a href="/blog/post.php?id=<?php echo $post["id"]; ?>" target="_blank">Continue reading</a>
        </div>
    </div>
<?php endforeach; ?>
<nav class="blog">
    <a class="btn btn-outline-primary" href="/blog/?page=<?php previousPage(); ?>">Назад</a>
    <a class="btn btn-outline-primary" href="/blog/?page=<?php nextPage(); ?>">Далее</a>
</nav>