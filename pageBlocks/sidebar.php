<!--sidebar-->
<?php //require "db.php"?>
<aside>
    <form method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Искать</button>
            </div>
            <input type="text" class="form-control" aria-label="" aria-describedby="basic-addon1" name="search"
                   required>
        </div>
    </form>
    <?php $searchResult = search(); ?>
    <div class="p-4">
        <h4 class="font-italic">Я вам брошу ссылочку:</h4>
        <ol class="list-unstyled">
            <?php $sources = get_sources();
            foreach ($sources as $source): ?>
                <li><a href="<?php echo $source["source_link"] ?>"
                       target="_blank"><?php echo $source["source_name"] ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
</aside>