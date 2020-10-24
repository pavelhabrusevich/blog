<?php require "db.php";
require __DIR__ . '/vendor/autoload.php';
session_start();
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
$phraseBuilder = new PhraseBuilder(5, '0123456789');
$captcha = new CaptchaBuilder(null, $phraseBuilder);
?>
<head>
    <meta charset="utf-8">
    <title>The Луканомика</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="bootstrap/js/bootstrap.min.js">
    <link href="js/jquery.min.js">
</head>
<div class="container py-3">
    <div class="col-6 offset-3 text-center pb-3">
        <a class="blog-header-logo text-dark" href="/blog/">Рады видеть вас в волшебной стране "The Луканомика</a>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <div class="col-6 offset-3 text-center">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Your Name *" value="<?php echo @$_POST["name"]; ?>" required/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email *" value="<?php echo @$_POST["email"]; ?>" required/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Your Password *" required/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass_2" placeholder="Confirm Password *" required/>
            </div>
            <div class="form-group">
                <?php if (isset($_POST["registration"]) && $_SESSION['captcha'] == $_POST['captcha']) {
                    $name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
                    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
                    $pass = filter_var(trim($_POST["pass"]), FILTER_SANITIZE_STRING);
                    $pass_2 = filter_var(trim($_POST["pass_2"]), FILTER_SANITIZE_STRING);
                    $errors = [];
                    $regex = '/^[а-яА-Яa-zA-Z0-9_\.\-]+@[а-яА-Яa-zA-Z0-9\-]+\.[а-яА-Яa-zA-Z\-\.]+$/Du'; //email
                    if (mb_strlen($name) < 3 || mb_strlen($name) > 20) {
                        $errors[] = "Недопустимое количесвто символов в имени";
                    }
                    if (!preg_match($regex, $email)) {
                        $errors[] = "Некорректный email";
                    }
                    $userQty = mysqli_query($dbconnection, "SELECT * FROM `users` WHERE `email`='$email'");
                    if (mysqli_num_rows($userQty) > 0) {
                        $errors[] = "Пользователь с таким email существует";
                    }
                    if (mb_strlen($pass) < 3 || mb_strlen($pass) > 20) {
                        $errors[] = "Недопустимое количесвто символов для пароля";
                    }
                    if ($pass != $pass_2) {
                        $errors[] = "Повторите пароль еще раз";
                    }
                    if (empty($errors)) {
                        $pass = md5($pass . "qwerty12345");
                        $userReg = mysqli_query($dbconnection, "INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$name', '$email', '$pass')");
                        setcookie('lukaCookie', $name, time() + 600, "/");
                        header('Location: /blog');
                    } else echo array_shift($errors);
                } ?>
            </div>
            <div class="form-group">
                <?php
                $captcha->build();
                $_SESSION["captcha"] = $captcha->getPhrase();
                ?>
                <img src="<?php echo $captcha->inline(); ?>" />
                <input type="text" class="form-check-inline" name="captcha" placeholder="type text *"/>
            </div>
            <button type="submit" class="btn btn-outline-secondary" name="registration">Submit</button>
        </div>
    </form>
</div>