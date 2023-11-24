<?php 
$title = "Register";
$page  = "register";
?>

<?php require_once("templates/main_start.php"); ?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        register($_POST); 
    }
?>



<form action="" method="post">
<section class="auth-login">
    <div class="auth-login-container">
        <div class="auth-header font-kanit primary-font">
            <div class="auth-header-logo"><img src="<?= BASEURL ?>/assets/images/logo-app.png" alt=""></div>
            <h1 class="auth-header-title">Register</h1>
        </div>
        <div class="auth-body">
            <div class="profile-edit-input">
                <div class="form-input">
                    <span class="font-kanit">Email</span>
                    <input type="email" class="font-montserrat" name="email" placeholder="youremail@email.com" required>
                </div>
                <div class="form-input">
                    <span class="font-kanit">Password</span>
                    <input type="password" class="font-montserrat" name="password" placeholder="Your Password..." required>
                </div>
                <div class="form-input">
                    <span class="font-kanit">Username</span>
                    <input type="text" class="font-montserrat" maxlength=10 name="username" placeholder="yourusername" required>
                </div>
                <div class="form-input">
                    <span class="font-kanit">Full Name</span>
                    <input type="text" class="font-montserrat" name="fullname" placeholder="yourfullname" required>
                </div>
                <div class="form-input">
                    <span class="font-kanit">Birthday</span>
                    <input type="date" class="font-montserrat" name="birthday" required>
                </div>
                <div class="form-input">
                    <span class="font-kanit">Gender</span>
                    <select name="gender" id="gender">
                        <option value="0">Female</option>
                        <option value="1">Male</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="auth-footer">
            <div class="form-input">
                <button type="submit" class="primary-btn font-kanit">Register</button>
            </div>
            <span class="font-montserrat">Already has FanConnect account? <a href="<?= BASEURL ?>/app/user/login.php">sign in here</a></span>
        </div>
    </div>

</section>
</form>


    
<?php require_once("templates/main_end.php"); ?>