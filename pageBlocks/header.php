<!--header-->
<?php require "db.php";
require "functions.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>The Луканомика</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/blog.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900">
</head>

<body>
<div class="container">

    <!--header-->
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-6 offset-3 text-center">
                <a class="blog-header-logo text-dark" href="/blog/">The Луканомика</a>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-center">
                <nav class="blog">
                    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                        <?php if (!isset($_COOKIE['lukaCookie'])): ?>
                            <a class="btn btn-outline-primary" href="/blog/login.php">LogIn</a>
                            <a class="btn btn-outline-secondary" href="/blog/registration.php">SignUp</a>
                        <?php else: ?>
                            <a>Привет <?= $_COOKIE['lukaCookie'] ?></a>
                            <?php if (isset($_POST["logout"])) {
                                global $userData;
                                setcookie('lukaCookie', $userData['name'], time() -600, "/");
                                header('Location: /blog');
                            } ?>
                            <button type="submit" class="btn btn-outline-secondary" name="logout">LogOut</button>
                        <?php endif; ?>
                    </form>
                </nav>
            </div>
        </div>
    </header>

    <!--categories-->
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <?php $categories = get_all_categories();
            foreach ($categories as $category):?>
                <a class="p-2 text-muted"
                   href="/blog/category.php?id_category=<?php echo $category["id"]; ?>"><?php echo $category["category_name"] ?></a>
            <?php endforeach; ?>
        </nav>
    </div>
    <div/>