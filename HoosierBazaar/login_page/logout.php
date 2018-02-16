<?php

$cookie_name = "name";
setcookie($cookie_name, '', time()-3600, "/");

$cookie_role = "role";
setcookie($cookie_role, '', time()-3600, "/");

$redirect_url = "../home.php";

if(isset($_GET['redirect_url']) && $_GET['redirect_url']!='')
{
    $redirect_url = $_GET['redirect_url'];
}

header("Location: $redirect_url");