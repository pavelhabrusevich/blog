<!--sidebar-->
<?php //require "db.php"?>
<aside>
    <form method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" name="submit">Искать</button>
            </div>
            <input type="text" class="form-control" aria-label="" aria-describedby="basic-addon1" name="search" required>
        </div>
    </form>
    <?php $searchResult = search();?>
    <div class="p-4">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
        </ol>
    </div>
    <div class="p-4">
        <h4 class="font-italic">Я вам брошу ссылочку:</h4>
        <ol class="list-unstyled">
            <?php $sources = get_sources();
            foreach ($sources as $source): ?>
            <li><a href="<?php echo $source["source_link"]?>" target="_blank"><?php echo $source["source_name"]?></a></li>
            <?php endforeach;?>
        </ol>
    </div>
</aside>