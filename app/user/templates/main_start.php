<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/fanconnect-praktikan/app/base.php");
require_once(BASEPATH."/app/database.php");
require_once(BASEPATH."/app/function_app.php");

if(isset($_COOKIE['email']) && $_COOKIE['key'])
{
    $dataUser = getUserDataHighlight($_COOKIE['email']);
    if(password_verify($dataUser['username'], $_COOKIE['key']))
    {
        $_SESSION["email"] = $dataUser['email']; 
        $_SESSION["login"] = true ;
    }
}
?>
<!-- <?php phpinfo(); ?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/assets/images/logo-app.ico">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/css/user.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    
    <title><?= $title ?></title>
</head>
<body>


    <section id="main-grid" class="light-bg">
        <sidebar>
            <?php require_once("sidebar.php"); ?>
        </sidebar>

        <content>
            <div class="content-container">
                
                






