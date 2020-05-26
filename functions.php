<?php
// footer buttons
function previousPage(){
    global $page;
    if ($page > 1){
        echo $previousPage = $page - 1;
    } else echo $page = 1;
}
function nextPage(){
    global $page;
    global $pagesQty;
    if ($page < $pagesQty){
        echo $nextPage = $page + 1;
    } else echo $page;
}