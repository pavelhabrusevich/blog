<?php require "db.php";?>
<head>
    <meta charset="utf-8">
    <title>First blog</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="bootstrap/js/bootstrap.min.js">
    <link href="js/jquery.min.js">
</head>
<!--header-->
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-6 offset-3 text-center pb-3">
                <a class="blog-header-logo text-dark" href="/blog/">Рады вашему возвращению в волшебную страну "The Луканомика"</a>
            </div>
        </div>
        <div class="container register-form">
            <div class="form">
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                    <div class="col-6 offset-3 text-center">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email *"
                                   value="<?php echo @$_POST["email"]; ?>" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="Your Password *" value="<?php echo @$_POST["pass"]; ?>" required/>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary" name="login">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-6 offset-3 text-center text-danger">
                    <?php if (isset($_POST["login"])) {
                        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
                        $pass = filter_var(trim($_POST["pass"]), FILTER_SANITIZE_STRING);
                        $pass = md5($pass . "qwerty12345");
                        $user = mysqli_query($dbconnection, "SELECT * FROM `users` WHERE `pass`='$pass' AND `email`='$email'");
                        $userData = mysqli_fetch_assoc($user);
                        if (mysqli_num_rows($user) > 0){
                            setcookie('lukaCookie', $userData['name'], time() +600, "/");
                            header('Location: /blog');
                        } else echo 'Нет такого отморозка';
                        exit();
                    }
                    ?>
            </div>
        </div>
    </header>
</div>