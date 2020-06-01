<?php
$name = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST["name"]), FILTER_SANITIZE_EMAIL);
$pass = filter_var(trim($_POST["name"]), FILTER_SANITIZE_STRING);