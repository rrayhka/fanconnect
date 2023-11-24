<?php 
$title = "Your Profile";
$page  = "profile";
?>

<?php require_once("templates/main_start.php"); ?>
<?php
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST['status'] == "profile")
        {
            editUserData($_SESSION['email'], $_POST);
            $userData = getUserDataHighlight($_SESSION['email']);
            setcookie('key', password_hash($userData['username'], PASSWORD_BCRYPT));
            unset($_POST);
            header("Location: profile.php");  
            exit;
        }
        else
        {
            changePhoto($_SESSION['email'], $_FILES['photo']);
            header("Location: profile.php");
            exit;
        }
    }
    $user  = getUserData($_SESSION['email']);



?>

<section class="menu-hierarchy">
    
    <a href="profile.php">
        <span class="font-kanit">
            < Back
        </span>
    </a>

</section>



<section class="idol-header">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="idol-profile profile-edit">
        <input type="hidden" name="status" value="photo">
        <div class="idol-profile-photo" style="background-image:url('<?= BASEURL."/assets/images/users/".$user["photo"] ?>'); 
            background-size:cover;background-position:center" id="news-cover"></div>
        <input type="file" name="photo" id="photo" onchange="coverPreview()">
        <div class="form-input">
            <button type="submit" class="primary-btn font-kanit">Change Photo</button>
        </div>
    </div>
    </form>
    <form action="" method="post">
    <div class="idol-bio profile-edit">
        <input type="hidden" name="status" value="profile">
        <div class="idol-bio-header font-kanit profile-edit-header">
            <input class="font-kanit" type="text" name="username" value="<?= $user["username"] ?>">
        </div>
        <div class="profile-edit-input">
            <div class="form-input">
                <span class="font-kanit">Full Name</span>
                <input type="text" class="font-montserrat" name="full-name" value="<?= $user["full_name"] ?>">
            </div>
            <div class="form-input">
                <span class="font-kanit">Birthday</span>
                <input type="date" class="font-montserrat" name="birthday" id="" value="<?= $user["birthday"] ?>">
            </div>
            <div class="form-input">
                <button type="submit" class="primary-btn font-kanit">Save Profile</button>
            </div>
        </div>
    </div>
    </form>
</section>

<script>
    function coverPreview()
    {
        const newsCover = document.querySelector( '#news-cover' );
        const fileCover = document.querySelector( '#photo' );

        const fileInput = new FileReader();
        fileInput.readAsDataURL(fileCover.files[0])

        fileInput.onload = (e) => {
            newsCover.style.backgroundImage  ="url('"+e.target.result+"')";
        }
    }
        

</script>

    
<?php require_once("templates/main_end.php"); ?>