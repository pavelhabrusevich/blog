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
            <div class="col-6 offset-3 text-center">
                <a class="blog-header-logo text-dark" href="/blog/">The Луканомика</a>
            </div>
        </div>
        <div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>This is a simpleRegister Form made using Boostrap.</p>
                </div>
                <form action="reg.php" method="post">
                    <div class="form-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email *" value=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pass" placeholder="Your Password *" value=""/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="pass" placeholder="Confirm Password *" value=""/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </header>
</div>