<!--post page-->
<?php
require_once __DIR__ . '/../vendor/autoload.php';

$post = get_post($_GET['id']);
$date = $post["date"];
$category = get_category_data($post["id_category"], "category_name");

if (isset($_POST['share'])) {
// Create the Transport
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 25, 'tls'))
        ->setUsername('email')
        ->setPassword('1ohC3ee4Ngai6cho2242h07ei3');
// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
// Create a message
    $message = (new Swift_Message($category))
        ->setFrom(['john@doe.com' => 'Лука'])
        ->setTo([$_POST['email']])
        ->setBody('http://localhost' . $_SERVER['REQUEST_URI']);
// Send the message
    $result = $mailer->send($message);
}
?>
<div class="align-content-around">
    <img src="<?php echo $post["img"]; ?>" class="rounded float-left m-3" alt="i-am-lovely" width="250" height="250">
    <strong class="d-inline-block mb-2 text-primary"><?php echo $category; ?></strong>
    <h3 class="mb-0"><?php echo $post["title"]; ?></h3>
    <div class="mb-1 text-muted"><?php echo date("d.m.Y", strtotime($date)); ?></div>
    <p class="text-left"><?php echo $post["text"]; ?></p>
</div>
<form action="" method="post">
    <div class="col-6 offset-6 text-center">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" type="submit" name="share">Share Post</button>
            </div>
            <input type="text" class="form-control" aria-label="" aria-describedby="basic-addon1" name="email" placeholder="email" required>
        </div>
    </div>
</form>