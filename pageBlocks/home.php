<!--home page-->
<?php
$posts = get_all_posts();
foreach ($posts as $post):
    $date = $post["date"];
    $category = get_category($post["id_category"])
?>
<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-260 position-relative">
    <div class="col-auto d-none d-lg-block">
        <img src="<?php echo $post["img"];?>" class="rounded float-left m-3" alt="i-am-lovely" width="250" height="250">
    </div>
    <div class="col p-4 d-flex flex-column position-static">
        <strong href="/blog/" class="d-inline-block mb-2 text-primary"><?php echo $category;?></strong>
        <h3 class="mb-0"><?php echo $post["title"];?></h3>
        <div class="mb-1 text-muted"><?php echo date("d.m.Y", strtotime($date));?></div>
        <p class="card-text mb-auto"><?php echo $post["text"];?></p>
        <a href="/blog/post.php?id=<?php echo $post["id"];?>" class="stretched-link">Continue reading</a>
    </div>
</div>
<?php endforeach; ?>
<nav class="blog-pagination">
    <a class="btn btn-outline-primary" href="#">Older</a>
    <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
</nav>



<!--<div class="card flex-md-row mb-4 box-shadow h-md-250">-->
<!--    <div class="card-body d-flex flex-column align-items-start">-->
<!--        <strong class="d-inline-block mb-2 text-primary">World</strong>-->
<!--        <h3 class="mb-0">-->
<!--            <a class="text-dark" href="#">Featured post</a>-->
<!--        </h3>-->
<!--        <div class="mb-1 text-muted">Nov 12</div>-->
<!--        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>-->
<!--        <a href="#">Continue reading</a>-->
<!--    </div>-->
<!--    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">-->
<!--</div>-->