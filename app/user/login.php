<?php 
$title = "Login";
$page  = "profile";
?>

<?php require_once("templates/main_start.php"); ?>
<?php
    if(isset($_SESSION["login"]) && $_SESSION['login'] == true)
    {
        header("Location: ".BASEURL."/app/user");
        exit;
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(validateEmail($_POST))
        {
            if(validatePassword($_POST))
            {
                $_SESSION["email"] = $_POST['email'] ; 
                $_SESSION["login"] = true ; 
                if(isset($_POST['remember']))
                {
                    $userData = getUserDataHighlight($_POST['email']);
                    setcookie('email', $_POST['email'], time()+60*60*24);  
                    setcookie('key', password_hash($userData['username'], PASSWORD_BCRYPT));  
                }
                unset($_POST);
                header("Location: ".BASEURL."/app/user");
                exit;
            }
            else
            {
                echo "<script>alert('Your Password is wrong please try again!!')</script>";
            }
        }
        else
        {
            echo "<script>alert('Email Not Registered!!')</script>";
        }
        
    }
?>



<form action="" method="post">
<section class="auth-login">
    <div class="auth-login-container">
        <div class="auth-header font-kanit primary-font">
            <div class="auth-header-logo"><img src="<?= BASEURL ?>/assets/images/logo-app.png" alt=""></div>
            <h1 class="auth-header-title">Login</h1>
        </div>
        <div class="auth-body">
            <div class="profile-edit-input">
                <div class="form-input">
                    <span class="font-kanit">Email</span>
                    <input type="email" class="font-montserrat" name="email" placeholder="youremail@email.com">
                </div>
                <div class="form-input">
                    <span class="font-kanit">Password</span>
                    <input type="password" class="font-montserrat" name="password" placeholder="Your Password...">
                </div>
                <div class="form-input remember">
                    <input type="checkbox" class="font-montserrat" name="remember" id="remember">
                    <label for="remember" class="font-kanit">Remember Me</label>
                </div>
            </div>
        </div>
        <div class="auth-footer">
            <div class="form-input">
                <button type="submit" class="primary-btn font-kanit">Login</button>
            </div>
            <span class="font-montserrat">Don't have FanConnect Account? <a href="<?= BASEURL ?>/app/user/register.php">sign up now</a></span>
        </div>
    </div>

</section>
</form>


    
<?php require_once("templates/main_end.php"); ?>